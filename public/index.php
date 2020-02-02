<?php
require "Model.php";
?>

<!doctype html>
<html lang="en">
<head><?php var_dump($_POST['nom']) ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title id="documentTitle" data-length= <?= count($agents) ?>>Hello, world!</title>
</head>
<body>
<form method="POST" action="">
  <div class="row justify-content-around">
    <div class="col-4">
      <input id="nni" name="nni" class="custom-select w-75" type="text" list="nnis" placeholder="054859"/>
      <datalist id="nnis">
          <?php foreach ($agents as $agent => $i) { ?>
            <option value="<?php echo $i['nni'] ?>" selected><?php echo $i['nni'] ?></option>
          <?php } ?>

      </datalist>
    </div>
    <div class="col-4">
      <input id="lastname" name="nom" class="custom-select w-75" type="text" list="names" placeholder="Dupont">
      <datalist id="names">
          <?php if (!$nni) : ?>
              <?php foreach ($agents as $agent => $i) { ?>
              <option value="<?php echo $i['nom'] ?>" selected><?php echo $i['nom'] ?></option>
              <?php } ?>
          <?php else: ?>
              <?php foreach ($nni as $agent => $i) { ?>
              <option value="<?php echo $i['nom'] ?>" selected><?php echo $i['nom'] ?></option>
              <?php } ?>
          <?php endif ?>
      </datalist>
    </div>
    <div class="col-4">
      <input id="firstname" name="prenom" class="custom-select w-75" type="text" list="firstnames" placeholder="Robert">
      <datalist id="firstnames">

        <option value="">Tous les prenoms</option>
          <?php foreach ($agents as $agent => $i) { ?>
            <option value="<?php echo $i['prenom'] ?>" selected><?php echo $i['prenom'] ?></option>
          <?php } ?>

      </datalist>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table table-dark">
  <thead>
  <tr>
    <th scope="col">nni</th>
    <th scope="col">nom</th>
    <th scope="col">prénom</th>
  </tr>
  </thead>
  <tbody>

  <?php foreach ($agents as $agent => $i) { ?>
      <?php // var_dump($agent) ?>

    <tr id="tr<?= $agent ?>" class="">
      <td><?php echo $i['nni'] ?></td>
      <td><?php echo $i['nom'] ?></td>
      <td><?php echo $i['prenom'] ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script type="text/javascript">
    document.onload = initialize();

    function initialize() {


        let nniInput = document.getElementById('nni');
        let lastnameInput = document.getElementById('lastname');
        let firstnameInput = document.getElementById('firstname');
        nniInput.addEventListener("keyup", function () {
            checkCompatibleUsers()
        });
        lastnameInput.addEventListener("keyup", function () {
            checkCompatibleUsers();
        });
        firstnameInput.addEventListener("keyup", function () {
            checkCompatibleUsers();
        });

    }

    function checkCompatibleUsers() {
        let title = document.getElementById('documentTitle');
        let arrayLength = title.dataset.length;
        let nniValue = document.getElementById('nni').value;
        let firstnameValue = document.getElementById('firstname').value;
        let lastnameValue = document.getElementById('lastname').value;

        for (let i = 0; i < arrayLength; i++) {
            let container = document.getElementById('tr' + i);
            if (
                (container.children[0].firstChild.valueOf().data.match(nniValue)) &&
                (container.children[1].firstChild.valueOf().data.match(lastnameValue)) &&
                (container.children[2].firstChild.valueOf().data.match(firstnameValue))
            ) {
                container.classList.remove("d-none");
            } else {
                container.classList.add('d-none');
            }
        }
    }
</script>
</body>
</html>
