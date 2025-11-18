<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;

use Inwebo\OpenResumeBundle\Entity\Certificate as BaseCertificate;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_certificate')]
class Certificate extends BaseCertificate
{

}
