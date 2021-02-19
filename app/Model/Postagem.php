<?php

    class Postagem
    {
        public static function SelecionaTodos(){
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
            $sql = "SELECT * FROM postagem WHERE id = :id";
            $sql = $con->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
           
            $result = $sql->fetchObject('Postagem');



            if (!$result) {
                throw new Exception("Não foi encontrado nenhuma Publicação no Banco de Dados");
            }
            else{
                $resultado->comentario = Comentario::SelecionarComentarios($resultado->id);
            }
           return $result;
        }
    }












