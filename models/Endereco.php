<?php
include_once __DIR__. '/Pessoa.php';

class Endereco {

    private $idendereco;
    private $cep;
    private $logradouro;
    private $bairro;
    private $localidade;
    private $uf;
    private $idPessoa;
    
    function cadastrar () {

        $obDatabaseEndereco = new DataBase('ENDERECO');
        $this->idendereco = $obDatabaseEndereco->insert([
                                'CEP'               => $this->cep,
                                'LOGRADOURO'        => $this->logradouro,
                                'BAIRRO'            => $this->bairro,
                                'LOCALIDADE'        => $this->localidade,
                                'UF'                => $this->uf,
                                'IDPESSOA'          => $this->idPessoa
                         ]);     
        return true;         
    }
    public function atualizar () {
        $query = (new DataBase('ENDERECO'))->update('idpessoa = '.$this->getIdPessoa(), [
                            'CEP'               => $this->cep,
                            'LOGRADOURO'        => $this->logradouro,
                            'BAIRRO'            => $this->bairro,
                            'LOCALIDADE'        => $this->localidade,
                            'UF'                => $this->uf,
                            'IDPESSOA'          => $this->idPessoa
        ]);     
        return $query;
    }
   
    public static function getEnderecos($where = null, $order = null, $limit = 100) {

        return (new DataBase('ENDERECO'))->selectEndereco($where, $order, $limit)
                                    ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getEndereco($idendereco) {
            return (new DataBase('ENDERECO'))->selectEndereco('IDENDERECO = '.$idendereco)
                                        ->fetchObject((self::class));   
    }
    public function getIdEndereco()
    {
        return $this->idendereco;
    }
    public function setIdEndereco($idendereco)
    {
        $this->idendereco = $idendereco;
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
  
    public function getLogradouro()
    {
        return $this->logradouro;
    }
  
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
        return $this;
    }
    
    public function getBairro()
    {
        return $this->bairro;
    }
  
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
        return $this;
    }
    
    public function getLocalidade()
    {
        return $this->localidade;
    }
 
    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
        return $this;
    }
  
    public function getUf()
    {
        return $this->uf;
    }
  
    public function setUf($uf)
    {
        $this->uf = $uf;
        return $this;
    }    
 
    public function getIdPessoa()
    {
        return $this->idPessoa;
    }

    public function setIdPessoa($idPessoa)
    {
        $this->idPessoa = $idPessoa;
         return $this;
    }
}
?>
