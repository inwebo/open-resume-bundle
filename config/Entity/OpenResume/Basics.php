<?php

declare(strict_types=1);

namespace App\Entity\OpenResume;

use App\Repository\BasicsRepository;
use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Entity\Basics as BaseBasics;

#[ORM\Entity()]
#[ORM\Table(name: 'open_resume_basics')]
#[ORM\AssociationOverrides([
    new ORM\AssociationOverride(
        name: 'profiles',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'profile_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'work',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'work_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'volunteer',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'volunteer_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'education',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'education_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'awards',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'award_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'certificates',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'certificate_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'skills',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'skill_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'languages',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'language_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'interests',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'interest_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'references',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'reference_id', referencedColumnName: 'id')]
    ),
    new ORM\AssociationOverride(
        name: 'projects',
        inverseJoinColumns: [new ORM\JoinColumn(name: 'project_id', referencedColumnName: 'id')]
    ),
])]
class Basics extends BaseBasics
{

}
