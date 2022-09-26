<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        
        $rules =[ 
            'username'=>'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ];
        $message = [
            'username.required' => 'Llene el campo nombre',
            'password.required' => 'Tiene que colocar contraseña',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password_confirmation.required' => 'Confirme la contraseña',
            'password_confirmation.min' => 'La contraseña debe tener almenos 8 caracteres',
            'password_confirmation.same' => 'La contraseña no coiciden',
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return back()->withErrors($validator)
            ->with('message', 'Se ha producido un error ')
            ->with('alert', 'danger');
        }else{
            try {
                $user = new User();
                $user->username = e($request->input('username'));
                $user->password = Hash::make($request->input('password'));
                $user->id_persona = 1;
                $user->id_rol= 1;
                
                if ($user->save()) {
                    return redirect('/login')
                        ->with('message', 'Datos guardados correctamente')
                        ->with('alert', 'success');
                }
            } catch (\Throwable $th) {
                return back()
                ->with('message', 'Error al enviar los datos')
                ->with('alert', 'danger');
            }
        }
    }
}
