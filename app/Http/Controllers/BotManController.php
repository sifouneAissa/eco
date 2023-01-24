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

            if ($message == 'hi') {
                $this->askName($botman);
            } else if($message === 'thanks'){
                $botman->reply('your are welcome.');
            }
            else if (str_contains($message,'order')) {
                $this->askForOrder($botman);
            } else if ($is_question) {
                $botman->reply($is_question->answer);
            }  else {
                $this->askNextStep($botman,$message);
            }
        });

        $botman->listen();
    }

    public function askForOrder($botman)
    {

        $botman->ask('Enter your order id', function (Answer $answer) {

            $order_id = $answer->getText();

            $order = OrderDetail::find($order_id);

            if ($order) {

                $this->say('Check this url : '.route('trackOrder', ['id' => $order_id]));
            }
            else {
                $this->say('Please insert a valid id.');
            }
        });
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        if (getShoppingSession() && $name = getShoppingSession() ?->user->name)
        $botman->ask('Hello ' . $name . '! Do you have any questions?', function (Answer $answer) {

            $question = $answer->getText();
            $is_question = Question::search($question)->first();

            if ($is_question)
                $this->say($is_question->answer);
        });
        else {
        $botman->ask('Hello! What is your Name?', function (Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you' . $name . '! Do you have any questions?');
        });
    }
    }

    // ...inside the conversation object...
    public function askNextStep($botman,$message)
    {

        Session::put('botS',true);

        $questions = Question::all();

        $buttons = $questions->map(function ($item) {
            return Button::create($item->question)->value($item->answer);
        });

        $questionM = $message==="yes" ? 'Choose a question !' : 'Do you have any questions?';

        $question = \BotMan\BotMan\Messages\Outgoing\Question::create($questionM)
            ->fallback('Unable to create a new database')
            ->callbackId('create_database')
            ->addButtons($buttons->toArray());
        $botman->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue(); // will be either 'yes' or 'no'
                $selectedText = $answer->getText(); // will be either 'Of course' or 'Hell no!'
                $this->say($selectedValue);
            }
        });
    }
}
