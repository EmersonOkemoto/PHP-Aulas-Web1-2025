<?php
// Classe abstrata serve de base para qualquer animal e concentra o comportamento comum
abstract class Animal
{
    // Propriedades protegidas podem ser acessadas pelas classes filhas
    protected $nome;
    protected $idade;
    protected $especie;

    // Flags que dizem se o animal está dormindo ou comendo
    protected $dormir;

    protected $comer;

    // Construtor define nome, idade, espécie e o estado inicial
    public function __construct($nome, $idade, $especie)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->especie = $especie;
        $this->comer = false;
        $this->dormir = false;
    }

    // Métodos getter expõem as propriedades para quem usa o objeto
    public function getNome()
    {
        return $this->nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }
    public function getEspecie()
    {
        return $this->especie;
    }

    // Métodos setter permitem atualizar os dados se necessário
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }
    public function setEspecie($especie)
    {
        $this->especie = $especie;
    }

    // Métodos que trocam o estado interno do animal
    public function comer()
    {
        $this->comer = true;
        $this->dormir = false;
    }

    public function dormir()
    {
        $this->comer = false;
        $this->dormir = true;
    }

    public function pararDeComer()
    {
        $this->comer = false;
    }

    public function acordar()
    {
        $this->dormir = false;
    }

    /* public function estado()
    {
        if ($this->comer) {
            return "{$this->nome} está comendo!";
        }
        if ($this->dormir) {
            return "{$this->nome} está dormindo!";
        }
        return "{$this->nome} está acordado e não está comendo!";
    } */

    // Toda classe filha precisa explicar como mostrar o estado
    abstract public function estado();
}

// Classe Cachorro herda Animal e adiciona comportamento específico
class Cachorro extends Animal
{
    private $raca;

    private $latindo;

    public function __construct($nome, $idade, $raca)
    {
        // parent::__construct chama o construtor da classe mãe
        parent::__construct($nome, $idade, "Cachorro");
        $this->raca = $raca;
        $this->latindo = false;
    }

    public function getRaca()
    {
        return $this->raca;
    }

    public function setRaca($raca)
    {
        $this->raca = $raca;
    }

    // Ao latir o cachorro acorda e para de comer automaticamente
    public function latir()
    {
        $this->latindo = true;
        parent::acordar();
        parent::pararDeComer();
    }

    public function pararlatir()
    {
        $this->latindo = false;
    }

    // Mostra o estado atual combinando informações herdadas e o ato de latir
    public function estado()
    {
        $estado = $this->latindo ? "E está latindo!" : "E não está latindo";
        if ($this->comer) {
            return "{$this->nome} está comendo! " . $estado;
        }
        if ($this->dormir) {
            return "{$this->nome} está dormindo! " . $estado;
        }
        return "{$this->nome} está acordado e não está comendo! " . $estado;
    }
}

echo "<h2>Exemplo de Herança</h2>";
// Instâncias demonstram como os métodos alteram o comportamento
$cachorro = new Cachorro("Rex", 3, "Pastor Alemão");

echo "<h3>Animais:<h3>";
$cachorro->dormir();
echo "<p>{$cachorro->estado()}</p>";
$cachorro->acordar();
echo "<p>{$cachorro->estado()}</p>";
$cachorro->comer();
echo "<p>{$cachorro->estado()}</p>";
$cachorro->latir();
echo "<p>{$cachorro->estado()}</p>";
