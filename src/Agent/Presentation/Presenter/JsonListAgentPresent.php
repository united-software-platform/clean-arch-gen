<?php

declare(strict_types=1);

namespace App\Agent\Presentation\Presenter;

use App\Agent\Application\ListAgent\Output;
use App\Agent\Application\ListAgent\OutputPortInterface;
use App\Agent\Presentation\ViewInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @implements ViewInterface<JsonResponse>
 */
final class JsonListAgentPresent implements OutputPortInterface, ViewInterface
{
    /** @var Output[] */
    private array $models;

    public function present(Output ...$models): void
    {
        $this->models = $models;
    }

    public function view(): object
    {
        return new JsonResponse($this->models);
    }
}
