<?php

require_once('conn.php');

#print_r($_REQUEST);

?>

<?php


####
$nome_cliente = $_POST['nome_usuario'];
$email_cliente = $_POST['email_usuario'];
$senha_cliente = $_POST['senha_usuario'];
$genero_cliente = $_POST['genero'];



#Insere os dados no banco
if($conn){
    #Busca emails de clientes no banco

    $busca_email = "SELECT email_usuario FROM login WHERE email_usuario = '$email_cliente'";
    $resultado_busca = mysqli_query($conn, $busca_email);
    $total_clientes = mysqli_num_rows($resultado_busca);

    if ($total_clientes > 0){
        echo "<html><script>window.location.href='login.php?resultado=-1'</script></html>";
    }
    else{
        $cadastro = "INSERT INTO login(id,nome_usuario,email_usuario,senha_usuario, sexo) VALUES (NULL,'".$nome_cliente."', '".$email_cliente."', '".$senha_cliente."','".$genero_cliente."')";
        $registro = mysqli_query($conn, $cadastro);
        echo $cadastro;
        if(!$registro){
        echo"Deu erro";
        }
        else{   
        echo"<html><script>window.location.href='index.php?resultado=1'</script></html>";
        }
    
    }
}
else{
    echo "Erro de conexão com o banco";
}

    




?>