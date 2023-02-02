<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Question;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BotManController extends Controller
{
    //

    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {

        $botman = app('botman');

        $botman->typesAndWaits(2);



        $botman->hears('{message}', function ($botman, $message) {

            $is_question = Question::search($message)->first();

            if ($this->hi($message)) {
                $this->askName($botman);
            } else if($this->thanks($message)){
                $botman->reply(__('boot.welcome'));
            }
            else if ($this->order($message)) {
                $this->askForOrder($botman);
            } else if ($is_question) {
                $botman->reply($is_question->lanswer);
            }  else {
                $this->askNextStep($botman,$message);
            }
        });

        $botman->listen();
    }

    public function askForOrder($botman)
    {

        $botman->ask(__('boot.Enter your order id'), function (Answer $answer) {

            $order_id = $answer->getText();

            $order = OrderDetail::find($order_id);

            if ($order) {

//                $this->say(__('boot.Check this url : ').route('trackOrder', ['id' => $order_id]));

                $this->ask(__('boot.Enter your order mobile'), function (Answer $answer) use ($order) {
                    $mobile = $answer->getText();

                    $order =  app(BotManController::class)->validateOrder($mobile,$order->id);

                    if ($order) {
                        $this->say(__('boot.Check this url : ').' '.route('trackOrder.show', ['order_id' => $order->id,'mobile' => $mobile]));
                    }
                    else {
                        $this->say(__('boot.Please insert a valid mobile.'));
                    }
                });
            }
            else {
                $this->say(__('boot.Please insert a valid id.'));
            }


        });
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        if (getShoppingSession() && $name = getShoppingSession() ?->user->name){
        $botman->ask(__('boot.Hello') . ' ' . $name . ' ' . __('boot.! Do you have any questions?'), function (Answer $answer) {

            $question = $answer->getText();
            $is_question = Question::search($question)->first();

            if ($is_question)
                $this->say($is_question->answer);


        });

        $this->askNextStep($botman,'yes');
        }
        else {

            $botman->ask(__('boot.Hello! What is your Name?'), function (Answer $answer) use ($botman) {

            $name = $answer->getText();

            $this->say(__('boot.Nice to meet you') .' '. $name);

            app(BotManController::class)->askNextStep($this,'yes');
        });
    }
    }

    // ...inside the conversation object...
    public function askNextStep($botman,$message)
    {

        Session::put('botS',true);

        $questions = Question::all();

        $buttons = $questions->map(function ($item) {
            return Button::create($item->lquestion)->value($item->lanswer);
        });

        $questionM = $this->yes($message) ? __('boot.Choose a question !') : __('boot.Do you have any questions?');

        $question = \BotMan\BotMan\Messages\Outgoing\Question::create($questionM)
            ->fallback('Unable to create a new database')
            ->callbackId('create_database')
            ->addButtons($buttons->toArray());
        $botman->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'

                if(app(BotManController::class)->order($selectedValue))
                    app(BotManController::class)->askForOrder($this);
                else {
                    $this->say($selectedValue);
                    app(BotManController::class)->askNextStep($this,'yes');
                }

            }
        });
    }

    private function hi($value){
        return $this->ftext($value,[
                'اهلا',
                'أهلا',
                'hi',
                'hello',
                'salut',
            ]
        );
    }

    private function yes($value){
        return $this->ftext($value,[
            'نعم',
            'أجل',
            'اجل',
            'yes',
            'oui'
            ]
        );
    }

    public function order($value){
        return $this->ftext($value,[
                'طلب',
                'الطلب',
                'تتبع',
                'order',
                'truck',
                'ordre',
                'suivie',
                'commande'
            ]
        );
    }


    private function thanks($value){

        return $this->ftext($value,[
                'شكرا',
                'thanks',
                'thank you',
                'merci'
            ]
        );
    }


    private function ftext($value,$langs){

        $value = strtolower($value);

        $arrs = array_filter($langs,fn ($lang) => str_contains($lang,$value) || str_contains($value,$lang));

        return count($arrs);
    }


    public function validateOrder($mobile,$id){

        $order = OrderDetail::whereHas('userAddress',function ($builder) use ($mobile){
            $builder->where("mobile",$mobile);
        })->where("id",$id)->with(['products','paymentDetail','orderTracks','userAddress','orderItems.product'])->first();

        return $order;
    }
}
