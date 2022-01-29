<?php
require('header.php');
?>

<body>
    <div class="div_pocetna">
        <h1 class="text-center text-primary mt-4">SNEAKERS</h1>
        <div class="patike_div_wrapper">

            <?php
            include('konekcijaBaza.php');

            $query = "select * from patike join boja on patike.boja_id = boja.id join velicina on patike.velicina_id = velicina.id";
            $data = $konekcija->query($query);

            while ($patika = mysqli_fetch_object($data)) {
            ?>
                <div class="patika_div">
                    <h5 class="text-center"><?php echo $patika->model ?></h5>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHWgCo_ud9t9IFMD95aafd8mKmKkQla742vTIHi15ZRwvkOiz6XinwcWivMPS3jolvlTE&usqp=CAU">
                    <h5 class="text-center">Velicina: <?php echo $patika->velicina ?></h5>
                    <h5 class="text-center">Boja: <?php echo $patika->boja ?></h5>
                    <h4 class="text-center"><?php echo $patika->cena ?> RSD</h4>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>