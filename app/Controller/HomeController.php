<?php

class HomeController
{
    public function index(){
       
        try {
            
            $colecionaPost = Postagem::SelecionaTodos();

             //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 

            $template = $twig->load('home.html');

            $parametros = array();
            $parametros['postagens'] = $colecionaPost;

           $conteudo = $template->render($parametros);
            
            echo $conteudo;

     
        } catch (Execption $erro) {
            echo $erro->getMessage();
        }
    }
}
 