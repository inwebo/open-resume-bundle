<?php

declare(strict_types=1);

namespace Inwebo\OpenResumeBundle\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait HasKeyWordsTrait
{
    /**
     * @var array<int, string>
     */
    #[ORM\Column(type: Types::SIMPLE_ARRAY)]
    protected array $keywords = [];

    public function getKeywords(): iterable
    {
        return $this->keywords;
    }

    public function addKeywords(string $keyword): static
    {
        $this->keywords = array_unique(array_merge($this->keywords, [$keyword]));

        return $this;
    }

    /**
     * @param array<int, string> $keywords
     */
    public function setKeywords(array $keywords): static
    {
        $this->keywords = array_unique(array_merge($this->keywords, $keywords));

        return $this;
    }
}
