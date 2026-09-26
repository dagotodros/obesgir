<?php
return [
    'token_expire' => env('TOKEN_EXPIRE', 3600),
    'refresh_token_expire' => env('REFRESH_TOKEN_EXPIRE',  31536000),
    'api_token' => env('API_TOKEN', ''),
];
