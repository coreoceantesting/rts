<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'rts-service-status',
        'check-app-user',
        'payment/sbi/success',
        'payment/sbi/failed',
        'payment/sbi/verify',
    ];
}
