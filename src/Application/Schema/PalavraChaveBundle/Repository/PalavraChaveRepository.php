<?php

namespace App\Application\Schema\PalavraChaveBundle\Repository;

use App\Application\Schema\PalavraChaveBundle\Entity\PalavraChave;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PalavraChave>
 *
 * @method PalavraChave|null find($id, $lockMode = null, $lockVersion = null)
 * @method PalavraChave|null findOneBy(array $criteria, array $orderBy = null)
 * @method PalavraChave[]    findAll()
 * @method PalavraChave[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PalavraChaveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PalavraChave::class);
    }


}