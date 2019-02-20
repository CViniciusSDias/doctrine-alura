<?php

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$em = (new EntityManagerFactory())
    ->getEntityManager();
$curso = new Curso();
$curso
    ->setNome($argv[1]);

$em->persist($curso);
$em->flush();
$em->close();
