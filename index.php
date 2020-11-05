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
        .icoTop:hover {
            background-color: #33ff33;
        }
        .icoDown {
            background-image: url(./img/arrow-down-circle.svg);
            background-position: center;
            width: 1em;
            height: 1em;
            padding: 0;
            border-radius: 30px;          
        }

        .icoDown:hover {
            background-color: #ff4d4d;
        }
       

        .footerCss {
            font-size: 8pt;
            display: flex;
            background-color: white;           
        }

        .profileImg {           
            border-style: solid;
            border-width: 1px;           
            border-color: 949494;
            border-radius: 5px;
        }
        
        .contadorStyle {
            color: black;
            font-size: 8pt;            
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
                    <a class="nav-link" href="login.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Sign Up</a>
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
                        <form method="POST" action="postmsg.php" enctype="multipart/form-data">
                          <!--  <label>Usuario</label>
                            <input type="text" name="userInput"><br><br>-->
                            <label>Título / Link</label><br>
                                <textarea rows="4" cols="40" name="mensagem"></textarea>                            
                            </div>
                            <input type="hidden" name="size" value="1000000">
                            <input type="file" name="imgInput">
                            <div class="modal-footer">
                                <input type="submit" name="upload" class="btn btn-success"  value="Post">
                        </form>                        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>                
        </div>
    
        
    <!--TabPostagens-->
    <div id="contain" class="container">

        <div class="row">
            <div class="col-sm-8">
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
            
            <div class="col-md-4 mt-3 pt-3">                
                <div class="card my-5">
                    <div class="card-header bg-light">Communities</div>                    
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Series</li>                             
                            <li class="list-group-item">Movies</li>
                            <li class="list-group-item">Sports</li>
                            <li class="list-group-item">Gaming</li>
                        </ul>
                                   
                </div>  
                
            </div> 
            
        </div>

    </div>
  

    <script>

        var msg = <?php echo json_encode($msg) ?>


        var ponts = <?php echo json_encode($ponts)?>

        var iduser = <?php echo json_encode($iduser) ?>
        

        function criarDiv(item, indice) {                 
               
                var folha = document.getElementById("top");  // criar na aba 'top'

                //<create> 
                var cardrow1 = document.createElement('div'); //linha
                var cardcolLv1 = document.createElement('div'); //coluna
                var cardrowLv2 = document.createElement('div'); //linha 1 dentro da coluna
                var cardrowLv3 = document.createElement('div'); // linha 2 dentro da coluna
                var cardcol1 = document.createElement('div');                 
                var cardcol2 = document.createElement('img');   
                var cardcol3 = document.createElement('div');
                var col2row2 = document.createElement('div'); 
                var col3row2 = document.createElement('div');
               
                var user = document.createElement('a');
                var username = document.createTextNode('warlley');
                

                var cardtop = document.createElement('a'); //botao like 
                var cardContador = document.createElement('div'); //contador                              
                var cardown = document.createElement('a'); //botao dislike

                var join = document.createElement('a'); //criar 'a' link - join
                var nomejoin = document.createTextNode("+Join");
                var comment = document.createElement('a'); //criar 'a' link - comment
                var nomecom = document.createTextNode("Comment"); //nome ao link comment
                var share = document.createElement('a'); //criar 'a' link - share
                var nomeshar = document.createTextNode("Share"); // nome ao link share
                var savepost = document.createElement('a'); // criar 'a' link - save post
                var nomesave = document.createTextNode("Save"); //  nome ao link save
                var hidepost = document.createElement('a'); //criar 'a' link hidepost
                var nomehide = document.createTextNode("Hide"); // nome ao link hide
                var report = document.createElement('a'); // criar 'a' link - report
                var nomereport = document.createTextNode("Report"); // nome ao link report

                var card = document.createElement('div'); //card bootstrap
                var cardimg = document.createElement('img'); //header
                var cardb = document.createElement('div'); //body
                var cardf = document.createElement('div'); //footer
                //</create


                cardrow1.classList.add("row", 'my-4', "w-100"); 
                cardcolLv1.classList.add("col-sm-12", "py-0");     //my-auto centraliza a row             
                cardrowLv2.classList.add("row");                          
                cardrowLv3.classList.add("row");
                cardcol1.classList.add("col-sm-1", "my-2", "mx-2", "flex-column", "d-flex", "align-items-center");
                cardcol2.classList.add("col-sm-1", "profileImg", "my-auto", "ml-2", "px-0", "py-0");
                cardcol3.classList.add("col-sm-12", "align-self-center", "py-0");
                col2row2.classList.add("col-sm-6");
                col3row2.classList.add("col-sm-8", "align-self-center",  "mx-auto");
                join.classList.add("btn", "btn-primary", "float-right", "px-1", "mx-2");

                card.classList.add("card");
                

                cardb.classList.add("card-body", "col-sm-12", "py-0", "mb-2"); 
                cardContador.textContent = ponts[indice];
                cardb.textContent = msg[indice];
                cardContador.classList.add("btn", "contadorStyle", "px-0", "py-0", "my-2", "d-flexbox", "justify-content-center");
                cardimg.classList.add("card-img-bottom");
                cardimg.src = "./imagesUpload/img-teste.jpg";
                
                cardf.classList.add("card-footer", "footerCss", "py-2", "justify-content-start");

                //<links>
                comment.setAttribute('href', 'comment.php');                
                comment.appendChild(nomecom);
                comment.classList.add("mr-5");
                
                share.setAttribute('href', 'share.php');
                share.appendChild(nomeshar);
                share.classList.add("mr-5");

                savepost.setAttribute('href', 'save.php');
                savepost.appendChild(nomesave);
                savepost.classList.add("mr-5");

                hidepost.setAttribute('href', "hide.php");
                hidepost.appendChild(nomehide);
                hidepost.classList.add("mr-5");  

                report.setAttribute('href', 'report.php');
                report.appendChild(nomereport);  

                user.setAttribute('href', 'user.php');
                user.appendChild(username);

                join.setAttribute('href', 'join.php');
                join.appendChild(nomejoin);
                
                cardf.appendChild(comment);
                cardf.appendChild(share);
                cardf.appendChild(savepost);
                cardf.appendChild(hidepost);
                cardf.appendChild(report);    
                //</links>

                cardtop.classList.add("btn", "btnColorL", "mx-1", "mt-2", "icoTop", "d-flexbox", "px-0", "justify-content-center");
                cardtop.setAttribute('href', 'like.php');  
                cardown.classList.add("btn", "btnColorD", "mx-1", "mb-2", "icoDown", "d-flexbox", "px-0", "justify-content-center");
                cardown.setAttribute('href', 'dislike.php');
               

                cardcol2.src = "./img/profile-photo.png";      
                user.classList.add("my-auto", "mx-2");                                        

                folha.appendChild(cardrow1);  
                cardrow1.appendChild(cardcolLv1);
                cardcolLv1.appendChild(cardrowLv2);
                cardcolLv1.appendChild(card);
                card.appendChild(cardrowLv2);
                card.appendChild(cardrowLv3);
                cardrowLv2.appendChild(cardcol1);
                cardrowLv2.appendChild(cardcol2);
                cardrowLv2.appendChild(user);
                cardrowLv2.appendChild(col3row2);
                col3row2.appendChild(join);                
                cardrowLv3.appendChild(cardcol3);                                                                             
                cardcol3.appendChild(cardb);
                cardb.appendChild(cardimg);
                card.appendChild(cardf);                                            
                cardcol1.appendChild(cardtop);
                cardcol1.appendChild(cardContador);
                cardcol1.appendChild(cardown);                

               
            }            
            
                msg.forEach(criarDiv);   
                    
            

                             

    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>