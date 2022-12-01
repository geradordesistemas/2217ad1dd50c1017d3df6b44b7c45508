<?php

namespace App\Application\Schema\TrabalhoAcademicoBundle\Repository;

use App\Application\Schema\TrabalhoAcademicoBundle\Entity\TrabalhoAcademico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TrabalhoAcademico>
 *
 * @method TrabalhoAcademico|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrabalhoAcademico|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrabalhoAcademico[]    findAll()
 * @method TrabalhoAcademico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrabalhoAcademicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrabalhoAcademico::class);
    }


}