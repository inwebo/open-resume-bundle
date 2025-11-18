<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasKeyWordsTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeModel\InterestInterface;

#[ORM\MappedSuperclass]
class Interest implements InterestInterface
{
    use HasNameTrait;
    use HasKeyWordsTrait;
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\ManyToOne(inversedBy: 'interests')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */
}
