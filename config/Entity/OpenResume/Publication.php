<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;

use Inwebo\OpenResumeBundle\Entity\Publication as BasePublication;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_publication')]
class Publication extends BasePublication
{

}
