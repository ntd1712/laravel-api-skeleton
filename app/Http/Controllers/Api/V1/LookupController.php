<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use Chaos\Modules\Lookup\LookupService;

/**
 * Class LookupController.
 */
class LookupController extends Controller
{
    /**
     * {@inheritDoc}
     *
     * GET /api/v1/lookup
     *
     * @param LookupService $lookupService The service to use.
     */
    public function __construct(LookupService $lookupService)
    {
        parent::__construct(
            $this->service = $lookupService
        );
    }
}
