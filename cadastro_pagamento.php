<?php 
// Recupera os pagamentoes do formulário
$cpf = $ano = $pagamento = '';

// $cpf = $_POST['cpf'];
// $ano = $_POST['ano'];
// $pagamento = $_POST['pagamento'];

  //Envio de form
  if(isset($_POST['submit'])){

    #Validacao do nome

    #Validacao do valor da aunidade
    if(empty($_POST['cpf'])){
      $cpfErr = 'CPF requirida';
    }else{
      $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    
    #Validacao da data da anuidade
    if(empty($_POST['ano'])){
      $anoErr = 'Ano requirida';
    }else{
      $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    #Validacao do valor da aunidade
    if(empty($_POST['pagamento'])){
      $pagamentoErr = 'pagamento requirida';
    }else{
      $pagamento = filter_input(INPUT_POST, 'pagamento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    // Verifica se o CPF existe no cadastro de associados
$sql = "SELECT * FROM cadastroassociados WHERE cpf = '$cpf'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // CPF encontrado, atualiza o campo de pagamento na tabela de associados
    $sql = "UPDATE cadastroassociados SET pagamento = '$pagamento' WHERE cpf = '$cpf'";
    mysqli_query($conn, $sql);

    // Verifica se o ano existe no cadastro de anuidades
    $sql = "SELECT * FROM cadastroanuidades WHERE ano = '$ano'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // ano encontrado, recupera o pagamento correspondente e atualiza o campo de pagamento na tabela de cobranças
        $row = mysqli_fetch_assoc($result);
        //$pagamento = $row['pagamento'];

        // $sql = "INSERT INTO cobrançapagamento (cpf, ano, pagamento) VALUES ('$cpf', '$ano', '$pagamento') ON DUPLICATE KEY UPDATE pagamento = '$pagamento'";
        // mysqli_query($conn, $sql);

        $sql = "UPDATE cobrançapagamento SET pagamento = '$pagamento' WHERE cpf = '$cpf' AND ano = '$ano'";
        mysqli_query($conn, $sql);

        echo "Cobrança registrada com sucesso!";
    } else {
        // ano não encontrado, exibe uma mensagem de erro
       
    }
} else {
    // CPF não encontrado, exibe uma mensagem de erro


}

$sql = "SELECT cpf, ano FROM cobrançapagamento WHERE pagamento = '1'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $soma = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $cpf = $row['cpf'];
        $ano = $row['ano'];

        // Verifica qual valor correspondente ao pagamento na tabela de cadastro de anuidades
        $sql2 = "SELECT valor FROM cadastroanuidades WHERE ano = '$ano'";
        $result2 = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            $row2 = mysqli_fetch_assoc($result2);
            $valor = $row2['valor'];
            $soma += $valor;
        }else{
          $row2 = mysqli_fetch_assoc($result2);
          $valor = $row2['valor'];
          $sub -= $valor;
        }
    }

    echo "A soma das dívidas é: " . $soma;
} else {
    echo "A soma das dívidas é: " . $sub;
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
}

?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  
  <label for="cpf">CPF:</label>
  <input type="text" id="cpf" name="cpf"><br><br>
  
  <label for="ano">Ano de Filiação:</label>
  <input type="text" id="ano" name="ano"><br><br>

  <label for="pagamento">Pagamento:</label>
  <input type="text" id="pagamento" name="pagamento"><br><br>
  
  <input type="submit" name="submit" value="Enviar">

  <?php if (isset($soma) || isset($sub)) { ?>
  <h2>A soma das dívidas é: <?php echo isset($soma) ? $soma : $sub; ?></h2>
<?php } ?>
  
</form>
