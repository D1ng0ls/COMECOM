
<?php $i=0; while($i < 4) : $i++;?>
<div class="container2">  <!-- POST MODELO -->
        <div class="container2-1">
            <div class="comecom-avatar">
                <img src="comunidade-avatares/avatarTeste.png">
                <p><a href="/"><?php echo $_SESSION['login']['pessoa']['nome'];?></a></p>
                <h4>• Postado em: <?php echo date("d/m/Y")." às ".date("H:m")?></h4>
            </div>
        </div>
        <div class="container2-2">
            <div class="post-title">
                <h3>#CultCrew #Shalom #DeioCool #GaslightingSilvers</h3>
            </div>
            <div class="post-img" align="center">
                <img src="comunidade-post-img/maxresdefault.jpg" style="height: 380px;">
            </div>
        </div>
        <div class="container2-3">
            <div class="comecom-denunciar">
                <a href="">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" viewBox="0 0 24 24">
                            <path xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" d="M3.6 7.2a3.6 3.6 0 0 1 3.6-3.6h12a1.2 1.2 0 0 1 .96 1.92L17.1 9.6l3.06 4.08a1.201 1.201 0 0 1-.96 1.92h-12A1.2 1.2 0 0 0 6 16.8v3.6a1.2 1.2 0 0 1-2.4 0V7.2Z" clip-rule="evenodd"/>
                        </svg>
                        Ver detalhes
                    </p>
                </a>                
                <a href="">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.2 3.6a1.2 1.2 0 1 0 0 2.4h3.103l-7.551 7.552a1.2 1.2 0 1 0 1.696 1.696L18 7.697V10.8a1.2 1.2 0 1 0 2.4 0v-6a1.2 1.2 0 0 0-1.2-1.2h-6Z"/>
                            <path d="M6 6a2.4 2.4 0 0 0-2.4 2.4V18A2.4 2.4 0 0 0 6 20.4h9.6A2.4 2.4 0 0 0 18 18v-3.6a1.2 1.2 0 1 0-2.4 0V18H6V8.4h3.6a1.2 1.2 0 1 0 0-2.4H6Z"/>
                        </svg>
                        Denunciar postagem
                    </p>
                </a>
            </div>
        </div>
    </div>
<?php endwhile; ?>