<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../style/style_navegador.css">
    <link rel="stylesheet" href="../../style/style_categorias.css">
    <?php include('../../includes/settings.php'); ?>
    <title>COMECOM | Eletrônicos</title>
</head>

<body>
<?php include('../../includes/navigator.php'); ?>

    <div class="container-anuncios">
        <div class="container-left">
            <div class="filtros">
                <h3>Filtrar por:</h3>
                <div class="filter-price filter">
                    <h4>Preço</h4>
                    <label>R$
                        <input type="text" maxlength="9" name="minPrice" id="minPrice" class="text" placeholder="Min.">
                    </label>
                    <label>R$
                        <input type="text" maxlength="9" name="maxPrice" id="maxPrice" class="text" placeholder="Max.">
                    </label>
                    <input type="submit" name="sendPrice" id="sendPrice" value="Ir">
                </div>
                <div class="filter-store filter">
                    <h4>Lojas</h4>
                    <label class="container">
                        <input type="checkbox" name="store" id="store" class="check" value="magazine-luiza">
                        Magazine Luiza
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="store" id="store" class="check" value="ricardo-eletro">
                        Ricardo Eletro
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="store" id="store" class="check" value="americanas">
                        Americanas
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="store" id="store" class="check" value="casas-bahia">
                        Casas Bahia
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="filter-brand filter">
                    <h4>Marcas</h4>
                    <label class="container">
                        <input type="checkbox" name="store" id="brand" class="check" value="eletrolux">
                        Eletrolux
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="store" id="brand" class="check" value="samsung">
                        Samsung
                        <span class="checkmark"></span>
                    </label class="container">
                    <label class="container">
                        <input type="checkbox" name="store" id="brand" class="check" value="asus">
                        Asus
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">
                        <input type="checkbox" name="store" id="brand" class="check" value="acer">
                        Acer
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="container-right">
            <div class="ordenador"></div>
            <div class="main"></div>
            <div class="pages"></div>
        </div>
    </div>

<?php include('../../includes/footer.php'); ?>
</body>
</html>