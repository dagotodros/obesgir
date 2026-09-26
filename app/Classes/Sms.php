<?php

declare(strict_types=1);

namespace App\Classes;

use App\Exceptions\SmsException;
use App\Exceptions\TokenException;
use App\Models\Sms as SmsModel;
use Illuminate\Support\Str;

class Sms
{
    public function __construct(
        private readonly SmsModel                  $sms,
    ){}

    public function recive(array $data) : void
    {
        $this->sms->number_a = $data['number_a'];
        $this->sms->number_b = $data['number_b'];
        $this->sms->sum = preg_replace("/[^0-9]/", "", $data['message']);
        $res = $this->sms->save();

        if (!$res) {
            throw new SmsException('Error save SMS');
        }
    }
}
