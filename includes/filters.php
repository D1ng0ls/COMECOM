<div class="filtros">
    <h3>
        <svg style="color: var(--color-purple);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M3.6 3.6a1.2 1.2 0 0 1 1.2-1.2h14.4a1.2 1.2 0 0 1 1.2 1.2v3.6a1.2 1.2 0 0 1-.352.848L14.4 13.697V18a1.2 1.2 0 0 1-.352.848l-2.4 2.4A1.2 1.2 0 0 1 9.6 20.4v-6.703L3.952 8.048A1.2 1.2 0 0 1 3.6 7.2V3.6Z" clip-rule="evenodd"/>
        </svg>
        Filtrar por:
    </h3>
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