<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;

use Inwebo\OpenResumeBundle\Entity\Interest as BaseInterest;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_interest')]
class Interest extends BaseInterest
{
}
