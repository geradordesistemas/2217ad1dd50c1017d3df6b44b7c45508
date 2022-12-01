<?php

namespace App\Application\Schema\CorpoAcademicoBundle\Controller;

use App\Application\Schema\CorpoAcademicoBundle\Entity\CorpoAcademico;
use App\Application\Schema\CorpoAcademicoBundle\Form\CorpoAcademicoType;

use App\Application\Project\ContentBundle\Controller\Base\BaseWebController;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;


#[Route('/web/corpoAcademico', name: 'web_corpoAcademico_', methods: ['GET'])]
#[ACL\Web(enable: true, title: 'CorpoAcademico', description: 'Permissões do modulo CorpoAcademico')]
class CorpoAcademicoWebController extends BaseWebController
{
    public function getBaseRouter(): string
    {
        return 'web_corpoAcademico_';
    }

    public function getRepository(): string
    {
        return CorpoAcademico::class;
    }

    public function getBaseTemplate(): string
    {
        return "@ApplicationSchemaCorpoAcademico/corpoAcademico/";
    }

    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Listar', description: 'Lista CorpoAcademico')]
    public function listAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'listAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Listar CorpoAcademico',
        ]);
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Criar', description: 'Cria CorpoAcademico')]
    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'createAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Criar CorpoAcademico',
        ]);
    }

    #[Route('/{id}/show', name: 'show', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Visualizar', description: 'Visualiza CorpoAcademico')]
    public function showAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'showAction');


        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Visualizar CorpoAcademico',
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Editar', description: 'Edita CorpoAcademico')]
    public function editAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'editAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Editar CorpoAcademico',
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Deletar', description: 'Deleta CorpoAcademico')]
    public function deleteAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'deleteAction');

    }

}