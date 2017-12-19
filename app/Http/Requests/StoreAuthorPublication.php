<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorPublication extends FormRequest
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
      // "publication_id"    => "numeric|required",
      "author_id"         => "numeric|required",
    ];
  }

  public function messages(){
    return [
      'required'  => 'A :attribute is required',
      'numeric'   => ':attribute is number',
    ];
  }
}
