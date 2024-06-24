<?php

 /*Interface entre View e Model */

    class PerfilController
    {

        public function index()
        {

            //Teste da query, caso nao...
            try {

            $colecPerfil = Perfil::selecionaTodos();
   
            $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('listaPerfil.html'); // carrega arquivo a ser usado como view

            $parametros = array();

            $parametros['perfis'] = $colecPerfil;
            //$parametros['nome'] = 'Rafael'; //passando valores para a view 

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecperfil = perfil::selecionaTodos());

            } catch(Exception $e) {

                echo $e->getMessage();
            }        }


            public function create() {

                $loader = new \Twig\Loader\FilesystemLoader('app/View'); //carrega pasta da view
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('cadastroPerfil.html'); // carrega arquivo a ser usado como view

            $parametros = array();

            $conteudo = $template->render($parametros); //armazena o cod html da pagina e passa os valores 
            echo $conteudo;

            //var_dump($colecPostagem = Postagem::selecionaTodos());
            }  
            
            public function insert() {

                try {        
                Perfil::insert($_POST);
    
               // echo '<script>alert("Publicação inserida com sucesso!");</script>';
                echo '<script>location.href="?pagina=perfil&metodo=index"</script>';
    
                } catch (Exception $e) {
    
                    //echo '<script>alert("'.$e->getMessage().'");</script>';
                    //echo '<script>location.href="?pagina=perfil&metodo=create"</script>';
                }
    
    
    
            
            }

    }


?>