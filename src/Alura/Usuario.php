<?php

namespace App\Alura;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;



    public function __construct(string $nome,string $senha, string $genero)
    {
        $this->setNomeSobrenome($nome);

        $this->validateSenha($senha);

        $this->addTratamento($nome, $genero);

    }

    private function setNomeSobrenome(string $nome)
    {

        $nomeSobrenome = explode(" ", $nome, 2);

        if ($nomeSobrenome[0] === "") {
            $this->nome = "Nome inválido";
        } else {
            $this->nome = $nomeSobrenome[0];
        }

        if (count($nomeSobrenome) < 2) {
            $this->sobrenome = "Sobrenome Inválido";
        } else {
            $this->sobrenome = $nomeSobrenome[1];
        }
    }

    private function addTratamento(string $nome, string $genero)
    {
        if ($genero === 'M') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Sr.', $nome, 1);
        }

        if ($genero === 'F') {
            $this->tratamento = preg_replace('/^(\w+)\b/', 'Srª.', $nome, 1);
        }
    }

    // validar a senha para ter mais do que 6 caracteres
    private function validateSenha(string $senha): void
    {
        $tamanhoSenha = strlen(trim($senha));
       /* if ($tamanhoSenha > 6) {
            $this->senha = $senha;
        } else {
            $this->senha = "Senha inválida";
        }*/
        $tamanhoSenha > 6 ? $this->setSenha($senha) : $this->setSenha("Senha inválida!");

    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getTratamento(): string
    {
        return $this->tratamento;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    private function setSenha($senha): void
    {
        $this->senha = $senha;
    }


}
