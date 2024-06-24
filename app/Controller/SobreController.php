<?php

 /*Interface entre View e Model */

    class SobreController 
    {

        public function index()
        {   

            //Teste da query, caso nao...
     
            

   
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('sobre.html'); // carrega arquivo a ser usado como view

            $parametros = array();



            //$parametros['nome'] = 'Rafael'; //passando valores para a view 

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecPostagem = Postagem::selecionaTodos());


            }        
        
        }

    


?>