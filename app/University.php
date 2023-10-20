<?php

namespace UniversityCollection;

class University
{
    private string $universityName;
    private string $universityCountry;
    private string $universityUrl;

    public function __construct(string $universityName, string $universityCountry, string $universityUrl)
    {
        $this->universityName = $universityName;
        $this->universityCountry = $universityCountry;
        $this->universityUrl = $universityUrl;
    }

    public function getName(): string
    {
        return $this->universityName;
    }

    public function getCountry(): string
    {
        return $this->universityCountry;
    }

    public function getDomain(): string
    {
        return $this->universityUrl;
    }

}