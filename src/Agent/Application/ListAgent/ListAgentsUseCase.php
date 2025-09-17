<?php

declare(strict_types=1);

namespace App\Agent\Application\ListAgent;

use App\Agent\Domain\Model\Agent;
use App\Agent\Domain\Repository\ModelRepositoryInterface;

final readonly class ListAgentsUseCase implements InputPortInterface
{
    public function __construct(
        private ModelRepositoryInterface $modelRepository,
        private OutputPortInterface $outputPort
    ) {}

    public function execute(Input $input): void
    {
        $data = $this->modelRepository->findAll();

        $this->outputPort->present(...array_map(
            static fn (Agent $agent): Output => new Output(
                id: $agent->id,
                name: $agent->name,
            ),
            $data
        ));
    }
}
