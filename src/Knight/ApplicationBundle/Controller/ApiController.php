<?php
// File: src/Knight/ApplicationBundle/Controller/ApiController.php

namespace Knight\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    public function niAction(Request $request)
    {
        $postedContent = $request->getContent();
        $postedValues = json_decode($postedContent);

        $answer = array('answer' => 'Ecky-ecky-ecky-ecky-pikang-zoop-boing-goodem-zoo-owli-zhiv');
        $statusCode = Response::HTTP_OK;
        if (!isset($postedValues['offering']) || 'shrubbery' !== $postedValues['offering']) {
            $answer['answer'] = 'Ni';
            $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;
        }

        return new JsonResponse($answer, $statusCode);
    }
}
