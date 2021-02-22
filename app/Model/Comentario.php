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

            return $resultado;
        }
        
    }












