<?php

namespace App\View;

use App\Module\Survey\Survey;

class SurveyView
{
    private Survey $survey;

    public function __construct(Survey $survey)
    {
        $this->survey = $survey;
    }

    public function getTemplate(): string
    {
        return 'saver.html.twig';
    }

    public function getArgs(): array
    {
        return [
            'email' => $this->survey->getEmail(),
            'first_name' => $this->survey->getFirstName(),
            'last_name' => $this->survey->getLastName(),
            'age' => $this->survey->getAge(),
        ];
    }
}