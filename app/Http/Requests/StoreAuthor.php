<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthor extends FormRequest
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
      "name"                => "string|max:64|required",
      "graduation_status"   => "numeric|required",
      "position"            => "numeric|required",
      "biography"           => "string|max:1000|required",
      "status"              => "numeric|required|in:1,2",
      "shown"              => "numeric|required|in:1,2",
      "image"               => "mimes:jpeg,jpg,png",
    ];
  }

  public function messages(){
    return [
      'required'  => 'A :attribute is required',
      'max'       => ':attribute length must be less than :max',
      'in'        => ':attribute is no valid',
      'image'      => ":attribute is image"
    ];
  }
}
