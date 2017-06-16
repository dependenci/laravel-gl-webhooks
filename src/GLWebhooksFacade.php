<?php

namespace DependenCI\GLWebhooks;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DependenCI\GHWebhooks\GHWebhooksClass
 */
class GLWebhooksFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'glwebhooks';
    }
}
