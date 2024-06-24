<?php

 /*Interface entre View e Model */

    class AdminController 
    {

        public function index()
        {   

            //Teste da query, caso nao...
    
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('admin.html'); // carrega arquivo a ser usado como view

            $objPostagens  = Postagem::selecionaTodos();
            $parametros = array();
            $parametros ['postagens'] = $objPostagens;



            //$parametros['nome'] = 'Rafael'; //passando valores para a view 

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecPostagem = Postagem::selecionaTodos());


            }  
            
            public function create() {

                $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('create.html'); // carrega arquivo a ser usado como view

            $parametros = array();

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecPostagem = Postagem::selecionaTodos());
            }

            public function insert() {

            try {        
            Postagem::insert($_POST);

           // echo '<script>alert("Publicação inserida com sucesso!");</script>';
			echo '<script>location.href="?pagina=admin&metodo=index"</script>';

            } catch (Exception $e) {

                echo '<script>alert("'.$e->getMessage().'");</script>';
				echo '<script>location.href="?pagina=admin&metodo=create"</script>';
            }



        
        }

    }


?>