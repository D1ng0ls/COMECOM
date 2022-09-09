<div class="filtros">
    <h3>Filtrar por:</h3>
    <div class="filter-price filter">
        <h4>Preço</h4>
        <label class="containerPrice">R$
            <input type="text" maxlength="9" name="minPrice" id="minPrice" class="text" placeholder="Min.">
        </label>
        <label class="containerPrice">R$
            <input type="text" maxlength="9" name="maxPrice" id="maxPrice" class="text" placeholder="Max.">
        </label>
        <input type="submit" name="sendPrice" id="sendPrice" value="Ir">
    </div>
    <div class="filter-store filter">
        <h4>Lojas</h4>
        
        <?php
            $i=0;
            while($i<4) {
               $i++;
               echo "
               <label class='container'>
                    <input type='checkbox' name='store' id='store' class='check' value='magazine-luiza'>
                    Magazine Luiza
                    <span class='checkmark'></span>
                </label>
                ";
            }
        ?>
        
    </div>
    <div class="filter-brand filter">
        <h4>Marcas</h4>
        <?php
            $i=0;
            while($i<6) {
               $i++;
               echo "
               <label class='container'>
                    <input type='checkbox' name='brand' id='brand' class='check' value='samsung'>
                    Samsung
                    <span class='checkmark'></span>
                </label>
                ";
            }
        ?>
    </div>
</div>