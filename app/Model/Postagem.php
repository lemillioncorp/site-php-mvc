<?php

    class Postagem
    {
        public static function SelecionaTodos()
        {
            $con = Connection::getConn();
            
            $sql = "SELECT * FROM postagem ORDER BY id DESC";
            $sql = $con->prepare($sql);
            $sql->execute();

            $resultado = array();

            while ($linha = $sql->fetchObject('Postagem')) {
               $resultado[] = $linha;
            }
            if (!$resultado) {
                throw new Exception("Não foi encontrado nenhuma Publicação no Banco de Dados");
            }
           
            
            return $resultado;
        }

        public static function SelecionaPostPorId($id)
        {
           
            $con = Connection::getConn();
            $sqlComent = "SELECT * FROM postagem WHERE id = :id";
            $consult  = $con->prepare($sqlComent);
            $consult ->bindValue(':id', $id);
            $consult ->execute();
           
            $dados = $consult->fetchObject('Postagem');

            if (!$dados) {
                throw new Exception("Não foi encontrado nenhuma Publicação no Banco de Dados");
            }
            else{
                $dados->comentario = Comentario::SelecionarComentarios($dados->id);

                if (!$dados->comentario){
                   $dados->comentario = 'Não Existe Nenhum Comentário!.';
                }

            }
          return $dados;
        }
        public static function insert($dadosPost)
        {
            if (empty($dadosPost['titulo']) || empty($dadosPost['conteudo']) ) {
               throw new Exception("Preencha todos os campos");

               return false;
            }
            
              $con = Connection::getConn();

              $query = "INSERT INTO postagem (titulo, conteudo) VALUES(:tit, :cont)";
              $sql = $con->prepare($query);
              $sql->bindValue(":tit", $dadosPost['titulo']);
            $sql->bindValue(":cont", $dadosPost['conteudo']);
             $res = $sql->execute();

             if ($res == 0) {
                  throw new Exception("Falha ao Publicar teste Publicação");

               return false;
             }
               return true;
             
        }
         public static function update($recebePost)
        {
  
              $con = Connection::getConn();

              $query = "UPDATE postagem  SET titulo = :tit, conteudo = :cont WHERE id = :id";
              $sql = $con->prepare($query);
              $sql->bindValue(":tit", $recebePost['titulo']);
              $sql->bindValue(":cont", $recebePost['conteudo']);
              $sql->bindValue(":id", $recebePost['id']);
                $result = $sql->execute();

             if ( $result == 0) {
                  throw new Exception("Falha ao Editar Publicação");

               return false;
             }
               return true;
        }
         public static function delete($recebePost)
        {
  
              $con = Connection::getConn();

              $query = "DELETE FROM postagem  SET titulo = :tit, conteudo = :cont WHERE id = :id";
              $sql = $con->prepare($query);
              $sql->bindValue(":tit", $recebePost['titulo']);
              $sql->bindValue(":cont", $recebePost['conteudo']);
              $sql->bindValue(":id", $recebePost['id']);
                $result = $sql->execute();

             if ( $result == 0) {
                  throw new Exception("Falha ao Editar Publicação");

               return false;
             }
               return true;
             
        }
    }












