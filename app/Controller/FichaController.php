<?php

 /*Interface entre View e Model */

    class FichaController
    {

        public function index($params)
        {   

            //Teste da query, caso nao...
            try {
            

            $ficha = Ficha::selecionarFicha($params);
            //var_dump($ficha);
   
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('singleFicha.html'); // carrega arquivo a ser usado como view

            $parametros = array();
            $parametros['ficha'] = $ficha;

            //$parametros['nome'] = 'Rafael'; //passando valores para a view 

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecficha = ficha::selecionaTodos());

            } catch(Exception $e) {

                echo $e->getMessage();
            }        
        }

        public function create() {

            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
        $twig = new \Twig\Environment($loader);

    

        $template = $twig->load('cadastroFicha.html'); // carrega arquivo a ser usado como view

        $parametros = array();
        $colecPerfil = Perfil::selecionaTodos();
        $parametros['perfis'] = $colecPerfil;


        $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
        echo $conteudo;

        //var_dump($colecPostagem = Postagem::selecionaTodos());
        }  

        public function insert() {

            try {        
            //var_dump($_POST);     
            Ficha::insert($_POST);


           echo '<script>alert("Publicação inserida com sucesso!");</script>';
            echo '<script>location.href="?pagina=perfil&metodo=index"</script>';

            } catch (Exception $e) {

               echo '<script>alert("'.$e->getMessage().'");</script>';
                //echo '<script>location.href="?pagina=perfil&metodo=create"</script>';
            }



        
        }
        
    }
    


?>