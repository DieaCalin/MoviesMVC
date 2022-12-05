<?php include('templates/navbar.php'); ?>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Directors</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
  foreach ($data as $value) {
  ?>
      <tr>
        <td>
          <?php print_r($value->DirectorName) ?>
        </td>
        <td><button class="btn btn-primary"
            onclick="window.location.href='director?id=<?php echo $value->DirectorID ?>'"> Show Director Page </button>
        </td>
      </tr>
      <?php
  }
    ?>
    </tbody>
  </table>
</body>
<script>
  function deleteItem(id) {
    //alert (javascriptVariable);
    $('#movie-' + id).remove();
    $.ajax({
      type: "POST",
      url: "http://localhost/mvc/public/movie/delete",
      dataType: 'text',
      data: id.toString(),
      success: function (data) {
      }
    });
  }
</script>
<?php include('templates/footer.php'); ?>
</html>