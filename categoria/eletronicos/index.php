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
    <div class="cabecao">
        <h1>Eletrônicos</h1>
    </div>
    <div class="container-anuncios">
        <div class="container-left">
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
            <div class="ordenador">
                <h3>Ordenar por:</h3>
                <div class="ordenador2">
                    <div class="filter-order filter">
                        <label class="container2">
                            Ordenar:
                            <select class="select">
                                <option>Selecionar</option>
                                <option value="+price">Preço Crescente</option>
                                <option value="-price">Preço Decrescente</option>
                                <option value="+sell">Mais Vendidos</option>
                                <option value="-sell">Menos Vendidos</option>
                            </select>
                        </label>
                    </div>
                    <div class="filter-pages filter">
                        <label class="container2">
                            Exibir:
                            <select class="select">
                                <option value="20">20 por página</option>
                                <option value="40">40 por página</option>
                                <option value="60">60 por página</option>
                                <option value="80">80 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="item first-item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
                <div class="item last-item">
                    <a href="">
                        <img src="../../media/oferta1.jpg" alt="">
                        <div class="item-info">
                            <div class="item-name"><h4>Oferta 1</h4></div>
                            <div class="item-price">
                                <span class="item-oldPrice">R$ 1000,00</span>
                                <span class="item-newPrice">R$ 900,00</span>
                            </div>
                        </div>
                    </a>
                    <div class="item-expire">
                        <span>02:08:40:33</span>
                    </div>
                </div>
            </div>
            <div class="pages">
                <a class="selected" href="">1</a>
                <a href="?number_page=2">2</a>
            </div>
        </div>
    </div>

<?php include('../../includes/footer.php'); ?>
</body>
</html>