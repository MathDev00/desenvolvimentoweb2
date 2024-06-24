<?php


/*

Modelagem do banco de dados. Funções para conexão com a tabela.
Retorno dos dados. 

*/
    class Perfil 
    {

        public static function selecionaTodos()
        
        {

          //Conexao com banco de dados

          $conn =  Connection::getConn();  

          $sql = "SELECT * FROM perfil ORDER BY id ASC";
          $sql = $conn->prepare($sql);
          $sql->execute();

          $resultado = array();


          /* Retorno por meio de $row (objeto) é armazenado em resultado. 
          Retorno da consulta acima */

          while ($row = $sql->fetchObject('Perfil')) {

            $resultado []  = $row; //$row->titulo, $row->conteudo

          }

          /* Array vazio!!! */ 

          if (!$resultado)  {

            throw  new Exception("Não foi encontrado nenhum registro");

          }


          return $resultado;


        }

        public static function selecionaPorId($idPost){

          $conn =  Connection::getConn();  
          $sql = "SELECT  * FROM perfil WHERE id = :id";
          $sql = $conn->prepare($sql);
          $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
          $sql->execute();

          $resultado = $sql->fetchObject('Perfil');

          if (!$resultado)  {
            throw  new Exception("Não foi encontrado nenhum registro");
          } else {

            $resultado->fichas = Ficha::selecionarFicha($resultado->id);

              if (!$resultado->fichas){ //se vazio

                $resultado->fichas = "Não existe nenhum comentario para essa postagem";

              }

          }
          return $resultado; 
        }


        public static function insert($dadosPost)
        
        {

          if (empty($dadosPost['nome']) || empty($dadosPost['ocupacao']) ||empty($dadosPost['idade']) ) {
            throw new Exception("Preencha os campos!", 1);

            return false;

          }

          $con = Connection::getConn();  


          $sql = $con->prepare('INSERT INTO perfil (nome, ocupacao, idade) VALUES (:nome, :ocupacao, :idade)'); 

          $sql->bindValue(':nome', $dadosPost['nome']);    
          $sql->bindValue(':ocupacao', $dadosPost['ocupacao']);    
          $sql->bindValue(':idade', $dadosPost['idade']);    

          $res = $sql->execute();

          if ($res == 0) {
            throw new Exception("Falha ao inserir publicação");
    
            return false;
          }
    
          return true;



        }


    }

?>