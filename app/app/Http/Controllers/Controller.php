<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="User API",
 *      description="User API",
 * )
 *
 * @OA\Server(
 *  url=L5_SWAGGER_CONST_HOST,
 *  description="Api server"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ApiResponseTrait;
}
