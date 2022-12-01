<?php

namespace App\Application\Schema\TipoTrabalhoBundle\Controller;

use App\Application\Schema\TipoTrabalhoBundle\Entity\TipoTrabalho;
use App\Application\Schema\TipoTrabalhoBundle\Form\TipoTrabalhoType;

use App\Application\Project\ContentBundle\Controller\Base\BaseWebController;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;


#[Route('/web/tipoTrabalho', name: 'web_tipoTrabalho_', methods: ['GET'])]
#[ACL\Web(enable: true, title: 'TipoTrabalho', description: 'Permissões do modulo TipoTrabalho')]
class TipoTrabalhoWebController extends BaseWebController
{
    public function getBaseRouter(): string
    {
        return 'web_tipoTrabalho_';
    }

    public function getRepository(): string
    {
        return TipoTrabalho::class;
    }

    public function getBaseTemplate(): string
    {
        return "@ApplicationSchemaTipoTrabalho/tipoTrabalho/";
    }

    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Listar', description: 'Lista TipoTrabalho')]
    public function listAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'listAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Listar TipoTrabalho',
        ]);
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Criar', description: 'Cria TipoTrabalho')]
    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'createAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Criar TipoTrabalho',
        ]);
    }

    #[Route('/{id}/show', name: 'show', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Visualizar', description: 'Visualiza TipoTrabalho')]
    public function showAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'showAction');


        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Visualizar TipoTrabalho',
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Editar', description: 'Edita TipoTrabalho')]
    public function editAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'editAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Editar TipoTrabalho',
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Deletar', description: 'Deleta TipoTrabalho')]
    public function deleteAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'deleteAction');

    }

}