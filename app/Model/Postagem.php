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
    }












