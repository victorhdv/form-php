<?php

namespace App\Alura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;
    private $telefone;


    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        $this->email = $email;

        //chamando a função para validar email(false é resultado em casso de falha da validação
        //if ternario, exemplo
        //$this->email = $this->validaEmail($email) ? $email : "Email inválido";
        if ($this->validateEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail("e-mail inválido!");
        }

        $this->endereco = $endereco;

        if ($this->validateCep($cep)) {
            $this->setCep($cep);
        } else {
            $this->setCep("inválido!");
        }

        if ($this->validateTelefone($telefone)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone inválido!");
        }
    }

    public function getUsuario(): string
    {
        //checando a possição do arroba
        $posicaoArroba = strpos($this->email, "@");
        //caso não tenha arroba
        if ($posicaoArroba === false) {
            return "Usuario inválido!";
        }
        //informando o string antes do arroba como usuario
        return substr($this->email, 0, $posicaoArroba);
    }

    private function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function validateTelefone(string $telefone): int
    {
        return preg_match('/^[0-9]{5}-[0-9]{4}$/', $telefone, $encontrados);
    }

    private function validateCep(string $cep): int
    {
        return preg_match('/^[0-9]{5}-[0-9]{3}$/', $cep, $encontrados);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(' - CEP: ', $enderecoCep);
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    private function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }
}