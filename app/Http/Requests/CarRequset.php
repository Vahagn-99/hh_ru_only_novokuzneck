<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequset extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if (app()->environment('local'))
      return  true;
    return auth()->check();
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'id' => ['nullable', 'numeric'],
      'startDate' => ['required', 'date'],
      'endDate' => ['required', 'date'],
      'search' => ['nullable', 'string'],
    ];
  }

  public function employerId()
  {
    return $this['id'] ?? (auth()->check() ? auth()->id : null);
  }
}
