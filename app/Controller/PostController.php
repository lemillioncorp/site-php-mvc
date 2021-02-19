<?php

class PostController
{
   

    public function index($id){
        $id = $_GET['id'];
        try {
          
            $post = Postagem::SelecionaPostPorId($id);

            var_dump($post);

             //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 
            $template = $twig->load('single.html');

            $parametros = array();
            //Dados que irão na view do POST
            $parametros['id'] = $post->id;
            $parametros['titulo'] = $post->titulo;
            $parametros['conteudo'] = $post->conteudo;

            //Mostar o conteudo
            
            $conteudo = $template->render($parametros);
            echo $conteudo;

     
        } catch (Execption $erro) {
            echo $erro->getMessage();
        }
    }
    

     
      
}


   
 
 