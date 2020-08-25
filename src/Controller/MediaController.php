<?php

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends AbstractController

{
    /**
     * @Route("/media", name="media")
     */

    Public function media (MediaRepository $mediaRepository){

        return $this->render('course/courseStage.html.twig');
    }

}