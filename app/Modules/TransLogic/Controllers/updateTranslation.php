<?php


namespace App\Modules\TransLogic\Controllers;

use App\Modules\LocationsLogic\CitiesLogic\Models\City;
use App\Modules\LocationsLogic\CountriesLogic\Models\Country;
use App\Modules\ServicesLogic\Models\Service;
use App\Modules\ActivitiesLogic\Models\Activity;
use App\Modules\CarsLogic\BrandsLogic\Models\CarBrand;
use App\Modules\CarsLogic\FeaturesLogic\FeatureItemsLogic\Models\FeatureItem;
use App\Modules\CarsLogic\TypesLogic\Models\CarType;



use App\Modules\LocationsLogic\LocationsLogicHelpersTrait;
use App\Modules\TransLogic\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\Concerns\AsAction;

class updateTranslation
{

    use AsAction;
    use LocationsLogicHelpersTrait;


    public function handle(Request $request, $id)
    {


        $trans = $this->handleUpdate($request, Translation::class, $id);

        $trans ? Session::flash('message', 'Translations mis a jour avec succès') : Session::flash('message', 'Error');

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
