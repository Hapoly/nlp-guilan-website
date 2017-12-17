<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSlide extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
      return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      "title"         => "string|max:32|required",
      "caption"       => "string|max:1000|required",
      "status"        => "numeric|required|in:1,2",
      "target_link"   => "string",
      "image"         => "file|required",
    ];
  }

  public function messages(){
    return [
      'required'  => 'A :attribute is required',
      'max'       => ':attribute length must be less than :input',
      'in'        => ':attribute is no valid',
      'file'      => ":attribute is file"
    ];
  }
}
