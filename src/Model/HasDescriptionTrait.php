<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait HasDescriptionTrait
{
    #[ORM\Column(type: Types::STRING, length: 256)]
    protected string $description;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
