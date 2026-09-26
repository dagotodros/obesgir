<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Classes\Auth\Auth;
use App\Classes\Auth\AuthValidator;
use App\Classes\PaginationDTO;
use App\Classes\Sms;
use App\Exceptions\ApiException;
use App\Http\Requests\Auth\LoginAdminRequest;
use App\Http\Requests\Auth\RefreshAdminRequestFields;
use App\Http\ResponseObjects\ApiToken\ApiTokenResponse;
use App\Http\ResponseObjects\Auth\AuthResponse;
use App\Http\ResponseObjects\Auth\ManagerResponse;
use App\Http\ResponseObjects\OkResponseWithMeta;
use App\Models\TempUser;
use App\Repositories\ApiToken\ApiTokenRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Classes\Enums\Clients;
use App\Http\Requests\Auth\SendSmsRequest;
use App\Http\ResponseObjects\Auth\SendSmsResponse;
use App\Http\ResponseObjects\OkResponse;
use Illuminate\Support\Facades\Cookie;
use Runexis\JwtAuth\Auth\CredentialsDTO;
use Runexis\JwtAuth\Auth\RefreshTokenDTO;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @group Auth
 *
 * Auth user
 */
class SmsController extends Controller
{
    public function __construct(
        private readonly Sms  $sms,
    ) {}

    public function recive(Request $request): JsonResponse
    {
        $data = $request->all();

        $this->sms->recive($data);

        return  response()->json(['success' => true]);
    }
}
