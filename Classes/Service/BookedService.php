<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-booked
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBooked\Service;

use JsonException;
use Slub\SlubProfileBooked\Sanitization\BookedArgumentSanitization;

class BookedService
{
    protected AuthenticationService $authenticationService;
    protected BookedArgumentSanitization $bookedArgumentSanitization;
    protected ReservationService $reservationService;
    protected UserService $userService;

    /**
     * @param AuthenticationService $authenticationService
     * @param BookedArgumentSanitization $bookedArgumentSanitization
     * @param ReservationService $reservationService
     * @param UserService $userService
     */
    public function __construct(
        AuthenticationService $authenticationService,
        BookedArgumentSanitization $bookedArgumentSanitization,
        ReservationService $reservationService,
        UserService $userService
    ) {
        $this->authenticationService = $authenticationService;
        $this->bookedArgumentSanitization = $bookedArgumentSanitization;
        $this->reservationService = $reservationService;
        $this->userService = $userService;
    }

    /**
     * @param array $arguments
     * @return array
     * @throws JsonException
     */
    public function getBooked(array $arguments): array
    {
        $sanitizedArguments = $this->bookedArgumentSanitization->sanitizeArguments($arguments);
        $requestOptions = $this->authenticationService->getHeaders();

        // There is no direct way to get the user nor his reservations.
        // Collect all reservations and users and pick those who are relevant.
        $reservations = $this->reservationService->getData($requestOptions);
        $users = $this->userService->getData($requestOptions);
        $currentUser = $this->userService->findByUserName($users, (string)$sanitizedArguments['user']);

        return $this->reservationService->findByUserId($reservations, (string)$currentUser['id']);
    }
}
