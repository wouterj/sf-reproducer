<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CsrfFormController extends AbstractController
{
    #[Route('/state', name: 'state')]
    #[Route('/stateless', name: 'stateless')]
    public function __invoke(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('test', TextType::class)
            ->add('Save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            return new Response('Form submitted! Test value: '.$form->getData()['test']);
        }

        return $this->render('form.html.twig', ['form' => $form->createView()]);
    }
}
