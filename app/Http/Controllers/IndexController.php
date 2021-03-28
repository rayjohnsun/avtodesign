<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\CarModels;
use App\Models\Regions;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index()
  {
  	$models = Ads::where('status', Ads::StatusApprove)->orderBy('expire_date', 'DESC')->limit(2)->get();
  	return view('index.index', [
  		'models' => $models, 
  		'carModels' => $this->getCarModels(), 
  		'regions' => $this->getRegions()
  	]);
  }

  public function search(Request $request)
  {
  	$query = Ads::where('status', Ads::StatusApprove);

  	$modelId = $request->input('model_id');
    if (!empty($modelId)) {
      $query->where('model_id', $modelId);
    }

    $regionId = $request->input('region_id');
    if (!empty($regionId)) {
      $query->where('region_id', $regionId);
    }

    $title = $request->input('title');
    if (!empty($title)) {
      $query->where('title', 'like', '%' . $title . '%');
    }

  	$models = $query->orderBy('expire_date', 'DESC')->get();

  	return view('index.search', [
  		'models' => $models, 
  		'carModels' => $this->getCarModels(), 
  		'regions' => $this->getRegions(),
  		'params' => [
        'model_id' => $modelId,
        'region_id' => $regionId, 
        'title' => $title, 
      ], 
  	]);
  }

  protected function getRegions() {
    return Regions::all();
  }

  protected function getCarModels() {
    return CarModels::all();
  }
}
