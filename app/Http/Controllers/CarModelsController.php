<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCarModelsRequest;
use App\Http\Requests\UpdateCarModelsRequest;
use App\Models\CarModels;

class CarModelsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    $query = CarModels::query();

    $title = $request->input('title');
    if (!empty($title)) {
      $query->where('title', 'like', $title . '%');
    }

    $subTitle = $request->input('sub_title');
    if (!empty($subTitle)) {
      $query->where('sub_title', 'like', $subTitle . '%');
    }

    $sort = $request->input('sort') ? $request->input('sort') : 'id';
    $order = ((int)$request->input('order') < 1) ? 'DESC' : 'ASC';

    $query->orderBy($sort, $order);

    $data = $query->get();
    return view('carmodels.index', ['models' => $data, 'params' => ['title' => $title, 'sub_title' => $subTitle], 'sort' => $sort, 'order' => $order]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('carmodels.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateCarModelsRequest $request) {
    $model = new CarModels;
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->save();

    return redirect()->route('car-models.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $model = CarModels::findOrFail($id);

    return view('carmodels.show', ['model' => $model]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $model = CarModels::findOrFail($id);

    return view('carmodels.edit', ['model' => $model]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCarModelsRequest $request, $id) {
    $request->uniqid = $id;
    $model = CarModels::findOrFail($id);
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->save();

    return redirect()->route('car-models.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $model = CarModels::findOrFail($id);
    $model->delete();

    return redirect()->route('car-models.index')->with('sucMsg', 'Успешно!');
  }
}
