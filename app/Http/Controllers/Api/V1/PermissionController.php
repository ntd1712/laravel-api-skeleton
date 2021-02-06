<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use Chaos\Modules\Account\PermissionService;

/**
 * Class PermissionController.
 */
class PermissionController extends Controller
{
    /**
     * {@inheritDoc}
     *
     * GET /api/v1/permission
     *
     * @param PermissionService $permissionService The service to use.
     */
    public function __construct(PermissionService $permissionService)
    {
        parent::__construct(
            $this->service = $permissionService
        );
    }
}
