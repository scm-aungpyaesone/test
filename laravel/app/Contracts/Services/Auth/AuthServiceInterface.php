<?php

namespace App\Contracts\Services\Auth;

interface AuthServiceInterface
{
    /**
     * To login with validated user.
     * @param object $request Request
     * @param array $validated Validated fields
     * @return array body including data or errors
     * @return int response status
     */
    public function login($request, $validated);

    /**
     * To logout user (revoke the token)
     * @param object $request
     * @return array body including data
     * @return int response status
     */
    public function logout($request);
}
