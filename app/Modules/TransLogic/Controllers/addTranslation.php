<?php


namespace App\Modules\TransLogic\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Modules\TransLogic\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class addTranslation
{



    public const MODULES = [
        'product' => Product::class,
        'product_category' => ProductCategory::class
    ];


    public function handle(Request $request)
    {

        $builder  = self::MODULES[$request->model];

        $model = $this->handleGet($builder, $request->model_id);

        $trans = $this->handleCreate($request, Translation::class);

        $res = $model->translations()->save($trans);

        $res ? Session::flash('message', 'Translations ajouté avec succès') : Session::flash('message', 'Error');

        if ($request->redirect_page)
            return redirect()->to($request->redirect_page);

        return redirect()->route(Country::CRUDROUTES['index']);
    }

    public function rules(): array
    {

        return [
            // 'lang' => ['required','string','max:50'],
            // 'description' => ['required','string', 'max:100'],
            // 'location_state_id' => ['required','exists:location_states,id']
        ];
    }
}
