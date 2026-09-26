<?php

namespace App\Exceptions;


use Exception;

class SmsException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'error' => $this->getMessage()
        ]);
    }
}
