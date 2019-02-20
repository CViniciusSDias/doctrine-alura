<?php

namespace Alura\Doctrine\Entity;

/**
 * @Entity
 */
class Telefone
{
    /** @Id @GeneratedValue @Column(type="integer") */
    private $id;

    /** @Column(type="string") */
    private $numero;

    /** @ManyToOne(targetEntity="Aluno", inversedBy="telefones") */
    private $aluno;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNumero(): string
    {
        return (string) $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getAluno(): Aluno
    {
        return $this->aluno;
    }

    public function setAluno(Aluno $aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }
}
