<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Kladislav <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kladislav\JWTAuth\Exceptions;

use Exception;
use Kladislav\JWTAuth\Claims\Claim;

class InvalidClaimException extends JWTException
{
    /**
     * Constructor.
     *
     * @param  \Kladislav\JWTAuth\Claims\Claim  $claim
     * @param  int  $code
     * @param  \Exception|null  $previous
     *
     * @return void
     */
    public function __construct(Claim $claim, $code = 0, Exception $previous = null)
    {
        parent::__construct('Invalid value provided for claim ['.$claim->getName().']', $code, $previous);
    }
}
