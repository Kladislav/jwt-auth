<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Kladislav <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kladislav\JWTAuth\Claims;

use Kladislav\JWTAuth\Exceptions\TokenInvalidException;

class NotBefore extends Claim
{
    use DatetimeTrait;

    /**
     * {@inheritdoc}
     */
    protected $name = 'nbf';

    /**
     * {@inheritdoc}
     */
    public function validatePayload()
    {
        if ($this->isFuture($this->getValue())) {
            throw new TokenInvalidException('Not Before (nbf) timestamp cannot be in the future');
        }
    }
}
