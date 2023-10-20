<?php

namespace UniversityCollection;

class UniversityCollection
{
    private array $universities = [];

    public function addUniversity(University $universities): void
    {
        $this->universities [] = $universities;
    }

    public function getUniversities(): array
    {
        return $this->universities;
    }
}