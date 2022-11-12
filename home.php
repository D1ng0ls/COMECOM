<!DOCTYPE html> <!-- teste -->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style-navegador.css">
    <link rel="stylesheet" href="style/style-carrossel.css">
    <link rel="stylesheet" href="style/style-mq-home.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <?php include('includes/settings.php') ?>
    <title>COMECOM | Home</title>
</head>

<body>
    <?php include 'includes/navigator.php' ?>
    <hr>
    <div class="img-home-propaganda" align="center">
        <img src="media/home-img1.png" id="img1" class="on">
        <img src="media/home-img2.png" id="img2" class="off">
        <img src="media/home-img3.png" id="img3" class="off">
    </div>
    <?php include 'includes/carrossel.php' ?>
    <?php include 'includes/footer.php' ?>

    <script>
        var img1 = document.getElementById('img1');
        var img2 = document.getElementById('img2');
        var img3 = document.getElementById('img3');
        setInterval(function () {
            if(img1.className == 'on') {
                img1.className = 'off';
                img2.className = 'on';
                img3.className = 'off';
            } else if(img2.className == 'on') {
                img1.className = 'off';
                img2.className = 'off';
                img3.className = 'on';
            } else if(img3.className == 'on') {
                img1.className = 'on';
                img2.className = 'off';
                img3.className = 'off';
            }
        }, 15000);

        
    </script>
</body>

</html>