<?php

namespace App\Src\Auth\Infrastructure\Http;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Src\Auth\Application\AuthService;
use Exception;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function __invoke(LoginRequest $request)
    {
        try{
            $login = $this->authService->login($request->email, $request->password);
            if($login){
                Auth::attempt(['email' => $request->email,'password' => $request->password],$request->remember_me);
                return response()->json(['message' => 'Inicio de sesión exitoso','code'=>'200'],200);
            }
        }
        catch(Exception $exception){
            return response()->json(['message'=>$exception->getMessage(),'code'=>(int)$exception->getCode()],(int)($exception->getCode()?? 500));
        }
    }
}