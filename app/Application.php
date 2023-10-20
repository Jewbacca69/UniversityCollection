<?php

namespace UniversityCollection;

class Application
{
    private universityAPI $universityAPI;

    public function __construct()
    {
        $this->universityAPI = new UniversityAPI();
    }

    public function run()
    {
        while (true) {
            $input = (string)readline("Enter the country or type 'q' to exit: ");

            if ($input === "q") {
                echo "Exiting...";
                break;
            }

            $universityCollection = $this->universityAPI->getData($input);

            if (empty($input)) {
                echo "Please enter a country." . PHP_EOL;
                continue;
            }

            if (empty($universityCollection->getUniversities())) {
                echo "Nothing found. Try again." . PHP_EOL;
                continue;
            }

            $this->displayUniversities($universityCollection);
        }
    }

    public function displayUniversities(UniversityCollection $universityCollection)
    {
        $universities = $universityCollection->getUniversities();

        echo "===========================" . PHP_EOL;
        foreach ($universities as $university) {
            echo "University Name: {$university->getName()}" . PHP_EOL;
            echo "Country: {$university->getCountry()}" . PHP_EOL;
            echo "URL: {$university->getDomain()}" . PHP_EOL;
            echo "===========================" . PHP_EOL;
        }
    }
}