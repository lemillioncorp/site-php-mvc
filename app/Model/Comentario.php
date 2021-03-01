<?php

    class Comentario
    {
        public static function SelecionarComentarios($idPost)
        {
            $con = Connection::getConn();

            $sqlPostagem= "SELECT * FROM  comentario WHERE id_postagem = :id";
            $sqlPost = $con ->prepare($sqlPostagem);
            $sqlPost->bindValue(':id', $idPost);
            $sqlPost->execute();

            $resultado = array();

            while ($row = $sqlPost->fetchObject('Comentario')) {
                $resultado[] = $row;
            }

            //var_dump($resultado);
            return $resultado;
        }
        public static function insert($reqPost)
        {
            $con = Connection::getConn();

            $sqlComentario = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nome, :mensagem, :id_postagem)";
            $sqlComent = $con ->prepare( $sqlComentario);
            $sqlComent->bindValue(':nome',  $reqPost['nome']);
            $sqlComent->bindValue(':mensagem',  $reqPost['msg']);
           $sqlComent->bindValue(':id_postagem', $reqPost['id']);
            $sqlComent->execute();

            if ($sqlComent->rowCount()) {
              return true;
            }
            throw new Exception("Falha na Inserção");
            
        }
        
    }












