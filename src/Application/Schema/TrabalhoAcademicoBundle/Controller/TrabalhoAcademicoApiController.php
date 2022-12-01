<?php

namespace App\Application\Schema\TrabalhoAcademicoBundle\Controller;

use App\Application\Schema\TrabalhoAcademicoBundle\Repository\TrabalhoAcademicoRepository;
use App\Application\Schema\TrabalhoAcademicoBundle\Entity\TrabalhoAcademico;

use App\Application\Project\ContentBundle\Controller\Base\BaseApiController;
use App\Application\Project\ContentBundle\Service\FilterDoctrine;
use App\Application\Project\ContentBundle\Attributes\Acl as ACL;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\QueryException;
use OpenApi\Attributes as OA;

#[Route('/api/trabalhoAcademico', name: 'api_trabalhoAcademico_')]
#[OA\Tag(name: 'TrabalhoAcademico')]
#[ACL\Api(enable: true, title: 'TrabalhoAcademico', description: 'Permissões do modulo TrabalhoAcademico')]
class TrabalhoAcademicoApiController extends BaseApiController
{

    public function getClass(): string
    {
        return TrabalhoAcademico::class;
    }

    public function getRepository(): ObjectRepository
    {
        return $this->doctrine->getManager()->getRepository($this->getClass());
    }

