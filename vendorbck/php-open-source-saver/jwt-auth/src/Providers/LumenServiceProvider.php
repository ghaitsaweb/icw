<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPOpenSourceSaver\JWTAuth\Providers;

use PHPOpenSourceSaver\JWTAuth\Http\Parser\LumenRouteParams;

class LumenServiceProvider extends AbstractServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->app->configure('jwt');

        $path = realpath(__DIR__.'/../../config/config.php');
        $this->mergeConfigFrom($path, 'jwt');

        $this->app->routeMiddleware($this->middlewareAliases);

        $this->extendAuthGuard();

        $this->app['tymon.jwt.parser']->addParser(new LumenRouteParams);
    }
}
