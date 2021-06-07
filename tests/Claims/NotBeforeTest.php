<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Kladislav <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kladislav\JWTAuth\Test\Claims;

use Kladislav\JWTAuth\Claims\NotBefore;
use Kladislav\JWTAuth\Exceptions\InvalidClaimException;
use Kladislav\JWTAuth\Test\AbstractTestCase;

class NotBeforeTest extends AbstractTestCase
{
    /** @test */
    public function it_should_throw_an_exception_when_passing_an_invalid_value()
    {
        $this->expectException(InvalidClaimException::class);
        $this->expectExceptionMessage('Invalid value provided for claim [nbf]');

        new NotBefore('foo');
    }
}
