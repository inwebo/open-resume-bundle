<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait HasDateIntervalTrait
{
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    protected \DateTimeInterface $startDate;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    protected \DateTimeInterface $endDate;

    public function getStartDate(): \DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): \DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }
}
