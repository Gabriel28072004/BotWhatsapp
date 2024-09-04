<?php
session_start();
require_once('conn.php');

$email_cliente = $_POST['email_login'];
$senha_cliente = $_POST['senha_login'];

$busca_usuario = "SELECT email_usuario, senha_usuario, nome_usuario,id FROM login WHERE email_usuario = '$email_cliente' AND senha_usuario = '$senha_cliente'";
$resultado_busca = mysqli_query($conn, $busca_usuario);
$total_clientes = mysqli_num_rows($resultado_busca);

if($total_clientes == 1){
    $row = mysqli_fetch_assoc($resultado_busca);
    $_SESSION['email_usuario'] = $email_cliente;
    $_SESSION['nome_usuario'] =  $row["nome_usuario"];
    $_SESSION['id'] =  $row["id"];
    
    echo "<meta http-equiv='refresh' content='0;url=inicial.php'>";
}
else{
    echo "<html><script>window.location.href='index.php?resultado=-1'</script></html>";
}




?>