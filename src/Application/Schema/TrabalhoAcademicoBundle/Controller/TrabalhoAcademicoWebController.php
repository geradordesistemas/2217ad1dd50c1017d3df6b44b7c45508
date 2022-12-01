<?php

namespace App\Application\Schema\TrabalhoAcademicoBundle\Controller;

use App\Application\Schema\TrabalhoAcademicoBundle\Entity\TrabalhoAcademico;
use App\Application\Schema\TrabalhoAcademicoBundle\Form\TrabalhoAcademicoType;

use App\Application\Project\ContentBundle\Controller\Base\BaseWebController;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;


#[Route('/web/trabalhoAcademico', name: 'web_trabalhoAcademico_', methods: ['GET'])]
#[ACL\Web(enable: true, title: 'TrabalhoAcademico', description: 'Permissões do modulo TrabalhoAcademico')]
class TrabalhoAcademicoWebController extends BaseWebController
{
    public function getBaseRouter(): string
    {
        return 'web_trabalhoAcademico_';
    }

    public function getRepository(): string
    {
        return TrabalhoAcademico::class;
    }

    public function getBaseTemplate(): string
    {
        return "@ApplicationSchemaTrabalhoAcademico/trabalhoAcademico/";
    }

    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Listar', description: 'Lista TrabalhoAcademico')]
    public function listAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'listAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Listar TrabalhoAcademico',
        ]);
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Criar', description: 'Cria TrabalhoAcademico')]
    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'createAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Criar TrabalhoAcademico',
        ]);
    }

    #[Route('/{id}/show', name: 'show', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Visualizar', description: 'Visualiza TrabalhoAcademico')]
    public function showAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'showAction');


        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Visualizar TrabalhoAcademico',
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Editar', description: 'Edita TrabalhoAcademico')]
    public function editAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'editAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Editar TrabalhoAcademico',
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Deletar', description: 'Deleta TrabalhoAcademico')]
    public function deleteAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'deleteAction');

    }

}