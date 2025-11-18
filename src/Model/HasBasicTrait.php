<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

use Inwebo\OpenResumeBundle\Entity\Basics;

trait HasBasicTrait
{
    public function getBasics(): ?Basics
    {
        return $this->basics; /* @phpstan-ignore property.notFound, return.type */
    }

    public function setBasics(?Basics $basics): static
    {
        $this->basics = $basics; /* @phpstan-ignore property.notFound */

        return $this;
    }
}
