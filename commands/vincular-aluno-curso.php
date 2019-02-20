<?php

require_once __DIR__ . '/../vendor/autoload.php';

$em = (new \Alura\Doctrine\Helper\EntityManagerFactory())->getEntityManager();

$alunoId = $argv[1];
$cursoId = $argv[2];

/** @var \Alura\Doctrine\Entity\Aluno $aluno */
$aluno = $em->find(\Alura\Doctrine\Entity\Aluno::class, $alunoId);
/** @var \Alura\Doctrine\Entity\Curso $curso */
$curso = $em->find(\Alura\Doctrine\Entity\Curso::class, $cursoId);

$aluno->addCurso($curso);

$em->flush();
$em->close();
