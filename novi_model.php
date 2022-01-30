<?php
include('header.php');
?>

<body>
    <form method="post" id="novi_model_form">

        <div class="form-group">
            <label>Model</label>
            <input type="text" class="form-control" name="model">
        </div>

        <div class="form-group">
            <label>Velicina</label>
            <select class="form-select" name="velicina">
                <?php
                include('konekcijaBaza.php');
                $query = "select * from velicina";
                $data = $konekcija->query($query);

                while ($velicina = $data->fetch_object()) {
                ?>
                    <option value="<?php echo $velicina->id; ?>"><?php echo $velicina->velicina ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Boja</label>
            <select class="form-select" name="boja">
                <?php
                $query2 = "select * from boja";
                $data2 = $konekcija->query($query2);

                while ($boja = $data2->fetch_object()) {
                ?>
                    <option value="<?php echo $boja->id; ?>"><?php echo $boja->boja ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Cena</label>
            <input type="number" class="form-control" name="cena">
        </div>

        <div class="form-group">
            <label>Pol</label>
            <select class="form-select" name="pol">
                <option>Izaberi</option>
                <option value="muski">muski</option>
                <option value="zenski">zenski</option>
            </select>
        </div>

        <button type="submit" name="sacuvaj_model_dugme" class="btn btn-primary mt-3">Sačuvaj</button>

        <?php

        include('Patika.php');
        $patika = new Patika();

        if (isset($_POST['sacuvaj_model_dugme'])) {
            if ($patika->unesiUBazu($_POST['model'], $_POST['velicina'], $_POST['boja'], $_POST['cena'], $_POST['pol']))
                header('Location: index.php');
        }
        ?>
    </form>

</body>

</html>