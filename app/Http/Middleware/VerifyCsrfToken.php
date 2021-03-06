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
        '/3ds-callback',
        '/first-step',
        '/second-step',
        '/third-step',
        '/fourth-step',
        'admin/add-product',
    ];
}