<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Ads;

class UserAdsCreateRequest extends FormRequest
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
    $currencies = collect(Ads::$currencies)->pluck('value')->all();
    return [
      'title' => 'required|max:255',
      'description' => 'max:255',
      // 'user_id' => 'required|integer',
      'region_id' => 'required|integer',
      'city_id' => 'required|integer',
      'model_id' => 'required|integer',
      'mark_id' => 'required|integer',
      'color_id' => 'required|integer',
      'year' => 'max:255',
      // 'status' => 'required|integer',
      // 'expire_date' => 'required|date_format:Y-m-d',
      'amount' => 'required',
      'currency' => Rule::in($currencies),
      'is_credit' => 'integer',
      // 'lat_lon' => '',
      'image' => 'required|file|max:8192',
    ];
  }
}
