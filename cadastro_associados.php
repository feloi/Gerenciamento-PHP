
<?php 

  $name = $email = $cpf = $filiacao = $pagamento = '';
  $nameErr = $emailErr = $cpfErr = $filiacaoErr = $pagamentoErr = '';
  //Envio de form
  if(isset($_POST['submit'])){

    #Validacao do nome
    if(empty($_POST['name'])){
      $nameErr = 'Nome requirido';
    }else{
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    #Validacao do email
    if(empty($_POST['email'])){
      $emailErr = 'Email requirido';
    }else{
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    #Validacao do cpf
    if(empty($_POST['cpf'])){
      $cpfErr = 'CPF requirido';
    }else{
      $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    #Validacao da data de filiacao
    if(empty($_POST['filiacao'])){
      $filiacaoErr = 'Data requirida';
    }else{
      $filiacao = filter_input(INPUT_POST, 'filiacao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    #Validacao ddo pagamento
    if(empty($_POST['pagamento'])){
      $pagamentoErr = 'Data requirida';
    }else{
      $pagamento = filter_input(INPUT_POST, 'pagamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }  


    if(empty($nameErr) && empty($emailErr) && empty($cpfErr) && empty($filiacaoErr)){
      $sql = "INSERT INTO cadastroassociados (name, email, cpf, filiacao, pagamento) VALUES ('$name', '$email', '$cpf', '$filiacao', '1')";

      if(mysqli_query($conn, $sql)){
        //INSERIR NA TABELA DE COBRANÇA O CPF
        $sql_pagamentos = "INSERT INTO cobrançapagamento (cpf) VALUES ('$cpf')";
        mysqli_query($conn, $sql_pagamentos);
      }else{
        echo 'Error: ' . mysqli_error($conn);
      }

      $sql = "SELECT * FROM cadastroassociados";
      $result = mysqli_query($conn, $sql);
    }

    #INSERT NAS TABELAS COM CPF


  }

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="name">Nome:</label>
  <input type="text" id="name" name="name"><br><br>
  
  <label for="email">E-mail:</label>
  <input type="email" id="email" name="email"><br><br>
  
  <label for="cpf">CPF:</label>
  <input type="text" id="cpf" name="cpf"><br><br>
  
  <label for="filiacao">Ano de Filiação:</label>
  <input type="text" id="filiacao" name="filiacao"><br><br>
  
  <input type="submit" name="submit" value="Enviar">
  
</form>
