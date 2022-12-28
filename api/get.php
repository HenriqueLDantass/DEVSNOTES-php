<?php 
require ("../config.php");
$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get'){
        $id= filter_input(INPUT_GET,'id');

    if($id){
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql ->bindValue("id",$id);
        $sql -> execute();

        if($sql->rowCount() > 0 ){
            $data = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'] = [
                'id' => $data['id'],
                'title' =>$data['title'],
                'body' =>$data['body']
            ];
        }else{
            $array['error'] = 'ID inexistente';
        }


    }else{
        $array['error'] = 'Preencha o parametro';
    }

}else{
    $array['error']= ['Aconteceu algum erro ao acessar a API']; //Mensagem de erro 
}


require('../return.php');


//toda api retorna um json 