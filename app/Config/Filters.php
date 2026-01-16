<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Filters\AuthAdmin;
use App\Filters\AuthOperator;
use App\Filters\AuthGuru;

class Filters extends BaseConfig
{
    /**
     * Aliases for filters.
     */
    public array $aliases = [
        'authadmin'    => AuthAdmin::class,
        'authoperator' => AuthOperator::class,
        'authguru'     => AuthGuru::class,
    ];

    /**
     * Global filters.
     */
    public array $globals = [
        'before' => [],
        'after'  => [],
    ];

    /**
     * Method-based filters.
     */
    public array $methods = [];

    /**
     * URI pattern-based filters.
     */
    public array $filters = [];
}
