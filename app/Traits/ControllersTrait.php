<?php

namespace App\Traits;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

trait ControllersTrait {


    public function deleteM(Request $request){

        $ids = $request->input('ids');

        (self::MODEL)::query()->whereIn('id',$ids)->delete();

    }

}
