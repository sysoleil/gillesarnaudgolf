<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController

{
    /**
     * @Route("/cours", name="course")
     */

    public function course(CourseRepository $courseRepository)
    {
        // je veux récupérer une instance de la variable 'CourseRepository $courseRepository'
        //J'instancie dans la variable la class pour récupérer les valeurs requises

        // je crée ma route pour ma page de services

        $courses = $courseRepository->findAll();
        // je crée ma recherche puis je lui donne une valeur
        return $this ->render('course/course.html.twig', [
            // je crée la variable Twig 'courses'  que j'irai appeler dans mon fichier Twig course.html.twig
            'courses'=>$courses
        ]);
    }
}