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

class UserService
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
     * @param array $users
     * @param string $userName
     * @return array
     */
    public function findByUserName(array $users, string $userName): array
    {
        foreach ($users as $user) {
            if ($user['userName'] === $userName) {
                return $user;
            }
        }

        return [];
    }

    /**
     * @param array $options
     * @return array
     */
    public function getData(array $options): array
    {
        $uri = $this->uriGenerator->buildUsersUri();

        return $this->request->process($uri, 'GET', $options)['users'] ?? [];
    }
}
