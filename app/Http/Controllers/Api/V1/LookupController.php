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
     * Constructor.
     *
     * GET /api/v1/lookup
     *
     * @param LookupService $lookupService The service to use.
     */
    public function __construct(LookupService $lookupService)
    {
        $this(
            $this->service = $lookupService
        );
    }
}
