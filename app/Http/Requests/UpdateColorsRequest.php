<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColorsRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title' => 'required|unique:colors, "title", ' . $this->route('color') . ', "id"|max:255',
      'color' => 'required|unique:colors, "color", ' . $this->route('color') . ', "id"|max:255',
    ];
  }
}
