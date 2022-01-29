<?php
require('header.php');
?>

<body>
    <div class="div_pocetna">

        <h1 class="text-center text-primary mt-4">SNEAKERS</h1>

        <div class="pretrazivanje_sortiranje_div">
            <div class="pretrazi_div">
                <input type="text" class="form-control" id="pretrazi_unos">
                <button type="button" class="btn btn-primary" id="pretrazi_dugme">Pretrazi</button>
            </div>
        </div>


        <div class="patike_div_wrapper">

            <?php
            include('konekcijaBaza.php');

            $query = "select * from patike join boja on patike.boja_id = boja.id join velicina on patike.velicina_id = velicina.id";
            $data = $konekcija->query($query);

            while ($patika = $data->fetch_object()) {
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js.js"></script>
</body>

</html>