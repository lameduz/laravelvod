<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateFileRequest extends Request {

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
            'form_ouverture' => 'mimes:jpeg,png|max:3000',
            'sepa' => 'mimes:jpeg,png|max:3000',
            'kbis' => 'mimes:jpeg,png|max:3000',
            'rib' => 'mimes:jpeg,png|max:3000'
		];
	}

}
