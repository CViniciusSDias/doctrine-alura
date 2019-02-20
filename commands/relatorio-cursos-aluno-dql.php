<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$em = (new EntityManagerFactory())->getEntityManager();

$stack = new DebugStack();
$em->getConnection()->getConfiguration()->setSQLLogger($stack);

$query = $em->createQueryBuilder()
    ->select('a', 'c')
    ->from(Aluno::class, 'a')
    ->join('a.cursos', 'c')
    ->getQuery();
/** @var Aluno[] $alunoList */
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    /** @var Curso[] $cursos */
    $cursos = $aluno->getCursos();

    fwrite(STDOUT, 'Aluno: ' . $aluno->getNome() . PHP_EOL);
    foreach ($cursos as $curso) {
        fwrite(STDOUT, "\tCurso: {$curso->getNome()}" . PHP_EOL);
    }
    fwrite(STDOUT, PHP_EOL);
}

fwrite(STDERR, print_r($stack, true));
