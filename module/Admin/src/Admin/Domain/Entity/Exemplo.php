<?php

namespace Admin\Domain\Entity;

use InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;
use Admin\Infra\Entity;
use Zend\Math\Rand;


/**
 * Class Exemplo
 * @package Admin\Domain\Entity
 *
 * @ORM\Entity(repositoryClass="\Admin\Domain\Repository\ExemploRepository")
 * @ORM\Table(name="exemplos")
 */
class Exemplo implements Entity{
    
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string")
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", nullable=true)
     */
    private $tipo;
    
    /**
     * @var \Admin\Domain\Entity\OtherEntity
     *
     * @ORM\ManyToOne(
     *      targetEntity="Admin\Domain\Entity\OtherEntity",
     *      inversedBy="exemplos"
     * )
     * @ORM\JoinColumn(name="teste_id", referencedColumnName="id")
     */
    private $teste;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_alteracao", type="datetime")
     */
    private $dataAlteracao;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="ativo", type="integer", length=2)
     */
    private $ativo;
    
    public function __construct() {
        $this->dataAlteracao = new \DateTime("now");
    }
    
    /**
     * 
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * 
     * @return integer
     */
    public function getAtivo() {
        return $this->ativo;
    }

    /**
     * 
     * @param integer $id
     * @return \Admin\Domain\Entity\Exemplo
     * @throws InvalidArgumentException
     */
    public function setId($id) {
        
        if($id <= 0){
            throw new InvalidArgumentException(
                'Id não pode ser menor ou igual a zero'
            );
        }
        
        $this->id = $id;
        return $this;
    }

    /**
     * 
     * @param string $nome
     * @return \Admin\Domain\Entity\Exemplo
     * @throws InvalidArgumentException
     */
    public function setNome($nome) {
        
        if(empty($nome)){
            throw new InvalidArgumentException(
                'Nome não pode ser vazio'
            );
        }
        
        $this->nome = $nome;
        return $this;
    }

    /**
     * 
     * @param integer $ativo
     * @return \Admin\Domain\Entity\Exemplo
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;
        return $this;
    }
    
    /**
     * 
     * @return \DateTime
     */
    public function getDataAlteracao() {
        return $this->dataAlteracao;
    }

    /**
     * 
     * @param \DateTime $dataAlteracao
     * @return \Admin\Domain\Entity\Exemplo
     */
    public function setDataAlteracao(\DateTime $dataAlteracao) {
        $this->dataAlteracao = $dataAlteracao;
        return $this;
    }

    /**
     * 
     * @return \Admin\Domain\Entity\OtherEntity
     */
    public function getTeste() {
        return $this->teste;
    }

    /**
     * 
     * @param \Admin\Domain\Entity\OtherEntity $secretaria
     * @return \Admin\Domain\Entity\Exemplo
     */
    public function setSecretaria(\Admin\Domain\Entity\OtherEntity	 $teste) {
        $this->teste = $teste;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * 
     * @param string $tipo
     * @return \Admin\Domain\Entity\Exemplo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
        return $this;
    }




 
}
