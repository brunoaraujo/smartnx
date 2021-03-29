<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Models\Operador;
use App\Repositories\OperadorRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $app;
    protected $auth;

    public function __construct(Guard $auth, Application $app)
    {
        $this->auth = $auth;
        $this->app = $app;
    }

    public function getLogin()
    {
        return view('login.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(['cpf' => 'required', 'senha' => 'required']);

        $credentials = $request->only('cpf', 'senha');

        $auth = new Auth();
        $auth = $auth->where('cpf', '=', $credentials['cpf'])->where('senha', '=', $credentials['senha']);

        if(!$auth->count()) {
            return back()->withErrors(['email' => 'As credenciais fornecidas não correspondem aos nossos registros.']);
        }

        $auth = $auth->first();
        \Auth::login($auth);

        $request->session()->regenerate();
        return redirect()->intended('app/grafico');
    }

    public function getLogout()
    {
        $this->auth->logout();
        return redirect('/login');
    }
}
