<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class balanza1Request extends FormRequest
{
    public function messages()
    {
        return [
            'edofinan_foto1.required' => 'Archivo digital del edo. financiero y balanza de comprobación es obligatorio.'
        ];
    }
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
            //'iap_desc.'    => 'required|min:1|max:100',
            'edofinan_foto1' => 'mimes:pdf'
            //'iap_foto2'    => 'required|image'
            //'accion'       => 'required|regex:/(^([a-zA-z%()=.\s\d]+)?$)/i',
            //'medios'       => 'required|regex:/(^([a-zA-z\s\d]+)?$)/i'
            //'rubro_desc'   => 'min:1|max:80|required|regex:/(^([a-zA-zñÑ%()=.\s\d]+)?$)/iñÑ'
        ];
    }
}
