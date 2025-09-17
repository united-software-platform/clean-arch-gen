<?php

declare(strict_types=1);

namespace App\Module\Infrastructure;

use App\Agent\Domain\Model\Agent;
use App\Agent\Domain\Repository\ModelRepositoryInterface;

final class AgentRepository implements ModelRepositoryInterface
{
    public function findAll(): array
    {
        return [
            new Agent(
                id: 'id-model-one',name: 'Model One',
            ),
            new Agent(
                id: 'id-model-two',name: 'Model Two',
            ),
            new Agent(
                id: 'id-model-tree',name: 'Model Tree',
            ),
        ];
    }
}
