<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class CompanyRequest extends FormRequest
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
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'cover_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'c_name' => 'string|max:255',
            'phone' => 'regex:/^0[0-9]{9,10}$/',
            'website' => 'url'
        ];
    }

    public function messages()
    {
        return [
            'logo.image' => 'Logo là 1 file ảnh',
            'logo.mimes' => 'Logo phải là định dạng jpeg,png,jpg,gif,svg',
            'logo.max' => 'Logo phải dưới 5000kb',
            'cover_photo.image' => 'Cover là 1 file ảnh',
            'cover_photo.mimes' => 'Cover phải là định dạng jpeg,png,jpg,gif,svg',
            'cover_photo.max' => 'Cover phải dưới 5000kb',
            'c_name.max' => 'Tên công ty không được quá 255 kí tự',
            'phone.regex' => 'Đây không phải số điện thoại',
            'website.url' => 'Đây không phải một url'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(

            response()->json(
                [
                    'error' => $errors,
                    'status_code' => 422,
                ],
                // JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }
}
