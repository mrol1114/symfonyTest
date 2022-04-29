<?php

namespace App\Controller;

use App\Module\Survey\SurveyFileStorage;
use App\Module\Survey\SurveyLoader;
use App\View\SurveyView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SurveyController extends AbstractController
{
    public function saveSurvey(Request $request): Response
    {
        $requestSurvey = new SurveyLoader();
        $survey =  $requestSurvey->makeSurveyFromRequest($request);

        $fileStorage = new SurveyFileStorage();
        $fileStorage->saveSurvey($survey);

        $view = new SurveyView($survey);
        return $this->render($view->getTemplate(), $view->getArgs());
    }

    public function printSurvey(Request $request): Response
    {
        $email = $request->get('email');

        $fileStorage = new SurveyFileStorage();
        $survey = $fileStorage->loadSurvey($email);

        $view = new SurveyView($survey);
        return $this->render($view->getTemplate(), $view->getArgs());
    }
}
