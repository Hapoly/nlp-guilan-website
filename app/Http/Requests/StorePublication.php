<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublication extends FormRequest
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
      "title"         => "string|max:128|required",
      "year"          => "numeric|required",
      "status"        => "numeric|required|in:1,2",
      "target"        => "string|required",
      "type"          => "numeric|required|in:1,2",
    ];
  }

  public function messages(){
    return [
      'required'  => 'A :attribute is required',
      'max'       => ':attribute length must be less than :value',
      'in'        => ':attribute is no valid',
      'image'      => ":attribute is image"
    ];
  }
}
