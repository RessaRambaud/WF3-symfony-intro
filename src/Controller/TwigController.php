<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 *Class TwigController
 * @package App\Controller
 *
 * Préfixe de route défini pour la class:
 * toutes les routes définies dansce controller sont préfixé par /twig
 * @Route("/twig")
 */
class TwigController extends AbstractController
{
    /**
     * Avec le prefixe de route sur la classe ,l'url de cette route
     * est /twig/
     * @Route("/")
     */
    public function index()
    {
        return $this->render('twig/index.html.twig',
            [
                // blackslash is for to come back to the namespace : root folder
                'demain'=> new \DateTime('+1day')
            ]
        );
    }
}
