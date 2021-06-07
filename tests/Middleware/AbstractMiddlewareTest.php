<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Kladislav <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kladislav\JWTAuth\Test\Middleware;

use Illuminate\Http\Request;
use Mockery;
use Kladislav\JWTAuth\JWTAuth;
use Kladislav\JWTAuth\Test\AbstractTestCase;

abstract class AbstractMiddlewareTest extends AbstractTestCase
{
    /**
     * @var \Mockery\MockInterface|\Kladislav\JWTAuth\JWTAuth
     */
    protected $auth;

    /**
     * @var \Mockery\MockInterface|\Illuminate\Http\Request
     */
    protected $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->auth = Mockery::mock(JWTAuth::class);
        $this->request = Mockery::mock(Request::class);
    }
}
