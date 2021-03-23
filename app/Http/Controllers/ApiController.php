<?php

namespace App\Http\Controllers;

use App\Models\Cities;

class ApiController extends Controller {

	public function citiesByRegion($id) {

    $model = Cities::where('region_id', $id)->get();
    return $model;

	}

}
