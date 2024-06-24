<?php


/*

Modelagem do banco de dados. Funções para conexão com a tabela.
Retorno dos dados. 

---- CHAVE ESTRANGEIRA ---- (FICHAS DE UM ID(PACIENTE), COMENTARIOS DE UMN ID(post))

*/
    class Ficha 
    {

   public static function selecionarFicha($idFicha) {


    $con =  Connection::getConn();  

    $sql = "SELECT * FROM ficha WHERE id_perfil =  :id";
    $sql = $con->prepare($sql);

    $sql->bindValue(':id', $idFicha, PDO::PARAM_INT);
    $sql->execute();

    $resultado = array();

 
    while ($row = $sql->fetchObject('Ficha')) {

        $resultado[] = $row;



    }



    return $resultado;




   }

   public static function insert($dadosPost)
        
        {

          if (empty($dadosPost['id_perfil']) || empty($dadosPost['conteudo'])) {
            throw new Exception("Preencha os campos!", 1);

            return false;

          }

          $con = Connection::getConn();  

          //$dadosPost['id_perfil'] = intval($dadosPost['id_perfil']);


          $sql = $con->prepare('INSERT INTO ficha (conteudo, id_perfil) VALUES (:conteudo, :id_perfil)'); 


          $sql->bindValue(':conteudo', $dadosPost['conteudo']);    
          $sql->bindValue(':id_perfil', $dadosPost['id_perfil'],PDO::PARAM_INT);    

          $res = $sql->execute();

          if ($res == 0) {
            throw new Exception("Falha ao inserir publicação");
    
            return false;
          }
    
          return true;



        }


   



    }

?>