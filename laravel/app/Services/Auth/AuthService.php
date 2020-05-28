<?php

namespace App\Services\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{
    /**
     * auth Dao
     */
    private $authDao;

    /**
     * Class Constructor
     * @param AuthDaoInterface
     * @return
     */
    public function __construct()
    {
        //
    }

    /**
     * To login with validated user.
     * @param object $request Request
     * @return array $validated Validated fields
     * @return array body including data or errors
     * @return int response status
     */
    public function login($request, $validated)
    {
        $credentials = array_slice($validated, 0, 2);
        if (!Auth::attempt($credentials)) {
            $message = "Email or password is incorrect.";
            return [
                "body" => ["errors" => ["message" => $message]],
                "status" => JsonResponse::HTTP_UNAUTHORIZED,
            ];
        }

        $user = $request->user();
        $tokenResult = $user->createToken("Personal Access Token");
        $token = $tokenResult->token;
        if (
            array_key_exists("remember_me", $validated)
            && $validated["remember_me"]
        ) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        return [
            "body" => ["data" => [
                "access_token" => $tokenResult->accessToken,
                "token_type" => "Bearer",
                "expires_at" => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]],
            "status" => JsonResponse::HTTP_OK,
        ];
    }

    /**
     * To logout user (revoke the token)
     * @param object $request
     * @return array body including data
     * @return int response status
     */
    public function logout($request)
    {
        Auth::guard('api')->user()->token()->revoke();
        $message = "Successfully logged out";
        return [
            "body" => ["data" => ["message" => $message]],
            "status" => JsonResponse::HTTP_OK,
        ];
    }
}
