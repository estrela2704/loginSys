<?php 
  require_once('../controller/logar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php if(isset($_SESSION['erro'])) : ?>     
      <script> alert('<?php echo $_SESSION['erro']?>')</script>
      <?php unset($_SESSION['erro']); ?>
    <?php endif;?>
    <div class="container">
        <h2>Login</h2>
        <form action="../controller/logar.php" method="post">
          <input type="text" name="usuario" placeholder="Usuário" required>
          <input type="password" name="senha" placeholder="Senha" required>
          <input type="submit" value="Entrar">
        </form>
        <div class="register">
          <p>Não tem uma conta? <a href="register.php">Registre-se</a></p>
        </div>
      </div>
</body>
</html>
