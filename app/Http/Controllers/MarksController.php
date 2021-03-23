<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMarksRequest;
use App\Http\Requests\UpdateMarksRequest;
use App\Models\Marks;

class MarksController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request) {
    $query = Marks::query();

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
    return view('marks.index', ['models' => $data, 'params' => ['title' => $title, 'sub_title' => $subTitle], 'sort' => $sort, 'order' => $order]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view('marks.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateMarksRequest $request) {
    $model = new Marks;
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->save();

    return redirect()->route('marks.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    $model = Marks::findOrFail($id);

    return view('marks.show', ['model' => $model]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id) {
    $model = Marks::findOrFail($id);

    return view('marks.edit', ['model' => $model]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateMarksRequest $request, $id) {
    $request->uniqid = $id;
    $model = Marks::findOrFail($id);
    $model->title = $request->input('title');
    $model->sub_title = $request->input('sub_title');
    $model->save();

    return redirect()->route('marks.index')->with('sucMsg', 'Успешно!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {
    $model = Marks::findOrFail($id);
    $model->delete();

    return redirect()->route('marks.index')->with('sucMsg', 'Успешно!');
  }
}
