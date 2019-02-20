<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity
 */
class Curso
{
    /** @Id @GeneratedValue @Column(type="integer") */
    private $id;
    /** @Column(type="string") */
    private $nome;
    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return (string) $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getAlunos(): Collection
    {
        return $this->alunos;
    }

    public function addAluno(Aluno $aluno): self
    {
        if ($this->alunos->contains($aluno)) {
            return $this;
        }

        $this->alunos->add($aluno);
        $aluno->addCurso($this);

        return $this;
    }
}
