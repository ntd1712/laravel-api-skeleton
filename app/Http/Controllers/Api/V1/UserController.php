<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use Chaos\Modules\Account\UserService;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * Constructor.
     *
     * GET /api/v1/user
     *
     * @param UserService $userService The service to use.
     */
    public function __construct(UserService $userService)
    {
        $this(
            $this->service = $userService
        );
    }
}
