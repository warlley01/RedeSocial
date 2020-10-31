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
            background-color: 008000;
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
            background-color: red;
        }

        .btnColorL {
                        
        }

        .footerCss {
            font-size: 8pt;
            display: flex;
            background-color: white;
            align-content: center;
            justify-content: center;
            
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

            var user = 0;       
               
                var folha = document.getElementById("top");  // criar na aba 'top'

                //<create> 
                var cardrow1 = document.createElement('div'); //linha
                var cardcolLv1 = document.createElement('div'); //coluna
                var cardrowLv2 = document.createElement('div'); //linha dentro da coluna
                var cardcol1 = document.createElement('div'); //coluna1 dentro da segunda linha
                var cardcol2 = document.createElement('div'); //coluna2 junto com a coluna1  

                var cardtop = document.createElement('a'); //botao like               
                var cardown = document.createElement('a'); //botao dislike

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
                var cardh = document.createElement('div'); //header
                var cardb = document.createElement('div'); //body
                var cardf = document.createElement('div'); //footer
                //</create


                cardrow1.classList.add("row", 'my-5', "w-75"); 
                cardcolLv1.classList.add("col-sm-8", "my-auto");     //my-auto centraliza a row             
                cardrowLv2.classList.add("row");                          
                cardcol1.classList.add("col-sm-2", "my-auto");
                cardcol2.classList.add("col-sm-8", "align-self-center");

                card.classList.add("card");
                
                cardb.classList.add("card-body", "col-sm-12", "myauto"); 
                cardh.textContent = "User";
                cardb.textContent = msg[indice];
                cardf.classList.add("card-footer", "footerCss", "py-2");

                //<links>
                comment.setAttribute('href', 'comment.php');                
                comment.appendChild(nomecom);
                comment.classList.add("mr-5")
                
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

                cardf.appendChild(comment);
                cardf.appendChild(share);
                cardf.appendChild(savepost);
                cardf.appendChild(hidepost);
                cardf.appendChild(report);    
                //</links>

                cardtop.classList.add("btn", "btnColorL", "mx-2", "my-2", "icoTop", "d-block");
                cardtop.setAttribute('href', 'like.php');                              
                                                
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