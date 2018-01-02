<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /**
     * Matches /blog exactly
     * Tylko liczby z domyślną 1
     *
     * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
     */
    public function listAction($page = 1)
    {
        return $this->render('blog/index.html.twig', array(
            'page' => $page
        ));
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{name}", name="blog_show")
     */
    public function showAction($name)
    {
        return $this->render('blog/show.html.twig', array(
            'name' => $name
        ));
    }
}