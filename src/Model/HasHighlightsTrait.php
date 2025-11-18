<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait HasHighlightsTrait
{
    /**
     * @var array<int, string>
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    protected array $highlights = [];

    /**
     * @return array<int, string>
     */
    public function getHighlights(): array
    {
        return $this->highlights;
    }

    /**
     * @param array<int, string> $highlights
     */
    public function setHighlights(array $highlights): static
    {
        $this->highlights = $highlights;

        return $this;
    }
}
