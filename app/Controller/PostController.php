<?php

 /*Interface entre View e Model */

    class PostController
    {

        public function index($params)
        {   

            //Teste da query, caso nao...
            try {
                $params;

            $postagem = Postagem::selecionaPorId($params);
   
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('single.html'); // carrega arquivo a ser usado como view

            $parametros = array();
            $parametros['titulo'] = $postagem->titulo;
            $parametros['conteudo'] = $postagem->conteudo;

            //$parametros['nome'] = 'Rafael'; //passando valores para a view 

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecPostagem = Postagem::selecionaTodos());

            } catch(Exception $e) {

                echo $e->getMessage();
            }        }

    }


?>