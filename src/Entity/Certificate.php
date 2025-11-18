<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasDateTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeBundle\Model\HasUrlTrait;
use Inwebo\OpenResumeModel\CertificateInterface;

#[ORM\MappedSuperclass]
class Certificate implements CertificateInterface
{
    use HasNameTrait;
    use HasUrlTrait;
    use HasDateTrait;
    use HasBasicTrait;
    use HasIdTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    protected string $issuer;

    #[ORM\ManyToOne(inversedBy: 'certificate')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getIssuer(): string
    {
        return $this->issuer;
    }
}
