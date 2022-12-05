<html>
<?php include('templates/navbar.php'); ?>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
    integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
    integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">
    <h2>Add Movie</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="title">Movie Title</label>
          <input value="2001: A Space Odyssey" name="title" type="text" class="form-control" placeholder="" id="first">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="genre">Movie Genre</label>
          <input value="Sci-Fi" name="genre" type="text" class="form-control" placeholder="" id="last">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="rating">Rating</label>
          <input value="9" name="rating" type="text" class="form-control" placeholder="" id="company">
        </div>
      </div>
      <div class="col-md-6">

        <div class="form-group">
          <label for="directorname">Director Name</label>
          <input value="Stanley Kubrick" name="directorname" type="text" class="form-control" id="directorname"
            placeholder="">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="moviedescription">Movie Description</label>
          <input
            value="After uncovering a mysterious artifact buried beneath the Lunar surface, a spacecraft is sent to Jupiter to find its origins - a spacecraft manned by two men and the supercomputer H.A.L. 9000"
            name="moviedescription" type="text" class="form-control" id="email" placeholder="">
        </div>
      </div>
    </div>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input onclick="redirect()" type="submit" value="Submit" id="btn" class="btn btn-primary">
  </form>
</div>

<script>
  var xhttp = new XMLHttpRequest();
  function redirect() {
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        window.location.href = 'http://localhost/mvc/public/movie/list';
      }
    };
    xhttp.open("POST", "demo_post.asp", true);
    xhttp.send();
  }

</script>
<?php include('templates/footer.php'); ?>
</html>