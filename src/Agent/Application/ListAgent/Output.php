<?php

declare(strict_types=1);

namespace App\Agent\Application\ListAgent;

final readonly class Output
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}
}
