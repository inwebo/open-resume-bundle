<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;

use Inwebo\OpenResumeBundle\Entity\Work as BaseWork;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_work')]
class Work extends BaseWork
{
}
