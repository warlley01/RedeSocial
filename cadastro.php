<?php 

include("conexaoUsers.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<a href="index.php" class="btn btn-secondary ml-2 mt-2">Voltar</a>
    <div class="container col-sm-5">
        <div class="row mt-4">
            <div class="col-sm-12 mt-5 shadow-lg p-5 bg-white rounded">
            <form method="POST" action="cadastrarUser.php">
                <div class="form-group">
                    <labeL for="nomeId" >Nome: </label>
                    <input type="text" class="form-control" placeholder="Seu Nome" name="nome" id="nomeId">
                </div>
                <div class="form-group">
                    <label for="emailId">Email: </label>
                    <input type="email" class="form-control" placeholder="Seu Email" id="emailId" name="email">
                </div>
                <div class="form-group">
                    <label for="senhaId">Senha: </label>
                    <input type="password" class="form-control" placeholder="Sua Senha" id="senhaId" name="pass" minlength="8" required>
                </div>
                <div class="form-group form-check mt-2">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Lembrar</label>
                    <button type="submit" class="btn btn-primary float-right" >Criar</button>
                </div>
            </form> 

            </div>
        </div>
        <br><br><br>
            
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>