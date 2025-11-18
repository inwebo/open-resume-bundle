<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasUrlTrait;
use Inwebo\OpenResumeModel\ProfileInterface;

#[ORM\MappedSuperclass]
class Profile implements ProfileInterface
{
    use HasUrlTrait;
    use HasBasicTrait;
    use HasIdTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    protected string $network;

    #[ORM\Column(length: 255)]
    protected string $userName;

    #[ORM\ManyToOne(inversedBy: 'profiles')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getNetwork(): string
    {
        return $this->network;
    }

    public function setNetwork(string $network): static
    {
        $this->network = $network;

        return $this;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): static
    {
        $this->userName = $userName;

        return $this;
    }
}
