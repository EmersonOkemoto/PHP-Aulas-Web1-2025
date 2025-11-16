<?php

// Classe Pessoa representa um modelo básico com nome, idade e email
class Pessoa {
    // Propriedades privadas garantem que só métodos controlem os valores
    private $nome;
    private $idade;
    private $email;

    // Construtor recebe os dados iniciais ao criar uma nova pessoa
    public function __construct($nome, $idade, $email){
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    // Métodos getters retornam os valores atuais das propriedades
    public function getNome(){
        return $this->nome;
    }

    public function getIdade(){
        return $this->idade;
    }
    public function getEmail(){
        return $this->email;
    }

    // Métodos setters permitem trocar os dados depois que o objeto existe
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    // Método que monta uma frase apresentando a pessoa
    public function apresentar(){
        return "Olá, eu sou {$this->nome}, tenho {$this->idade} anos e meu email é {$this->email}";
    }

    // Método que simula um aniversário ao somar 1 na idade
    public function fazerAniversario(){
        $this->idade++;
        return "Parabéns! Agora tenho {$this->idade} anos";
    }

}

echo "<h2>Exemplo de Classes e Objetos</h2>";

// Criação de dois objetos Pessoa com dados diferentes
$pessoa1 = new Pessoa("João Silva", 25, "joao@silva.com");
$pessoa2 = new Pessoa("Maria Santos",30, "maria@santos.com");

echo "<h3>Pessoas:<h3>";

// Chamada dos métodos para mostrar os textos na tela
echo "<p>{$pessoa1->apresentar()}</p>";
echo "<p>{$pessoa2->apresentar()}</p>";


echo "<p>{$pessoa2->fazerAniversario()}</p>";

echo "<p>{$pessoa2->apresentar()}</p>";
