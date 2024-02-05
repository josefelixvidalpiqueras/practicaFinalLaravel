<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /* Importamos para poder cerrar sesión  */

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Método necesario para controlar la lógica del botón de Login.
     * De momento, sólo validaremos el email como cuenta de correo electrónico y 
     * el email y la contraseña (password) serán obligatorios (required).
     */
    public function login(Request $request){
        /* Recogida de los datos introducidos en el formulario de Login. */
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /* Si el email y la contraseña existen para un usuario en la base de datos se puede loguear. */
        if (auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))) {
            /* Si la cuenta del usuario está activa, sigue el proceso */
            
                /* Si el usuario es Administrador */
                if (auth()->user()->is_admin==1) {
                    return redirect()->route('admin.home');
                } else {
                    if (auth()->user()->activo==1) {
                        /* Si el usuario NO es Admin (es usuario Normal) */
                        return redirect()->route('home');
                    } else {
                        /* Le cerramos la sesión al usuario con cuenta inactiva */
                        Auth::logout();
                        $request->session()->invalidate();                    
                        $request->session()->regenerateToken();
                        $_SESSION['activo'] = 0;
                        return view('auth.login');
                    }                      
                }
      
        } else {
            return redirect()->route('login')->with('error', 'Email o contraseña no válidos.');
        }
    }
}