<?php

require_once 'vendor/autoload.php';

require_once 'lib/Database/Connection.php';

require_once 'app/Core/Core.php';

require_once 'app/Model/Postagem.php';
require_once 'app/Model/Contato.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/ContatoController.php';
require_once 'app/Controller/PostController.php';

require_once 'app/Controller/PerfilController.php';
require_once 'app/Model/Perfil.php';

require_once 'app/Model/Comentario.php';

require_once 'app/Model/Ficha.php';
require_once 'app/Controller/FichaController.php';

require_once 'app/Controller/SobreController.php';

require_once 'app/Controller/AdminController.php';














$template = file_get_contents('app/Template/estrutura.html');

ob_start();
    $core = new Core();
    $core->start($_GET); //url(get)_ do navegador!!!!

    $saida = ob_get_contents(); //variavel com a captura da URL/GET(saida da pagina!!)
ob_end_clean();    


// string(search), valor_subtuir e local a procurar e substituir!!!
$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $tplPronto;


?>
