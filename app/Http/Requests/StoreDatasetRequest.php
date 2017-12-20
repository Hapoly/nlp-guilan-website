<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataset extends FormRequest
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
      "name"            => "string|max:64|required",
      "university"      => "string|max:64|required",
      "email"           => "string|max:64|required",
      "use_case"        => "string|max:200|required",
      "status"          => "numeric|required|in:1,2,3",
      "dataset_id"      => "numeric|required",
    ];
  }

  public function messages(){
    return [
      'required'  => 'A :attribute is required',
      'max'       => ':attribute length must be less than :input',
      'in'        => ':attribute is no valid',
    ];
  }
}
