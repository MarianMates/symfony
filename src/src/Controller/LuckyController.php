<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number")
     *
     * @throws \Exception
     */
    public function number(): Response
    {
        $numberList = [];

        while (count($numberList) < 6) {
            $newLuckyNumber = random_int(1,49);

            if (!in_array($newLuckyNumber, $numberList)) {
                $numberList[] = random_int(1,49);
            }
        }

        return $this->render('lucky/number.html.twig', [
            'numberList' => implode(',', $numberList)
        ]);
    }
}