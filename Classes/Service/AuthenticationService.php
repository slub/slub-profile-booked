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
use Slub\SlubProfileBooked\Domain\Model\Dto\ApiConfiguration;
use Slub\SlubProfileBooked\Http\Request;
use Slub\SlubProfileBooked\Routing\UriGenerator;

class AuthenticationService
{
    protected ApiConfiguration $apiConfiguration;
    protected Request $request;
    protected UriGenerator $uriGenerator;

    /**
     * @param ApiConfiguration $apiConfiguration
     * @param Request $request
     * @param UriGenerator $uriGenerator
     */
    public function __construct(
        ApiConfiguration $apiConfiguration,
        Request $request,
        UriGenerator $uriGenerator
    ) {
        $this->apiConfiguration = $apiConfiguration;
        $this->request = $request;
        $this->uriGenerator = $uriGenerator;
    }

    /**
     * @return array
     * @throws JsonException
     */
    public function getHeaders(): array
    {
        $authentication = $this->getAuthentication();

        if ($authentication['isAuthenticated'] === true) {
            return [
                'headers' => [
                    'X-Booked-SessionToken' => $authentication['sessionToken'],
                    'X-Booked-UserId' => $authentication['userId']
                ]
            ];
        }

        return [];
    }

    /**
     * @return array
     * @throws JsonException
     */
    protected function getAuthentication(): array
    {
        $uri = $this->uriGenerator->buildAuthenticationUri();
        $options = $this->getOptions();

        return $this->request->process($uri, 'POST', $options) ?? [];
    }

    /**
     * @return array
     * @throws JsonException
     */
    protected function getOptions(): array
    {
        return [
            'body' => json_encode([
                'username' => $this->apiConfiguration->getAuthenticationUsername(),
                'password' => $this->apiConfiguration->getAuthenticationPassword()
            ], JSON_THROW_ON_ERROR)
        ];
    }
}
