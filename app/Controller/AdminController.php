<?php

class AdminController
{
   

    public function index(){
         //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 

            $template = $twig->load('admin.html');

            $parametros = array();
            
           $conteudo = $template->render($parametros);
            echo $conteudo;
    }
    
    public function create()
    {
            //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 

            $template = $twig->load('create.html');

            $parametros = array();
            
           $conteudo = $template->render($parametros);
            echo $conteudo;
    }

    public function insert(){
        Postagem::insert($_POST);
    }

     
      
}


   
 
 