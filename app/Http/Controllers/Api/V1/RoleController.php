<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use Chaos\Modules\Account\RoleService;

/**
 * Class RoleController.
 */
class RoleController extends Controller
{
    /**
     * Constructor.
     *
     * GET /api/v1/role
     *
     * @param RoleService $roleService The service to use.
     */
    public function __construct(RoleService $roleService)
    {
        $this(
            $this->service = $roleService
        );
    }
}
