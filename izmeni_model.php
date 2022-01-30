<?php
include('header.php');
?>

<body>
    <form method="post" id="izmeni_model_form">

        <?php
        include('konekcijaBaza.php');
        $model_id = $_GET['model_id'];
        $query = "select * from patike where id=" . $model_id;
        $data = $konekcija->query($query);
        $patika = $data->fetch_object();
        ?>

        <div class="form-group">
            <label>Model</label>
            <input type="text" class="form-control" value="<?php echo $patika->model; ?>" name="model">
        </div>

        <div class="form-group">
            <label>Velicina</label>
            <select class="form-select" value="<?php echo $patika->velicina_id; ?>" name="velicina">
                <?php
                $query2 = "select * from velicina";
                $data2 = $konekcija->query($query2);

                while ($velicina = $data2->fetch_object()) {
                ?>
                    <option value="<?php echo $velicina->v_id; ?>"><?php echo $velicina->velicina; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Boja</label>
            <select class="form-select" value="<?php echo $patika->boja_id ?>" name="boja">
                <?php
                $query3 = "select * from boja";
                $data3 = $konekcija->query($query3);

                while ($boja = $data3->fetch_object()) {
                ?>
                    <option value="<?php echo $boja->b_id; ?>"><?php echo $boja->boja; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Cena</label>
            <input type="number" class="form-control" value="<?php echo $patika->cena; ?>" name="cena">
        </div>

        <div class="form-group">
            <label>Pol</label>
            <select class="form-select" value="<?php echo $patika->pol; ?>" name="pol">
                <option>Izaberi</option>
                <option value="muski">muski</option>
                <option value="zenski">zenski</option>
            </select>
        </div>

        <button type="submit" name="izmeni_model_dugme" class="btn btn-primary mt-3">Sačuvaj</button>

    </form>
    <?php

    include('Patika.php');
    $patika = new Patika();

    if (isset($_POST['izmeni_model_dugme'])) {
        if ($patika->izmeniModelUBazi($model_id, $_POST['model'], $_POST['velicina'], $_POST['boja'], $_POST['cena'], $_POST['pol']))
            header('Location: index.php');
    }
    ?>
</body>

</html>