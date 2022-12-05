<!doctype html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?= PUBLIC_PATH ?>/css/pagination.css">
  <meta charset="utf-8">
  <title>Page Title Goes Here</title>
  <meta name="description" content="Description Goes Here">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="pagination">
        <?php echo($data['pagination']['pagination_body']); ?>
        <!-- Limit:
        <ul>
          <li><a href="?limit=10"> 10 </a> </li>
          <li>25</li>
          <li>10</li>
        </ul> -->
    </div>
  <script src="js/scripts.js"></script>
</body>
</html>