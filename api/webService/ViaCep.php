<?php

class ViaCEP{
/**
 * Método responsável por consultar um CEP no ViaCEP.
 * 
 * @ FILIPE GOMES DOS SANTOS
 * 
 * @param string $cep
 * return array
 * @throws Exception
 */
    public static function  consultarCEP ($cep){

        // Remove caracteres não numéricos do CEP
        $cep = preg_replace('/[^0-9]/', '', $cep);

        // Verifica se o CEP possui o formato correto
        if (strlen($cep) !== 8) {
            return false;
        }

        //INICIA O CURL
        $curl = curl_init();

        //CONFIGURAÇÕES DO CURL
        curl_setopt_array($curl, [
            CURLOPT_URL             => 'https://viacep.com.br/ws/'.$cep.'/json/',
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_CUSTOMREQUEST   => 'GET'
        ]);

        //RESPONSE
        $response = curl_exec($curl);

        //FECHA A CONEXÃO ABERTA
        curl_close($curl);

        //CONVERTE JSON PARA ARRAY
        $array = json_decode($response, true);

        // Verifica se a consulta foi bem-sucedida
        try {        
            if (isset($array['erro']) || empty($array)) {
                $mensagem = '<div class="alert text-center alert-danger">Ação não executada!</div>';
                throw new Exception($mensagem.'adsfasdf');
            }
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            header('Location: cadastrar.php?status=error');
            exit;
        }
         // Retorna os dados do CEP
         return $array;

    }
}
?>