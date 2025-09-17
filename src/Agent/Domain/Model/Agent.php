<?php

declare(strict_types=1);

namespace App\Agent\Domain\Model;

final readonly class Agent
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}
}
