<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-booked
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBooked\Domain\Model\Dto;

use Exception;
use Slub\SlubProfileBooked\Utility\ConstantsUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ApiConfiguration
{
    protected string $authenticationUsername = '';
    protected string $authenticationPassword = '';
    protected string $requestUri = '';

    public function __construct()
    {
        $configuration = $this->getConfiguration(ConstantsUtility::EXTENSION_KEY);

        empty($configuration['authenticationUsername']) ?: $this->setAuthenticationUsername($configuration['authenticationUsername']);
        empty($configuration['authenticationPassword']) ?: $this->setAuthenticationPassword($configuration['authenticationPassword']);
        empty($configuration['requestUri']) ?: $this->setRequestUri($configuration['requestUri']);
    }

    /**
     * @return string
     */
    public function getAuthenticationUsername(): string
    {
        return $this->authenticationUsername;
    }

    /**
     * @param string $authenticationUsername
     */
    public function setAuthenticationUsername(string $authenticationUsername = ''): void
    {
        $this->authenticationUsername = $authenticationUsername;
    }

    /**
     * @return string
     */
    public function getAuthenticationPassword(): string
    {
        return $this->authenticationPassword;
    }

    /**
     * @param string $authenticationPassword
     */
    public function setAuthenticationPassword(string $authenticationPassword = ''): void
    {
        $this->authenticationPassword = $authenticationPassword;
    }

    /**
     * @return string
     */
    public function getRequestUri(): string
    {
        return $this->requestUri;
    }

    /**
     * @param string $requestUri
     */
    public function setRequestUri(string $requestUri = ''): void
    {
        $this->requestUri = $requestUri;
    }

    /**
     * @param string $extensionKey
     * @return array
     */
    protected function getConfiguration(string $extensionKey = ''): array
    {
        /** @var ExtensionConfiguration $extensionConfiguration */
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

        try {
            return $extensionConfiguration->get($extensionKey);
        } catch (Exception $e) {
            return [];
        }
    }
}
