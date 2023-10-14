<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class CasSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): ?RedirectResponse
    {
        $filteredQuery = http_build_query(array_filter($request->query->all(), fn ($key) => $key !== 'ticket', ARRAY_FILTER_USE_KEY));

        return new RedirectResponse($request->getUriForPath($request->getPathInfo()).($filteredQuery ? '?'.$filteredQuery : ''));
    }
}
