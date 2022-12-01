<?php

namespace App\Application\Schema\TipoTituloBundle\Controller;

use App\Application\Schema\TipoTituloBundle\Entity\TipoTitulo;
use App\Application\Schema\TipoTituloBundle\Form\TipoTituloType;

use App\Application\Project\ContentBundle\Controller\Base\BaseWebController;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;


#[Route('/web/tipoTitulo', name: 'web_tipoTitulo_', methods: ['GET'])]
#[ACL\Web(enable: true, title: 'TipoTitulo', description: 'Permissões do modulo TipoTitulo')]
class TipoTituloWebController extends BaseWebController
{
    public function getBaseRouter(): string
    {
        return 'web_tipoTitulo_';
    }

    public function getRepository(): string
    {
        return TipoTitulo::class;
    }

    public function getBaseTemplate(): string
    {
        return "@ApplicationSchemaTipoTitulo/tipoTitulo/";
    }

    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Listar', description: 'Lista TipoTitulo')]
    public function listAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'listAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Listar TipoTitulo',
        ]);
    }

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Criar', description: 'Cria TipoTitulo')]
    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $this->validateAccess(actionName: 'createAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Criar TipoTitulo',
        ]);
    }

    #[Route('/{id}/show', name: 'show', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Visualizar', description: 'Visualiza TipoTitulo')]
    public function showAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'showAction');


        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Visualizar TipoTitulo',
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    #[ACL\Web(enable: true, title: 'Editar', description: 'Edita TipoTitulo')]
    public function editAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'editAction');

        return $this->render($this->getBaseTemplate() . 'list.html.twig', [
            'title' => 'Editar TipoTitulo',
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['GET'])]
    #[ACL\Web(enable: true, title: 'Deletar', description: 'Deleta TipoTitulo')]
    public function deleteAction(ManagerRegistry $doctrine, Request $request, int $id): Response
    {
        $this->validateAccess(actionName: 'deleteAction');

    }

}