<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Entity\Award as BaseAward;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_award')]
class Award extends BaseAward
{

}
