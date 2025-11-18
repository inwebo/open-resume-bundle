<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasDateIntervalTrait;
use Inwebo\OpenResumeBundle\Model\HasDescriptionTrait;
use Inwebo\OpenResumeBundle\Model\HasHighlightsTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasKeyWordsTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeBundle\Model\HasUrlTrait;
use Inwebo\OpenResumeModel\ProjectInterface;

#[ORM\MappedSuperclass]
class Project implements ProjectInterface
{
    use HasNameTrait;
    use HasUrlTrait;
    use HasHighlightsTrait;
    use HasDateIntervalTrait;
    use HasDescriptionTrait;
    use HasBasicTrait;
    use HasKeyWordsTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    /**
     * @var array<int, string>
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    protected array $roles = [];
    #[ORM\Column(length: 256)]
    protected string $entity;
    #[ORM\Column(length: 256)]
    protected string $type;

    #[ORM\ManyToOne(inversedBy: 'projects')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    /**
     * @return array<int, string>
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array<int, string> $roles
     *
     * @return $this
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getEntity(): string
    {
        return $this->entity;
    }

    public function setEntity(string $entity): static
    {
        $this->entity = $entity;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
