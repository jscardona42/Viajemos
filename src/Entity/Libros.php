<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libros
 *
 * @ORM\Table(name="libros", indexes={@ORM\Index(name="editoriales_id", columns={"editoriales_id"})})
 * @ORM\Entity
 */
class Libros
{
    /**
     * @var int
     *
     * @ORM\Column(name="ISBN", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=45, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="sinopsin", type="text", length=65535, nullable=false)
     */
    private $sinopsin;

    /**
     * @var string
     *
     * @ORM\Column(name="n_paginas", type="string", length=45, nullable=false)
     */
    private $nPaginas;

    /**
     * @var \Editoriales
     *
     * @ORM\ManyToOne(targetEntity="Editoriales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="editoriales_id", referencedColumnName="id")
     * })
     */
    private $editoriales;

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getSinopsin(): ?string
    {
        return $this->sinopsin;
    }

    public function setSinopsin(string $sinopsin): self
    {
        $this->sinopsin = $sinopsin;

        return $this;
    }

    public function getNPaginas(): ?string
    {
        return $this->nPaginas;
    }

    public function setNPaginas(string $nPaginas): self
    {
        $this->nPaginas = $nPaginas;

        return $this;
    }

    public function getEditoriales(): ?Editoriales
    {
        return $this->editoriales;
    }

    public function setEditoriales(?Editoriales $editoriales): self
    {
        $this->editoriales = $editoriales;

        return $this;
    }


}
