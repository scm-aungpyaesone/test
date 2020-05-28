<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAPIRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Auth Interface
     */
    private $authInterface;

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        $this->authInterface = $authServiceInterface;
    }

    /**
     * Login user and create token
     * @param string email
     * @param string password
     * @param boolean remember_me
     * @return string access_token
     * @return string token_type
     * @return string expires_at
     */
    public function login(LoginAPIRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $content = $this->authInterface->login($request, $validated);
        return response()->json(
            $content["body"],
            $content["status"]
        );
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return string message
     */
    public function logout(Request $request)
    {
        $content = $this->authInterface->logout($request);
        return response()->json(
            $content["body"],
            $content["status"]
        );
    }

    /**
     * Get the authenticated User
     *
     * @return json user object
     */
    public function user()
    {
        return response()->json(Auth::guard("api")->user());
    }
}
