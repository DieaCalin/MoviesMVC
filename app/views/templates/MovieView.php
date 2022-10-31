<html>
<head>
``````````````````````````````````````````````<link rel="stylesheet" href="../content/css/rating.css">``````````````````````````````````````````````

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="main">
    <div class="section-1">
        <div class="container">
        <div class="row">
        <div class="col-sm">
        <img src="https://m.media-amazon.com/images/M/MV5BMmNlYzRiNDctZWNhMi00MzI4LThkZTctMTUzMmZkMmFmNThmXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg" alt="Simply Easy Learning" width="300">
        </div>
        <?php var_dump($data); ?>
        <div class="col-sm">
            <div id="movie-title">
                <h1> <?php echo $data->moviedetails->MovieTitle ?> </h1>
            </div>
            <div id="director-name">
                <h2> Stanley Kubrick </h2>
            </div>
            <div class="rate">
                <?php echo $data->moviedetails->MovieRating ?>
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
             </div>
        </div>
        <div class="col-sm">
            <div id="movie-description">
                <p> <?php echo $data->moviedetails->MovieDescription ?> </p>
            </div>
        </div>
        </div>
  </div>
</div>
    </div>
</div>
</body>
</html>