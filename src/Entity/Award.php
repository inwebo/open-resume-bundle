<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasDateTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasSummaryTrait;
use Inwebo\OpenResumeModel\AwardInterface;

#[ORM\MappedSuperclass]
class Award implements AwardInterface
{
    use HasDateTrait;
    use HasSummaryTrait;
    use HasBasicTrait;
    use HasIdTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    protected string $title;
    #[ORM\Column(length: 255)]
    protected string $awarder;

    #[ORM\ManyToOne(targetEntity: Basics::class, inversedBy: 'awards')]
    private ?Basics $basics = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAwarder(): string
    {
        return $this->awarder;
    }
}
