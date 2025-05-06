<?php

declare(strict_types=1);

/*
 * This file is part of the package slub/slub-profile-booked
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Slub\SlubProfileBooked\Controller;

use JsonException;
use Psr\Http\Message\ResponseInterface;
use Slub\SlubProfileBooked\Mvc\View\JsonView;
use Slub\SlubProfileBooked\Service\BookedService;
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class BookedController extends ActionController
{
    protected $view;
    protected $defaultViewObjectName = JsonView::class;
    protected BookedService $bookedService;

    /**
     * @param BookedService $bookedService
     */
    public function __construct(BookedService $bookedService)
    {
        $this->bookedService = $bookedService;
    }

    /**
     * @return ResponseInterface
     * @throws AspectNotFoundException
     * @throws JsonException
     */
    public function listAction(): ResponseInterface
    {
        $booked['booked'] = $this->bookedService->getBooked($this->request->getArguments());

        $this->view->setVariablesToRender(['bookedList']);
        $this->view->assign('bookedList', $booked);

        return $this->jsonResponse();
    }
}
