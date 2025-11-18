<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use Doctrine\ORM\Mapping as ORM;

use Inwebo\OpenResumeBundle\Entity\Language as BaseLanguage;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_language')]
class Language extends BaseLanguage
{

}
