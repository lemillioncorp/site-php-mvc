<?php

class PostController
{
   

    public function index($id)
    {
        $id = $_GET['id'];
        try {
          
            $post = Postagem::SelecionaPostPorId($id);

            //var_dump($post);

             //echo "PÁGINA HOME"; 
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader); 
            $template = $twig->load('single.html');

            $parametros = array();
            //Dados que irão na view do POST
            $parametros['id'] = $post->id;
            $parametros['titulo'] = $post->titulo;
            $parametros['conteudo'] = $post->conteudo;
            $parametros['comentarios'] = $post->comentario;
            //Mostar o conteudo
           

            $conteudo = $template->render($parametros);
            
            echo $conteudo;

     
        } catch (Execption $erro) {
            echo $erro->getMessage();
        }
    }
    public function addComent()
    {
        if (empty($_POST['nome']) || empty($_POST['msg'])) {
             echo '<script>alert(" Preencha os Campos: Nome e Comentário.");</script>';
              echo '<script>location.href="http://localhost/git-servidor-php/criando-site-mvc/?pagina=post&id='.$_POST['id'].'"</script>';
        }
        else  {
             try {

           Comentario::insert($_POST);

            echo '<script>location.href="http://localhost/git-servidor-php/criando-site-mvc/?pagina=post&id='.$_POST['id'].'"</script>';
         
       } catch (Exception $e) {

                echo '<script>alert(" Erro ao Deletar. '.$e->getMessage().'");</script>';
                 echo '<script>location.href="http://localhost/git-servidor-php/criando-site-mvc/?pagina=post&id='.$_POST['id'].'"</script>';
        }
        }
       
    }
}
 

   
 
 