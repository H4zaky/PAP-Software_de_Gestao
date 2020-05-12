<?php

namespace App\Controller;

use App\Entity\Funcionarios;
use App\Entity\User;
use App\Form\CreateUserFormType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FuncionariosController extends EasyAdminController
{

    /**
     * @Route(path="/admin/users/add", name="add_users")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function addUserAction(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new Funcionarios();
        $form = $this->createForm(CreateUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $permissions = ['ROLE_USER'];
            if ($form->get('isAdmin')->getData() == true) {
               $permissions[] = 'ROLE_ADMIN';
            }
            $user->setRoles($permissions);
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('easyadmin', array(
                'action' => 'list',
                'entity' => 'Funcionarios'
            ));
        }

        return $this->render('forms/createUser.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}