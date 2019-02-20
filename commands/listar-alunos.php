<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$em = (new EntityManagerFactory())->getEntityManager();

$alunosRepository = $em->getRepository(Aluno::class);

/** @var Aluno[] $alunoList */
$alunoList = $alunosRepository->findAll();

foreach ($alunoList as $aluno) {
    fwrite(STDOUT, "ID: {$aluno->getId()}" . PHP_EOL);
    fwrite(STDOUT, "Nome: {$aluno->getNome()}" . PHP_EOL);
    $telefones = $aluno->getTelefones()->map(function (Telefone $telefone) {
        return $telefone->getNumero();
    })->toArray();
    $stringTelefones = implode(', ', $telefones);
    fwrite(STDOUT, "Telefones: {$stringTelefones}" . PHP_EOL);
    fwrite(STDOUT, PHP_EOL);
}
