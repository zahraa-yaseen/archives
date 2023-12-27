<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }
//بهذه الطريقة، الدالة getCredentials() تسمح لعملية تسجيل الدخول بالتعامل مع اسم المستخدم أو البريد الإلكتروني كمعلومات اعتماد صالحة وتقوم بإعادة هذه المعلومات بناءً على ما تم إدخاله من قبل المستخد
    public function getCredentials()
    {
        
        $username = $this->get('username');
// هان يتاكد من ان المعلومات الى وصلن  هو بريد الكتروني او لا اذا راجع بريد راح يرجعون كلمه السر والبريد
        if ($this->isEmail($username)) {
         
          
            return [
                
                'email' => $username, 'password'=> $this->get('password')

            ];

           
          
        }
 //  هان اذا البريد مواصل راح يرجع فقط 
        return $this->only('username', 'password');
    }
    private function isEmail($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['username' => $param],
            ['username' => 'email']
        )->fails();
    }
}
