<?php
require "Model.php";
?>

<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title id="documentTitle" data-length= <?= count($prospects) ?>>Hello, world!</title>
</head>
<body>
<div class="container">
  <div class="row justify-content-around m-5">
    <div class="col-4">
      <label for="nni">NNI</label>
      <input id="nni" name="nni" class="custom-select w-75" type="text" list="nnis" placeholder="054859"/>
      <datalist id="nnis">
          <?php foreach ($prospects as $key => $prospect) : ?>
            <option value="<?= $prospect['nni'] ?>" selected><?= $prospect['nni'] ?></option>
          <?php endforeach; ?>

      </datalist>
    </div>
    <div class="col-4">
      <label for="lastname">Nom</label>
      <input id="lastname" name="lastname" class="custom-select w-75" type="text" list="names" placeholder="Dupont">
    </div>
    <div class="col-4">
      <label for="firstname">Prénom</label>
      <input id="firstname" name="firstname" class="custom-select w-75" type="text" list="firstnames" placeholder="Robert">
      <datalist id="firstnames">

          <?php foreach ($prospects as $key => $prospect) : ?>
            <option value="<?= $prospect['firstname'] ?>" selected><?= $prospect['firstname'] ?></option>
          <?php endforeach; ?>

      </datalist>
    </div>
  </div>

  <table class="table table-dark">
    <thead>
    <tr>
      <th scope="col">nni</th>
      <th scope="col">nom</th>
      <th scope="col">prénom</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($prospects as $key => $prospect): ?>

      <tr id="tr<?= $key ?>" class="">
        <td><?= $prospect['nni'] ?></td>
        <td><?= $prospect['lastname'] ?></td>
        <td><?= $prospect['firstname'] ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
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
                (container.children[0].firstChild.valueOf().data.toLowerCase().match(nniValue.toLowerCase())) &&
                (container.children[1].firstChild.valueOf().data.toLowerCase().match(lastnameValue.toLowerCase())) &&
                (container.children[2].firstChild.valueOf().data.toLowerCase().match(firstnameValue.toLowerCase()))
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
