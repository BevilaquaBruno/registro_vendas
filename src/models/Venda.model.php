<?php
class ModelVenda {
  public function todasUsuario(PDO $conexao, $id_usuario){
    $pessoas = 0;
    try {
      $sm_query = $conexao->prepare("SELECT v.id, v.data_venda as data_venda_original,
          date_format(v.data_venda, '%d/%m/%Y') as data_venda,
          v.observação, v.id_pessoa, v.id_usuario, v.id_funcionario
        FROM venda v
          WHERE v.id_usuario = :id_usuario");

      $sm_query->bindParam(':id_usuario', $id_usuario);

      if($sm_query->execute()){
        $pessoas = $sm_query->fetchall(PDO::FETCH_ASSOC);
      }

    } catch (\Throwable $th) {
      $pessoas = 0;
    }

    return $pessoas;
  }
}

?>