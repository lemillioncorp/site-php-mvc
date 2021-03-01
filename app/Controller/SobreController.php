<?php

class SobreController
{
    public function index(){
       
            //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 

            $template = $twig->load('sobre.html');

            $parametros = array();
            
           $conteudo = $template->render($parametros);
            echo $conteudo;
    }
}
 