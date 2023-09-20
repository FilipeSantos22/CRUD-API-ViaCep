<?php

include_once __DIR__. '/../library/Connection.php'; 
include_once __DIR__. '/Endereco.php'; 

class Pessoa {
    
        private $id;
        private $nome;    
        private $telefone;    
        private $cpf;    
        private $sexo;
        private $cep;

        function cadastrar () {

               $obDatabase = new DataBase('PESSOA');
               $this->id = $obDatabase->insert([
                                        'NOME'        => $this->nome,
                                        'CPF'         => $this->cpf,
                                        'TELEFONE'    => $this->telefone,
                                        'CEP'         => $this->cep,
                                        'SEXO'        => $this->sexo 
                                ]);
               return true;    
        }

        public function atualizar () {
                return (new DataBase('PESSOA'))->update('id = '.$this->id, [
                                        'NOME'        => $this->nome,
                                        'CPF'         => $this->cpf,
                                        'TELEFONE'    => $this->telefone,
                                        'CEP'         => $this->cep,
                                        'SEXO'        => $this->sexo
                ]);
        }

        public function excluir () {
                $query = '';
                $query .= (new DataBase('ENDERECO'))->delete('IDPESSOA = '.$this->id);
                $query .= (new DataBase('PESSOA'))->delete('ID = '.$this->id);
            }
        
       
        public static function getPessoas($where = null, $order = null, $limit = 100) {
                return (new DataBase('pessoa'))->select($where, $order, $limit)
                                               ->fetchAll(PDO::FETCH_CLASS, self::class);
            }

    
        public static function getPessoa($id) {
                return (new DataBase('pessoa'))->select('id = '.$id)
                                               ->fetchObject((self::class));
        }

        public function getNome()
        {
                return $this->nome;
        }

        public function setNome($nome)
        {
                $this->nome = $nome;
                return $this;
        }

        public function getTelefone()
        {
                return $this->telefone;
        }

        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;
                return $this;
        }

        public function getCpf()
        {
                return $this->cpf;
        }

        public function setCpf($cpf)
        {
                $this->cpf = $cpf;
                return $this;
        }

        public function getSexo()
        {
                return $this->sexo;
        }

      
        public function setSexo($sexo)
        {
                $this->sexo = $sexo;
                return $this;
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;
                return $this;
        }

        public function getCep()
        {
                return $this->cep;
        }

        public function setCep($cep)
        {
                $this->cep = $cep;
                return $this;
        }
}
?>