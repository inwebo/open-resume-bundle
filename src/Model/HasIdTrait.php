<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

trait HasIdTrait
{
    public function getId(): ?int
    {
        return $this->id; /* @phpstan-ignore property.notFound */
    }
}
