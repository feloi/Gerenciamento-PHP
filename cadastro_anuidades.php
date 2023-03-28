
<?php 

  $ano = $valor = '';
  $anoErr = $valorErr =  '';
  //Envio de form
  if(isset($_POST['submit'])){

    #Validacao do nome
    
    #Validacao da data da anuidade
    if(empty($_POST['ano'])){
      $anoErr = 'Data requirida';
    }else{
      $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    #Validacao do valor da aunidade
    if(empty($_POST['valor'])){
      $valorErr = 'Data requirida';
    }else{
      $valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($anofErr) && empty($valorErr)){
      $sql = "INSERT INTO cadastroanuidades (ano, valor) VALUES ('$ano', '$valor')";

      if(mysqli_query($conn, $sql)){
        //INSERIR NA TABELA DE COBRANÇA O ano
        $sql_pagamentos = "INSERT INTO cobrançapagamento (ano) VALUES ('$ano')";
        mysqli_query($conn, $sql_pagamentos);
        
      }else{
        echo 'Error: ' . mysqli_error($conn);
      }

      $sql = "SELECT * FROM cadastroanuidades";
      $result = mysqli_query($conn, $sql);
    }
  }

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <p></p>1
  <label for="ano">Ano:</label>
  <input type="text" id="ano" name="ano"><br><br>
  
  <label for="valor">Valor:</label>
  <input type="text" id="valor" name="valor"><br><br>

  
  <input type="submit" name="submit" value="Enviar">
  
</form>
