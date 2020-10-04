<?php

declare(strict_types=1);

namespace App\UserInterface\Web\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DummyController extends AbstractController
{
    /**
     * @Route(path="/dummy", name="dummy_index")
     */
    public function index(Request $request): JsonResponse
    {
        return $this->json(['data' => 'This is valsid json response']);
    }
}
