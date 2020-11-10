<?php
    include("userServer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">        
        <a class="navbar-brand" href="index.php"><img src="img/logo.png"  width="45" height="32" alt="" loading="lazy"></a>
        <div class="nav ml-5">
            <form class="form-inline my-0 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="search something" aria-label="Search">
                <button class="btn btn-secondary" type="button">Search</button>
            </form>
        </div>
        
        <ul class="nav ml-auto">
            
            <div class="nav">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary mx-5" data-toggle="modal" data-target="#modalPost">Add Post</button>
                </li>
            </div>
            
            <div class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php" id="loginBtn">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php" id="signupBtn">Sign Up</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="userPage.php" id="userBtn"><?php echo $nome; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>  
            </div>            
        </ul>
    </nav>
    


    <div class="container bg-light mt-2 p-5">
        <div class="row"> 
            <div class="col-sm-4">
                <form method="POST" action="updateUser.php" enctype="multipart/form-data">
                <div class="ml-3 w-50">
                        <h3 class="float-right"><?php echo $nome; ?></h3>
                        <img id="img" src="<?php echo $imgUrl; ?>" class="img-thumbnail"> <!--a imagem escolhida é enviada ao banco de dados 'e' "enviada para a pasta imagens onde é buscada usando src"-->
                        <input type="hidden" name="size" value="1000000">
                        <input type="file" onchange="loadFunction(event)" class="form-control-file my-2" name="inputImg">
                    </div>
            </div>
            
                <div class="col-sm-8 pb-5">                                      
                    <div class="form-group">
                        <label>Nome: </label>
                        <input type="text" name="nome" placeholder="<?php echo $nome; ?>" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" name="email" placeholder="<?php echo $email; ?>" class="form-control">
                    </div>
                    <div class="form-group">   
                        <label>Nova Senha: </label>
                        <input type="password" name="pass" class="form-control" minlength="8">
                    </div>
                    <button type="submit" name="submitBtn" class="btn btn-primary float-right mt-4">Editar</button>
                </div>
                </form>
        </div>
    </div>
      

    <script>

        window.onload = functionTest();

        function loadFunction(event) {
            var image = document.getElementById("img");
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function functionTest() {

            var email = <?php echo json_encode($email); ?>; //erro variavel indefinida quando usuario não está logado

            if(email === null){
            // alert("Nenhum usuario logado");
                document.getElementById("userBtn").style.display = "none";
            } else {
            // alert(email);
                document.getElementById("loginBtn").style.display = "none";
                document.getElementById("signupBtn").style.display = "none";
                document.getElementById("userBtn").style.display = "block";
            }            
        }

    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</body>
</html>