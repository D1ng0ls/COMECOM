<?php
    require_once '../../includes/funcoes.php';
    require_once '../../core/conexao_mysql.php';
    require_once '../../core/sql.php';
    require_once '../../core/mysql.php';

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $data_atual = date('Y-m-d H:i:s');
    $data = new \DateTime(date('Y-m-d H:i:s'));

    $criterio = [];
    $criterio = [['tipo_pessoa', '=', 'juridica']];


    $posts = agrupar(
        'oferta',
        [   
            'marca',
        ],
       'marca ASC',
       "marca"
    );

    $result = buscar(
        'pessoa',
        [
            'nome',
            'id_pessoa',
        ],
        $criterio,
        'nome ASC'
    );

?>

<div class="topnav" id="myTopnav">
    <div class="filtros">
        <h3>
            <div class="btn_filtrar">
                <svg style="color: var(--color-purple);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M3.6 3.6a1.2 1.2 0 0 1 1.2-1.2h14.4a1.2 1.2 0 0 1 1.2 1.2v3.6a1.2 1.2 0 0 1-.352.848L14.4 13.697V18a1.2 1.2 0 0 1-.352.848l-2.4 2.4A1.2 1.2 0 0 1 9.6 20.4v-6.703L3.952 8.048A1.2 1.2 0 0 1 3.6 7.2V3.6Z" clip-rule="evenodd"/>
                </svg>    
                Filtrar por:
            </div>
        </h3>
        <?php
            if($url == $elt) {
                $action = "../../categoria/eletronicos";
            } else if($url == $mrc) {
                $action = "../../categoria/mercado";
            }
        ?>
        <form method="post">
            <div class="teste">
                <div class="filter-price filter">
                    <h4>Preço</h4>
                    <label class="containerPrice">R$
                        <input type="text" maxlength="9" name="minPrice" id="minPrice" class="text" placeholder="Min." value="<?php echo $minPrice ?? "" ?>">
                    </label>
                    <label class="containerPrice">R$
                        <input type="text" maxlength="9" name="maxPrice" id="maxPrice" class="text" placeholder="Max." value="<?php echo $maxPrice ?? "" ?>">
                    </label>
                    <input type="hidden" name="categoria" id="categoria" value="
                    <?php 
                        if($url == $elt) {
                            echo "eletronicos";
                        } else if($url == $mrc) {
                            echo "mercado";
                        }
                    ?>
                    ">
                </div>
                <div class="filter-store filter">
                    <h4>Lojas</h4>
                    <?php
                        foreach($result as $entidade):
                    ?>
                    <label class='container'>
                        <input type='checkbox' name='store' id='store' class='check' value='<?php echo $entidade['id_pessoa'] ?>'>
                        <?php echo $entidade['nome'] ?>
                        <span class='checkmark'></span>
                    </label>
                    <?php endforeach; ?>
                </div>
                <div class="filter-brand filter">
                    <h4>Marcas</h4>
                    <?php
                        foreach($posts as $post) :
                    ?>
                    <label class='container'>
                        <input type='checkbox' name='mark' id='mark' class='check' value='<?php echo $post['marca'] ?>'>
                        <?php echo $post['marca'] ?>
                        <span class='checkmark'></span>
                    </label>
                    <?php endforeach; ?>
                </div>
                
                <input type="submit" name="sendPrice" id="sendPrice" value="Enviar">
            </div>
        </form>
    </div>
<<<<<<< HEAD
    <div class="filter-store filter">
        <h4>Lojas</h4>
        <?php
            $ctd = 0;
            foreach($result as $entidade):
                $ctd++;
                $chkid = "store".$ctd;
        ?>
        <label class='container'>
            <input type='checkbox' name="<?php echo $chkid?>" id="<?php echo $chkid?>" class='check' value='<?php echo $entidade['id_pessoa'] ?>'>
            <?php echo $entidade['nome'] ?>
            <span class='checkmark'></span>
        </label>
        <?php endforeach; ?>
    </div>
    <div class="filter-brand filter">
        <h4>Marcas</h4>
        <?php
            foreach($posts as $post) :
        ?>
        <label class='container'>
            <input type='checkbox' name='mark' id='mark' class='check' value='<?php echo $post['marca'] ?>'>
            <?php echo $post['marca'] ?>
            <span class='checkmark'></span>
        </label>
        <?php endforeach; ?>
    </div>
    
    <input type="submit" name="sendPrice" id="sendPrice" value="Enviar">
</div>
=======
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<script>
    function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
    }
</script>
>>>>>>> 512ec28047129e5555631156f5d18812009d5c08
