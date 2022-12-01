<?php

namespace App\Application\Schema\TituloBundle\Entity;

use App\Application\Schema\TituloBundle\Repository\TituloRepository;
use App\Application\Schema\TipoTituloBundle\Entity\TipoTitulo;
use App\Application\Schema\CorpoAcademicoBundle\Entity\CorpoAcademico;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** Info:  */
#[ORM\Table(name: 'titulo')]
#[ORM\Entity(repositoryClass: TituloRepository::class)]
#[UniqueEntity('id')]
class Titulo
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer', unique: true, nullable: false)]
    private ?int $id = null;

    #[Assert\NotNull]
    #[Assert\NotBlank]
    #[ORM\Column(name: 'titulo', type: 'string', unique: false, nullable: false)]
    private string $titulo;

    #[ORM\Column(name: 'descricao', type: 'text', unique: false, nullable: true)]
    private ?string $descricao = null;

    #[ORM\ManyToOne(targetEntity: TipoTitulo::class)]
    #[ORM\JoinColumn(name: 'tipo_id', referencedColumnName: 'id', onDelete: 'SET NULL')]
    private TipoTitulo|null $tipo = null;

    #[ORM\ManyToMany(targetEntity: CorpoAcademico::class, mappedBy: 'titulo')]
    private Collection $academicos;


    public function __construct()
    {
        $this->academicos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getTipo(): ?TipoTitulo
    {
        return $this->tipo;
    }

    public function setTipo(?TipoTitulo $tipo): void
    {
        $this->tipo = $tipo;
    }


    public function getAcademicos(): Collection
    {
        return $this->academicos;
    }

    public function setAcademicos(Collection $academicos): void
    {
        $this->academicos = $academicos;
    }



}