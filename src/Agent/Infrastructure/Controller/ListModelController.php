<?php

declare(strict_types=1);

namespace App\Agent\Infrastructure\Controller;

use App\Agent\Application\ListAgent\Input;
use App\Agent\Application\ListAgent\InputPortInterface;

final readonly class ListModelController
{
    public function __construct(
        private InputPortInterface $inputPort,
    ) {}

    public function __invoke(): void
    {
        $this->inputPort->execute(new Input());
    }
}