    /** ****************************************************************************************** */
    /**
     * Recupera a coleção de recursos — TrabalhoAcademico.
     * Recupera a coleção de recursos — TrabalhoAcademico.
     * @throws QueryException
     */
    #[OA\Parameter( name: 'pagina', description: 'O número da página da coleção', in: 'query', required: false, allowEmptyValue: true, example: 1)]
    #[OA\Parameter( name: 'paginaTamanho', description: 'O tamanho da página da coleção', in: 'query', required: false, example: 10)]
    #[OA\Response(
        response: 200,
        description: 'Retorna Coleção de recursos TrabalhoAcademico',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'titulo', type: 'string'),
                new OA\Property(property: 'subtitulo', type: 'string'),
                new OA\Property(property: 'resumo', type: 'string'),
                new OA\Property(property: 'dataDocumento', type: 'string'),
                new OA\Property(property: 'dataPublicacao', type: 'string'),
                new OA\Property(property: 'status', type: 'boolean'),
                new OA\Property(property: 'curso', type: 'integer' ),
                new OA\Property(property: 'autor', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'palavraChave', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'orientador', type: 'integer' ),
                new OA\Property(property: 'bancaExaminadora', type: 'array', items: new OA\Items(type: 'integer') ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'list', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Listar', description: 'Listar TrabalhoAcademico')]
    public function listAction(Request $request): Response
    {
        $this->validateAccess(actionName: "listAction");

        $filter = new FilterDoctrine(
            repository:  $this->getRepository(),
            request: $request,
            attributesFilters: [
                'titulo', 'subtitulo', 'resumo', 'dataDocumento', 'dataPublicacao', 'status', 'curso', 'tipo', 'orientador', 
            ]
        );

        $response = $this->objectTransformer->ObjectToJson( $filter->getResult()->data, [
            'titulo', 'subtitulo', 'resumo', 'dataDocumento', 'dataPublicacao', 'status', 'curso', 'autor', 'palavraChave', 'tipo', 'orientador', 'bancaExaminadora', 
        ]);

        return $this->json([
            '@id' => $request->getPathInfo(),
            'result' => $response,
            'paginator' => $filter->getResult()->paginator,
        ]);
    }

    /** ****************************************************************************************** */
    /**
     * Cria o Recurso — TrabalhoAcademico.
     * Cria o Recurso — TrabalhoAcademico.
     */
    #[OA\Response(
        response: 201,
        description: 'Retorna novo recurso TrabalhoAcademico',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'titulo', type: 'string'),
                new OA\Property(property: 'subtitulo', type: 'string'),
                new OA\Property(property: 'resumo', type: 'string'),
                new OA\Property(property: 'dataDocumento', type: 'string'),
                new OA\Property(property: 'dataPublicacao', type: 'string'),
                new OA\Property(property: 'status', type: 'boolean'),
                new OA\Property(property: 'curso', type: 'integer' ),
                new OA\Property(property: 'autor', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'palavraChave', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'orientador', type: 'integer' ),
                new OA\Property(property: 'bancaExaminadora', type: 'array', items: new OA\Items(type: 'integer') ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'titulo', type: 'string'),
                new OA\Property(property: 'subtitulo', type: 'string'),
                new OA\Property(property: 'resumo', type: 'string'),
                new OA\Property(property: 'dataDocumento', type: 'string'),
                new OA\Property(property: 'dataPublicacao', type: 'string'),
                new OA\Property(property: 'status', type: 'boolean'),
                new OA\Property(property: 'curso', type: 'integer' ),
                new OA\Property(property: 'autor', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'palavraChave', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'orientador', type: 'integer' ),
                new OA\Property(property: 'bancaExaminadora', type: 'array', items: new OA\Items(type: 'integer') ),
            ],
            type: 'object'
        )
    )]
    #[Route('', name: 'create', methods: ['POST'])]
    #[ACL\Api(enable: true, title: 'Criar', description: 'Criar TrabalhoAcademico')]
    public function createAction(Request $request): Response
    {
        $this->validateAccess("createAction");

        if(!$request->getContent())
            return $this->json(['status' => false, 'message' => 'Dados inválidos!'], 400);

        /** Tranforma Corpo da requisação em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject( $this->getClass(), $request , [
            'titulo', 'subtitulo', 'resumo', 'dataDocumento', 'dataPublicacao', 'status', 'curso', 'autor', 'palavraChave', 'tipo', 'orientador', 'bancaExaminadora', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'titulo', 'subtitulo', 'resumo', 'dataDocumento', 'dataPublicacao', 'status', 'curso', 'autor', 'palavraChave', 'tipo', 'orientador', 'bancaExaminadora', 
        ]);

        return $this->json($response, 201);
    }

    /** ****************************************************************************************** */
    /**
     * Recupera o recurso — TrabalhoAcademico.
     * Recupera o recurso — TrabalhoAcademico.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso TrabalhoAcademico',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'titulo', type: 'string'),
                new OA\Property(property: 'subtitulo', type: 'string'),
                new OA\Property(property: 'resumo', type: 'string'),
                new OA\Property(property: 'dataDocumento', type: 'string'),
                new OA\Property(property: 'dataPublicacao', type: 'string'),
                new OA\Property(property: 'status', type: 'boolean'),
                new OA\Property(property: 'curso', type: 'integer' ),
                new OA\Property(property: 'autor', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'palavraChave', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'orientador', type: 'integer' ),
                new OA\Property(property: 'bancaExaminadora', type: 'array', items: new OA\Items(type: 'integer') ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    #[ACL\Api(enable: true, title: 'Visualizar', description: 'Visualizar TrabalhoAcademico')]
    public function showAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("showAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'TrabalhoAcademico não encontrado!'], 404);

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'titulo', 'subtitulo', 'resumo', 'dataDocumento', 'dataPublicacao', 'status', 'curso', 'autor', 'palavraChave', 'tipo', 'orientador', 'bancaExaminadora', 
        ]);

        return $this->json([
            '@id' => $request->getPathInfo(),
            'result' => $response,
        ]);
    }

    /** ****************************************************************************************** */
    /**
     * Substitui o recurso — TrabalhoAcademico.
     * Substitui o recurso — TrabalhoAcademico.
     */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(
        response: 200,
        description: 'Retorna recurso TrabalhoAcademico',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'titulo', type: 'string'),
                new OA\Property(property: 'subtitulo', type: 'string'),
                new OA\Property(property: 'resumo', type: 'string'),
                new OA\Property(property: 'dataDocumento', type: 'string'),
                new OA\Property(property: 'dataPublicacao', type: 'string'),
                new OA\Property(property: 'status', type: 'boolean'),
                new OA\Property(property: 'curso', type: 'integer' ),
                new OA\Property(property: 'autor', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'palavraChave', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'orientador', type: 'integer' ),
                new OA\Property(property: 'bancaExaminadora', type: 'array', items: new OA\Items(type: 'integer') ),
            ],
            type: 'object'
        )
    )]
    #[OA\Response(response: 400, description: 'Dados inválidos!')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[OA\RequestBody(
        description: 'Json Payload',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'titulo', type: 'string'),
                new OA\Property(property: 'subtitulo', type: 'string'),
                new OA\Property(property: 'resumo', type: 'string'),
                new OA\Property(property: 'dataDocumento', type: 'string'),
                new OA\Property(property: 'dataPublicacao', type: 'string'),
                new OA\Property(property: 'status', type: 'boolean'),
                new OA\Property(property: 'curso', type: 'integer' ),
                new OA\Property(property: 'autor', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'palavraChave', type: 'array', items: new OA\Items(type: 'integer') ),
                new OA\Property(property: 'tipo', type: 'integer' ),
                new OA\Property(property: 'orientador', type: 'integer' ),
                new OA\Property(property: 'bancaExaminadora', type: 'array', items: new OA\Items(type: 'integer') ),
            ],
            type: 'object'
        )
    )]
    #[Route('/{id}', name: 'edit', methods: ['PUT','PATCH'])]
    #[ACL\Api(enable: true, title: 'Editar', description: 'Editar TrabalhoAcademico')]
    public function editAction(Request $request, mixed $id): Response
    {
        $this->validateAccess("editAction");

        $object = $this->getRepository()->find($id);
        if(!$object)
            return $this->json(['status' => false, 'message' => 'TrabalhoAcademico não encontrado!'], 404);

        /** Transforma corpo da requisição em um objeto da classe. */
        $object = $this->objectTransformer->JsonToObject($object, $request, [
            'titulo', 'subtitulo', 'resumo', 'dataDocumento', 'dataPublicacao', 'status', 'curso', 'autor', 'palavraChave', 'tipo', 'orientador', 'bancaExaminadora', 
        ]);

        /** Valida Restrições do objeto */
        $errors = $this->validateConstraintErros($object);
        if($errors)
            return $this->json($errors);

        /** Persiste o objeto */
        $em = $this->doctrine->getManager();
        $em->persist($object);
        $em->flush();

        $response = $this->objectTransformer->ObjectToJson( $object, [
            'titulo', 'subtitulo', 'resumo', 'dataDocumento', 'dataPublicacao', 'status', 'curso', 'autor', 'palavraChave', 'tipo', 'orientador', 'bancaExaminadora', 
        ]);

        return $this->json($response);
    }

    /** ****************************************************************************************** */
    /**
    * Remove o recurso — TrabalhoAcademico.
    * Remove o recurso — TrabalhoAcademico.
    */
    #[OA\Parameter( name: 'id', description: 'Identificador do recurso', in: 'path')]
    #[OA\Response(response: 204, description: 'Recurso excluído')]
    #[OA\Response(response: 404, description: 'Recurso não encontrado')]
    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    #[ACL\Api(enable: true, title: 'Deletar', description: 'Deletar TrabalhoAcademico')]
    public function deleteAction(mixed $id): Response
    {
        $this->validateAccess("deleteAction");

        $object = $this->getRepository()->find($id);
        if (!$object)
            return $this->json(['status' => false, 'message' => 'TrabalhoAcademico não encontrado.'], 404);

        $em = $this->doctrine->getManager();
        $em->remove($object);
        $em->flush();

        return $this->json(['status' => true, 'message' => 'TrabalhoAcademico removido com sucesso.'], 204);
    }

}