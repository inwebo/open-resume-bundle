<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasKeyWordsTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeModel\SkillInterface;

#[ORM\MappedSuperclass]
class Skill implements SkillInterface
{
    use HasNameTrait;
    use HasKeyWordsTrait;
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 64)]
    protected string $level;
    #[ORM\ManyToOne(inversedBy: 'skills')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getLevel(): string
    {
        return $this->level;
    }

    public function setLevel(string $level): Skill
    {
        $this->level = $level;

        return $this;
    }
}
