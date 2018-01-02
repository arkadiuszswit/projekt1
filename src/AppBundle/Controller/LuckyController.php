<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number/{max}")
     */
    public function numberAction($max, LoggerInterface $logger)
    {
        if($max<=0){
            throw $this->createNotFoundException("Page not found.");
        }
        $logger->info('We are logging!');
        $number = mt_rand(0, 100);
        return $this->render('lucky/number.html.twig', array(
            'number' => $number
        ));
    }
}