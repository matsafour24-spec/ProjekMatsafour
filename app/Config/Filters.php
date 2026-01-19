<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    /**
     * Aliases for Filters
     *
     * @var array<string, class-string>
     */
    public array $aliases = [
        'csrf'       => \CodeIgniter\Filters\CSRF::class,
        'toolbar'    => \CodeIgniter\Filters\DebugToolbar::class,

        // Auth Filters (Role-based)
        'authAdmin'    => \App\Filters\AuthAdmin::class,
        'authOperator' => \App\Filters\AuthOperator::class,
        'authGuru'     => \App\Filters\AuthGuru::class,
    ];

    /**
     * List of filter aliases that are always applied
     *
     * @var array<string, array<string>>
     */
    public array $globals = [
        'before' => [
            // 'csrf',
        ],
        'after'  => [
            'toolbar',
        ],
    ];

    /**
     * List of filter aliases that work on a specific HTTP method
     *
     * @var array<string, array<string>>
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any URI pattern
     *
     * @var array<string, array<string>>
     */
    public array $filters = [];
}
