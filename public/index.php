<<<<<<< HEAD
=======
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
        <input type="text" id="name" class="search-key" placeholder="name">
    </div>
    <div class="col-4">
        <input type="text" id="lastname" class="search-key" placeholder="lastname">
    </div>

    <div class="col-4">
        <input type="text" id="number" class="search-key" placeholder="number">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table table-dark" id="MI6">
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
      <td data-input="name" ><?php echo $i['nni'] ?></td>
      <td data-input="lastname"><?php echo $i['nom'] ?></td>
      <td data-input="number"><?php echo $i['prenom'] ?></td>
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

<script>
    var $filterableRows = $('#MI6').find('tr').not(':first'),
        $inputs = $('.search-key');

    $inputs.on('input', function() {

        $filterableRows.hide().filter(function() {
            return $(this).find('td').filter(function() {

                var tdText = $(this).text().toLowerCase(),
                    inputValue = $('#' + $(this).data('input')).val().toLowerCase();

                return tdText.indexOf(inputValue) != -1;

            }).length == $(this).find('td').length;
        }).show();

    });
</script>
</body>
</html>
>>>>>>> 39346a3fde5bbac38cbe63141aaa4fed23c7b064
