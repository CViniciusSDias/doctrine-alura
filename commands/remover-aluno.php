<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$em = (new EntityManagerFactory())->getEntityManager();
$id = $argv[1];

$aluno = $em->getRepository(Aluno::class)->find($id);

if (is_null($aluno)) {
    fwrite(STDERR, 'Aluno não encontrado');
    exit(1);
}

$em->remove($aluno);
$em->flush();
$em->close();
