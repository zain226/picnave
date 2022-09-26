<?php

namespace Modules\Photographer\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UploadRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.*' => 'required',
            'category_id.*' => 'required',
            'description.*' => 'required',
            'image' => 'required',
            'image.*' => 'required|mimes:jpeg,jpg,png'
        ];
    }
    public function messages()
    {
        return [
            'image.mimes' => 'Icon Type is Invalid.',
        ];
    }
//    protected function failedValidation(Validator $validator)
//    {
//        throw new HttpResponseException(response()->json(['errors' => $validator->getMessageBag()->toArray(), 'status' => true], 422));
//    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
