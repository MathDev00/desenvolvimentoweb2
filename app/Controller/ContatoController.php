<?php

 /*Interface entre View e Model */

    class ContatoController
    {

        public function index()
        {

            //Teste da query, caso nao...
            try {

            $colecContato = Contato::selecionaTodos();
   
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('contato.html'); // carrega arquivo a ser usado como view

            $parametros = array();
            $parametros['contatos'] = $colecContato;
            //$parametros['nome'] = 'Rafael'; //passando valores para a view 

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecContato = Contato::selecionaTodos());

            } catch(Exception $e) {

                echo $e->getMessage();
            }        }

    }


?>