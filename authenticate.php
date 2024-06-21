<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql: host=localhost; dbname=serie-criando-site;', 'username','123456789');

// Coletar dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];
//var_dump($username);
//var_dump($password);


// Verificar se o usuário existe
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();
var_dump($password);
var_dump($user['password']);

$hash = password_hash($user['password'], PASSWORD_DEFAULT);


if ($user && password_verify($password, $hash)) {
    header("Location: index_central.php");
    
    } 
    
    else {
    header("Location: index.php");
    echo "Credenciais inválidas. Tente novamente.";
}
?>