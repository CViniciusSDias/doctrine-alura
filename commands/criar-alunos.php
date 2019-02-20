<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$aluno = new Aluno();
$aluno
    ->setNome($argv[1]);

for ($i = 2; $i < $argc; $i++) {
    $telefone = new Telefone();
    $telefone->setNumero($argv[$i]);
    $aluno->addTelefone($telefone);
}

$em = (new EntityManagerFactory())->getEntityManager();
$em->persist($aluno);
$em->flush();

$em->close();
