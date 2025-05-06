<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-booked
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBooked\Routing;

use Slub\SlubProfileBooked\Domain\Model\Dto\ApiConfiguration;

class UriGenerator
{
    protected ApiConfiguration $apiConfiguration;

    /**
     * @param ApiConfiguration $apiConfiguration
     */
    public function __construct(ApiConfiguration $apiConfiguration)
    {
        $this->apiConfiguration = $apiConfiguration;
    }

    /**
     * @return string
     */
    public function buildAuthenticationUri(): string
    {
        /** @extensionScannerIgnoreLine */
        return $this->apiConfiguration->getRequestUri() . 'Authentication/Authenticate';
    }

    /**
     * @return string
     */
    public function buildUsersUri(): string
    {
        /** @extensionScannerIgnoreLine */
        return $this->apiConfiguration->getRequestUri() . 'Users/';
    }

    /**
     * @return string
     */
    public function buildReservationsUri(): string
    {
        /** @extensionScannerIgnoreLine */
        return $this->apiConfiguration->getRequestUri() . 'Reservations/';
    }
}
