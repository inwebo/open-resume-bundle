<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;

use Inwebo\OpenResumeBundle\Entity\Volunteer as BaseVolunteer;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_volunteer')]
class Volunteer extends BaseVolunteer
{
}
