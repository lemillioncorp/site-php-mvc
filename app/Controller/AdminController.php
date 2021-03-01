<?php

class AdminController
{
   

    public function index()
    {
         //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 
            $template = $twig->load('admin.html');

            $objPostagens = Postagem::SelecionaTodos();

            $parametros = array();
            $parametros['postagens'] = $objPostagens;
            
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

    public function insert()
    {
        try {
             Postagem::insert($_POST);
            echo '<script>alert("Publicado com Sucesso!");</script>';
             echo '<script>location.href="http://localhost/git-servidor-php/criando-site-mvc/?pagina=admin&metodo=index"</script>';
        } catch (Exception $e) {
          
               echo '<script>location.href="http://localhost/git-servidor-php/criando-site-mvc/?pagina=admin&metodo=create"</script>';

                echo '<script>alert(" '.$e->getMessage().'"Erro ao Cadastar Postagem");</script>';
        }
    }

    public function change($id)
    {

          //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 

            $template = $twig->load('update.html');

            $post = Postagem::SelecionaPostPorId($id);

            $parametros = array();
            $parametros['id'] = $post->id;
            $parametros['titulo'] = $post->titulo; 
            $parametros['conteudo'] = $post->conteudo;
            
           $conteudo = $template->render($parametros);
            echo $conteudo;
    }
    public function update()
    {
        try {
              Postagem::update($_POST);
               echo '<script>alert("Publicação Alterada com Sucesso!");</script>';

             echo '<script>location.href="http://localhost/git-servidor-php/criando-site-mvc/?pagina=admin&metodo=index"</script>';
        } catch (Exception $e) {
          
               echo '<script>location.href="http://localhost/git-servidor-php/criando-site-mvc/?pagina=admin&metodo=index&metodo=change&id=$_POST['.$_POST['id'].']"</script>';

                echo '<script>alert(" '.$e->getMessage().'");</script>';
        }
      
    }
    public function delete()
    {
        
    }

     
      
}


   
 
 