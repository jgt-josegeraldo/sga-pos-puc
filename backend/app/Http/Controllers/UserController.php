<?php

namespace App\Http\Controllers;
use Validator;
use App\Model\User\UserAggregation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userAggregation = new UserAggregation();
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'login' => 'required',
                'password' => 'required'
            ],
            [
                'login.required' => 'Informe seu login.',
                'password.required' => 'Informe sua senha.'
            ]
        );
        $userLogged = $this->userAggregation->login($request->get('login'), $request->get('password'));
        if ($userLogged) {
            App('session')->put('userId', $userLogged->id);
            App('session')->save();
            return response()->json([
                'success' => true,
                'user' => [
                    'name' => $userLogged->name
                ],
                'token' => App('session')->getId(),
                'permissionUser' => App('session')->get('userId') == 1 ? 1 : 0
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Senha ou usuário inválidos.'
        ]);
    }
}
