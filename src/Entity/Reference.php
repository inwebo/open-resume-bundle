<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeModel\ReferenceInterface;

#[ORM\MappedSuperclass]
class Reference implements ReferenceInterface
{
    use HasNameTrait;
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    protected string $reference;

    #[ORM\ManyToOne(inversedBy: 'references')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): Reference
    {
        $this->reference = $reference;

        return $this;
    }
}
