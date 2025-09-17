<?php

declare(strict_types=1);

namespace App\Agent\Presentation;

/**
 * @template T of object
 */
interface ViewInterface
{
    /**
     * @return T
     */
    public function view(): object;
}
