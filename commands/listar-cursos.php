<?php

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$em = (new EntityManagerFactory())->getEntityManager();

$cursoRepository = $em->getRepository(Curso::class);

/** @var Curso[] $cursoList */
$cursoList = $cursoRepository->findAll();

foreach ($cursoList as $curso) {
    fwrite(STDOUT, 'ID: ' . $curso->getId() . PHP_EOL . 'Nome: ' . $curso->getNome() . PHP_EOL . PHP_EOL);
}
