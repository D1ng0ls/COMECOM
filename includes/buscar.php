<div class="container_search justify-content-end <?php if($url == $abt) { echo "comunidade";} else { echo "";};?>">
    <div class="inputs">
        <form method='get' action='<?php echo url($url, $com, $home) ?>search.php'>
            <div class="input-search">
                <div class="form">
                    <input type="search" name='busca' placeholder="Pesquisar..." aria-label="Busca">
                </div>
                </div>
            <div class="submit-search">
                <button type="submit" style="border: none; background: transparent; cursor: pointer;"><svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                    <path d="m21 21-6-6m2-5a7.001 7.001 0 0 1-11.95 4.95A7 7 0 1 1 17 10Z"/>
                </svg></button>
            </div>
        </form>  
    </div>
</div>