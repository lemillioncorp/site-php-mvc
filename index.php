<?php

//REQUISIÇÃO OU IMPORTACÃO
require_once 'app/Core/Core.php';

require_once 'lib/Database/Connection.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/SobreController.php';
require_once 'app/Controller/PostController.php';
require_once 'app/Controller/AdminController.php';

require_once 'app/Model/Postagem.php';
require_once 'app/Model/Comentario.php';

require_once 'vendor/autoload.php';
//FIM DA IMPORTAÇÃO


$template = file_get_contents('app/Template/estrutura.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    if (isset($_GET['id']) && $_GET['id'] != null) {

        $id = $_GET['id']; 
    } 
    
    
    $saida = ob_get_contents();
        ob_clean();

$templatePronto = str_replace('{{area_dinamica}}', $saida, $template);


echo $templatePronto;























