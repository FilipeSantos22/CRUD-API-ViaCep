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
        // file_get_contents($response);
        
        curl_close($curl);
        
        $array = json_decode($response, true);
        
        try {        
            if ($array['erro']) {
                
                throw new ViaCepException('Tente novamente.');
            }
        } catch (ViaCepException $e) {
            // echo "<pre>"; print_r( $e->cepNotFound()); echo "</pre>"; exit;
            echo $e->cepNotFound();
            
            exit;
        }

        
        
        // try {
        //     // Código que se conecta à API ViaCep
        //     // Se houver um erro, lance a exceção
        //     throw new ViaCepException("Mensagem de erro específica para a API ViaCep");
        // } catch (ViaCepException $e) {
        //     // Captura a exceção e trata conforme necessário
        //     echo "Erro na API ViaCep: " . $e->getMessage();
        // }

         return $array;
    }
}
?>