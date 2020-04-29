<?php

namespace Longtt\User\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Longtt\Core\Helper;

class Controller extends \App\Http\Controllers\Controller
{

    public function __construct(Application $app)
    {
        static $dependencies;

        // Get parameters
        if ($dependencies === null) {
            $reflector = new \ReflectionClass(__CLASS__);
            $constructor = $reflector->getConstructor();
            $dependencies = $constructor->getParameters();
        }
        foreach ($dependencies as $dependency) {
            // Process only omitted optional parameters
            if (${$dependency->name} === null) {
                // Assign variable
                ${$dependency->name} = $app->make($dependency->getClass()->name);
            }
        }
    }


}
