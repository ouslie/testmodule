<?php

namespace Modules\Cabytrim\;

use App\Providers\AuthServiceProvider;

class CabytrimAuthProvider extends AuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Modules\Cabytrim\Models\Cabytrim::class => \Modules\Cabytrim\Policies\CabytrimPolicy::class,
    ];
}
