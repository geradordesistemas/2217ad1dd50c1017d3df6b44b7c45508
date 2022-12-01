<?php
namespace App\Application\Project\ContentBundle\Admin;

use App\Application\Project\ContentBundle\Admin\Base\BaseAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollectionInterface;
use Sonata\AdminBundle\Show\ShowMapper;


final class ContentAdmin extends BaseAdmin
{
    protected function generateBaseRoutePattern(bool $isChildAdmin = false): string
    {
        return '';
    }

    protected function configureRoutes(RouteCollectionInterface $collection): void
    {
        parent::configureRoutes($collection); // TODO: Change the autogenerated stub

        $collection->add('login');
        $collection->add('logout');
        $collection->add('accessDenied');
        $collection->add('listAllRoles');
        $collection->add('listAdminGroupRoles');
        $collection->add('listAdminRoles');

        $routesRemove = ['show', 'list', 'create', 'edit', 'delete', 'batch', 'export', 'history'];
        foreach ($routesRemove as $route){
            $collection->remove($route);
        }

    }


    protected function configureFormFields(FormMapper $form): void
    {}

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {}

    protected function configureListFields(ListMapper $list): void
    {}

    protected function configureShowFields(ShowMapper $show): void
    {}
}