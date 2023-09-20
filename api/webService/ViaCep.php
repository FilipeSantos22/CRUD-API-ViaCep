<?php

include __DIR__.'/../../exceptions/ViaCepException.php';
/**
 * Método responsável por consultar um CEP no ViaCEP.
 * 
 * @ FILIPE GOMES DOS SANTOS
 * 
 * @param string $cep
 * return array
 */
class ViaCEP{

    public static function  consultarCEP ($cep){
        $cep = preg_replace('/[^0-9]/', '', $cep);
        if (strlen($cep) !== 8) {
            return false;
        }
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL             => 'https://viacep.com.br/ws/'.$cep.'/json/',
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => 'GET'
        ]);
        
        $response = curl_exec($curl);
        curl_close($curl);
        $array = json_decode($response, true);
        
        try {        
            if ($array['erro']) {    
                throw new ViaCepException('Tente novamente.');
            }
        } catch (ViaCepException $e) {
            echo $e->cepNotFound();  
            exit;
        }
         return $array;
    }
}
?>