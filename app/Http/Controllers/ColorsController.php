<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateColorsRequest;
use App\Http\Requests\UpdateColorsRequest;
use App\Models\Colors;

class ColorsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    $query = Colors::query();

    $title = $request->input('title');
    if (!empty($title)) {
      $query->where('title', 'like', $title . '%');
    }

    $color = $request->input('color');
    if (!empty($color)) {
      $query->where('color', 'like', $color . '%');
    }

    $sort = $request->input('sort') ? $request->input('sort') : 'id';
    $order = ((int)$request->input('order') < 1) ? 'DESC' : 'ASC';

    $query->orderBy($sort, $order);

    $data = $query->get();
    return view('colors.index', ['models' => $data, 'params' => ['title' => $title, 'color' => $color], 'sort' => $sort, 'order' => $order]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('colors.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateColorsRequest $request) {
    $model = new Colors;
    $model->title = $request->input('title');
    $model->color = $request->input('color');
    $model->save();

    return redirect()->route('colors.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $model = Colors::findOrFail($id);

    return view('colors.show', ['model' => $model]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $model = Colors::findOrFail($id);

    return view('colors.edit', ['model' => $model]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateColorsRequest $request, $id) {
    $request->uniqid = $id;
    $model = Colors::findOrFail($id);
    $model->title = $request->input('title');
    $model->color = $request->input('color');
    $model->save();

    return redirect()->route('colors.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $model = Colors::findOrFail($id);
    $model->delete();

    return redirect()->route('colors.index')->with('sucMsg', 'Успешно!');
  }
}
