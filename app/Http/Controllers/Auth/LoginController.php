<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use App\Mail\VerificationEmail;

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


    // Google login
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }


    // Google callback
    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->user();
        $usuario = $this->_registerOrLoginUser($user, $driver);

        if ($usuario->telefono == "" || $usuario->direccion == "") {
            Mail::to($usuario->email)->send(new VerificationEmail($usuario));
            return view('auth.DatosExtra', ['providerId' => $usuario->provider_id]); // Pasar el providerId a la vista
        } else {
            return redirect()->route('paginas.index');
        }
    }

    // public function handleProviderCallback($driver)
    // {
    //     $user = Socialite::driver($driver)->user();
    //     $usuario = $this->_registerOrLoginUser($user, $driver);

    //     if ($usuario->telefono == "" || $usuario->direccion == "") {
    //         if ($usuario->is_verified) {
    //             return redirect()->route('paginas.index');
    //         } else {
    //             // Envía el correo de verificación al usuario
    //             Mail::to($usuario->email)->send(new VerificationEmail($usuario));

    //             return view('auth.DatosExtra', ['providerId' => $usuario->provider_id]);
    //         }
    //     } else {
    //         return redirect()->route('paginas.index');
    //     }
    // }

    protected function _registerOrLoginUser($data, $driver)
    {

        $user = User::where('email', '=', $data->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        } else {
            $user->name = $data->name;
            $user->email = $data->email;
            if ($driver == 'facebook')
                $user->avatar = $data->avatar_original . "&access_token={$data->token}";
            elseif ($driver = 'google')
                $user->avatar = $data->avatar;

            $user->save();
        }

        Auth::login($user);
        return $user;
    }


    // public function saveData(Request $request)
    // {
    //     $user = Auth::user();
    //     $data = [
    //         'telefono' => $request->input('telefono'),
    //         'direccion' => $request->input('direccion')
    //     ];
    //     User::where('id', $user->id)->update($data);

    //     return redirect()->route('paginas.index');
    // }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('paginas.index');
    }


    protected function authenticated(Request $request, $user)
    {

        return redirect()->intended('/')->with('user', $user);
    }
}
