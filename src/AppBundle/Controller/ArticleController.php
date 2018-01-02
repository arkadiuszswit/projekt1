<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ArticleController extends Controller
{
    /**
     * @Route("/articles", name="article_list")
     */
    public function indexAction(Request $request, SessionInterface $session){
        $user = $session->get('user');
    	$url = $this->generateUrl('blog_show', array('name' => 'my-blog-post'));
    	$absUrl = $this->generateUrl('blog_show', array('name' => 'my-blog-post'), UrlGeneratorInterface::ABSOLUTE_URL);
        $page = $request->query->get('page', 1);
    	return $this->render('article/index.html.twig', array(
    		'url' => $url,
    		'absUrl' => $absUrl,
            'page' => $page,
            'user' => $user,
    		'name' => "Ostatni post"
    	));
    }
    /**
     * @Route(
     *     "/articles/{_locale}/{year}/{slug}.{_format}",
     *     defaults={"_format": "html"},
     *     requirements={
     *         "_locale": "pl|en|fr",
     *         "_format": "html|rss",
     *         "year": "\d+"
     *     }
     * )
     */
    public function showAction($_locale, $year, $slug)
    {
    	return $this->render('article/show.html.twig');
    }
    /**
     * @Route("/articles/save", name="article_save")
     */
    public function saveAction()
    {
        //np. if ($form->isSubmitted() && $form->isValid())
        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );
        return $this->redirectToRoute('homepage'); 
    }

} 