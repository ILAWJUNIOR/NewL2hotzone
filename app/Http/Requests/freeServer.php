<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class freeServer extends FormRequest
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
            'server_name'       =>  'required|max:255',
           'servertype_1'       =>  'required|in:1,2,3',
             'serverplatform'    =>  'required|in:L2off,L2j',
            'date'              =>  'required_if:servertype1,1|required_if:servertype1,2',
            'type'              =>  'required|in:normal,gve,stacksub,multiskill',
            'loginIp'           =>  'required|ip',
            'serverIp'          =>  'required|ip',
            'loginPort'         =>  'required|integer|digits:4',
            'serverPort'        =>  'required|integer|digits:4',
            'chronicle'         =>  'required|string',
            'xpRate'            =>  'required|integer|digits_between:1,5',
            'dropRate'          =>  'required|integer|digits_between:1,5',
            'safeRate'          =>  'required|integer|digits_between:1,5',
            'spRate'            =>  'required|integer|digits_between:1,5',
            'adenaRate'         =>  'required|integer|digits_between:1,5',
            'maxRate'           =>  'required|integer|digits_between:1,5',
            'language'          =>  'required',
            'desc'              =>  'required|between:1000,1500',
            'website'           =>  'required|url',
            'tos1'              =>  'required|in:on',
            'tos2'              =>  'required|in:on',
            'g-recaptcha-response' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'server_name.required' => 'A server name needed!',
            'g-recaptcha-response.required' => 'Robot verification failed, please try again.',

        ];
    }
}
