<?php

namespace App\Exceptions;


use Exception;

class TokenException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => $this->getMessage()
        ]);
    }
}
