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
use Slub\SlubProfileBooked\Sanitization\BookedArgumentSanitization;
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;

class BookedService
{
    protected BookedArgumentSanitization $bookedArgumentSanitization;
    protected Request $request;
    protected UriGenerator $uriGenerator;

    /**
     * @param BookedArgumentSanitization $bookedArgumentSanitization
     * @param Request $request
     * @param UriGenerator $uriGenerator
     */
    public function __construct(
        BookedArgumentSanitization $bookedArgumentSanitization,
        Request $request,
        UriGenerator $uriGenerator
    ) {
        $this->bookedArgumentSanitization = $bookedArgumentSanitization;
        $this->request = $request;
        $this->uriGenerator = $uriGenerator;
    }

    /**
     * @param array $arguments
     * @return array
     * @throws AspectNotFoundException
     */
    public function getBooked(array $arguments): array
    {
        $sanitizedArguments = $this->bookedArgumentSanitization->sanitizeArguments($arguments);
        $uri = $this->uriGenerator->buildBookedList($sanitizedArguments);

        return $this->request->process($uri) ?? [];
    }
}
