<?php

namespace Alura\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;

class AlunosRepository extends EntityRepository
{
    public function cursosPorAluno(): array
    {
        $query = $this
            ->createQueryBuilder('a')
            ->addSelect('c')
            ->join('a.cursos', 'c')
            ->getQuery();

        return $query->getResult();
    }
}
