<div class="ordenador">
    <h3>
        <svg style="color: var(--color-purple);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
            <path d="m17 20-4-4m-6 0V4v12ZM7 4 3 8l4-4Zm0 0 4 4-4-4Zm10 4v12V8Zm0 12 4-4-4 4Z"/>
        </svg>
         Ordenar por:
    </h3>
<<<<<<< HEAD
    <div class="ordenador2">
        <div class="filter-order filter">
            <label class="container2">
                Ordenar:
                <select class="select" name="order" id="order">
                    <option value="-new">Recentes</option>
                    <option value="+new">Antigos</option>
                    <option value="+price">Preço Crescente</option>
                    <option value="-price">Preço Decrescente</option>
                </select>
            </label>
=======
    <form method="post">
        <div class="ordenador2">
            <div class="filter-order filter">
                <label class="container2">
                    Ordenar:
                    <select class="select" name="order" id="order">
                        <option value="-new">Recentes</option>
                        <option value="+new">Antigos</option>
                        <option value="+price">Preço Crescente</option>
                        <option value="-price">Preço Decrescente</option>
                    </select>
                </label>
            </div>
            <div class="filter-pages filter">
                <label class="container2">
                    Exibir:
                    <select class="select" name="view" id="view">
                        <option value="20">20 por página</option>
                        <option value="40">40 por página</option>
                        <option value="60">60 por página</option>
                        <option value="80">80 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </label>
            </div>
            <div class="filter-button filter">
                <input type="submit" name="sendPrice" id="sendPrice" value="Enviar">
            </div>
            <div class="filter-order filter">
                <label class="container2">
                    <?php if (isset($_SESSION['login']) && $_SESSION['login']['pessoa']['tipo_pessoa'] == 'juridica') : ?>
                        <a href="../../includes/oferta_formulario.php" title="Adicionar Oferta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" style="color: var(--color-purple);" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </a>
                    <?php endif ?>
                </label>
            </div>
>>>>>>> 512ec28047129e5555631156f5d18812009d5c08
        </div>
    </form>
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