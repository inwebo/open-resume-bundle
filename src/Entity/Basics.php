<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Inwebo\OpenResumeBundle\Model\HasIdTrait;
use Inwebo\OpenResumeBundle\Model\HasNameTrait;
use Inwebo\OpenResumeBundle\Model\HasSummaryTrait;
use Inwebo\OpenResumeBundle\Model\HasUrlTrait;
use Inwebo\OpenResumeModel\AwardInterface;
use Inwebo\OpenResumeModel\BasicsInterface;
use Inwebo\OpenResumeModel\CertificateInterface;
use Inwebo\OpenResumeModel\EducationInterface;
use Inwebo\OpenResumeModel\InterestInterface;
use Inwebo\OpenResumeModel\LanguageInterface;
use Inwebo\OpenResumeModel\LocationInterface;
use Inwebo\OpenResumeModel\ProfileInterface;
use Inwebo\OpenResumeModel\ProjectInterface;
use Inwebo\OpenResumeModel\PublicationInterface;
use Inwebo\OpenResumeModel\ReferenceInterface;
use Inwebo\OpenResumeModel\SkillInterface;
use Inwebo\OpenResumeModel\VolunteerInterface;
use Inwebo\OpenResumeModel\WorkInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\MappedSuperclass]
class Basics implements BasicsInterface
{
    use HasNameTrait;
    use HasUrlTrait;
    use HasSummaryTrait;
    use HasIdTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $label;

    #[ORM\Column()]
    private string $image;

    #[ORM\Column()]
    #[Assert\Email]
    private string $email;

    #[ORM\Column()]
    private string $phone;

    #[ORM\OneToOne(targetEntity: Location::class, cascade: ['persist', 'remove'])]
    private LocationInterface $location;

    /**
     * @var Collection<int, ProfileInterface>
     */
    #[ORM\OneToMany(targetEntity: Profile::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $profiles;

    /**
     * @var Collection<int, WorkInterface>
     */
    #[ORM\OneToMany(targetEntity: Work::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $work;

    /**
     * @var Collection<int, VolunteerInterface>
     */
    #[ORM\OneToMany(targetEntity: Volunteer::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $volunteer;

    /**
     * @var Collection<int, EducationInterface>
     */
    #[ORM\OneToMany(targetEntity: Education::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $education;

    /**
     * @var Collection<int, AwardInterface>
     */
    #[ORM\OneToMany(targetEntity: Award::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    protected Collection $awards;

    /**
     * @var Collection<int, CertificateInterface>
     */
    #[ORM\OneToMany(targetEntity: Certificate::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $certificates;

    /**
     * @var Collection<int, PublicationInterface>
     */
    #[ORM\OneToMany(targetEntity: Publication::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $publications;

    /**
     * @var Collection<int, SkillInterface>
     */
    #[ORM\OneToMany(targetEntity: Skill::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $skills;

    /**
     * @var Collection<int, LanguageInterface>
     */
    #[ORM\OneToMany(targetEntity: Language::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $languages;

    /**
     * @var Collection<int, InterestInterface>
     */
    #[ORM\OneToMany(targetEntity: Interest::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $interests;

    /**
     * @var Collection<int, ReferenceInterface>
     */
    #[ORM\OneToMany(targetEntity: Reference::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $references;

    /**
     * @var Collection<int, ProjectInterface>
     */
    #[ORM\OneToMany(targetEntity: Project::class, mappedBy: 'basic', cascade: ['persist', 'remove'])]
    private Collection $projects;

    public function __construct()
    {
        $this->profiles = new ArrayCollection();
        $this->work = new ArrayCollection();
        $this->volunteer = new ArrayCollection();
        $this->education = new ArrayCollection();
        $this->awards = new ArrayCollection();
        $this->certificates = new ArrayCollection();
        $this->publications = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getLocation(): LocationInterface
    {
        return $this->location;
    }

    public function setLocation(LocationInterface $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, ProfileInterface>
     */
    public function getProfiles(): Collection
    {
        return $this->profiles;
    }

    /**
     * @param Collection<int, ProfileInterface> $profiles
     *
     * @return $this
     */
    public function setProfiles(Collection $profiles): static
    {
        $this->profiles = $profiles;

        return $this;
    }

    /**
     * @return Collection<int, WorkInterface>
     */
    public function getWork(): Collection
    {
        return $this->work;
    }

    /**
     * @param Collection<int, WorkInterface> $work
     *
     * @return $this
     */
    public function setWork(Collection $work): static
    {
        $this->work = $work;

        return $this;
    }

    /**
     * @return Collection<int, VolunteerInterface>
     */
    public function getVolunteer(): Collection
    {
        return $this->volunteer;
    }

    /**
     * @param Collection<int, VolunteerInterface> $volunteer
     *
     * @return $this
     */
    public function setVolunteer(Collection $volunteer): static
    {
        $this->volunteer = $volunteer;

        return $this;
    }

    /**
     * @return Collection<int, EducationInterface>
     */
    public function getEducation(): Collection
    {
        return $this->education;
    }

    /**
     * @param Collection<int, EducationInterface> $education
     *
     * @return $this
     */
    public function setEducation(Collection $education): static
    {
        $this->education = $education;

        return $this;
    }

    /**
     * @return Collection<int, AwardInterface>
     */
    public function getAwards(): Collection
    {
        return $this->awards;
    }

    /**
     * @param Collection<int, AwardInterface> $awards
     *
     * @return $this
     */
    public function setAwards(Collection $awards): static
    {
        $this->awards = $awards;

        return $this;
    }

    /**
     * @return Collection<int, CertificateInterface>
     */
    public function getCertificates(): Collection
    {
        return $this->certificates;
    }

    /**
     * @param Collection<int, CertificateInterface> $certificates
     *
     * @return $this
     */
    public function setCertificates(Collection $certificates): static
    {
        $this->certificates = $certificates;

        return $this;
    }

    /**
     * @return Collection<int, PublicationInterface>
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    /**
     * @param Collection<int, PublicationInterface> $publications
     *
     * @return $this
     */
    public function setPublications(Collection $publications): static
    {
        $this->publications = $publications;

        return $this;
    }

    /**
     * @return Collection<int, SkillInterface>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    /**
     * @param Collection<int, SkillInterface> $skills
     *
     * @return $this
     */
    public function setSkills(Collection $skills): static
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * @return Collection<int, LanguageInterface>
     */
    public function getLanguages(): Collection
    {
        return $this->languages;
    }

    /**
     * @param Collection<int, LanguageInterface> $languages
     *
     * @return $this
     */
    public function setLanguages(Collection $languages): static
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * @return Collection<int, InterestInterface>
     */
    public function getInterests(): Collection
    {
        return $this->interests;
    }

    /**
     * @param Collection<int, InterestInterface> $interests
     *
     * @return $this
     */
    public function setInterests(Collection $interests): static
    {
        $this->interests = $interests;

        return $this;
    }

    /**
     * @return Collection<int, ReferenceInterface>
     */
    public function getReferences(): Collection
    {
        return $this->references;
    }

    /**
     * @param Collection<int, ReferenceInterface> $references
     *
     * @return $this
     */
    public function setReferences(Collection $references): static
    {
        $this->references = $references;

        return $this;
    }

    /**
     * @return Collection<int, ProjectInterface>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    /**
     * @param Collection<int, ProjectInterface> $projects
     *
     * @return $this
     */
    public function setProjects(Collection $projects): static
    {
        $this->projects = $projects;

        return $this;
    }
}
