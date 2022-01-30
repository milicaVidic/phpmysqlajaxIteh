      <?php
      require('konekcijaBaza.php');

      $pretraga_unos = $_POST['PretragaUnos'];
      $query = "select * from patike join boja on patike.boja_id = boja.b_id join velicina on patike.velicina_id = velicina.v_id where model like '%" . $pretraga_unos . "%' or boja like '%" . $pretraga_unos . "%' or velicina like '%" . $pretraga_unos . "%'";
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
      <?php } ?>