<?php

declare(strict_types=1);

namespace App\Agent\Application\ListAgent;

interface OutputPortInterface
{
    public function present(Output ...$models): void;
}
