<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait HasDateTrait
{
    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    protected \DateTimeInterface $date;

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }
}
