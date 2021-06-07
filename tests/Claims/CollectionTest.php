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

use Kladislav\JWTAuth\Claims\Collection;
use Kladislav\JWTAuth\Claims\Expiration;
use Kladislav\JWTAuth\Claims\IssuedAt;
use Kladislav\JWTAuth\Claims\Issuer;
use Kladislav\JWTAuth\Claims\JwtId;
use Kladislav\JWTAuth\Claims\NotBefore;
use Kladislav\JWTAuth\Claims\Subject;
use Kladislav\JWTAuth\Test\AbstractTestCase;

class CollectionTest extends AbstractTestCase
{
    private function getCollection()
    {
        $claims = [
            new Subject(1),
            new Issuer('http://example.com'),
            new Expiration($this->testNowTimestamp + 3600),
            new NotBefore($this->testNowTimestamp),
            new IssuedAt($this->testNowTimestamp),
            new JwtId('foo'),
        ];

        return new Collection($claims);
    }

    /** @test */
    public function it_should_sanitize_the_claims_to_associative_array()
    {
        $collection = $this->getCollection();

        $this->assertSame(array_keys($collection->toArray()), ['sub', 'iss', 'exp', 'nbf', 'iat', 'jti']);
    }

    /** @test */
    public function it_should_determine_if_a_collection_contains_all_the_given_claims()
    {
        $collection = $this->getCollection();

        $this->assertFalse($collection->hasAllClaims(['sub', 'iss', 'exp', 'nbf', 'iat', 'jti', 'abc']));
        $this->assertFalse($collection->hasAllClaims(['foo', 'bar']));
        $this->assertFalse($collection->hasAllClaims([]));

        $this->assertTrue($collection->hasAllClaims(['sub', 'iss']));
        $this->assertTrue($collection->hasAllClaims(['sub', 'iss', 'exp', 'nbf', 'iat', 'jti']));
    }

    /** @test */
    public function it_should_get_a_claim_instance_by_name()
    {
        $collection = $this->getCollection();

        $this->assertInstanceOf(Expiration::class, $collection->getByClaimName('exp'));
        $this->assertInstanceOf(Subject::class, $collection->getByClaimName('sub'));
    }
}
