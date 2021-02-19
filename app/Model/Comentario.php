<?php

    class Comentario
    {
        public static function SelecionarComentarios($idPost)
        {
            $con = Connection::getConn();

            $sql = "SELECT * FROM  comentario WHERE id_postagem = :id";
            $sql = $con ->prepare($sql);
            $sql->bindValue(':id', $idPost);
            $sql->execute();

            $resultado = array();

            while ($row = $sql->fetchObject('Comentario')) {
                $resultado[] = $row;
            }

            return $resultado;
        }
        
    }












