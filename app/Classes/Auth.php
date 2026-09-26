<?php

declare(strict_types=1);

namespace App\Classes;

use App\Exceptions\TokenException;
use App\Models\Token as TokenModel;
use App\Models\User;
use Illuminate\Support\Str;

class Auth
{
    public function __construct(
        private readonly User                  $user,
        private readonly TokenModel                  $token
    ){}

    public function login(array $data) : array
    {
        $result['error'] = '';

        $password = md5($data['password']);
        $user = $this->user->where('email', $data['email'])->where('password', $password)->first();

        if (!$user) {
            $result['error'] = 'Email или пароль неверны';
            return $result;
        }

        $result['token'] = $this->saveAuth($user->id);

        return $result;
    }

    protected function saveAuth(int $userID) : array
    {
        $token = $this->generateAuthTokens();
        $token['user_id'] = $userID;

        $result = $this->token->create($token);

        if(!$result){
            throw new TokenException('Token not add.', 400);
        }

        return $result->toArray();
    }

    protected function generateAuthTokens() : array
    {
        $result = $this->generateToken(config('token.token_expire'));
        $token = $this->generateToken(config('token.refresh_token_expire'));

        $result['refresh_token'] = $token['token'];
        $result['refresh_token_expire'] = $token['token_expire'];

        return $result;
    }

    protected function generateToken(int $expire) : array
    {
        $result['token'] = Str::random(32);
        $result['token_expire'] = time() + $expire;

        return $result;
    }


}
