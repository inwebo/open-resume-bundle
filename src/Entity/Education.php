<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasBasicTrait;
use Inwebo\OpenResumeBundle\Model\HasDateIntervalTrait;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasUrlTrait;
use Inwebo\OpenResumeModel\EducationInterface;

#[ORM\MappedSuperclass]
class Education implements EducationInterface
{
    use HasUrlTrait;
    use HasDateIntervalTrait;
    use HasBasicTrait;
    use HasIdTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    protected string $institution;

    #[ORM\Column(length: 255)]
    protected string $area;

    #[ORM\Column(length: 255)]
    protected string $studyType;

    #[ORM\Column(length: 255)]
    protected string $score;

    /**
     * @var array<int, string>
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    protected array $courses = [];

    #[ORM\ManyToOne(inversedBy: 'education')]
    private ?Basics $basic = null; /* @phpstan-ignore property.onlyWritten */

    public function getInstitution(): string
    {
        return $this->institution;
    }

    public function getArea(): string
    {
        return $this->area;
    }

    public function getStudyType(): string
    {
        return $this->studyType;
    }

    public function getScore(): string
    {
        return $this->score;
    }

    /**
     * @return array<int, string>
     */
    public function getCourses(): array
    {
        return $this->courses;
    }

    public function addCourse(string $course): static
    {
        $this->courses = array_unique(array_merge($this->courses, [$course]));

        return $this;
    }

    /**
     * @param array<int,string> $courses
     *
     * @return $this
     */
    public function setCourses(array $courses): static
    {
        $this->courses = $courses;

        return $this;
    }
}
