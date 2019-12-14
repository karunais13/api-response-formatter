<?php
namespace Karu\ApiResponse\Facades;

use Illuminate\Support\Facades\Facade;

class ApiResponseFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Karu\ApiResponse\Helpers\ApiResponseHelper';
    }
}
