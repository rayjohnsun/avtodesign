<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCitiesRequest;
use App\Http\Requests\UpdateCitiesRequest;
use App\Models\Cities;
use App\Models\Regions;

class CitiesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    $query = Cities::query();

    $title = $request->input('title');
    if (!empty($title)) {
      $query->where('title', 'like', $title . '%');
    }

    $subTitle = $request->input('sub_title');
    if (!empty($subTitle)) {
      $query->where('sub_title', 'like', $subTitle . '%');
    }

    $regionId = $request->input('region_id');
    if (!empty($regionId)) {
      $query->where('region_id', $regionId);
    }

    $sort = $request->input('sort') ? $request->input('sort') : 'id';
    $order = ((int)$request->input('order') < 1) ? 'DESC' : 'ASC';

    $query->orderBy($sort, $order);

    $data = $query->get();
    return view('cities.index', ['models' => $data, 'params' => ['title' => $title, 'sub_title' => $subTitle, 'region_id' => $regionId], 'sort' => $sort, 'order' => $order, 'regions' => $this->getRegions()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('cities.create', ['regions' => $this->getRegions()]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateCitiesRequest $request) {
    $model = new Cities;
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->region_id = $request->input('region_id');
    $model->save();

    return redirect()->route('cities.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $model = Cities::findOrFail($id);

    return view('cities.show', ['model' => $model]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $model = Cities::findOrFail($id);

    return view('cities.edit', ['model' => $model, 'regions' => $this->getRegions()]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCitiesRequest $request, $id) {
    $request->uniqid = $id;
    $model = Cities::findOrFail($id);
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->region_id = $request->input('region_id');
    $model->save();

    return redirect()->route('cities.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $model = Cities::findOrFail($id);
    $model->delete();

    return redirect()->route('cities.index')->with('sucMsg', 'Успешно!');
  }

  ///////////////////////////////////////////////////

  protected function getRegions() {
    return Regions::all();
  }
}
