<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-booked
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBooked\Service;

use Slub\SlubProfileBooked\Http\Request;
use Slub\SlubProfileBooked\Routing\UriGenerator;

class ReservationService
{
    protected Request $request;
    protected UriGenerator $uriGenerator;

    /**
     * @param Request $request
     * @param UriGenerator $uriGenerator
     */
    public function __construct(
        Request $request,
        UriGenerator $uriGenerator
    ) {
        $this->request = $request;
        $this->uriGenerator = $uriGenerator;
    }

    /**
     * @param array $reservations
     * @param string $userId
     * @return array
     */
    public function findByUserId(array $reservations, string $userId): array
    {
        $userReservations = [];

        foreach ($reservations as $reservation) {
            if ($reservation['userId'] === $userId) {
                $userReservations[] = $reservation;
            }
        }

        return $userReservations;
    }

    /**
     * @param array $options
     * @return array
     */
    public function getData(array $options): array
    {
        $uri = $this->uriGenerator->buildReservationsUri();

        return $this->request->process($uri, 'GET', $options)['reservations'] ?? [];
    }
}
