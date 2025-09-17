<?php

declare(strict_types=1);

namespace App\Agent\Application\ListAgent;

interface InputPortInterface
{
    public function execute(Input $input): void;
}
