<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeModel\LanguageInterface;

#[ORM\MappedSuperclass]
class Language implements LanguageInterface
{
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 32)]
    protected string $language;

    #[ORM\Column(length: 32)]
    protected string $fluency;

    #[ORM\ManyToOne(inversedBy: 'languages')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getFluency(): string
    {
        return $this->fluency;
    }

    public function setFluency(string $fluency): static
    {
        $this->fluency = $fluency;

        return $this;
    }
}
