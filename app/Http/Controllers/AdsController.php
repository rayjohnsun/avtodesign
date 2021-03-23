<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdsRequest;
use App\Http\Requests\UpdateAdsRequest;
use App\Models\Ads;
use App\Models\CarModels;
use App\Models\Cities;
use App\Models\Colors;
use App\Models\Marks;
use App\Models\Regions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller 
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    $query = Ads::query();

    $title = $request->input('title');
    if (!empty($title)) {
      $query->where('title', 'like', $title . '%');
    }

    // $description = $request->input('description');
    // if (!empty($description)) {
    //   $query->where('description', 'like', '%' . $description . '%');
    // }

    $regionId = $request->input('region_id');
    if (!empty($regionId)) {
      $query->where('region_id', $regionId);
    }

    $cityId = $request->input('city_id');
    if (!empty($cityId)) {
      $query->where('city_id', $cityId);
    }

    $modelId = $request->input('model_id');
    if (!empty($modelId)) {
      $query->where('model_id', $modelId);
    }

    $markId = $request->input('mark_id');
    if (!empty($markId)) {
      $query->where('mark_id', $markId);
    }

    // $colorId = $request->input('color_id');
    // if (!empty($colorId)) {
    //   $query->where('color_id', $colorId);
    // }

    $year = $request->input('year');
    if (!empty($year)) {
      $query->where('year', 'like', $year . '%');
    }

    $status = $request->input('status');
    if ($status > -1) {
      $query->where('status', $status);
    }

    $sort = $request->input('sort') ? $request->input('sort') : 'id';
    $order = ((int)$request->input('order') < 1) ? 'DESC' : 'ASC';

    $query->orderBy($sort, $order);

    $data = $query->get();
    return view('ads.index', [
      'models' => $data, 
      'params' => [
        'title' => $title, 
        // 'description' => $description, 
        'region_id' => $regionId, 
        'city_id' => $cityId,
        'model_id' => $modelId,
        'mark_id' => $markId,
        // 'color_id' => $colorId,
        'year' => $year,
        'status' => $status,
      ], 
      'sort' => $sort, 
      'order' => $order,
      'regions' => $this->getRegions(),
      'carModels' => $this->getCarModels(),
      'marks' => $this->getMarks(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() 
  {
    return view('ads.create', [
      'regions' => $this->getRegions(), 
      'carModels' => $this->getCarModels(),
      'marks' => $this->getMarks(),
      'colors' => $this->getColors()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateAdsRequest $request) 
  {
    $model = new Ads;
    $model->title = $request->input('title');
    $model->description = $request->input('description');
    $model->region_id = $request->input('region_id');
    $model->city_id = $request->input('city_id');
    $model->model_id = $request->input('model_id');
    $model->mark_id = $request->input('mark_id');
    $model->color_id = $request->input('color_id');
    $model->year = $request->input('year');
    $model->amount = $request->input('amount');
    $model->currency = $request->input('currency');
    $model->image_path = $request->image->store('storage', ['disk' => 'nstore']);

    $model->user_id = Auth::user()->id;
    $model->status = $request->input('status');
    $model->expire_date = date('Y-m-d', strtotime('+7 days'));
    $model->is_credit = 0;
    $model->lat_lon = '';
    $model->save();

    return redirect()->route('ads.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) 
  {
    $model = Ads::findOrFail($id);

    return view('ads.show', ['model' => $model]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) 
  {
    $model = Ads::findOrFail($id);

    return view('ads.edit', [
      'model' => $model,
      'regions' => $this->getRegions(), 
      'carModels' => $this->getCarModels(),
      'marks' => $this->getMarks(),
      'colors' => $this->getColors()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateAdsRequest $request, $id) 
  {
    $model = Ads::findOrFail($id);
    $model->title = $request->input('title');
    $model->description = $request->input('description');
    $model->region_id = $request->input('region_id');
    $model->city_id = $request->input('city_id');
    $model->model_id = $request->input('model_id');
    $model->mark_id = $request->input('mark_id');
    $model->color_id = $request->input('color_id');
    $model->year = $request->input('year');
    $model->amount = $request->input('amount');
    $model->currency = $request->input('currency');
    $model->status = $request->input('status');
    $model->expire_date = date('Y-m-d', strtotime('+7 days'));
    if ($request->image) {
      if ($model->image_path) {
        Storage::disk('nstore')->delete($model->image_path);
      }
      $model->image_path = $request->image->store('storage', ['disk' => 'nstore']);
    }

    $model->save();

    return redirect()->route('ads.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) 
  {
    $model = Ads::findOrFail($id);
    if ($model->image_path) {
      Storage::disk('nstore')->delete($model->image_path);
    }
    $model->delete();

    return redirect()->route('ads.index')->with('sucMsg', 'Успешно!');
  }

  ///////////////////////////////////////////

  protected function getRegions() {
    return Regions::all();
  }

  protected function getCarModels() {
    return CarModels::all();
  }

  protected function getMarks() {
    return Marks::all();
  }

  protected function getColors() {
    return Colors::all();
  }
}
