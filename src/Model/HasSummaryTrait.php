<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

use Doctrine\ORM\Mapping as ORM;

trait HasSummaryTrait
{
    #[ORM\Column()]
    protected string $summary;

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): static
    {
        $this->summary = $summary;

        return $this;
    }
}
