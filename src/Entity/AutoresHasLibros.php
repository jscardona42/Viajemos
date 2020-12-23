<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutoresHasLibros
 *
 * @ORM\Table(name="autores_has_libros", indexes={@ORM\Index(name="autores_id", columns={"autores_id"}), @ORM\Index(name="autores_id_2", columns={"autores_id"}), @ORM\Index(name="libros_ISBN", columns={"libros_ISBN"})})
 * @ORM\Entity
 */
class AutoresHasLibros
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Autores
     *
     * @ORM\ManyToOne(targetEntity="Autores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="autores_id", referencedColumnName="id")
     * })
     */
    private $autores;

    /**
     * @var \Libros
     *
     * @ORM\ManyToOne(targetEntity="Libros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="libros_ISBN", referencedColumnName="ISBN")
     * })
     */
    private $librosIsbn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutores(): ?Autores
    {
        return $this->autores;
    }

    public function setAutores(?Autores $autores): self
    {
        $this->autores = $autores;

        return $this;
    }

    public function getLibrosIsbn(): ?Libros
    {
        return $this->librosIsbn;
    }

    public function setLibrosIsbn(?Libros $librosIsbn): self
    {
        $this->librosIsbn = $librosIsbn;

        return $this;
    }


}
