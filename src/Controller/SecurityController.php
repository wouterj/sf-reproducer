<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class SecurityController
{
    #[Route("/doctrine/profile")] #[Route("/memory/profile")]
    public function profile(UserInterface $user)
    {
        return new Response($user->getUserIdentifier());
    }
}
