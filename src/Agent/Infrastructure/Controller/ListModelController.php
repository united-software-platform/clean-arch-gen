<?php

declare(strict_types=1);

namespace App\Agent\Infrastructure\Controller;

use App\Agent\Application\ListAgent\Input;
use App\Agent\Application\ListAgent\InputPortInterface;
use App\Agent\Presentation\ViewInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final readonly class ListModelController
{
    public function __construct(
        private InputPortInterface $inputPort,
        /** @var ViewInterface<JsonResponse> */
        private ViewInterface $outputPort,
    ) {}

    public function __invoke(): JsonResponse
    {
        $this->inputPort->execute(new Input());

        return $this->outputPort->view();
    }
}
