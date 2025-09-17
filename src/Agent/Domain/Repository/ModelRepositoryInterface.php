<?php

declare(strict_types=1);

namespace App\Agent\Domain\Repository;

use App\Agent\Domain\Model\Agent;

interface ModelRepositoryInterface
{
    /** @return Agent[] */
    public function findAll(): array;
}
