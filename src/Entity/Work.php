<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasDateIntervalTrait;
use Inwebo\OpenResumeBundle\Model\HasDescriptionTrait;
use Inwebo\OpenResumeBundle\Model\HasHighlightsTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeBundle\Model\HasSummaryTrait;
use Inwebo\OpenResumeModel\WorkInterface;

#[ORM\MappedSuperclass]
class Work implements WorkInterface
{
    use HasNameTrait;
    use HasDescriptionTrait;
    use HasDateIntervalTrait;
    use HasSummaryTrait;
    use HasHighlightsTrait;
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 128)]
    protected string $location;
    #[ORM\Column(length: 128)]
    protected string $position;
    #[ORM\ManyToOne(inversedBy: 'work')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }
}
