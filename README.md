# Gerenciamento-PHP

Baixe o XAMPP

Abra o gerenciador de arquivos do WINDOWS->DiSCO LOCAL C->XAMPP->HTDOCS->JOGUE A PASTA phpProject

Ao abrir o xamp no caso do windows, vá em MYSQL->ADMIN; Na aba aberta vá em IMPORTAR->role para baixo e clique novamente em IMPORTAR-> Selecione o arquivo meu_database.sql e confirme.

Na pasta conf o arquivo se conecta ao banco de dados meu_database.sql

Navegue através das abas por: http://localhost/phpproject/{associados, anuidade, pagamento}
Na ava de associados você vai poder cadastrar o nome, email e cpf do usuario. No momento do cadastro, vai ser setado uma (flag) com o valor 1 em uma coluna chamada pagamento. Ela tem o valor booleano e vai receber 0 ou 1. Sendo 0 para PAGO e 1 para DEVENDO.

Na aba de ANUIDADE, você podera cadastrar um ano e um valor referente a este ano. O valor ficara armazenado na tabela e será usado como filtro posteriormente.

Na aba de PAGAMENTO, você podera informar o CPF, que será filtrado para verificar se já existe um CPF cadastrado na tabela de "cadastroassociados", logo depois informar o ANO, que será filtrado na tabela cadastroanuidade para verificar se existe, e caso exista, informar o valor correspondente ao ano. E no campo de PAGAMENTO você irá informar 0 ou 1, caso você informe 1 pro primeiro usuario cadastrado, será sobre escrito na flag de PAGAMENTO anterior, podendo subtrair ou somar na dívida do úsuario.

