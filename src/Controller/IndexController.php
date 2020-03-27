<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    //home page of the site
    /**
     * Une page web est une méthode dans une classe de controller
     * avec une annotation de route pour définir son url
     * et le rendu d'un templtae à l'intérieur  pour définir le contenu HTML de la page
     * @Route("/")
     */
    public function index()
    {
        return $this->render('index/index.html.twig');
    }

    /**
     * @Route("/hello")
     */
    public function hello()
    {
        return $this->render('index/hello.html.twig');
    }

    /**
     * Partie variable de l'url entre accolades:
     * La route matche/bonjour/Ressa ou /bonjour /Ferdinand
     * Le $qui en paramètre $quide la methode  contient  la valeur
     * de la partie variable {qui}
     *
     * @Route("/bonjour/{qui}")
     */
    public function bonjour($qui)
    {
        //un dump qui s'affiche dans la barre de debug
        dump($qui);
        return $this->render(
            'index/bonjour.html.twig',
            [
                //passe au template une variable qui s'appelle nom
                //et qui a l avaleur  de $qui
                'nom'=>$qui
            ]
        );
    }

    /**
     * La route matche/salut ou /salut/
     * et /salut/Ressa
     *Si non présent dans la route , $qui dans la methode vaut  "à toi"
     *
     * @Route("/salut/{qui}",defaults={"qui":"à toi"})
     */
    public function salut($qui)
    {
        return $this->render(

            'index/salut.html.twig',
            [
                'qui'=>$qui
            ]
        );
    }

    /**
     * Une route avec 2 parties variables dont une optionelle
     * @Route("/coucou/{prenom}-{nom}",defaults={"nom":" "})
     */
    public function coucou($prenom,$nom)
    {
        dump($prenom,$nom);
        $nomComplet=rtrim($prenom.''.$nom);
        return $this->render(
            'index/coucou.html.twig',
            [
                'qui'=>$nomComplet
            ]
        );
    }

    /**
     * id doit être un nombre (/d+en expression regulière)
     * @Route("/abonne/edition/{id}",requirements={"id":"\d+"})
     */
    public function abonne($id)
    {

        return $this->render(
            'index/abonne.html.twig',
            [
                'id'=>$id
            ]
        );
    }
}
