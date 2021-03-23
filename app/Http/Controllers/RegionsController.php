<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRegionsRequest;
use App\Http\Requests\UpdateRegionsRequest;
use App\Models\Regions;

class RegionsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    $query = Regions::query();

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
    return view('regions.index', ['models' => $data, 'params' => ['title' => $title, 'sub_title' => $subTitle], 'sort' => $sort, 'order' => $order]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('regions.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateRegionsRequest $request) {
    $model = new Regions;
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->save();

    return redirect()->route('regions.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $model = Regions::findOrFail($id);

    return view('regions.show', ['model' => $model]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $model = Regions::findOrFail($id);

    return view('regions.edit', ['model' => $model]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRegionsRequest $request, $id) {
    $request->uniqid = $id;
    $model = Regions::findOrFail($id);
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->save();

    return redirect()->route('regions.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $model = Regions::findOrFail($id);
    $model->delete();

    return redirect()->route('regions.index')->with('sucMsg', 'Успешно!');
  }
}
