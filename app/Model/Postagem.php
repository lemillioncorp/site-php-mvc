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
            
        }
    }












