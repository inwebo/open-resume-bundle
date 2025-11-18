<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeBundle\Model\HasSummaryTrait;
use Inwebo\OpenResumeBundle\Model\HasUrlTrait;
use Inwebo\OpenResumeModel\PublicationInterface;

#[ORM\MappedSuperclass]
class Publication implements PublicationInterface
{
    use HasNameTrait;
    use HasUrlTrait;
    use HasSummaryTrait;
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    protected string $publisher;

    #[ORM\Column]
    protected \DateTimeInterface $releaseDate;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function setPublisher(string $publisher): Publication
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getReleaseDate(): \DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): Publication
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }
}
