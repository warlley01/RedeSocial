<?php
include("conexao.php");
include("getmsg.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style> 
        .icoTop {
            background-image: url(./img/arrow-up-circle.svg);
            background-position: center;
            width: 1em;
            height: 1em;
            padding: 0;
            border-radius: 30px;
            
        }    
        .icoDown {
            background-image: url(./img/arrow-down-circle.svg);
            background-position: center;
            width: 1em;
            height: 1em;
            padding: 0;
            border-radius: 30px;          
        }

        .btnColorL {
                        
        }

    </style>

</head>
<body>           
    
    
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">        
        <a class="navbar-brand" href="#"><img src="img/logo.png"  width="45" height="32" alt="" loading="lazy"></a>
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
                    <a class="nav-link" href="#">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Sign Up</a>
                </li>   
            </div>         
        </ul>
    </nav>
    

        <!--Modal-->    
        <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-label">Add Post</h5>
                    </div>
                    
                    <div class="modal-body">                    
                        <label>Digite sua mensagem</label><br>
                        <form method="POST" action="postmsg.php">
                            <textarea rows="4" cols="40" name="mensagem"></textarea>                            
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-success"  value="Post">
                        </form>                        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>                
        </div>
    
        
    <!--TabPostagens-->
    <div id="contain" class="container">

        <ul class="nav nav-pills justify-content-start ml-3 mt-3 mb-3 " id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active btn-success mr-2 " id="home-tab" data-toggle="pill" href="#top" role="tab" aria-controls="home" aria-selected="true">Top</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link btn-primary" id="profile-tab" data-toggle="pill" href="#new" role="tab" aria-controls="profile" aria-selected="false">New</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div id="top" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                            

            </div>
            <div id="new" class="tab-pane fade" role="tabpanel" aria-labelledby="contact-tab">
                
                                      
            </div>
        </div>

    </div>
  

    <script>

        var msg = <?php echo json_encode($msg) ?>

        var ind = 0


        function criarDiv(item, indice) {              
               
                var folha = document.getElementById("top");   
                var cardrow1 = document.createElement('div');
                var cardcolLv1 = document.createElement('div');
                var cardrowLv2 = document.createElement('div');
                var cardcol1 = document.createElement('div');
                var cardcol2 = document.createElement('div');                
                var cardtop = document.createElement('a');                
                var cardown = document.createElement('a'); 
                var card = document.createElement('div');
                var cardh = document.createElement('div');
                var cardb = document.createElement('div');
                var cardf = document.createElement('div');
                cardrow1.classList.add("row", 'my-5', "w-75");
                cardcolLv1.classList.add("col-sm-8", "my-auto");     //my-auto centraliza a row             
                cardrowLv2.classList.add("row");                          
                cardcol1.classList.add("col-sm-2", "my-auto");
                cardcol2.classList.add("col-sm-8", "align-self-center");
                card.classList.add("card");
               // cardh.classList.add("card-header", "py-1");
                cardb.classList.add("card-body", "col-sm-12", "myauto"); 
                cardh.textContent = "User";
                cardb.textContent = msg[indice];
                cardf.classList.add("card-footer");
                cardtop.classList.add("btn", "btnColorL", "mx-2", "my-2", "icoTop", "d-block");
                cardtop.setAttribute('href', 'like.php');                
                //cardtop.src = "./img/arrow-up-square.svg";
                //cardtop.onclick = "";                
                cardown.classList.add("btn", "btnColorD", "mx-2", "my-2", "icoDown", "d-block");
                cardown.setAttribute('href', 'dislike.php');                
                folha.appendChild(cardrow1);  
                cardrow1.appendChild(cardcolLv1);
                cardcolLv1.appendChild(cardrowLv2);
                cardcolLv1.appendChild(card);
                card.appendChild(cardrowLv2);
                cardrowLv2.appendChild(cardcol1);
                cardrowLv2.appendChild(cardcol2);                                                             
                cardcol2.appendChild(cardb);
                card.appendChild(cardf);                                            
                cardcol1.appendChild(cardtop);
                cardcol1.appendChild(cardown);                

                ind = msg[indice];
                
                console.log(ind);

            }            
            
                msg.forEach(criarDiv);   
                    

                  

    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>