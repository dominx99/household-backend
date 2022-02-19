<?php

use Apps\Household\Backend\HouseholdBackendKernel;

require_once dirname(__DIR__).'/../../../vendor/autoload_runtime.php';

return function (array $context) {
    return new HouseholdBackendKernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
