<?php

declare(strict_types=1);

namespace App\UserInterface\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DummyController extends AbstractController
{
    /**
     * @Route(path="/dummy", name="dummy_index")
     */
    public function index(): JsonResponse
    {
        return $this->json(['data' => 'This is valsid json response']);
    }
}
