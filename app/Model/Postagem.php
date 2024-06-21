<?php


/*
Padrao singleton 


Modelagem do banco de dados. Funções para conexão com a tabela.
Retorno dos dados. 

*/
    class Postagem 
    {
        public static function selecionaTodos()
        {
          //Conexao com banco de dados
          $conn =  Connection::getConn();  

          $sql = "SELECT * FROM postagem ORDER BY ID DESC";
          $sql = $conn->prepare($sql);
          $sql->execute();

          $resultado = array();
          /* Retorno por meio de $row (objeto) é armazenado em resultado. 
          Retorno da consulta acima */
          while ($row = $sql->fetchObject('Postagem')) {
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
          $sql = "SELECT * FROM postagem WHERE id = :id";
          $sql = $conn->prepare($sql);
          $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
          $sql->execute();

          $resultado = $sql->fetchObject('Postagem');

          if (!$resultado)  {
            throw  new Exception("Não foi encontrado nenhum registro");
          }
          return $resultado; 
        }

    }

?>