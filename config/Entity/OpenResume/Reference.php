<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;

use Inwebo\OpenResumeBundle\Entity\Reference as BaseReference;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_reference')]
class Reference extends BaseReference
{

}
