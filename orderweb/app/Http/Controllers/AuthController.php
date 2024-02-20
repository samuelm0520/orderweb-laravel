<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class AuthController extends Controller
{   

    private $rules = [
        'name' => 'required|string|max:255',
        'email' => 'requied|email|max:255|unique:users',
        'password' =>'required|string|min:8|max:255',
        'password_confirmation' => 'required|same:password'
    ];

    private $traductionAttributes = array(
        'name' => 'nombre',
        'password'=> 'contraseña'
    );


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check())
        {
            return redirect()->route('index');
        }

        return view('auth.Login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //FALTA                                                                                 /falta los validadores
        $request['password']=bcrypt($request['password']);
        $user = User::create($request->all());
        session()->flash('message','Usuario registrado exitosamente');
        return redirect()->route('auth.index');
    }

    /**
     * login de usuarios
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            redirect()->intended('index');
        }
        return back()->withErrors([
            'email' => 'Credenciales incorrectas, intente de nuevo'
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('auth.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
