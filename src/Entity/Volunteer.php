<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasDateIntervalTrait;
use Inwebo\OpenResumeBundle\Model\HasHighlightsTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasSummaryTrait;
use Inwebo\OpenResumeBundle\Model\HasUrlTrait;
use Inwebo\OpenResumeModel\VolunteerInterface;

#[ORM\MappedSuperclass]
class Volunteer implements VolunteerInterface
{
    use HasUrlTrait;
    use HasDateIntervalTrait;
    use HasSummaryTrait;
    use HasHighlightsTrait;
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    protected string $organization;
    #[ORM\Column(length: 255)]
    protected string $position;

    #[ORM\ManyToOne(inversedBy: 'volunteer')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getOrganization(): string
    {
        return $this->organization;
    }

    public function setOrganization(string $organization): Volunteer
    {
        $this->organization = $organization;

        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): Volunteer
    {
        $this->position = $position;

        return $this;
    }
}
