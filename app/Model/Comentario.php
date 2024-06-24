<?php


/*

Modelagem do banco de dados. Funções para conexão com a tabela.
Retorno dos dados. 

---- CHAVE ESTRANGEIRA ---- (FICHAS DE UM ID(PACIENTE), COMENTARIOS DE UMN ID(post))

*/
    class Comentario 
    {

   public static function selecionarComentarios($idPost) {


    $con =  Connection::getConn();  

    $sql = "SELECT * FROM comentario WHERE id_postagem =  :id";
    $sql = $con->prepare($sql);

    $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
    $sql->execute();

    $resultado = array();

 
    while ($row = $sql->fetchObject('Comentario')) {

        $resultado[] = $row;



    }



    return $resultado;




   }



    }

?>