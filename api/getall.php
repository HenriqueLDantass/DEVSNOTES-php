<?php 
require ("../config.php");
$method = strtolower($_SERVER['REQUEST_METHOD']);
if($method === 'get'){
    $sql = $pdo->query("SELECT * FROM notes"); //Fiz a requisição
    if($sql ->rowCount() > 0 ){ //Verifiquei se tem resultado
        $data = $sql->fetchAll(PDO::FETCH_ASSOC); //pegue o resultado

        foreach($data as $item){ //demos um foreach no resultado e adicionamos dentyro do array de retorno
            $array['result'][]=[
                'id'=>$item['id'],
                'title'=>$item['title']
            ];
        }
    }


}else{
    $array['error']= ['Aconteceu algum erro ao acessar a API']; //Mensagem de erro 
}


require('../return.php');


//toda api retorna um json 