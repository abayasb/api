<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required|min:8|max:100'
        ];

        $message = [
            'username.required' => 'Llene el campo de correo',
            'password.required' => 'Ingrese su contraseña',
            'password.min' => 'La contraseña debe de tener mínimo 8 caracteres',
            'password.max' => 'La contraseña tiene muchos caracteres'
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('message', 'Se ha producido un error')
                ->with('alert', 'danger');
        } else {
            /** CONDICION IF PARA COMPROBRAR EL CORREO Y LA CONTRASEÑA
             * SE UTILIZO LA PALABRA RESERVADA AUTH => LA CUAL ES LA 
             * ENCARGADA DE REALIZAR LA AUTENTIFIACION, LLAMA A LA FUNCION
             * ATTEMPT QUE RESIVE UN ARREGLE EN LA CUAL SE ENVIA
             * (['NOMBRE CAMPO DE DATABASE']=>CAMPO DEL FORMUTARIO CON REQUEST->INPUT('CAMPO'),
             *      'NOMBRE CAMPO DE DATABASE']=>CAMPO DEL FORMUTARIO CON REQUEST->INPUT('CAMPO')])
             */
            if (Auth::attempt([
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ], true)) {
                $request->session()->regenerate(); //GENERAR UNA SECCION PARA EL USUARIO
                return redirect('/');
            } else {
                return back()
                    ->with('message', 'Se ha prodocido un error, verifique que las credenciales sean las correctas')
                    ->with('alert', 'danger');
            }
        }
    }

}
