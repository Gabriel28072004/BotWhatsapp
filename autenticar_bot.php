<?php

require_once('conn.php');

#print_r($_REQUEST);

?>

<?php


####
if (isset($_POST['contato'])){
    $contatos = $_POST['contato'];
    $mensagem = $_POST['mensagem'];
    
}else{
    echo "<html><script>window.location.href='bot.php?resultado=-3'</script></html>";
}


#Insere os dados no banco
if($conn){
    #Insere os contatos no banco de dados

    $mensagem_salva = "INSERT INTO mensagem (id_mensagem, txt_mensagem) VALUES (NULL, '".$mensagem."')";
   try{ 
    mysqli_begin_transaction($conn);
    $resultado_busca = mysqli_query($conn, $mensagem_salva);
    $id_mensagem = mysqli_insert_id($conn);
    
    if($id_mensagem >0){ 
         foreach($contatos as $contato){
            $envio_mensagem = "INSERT INTO envio (id_contato, id_mensagem, data_envio) VALUES (".$contato.",".$id_mensagem.",CURDATE())";
            $resultado_busca = mysqli_query($conn, $envio_mensagem);
            #echo $envio_mensagem;
        }
         mysqli_commit($conn);
    	 echo "<html><script>window.location.href='bot.php?resultado=1'</script></html>";
    }
    else{
        echo "<html><script>window.location.href='bot.php?resultado=-1'</script></html>";
    }
  }catch(mysqli_sql_exception $exception){
    mysqli_rollback($conn);
    throw $exception;
  } 
}
else{
    echo "<html><script>window.location.href='bot.php?resultado=-2'</script></html>";
}
