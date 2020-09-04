<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="static/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="static/css/home.css">
    <title>Abood Ibrahim</title>
</head>
<body style="background:#fafafa">
    <div class="series-container">
    <?php
    foreach(scandir('data') as $file){
        if ($file != "." && $file != ".."){
            $name = explode('.', $file)[0];

            $special_name = ucwords(str_replace('_', ' ', $name));

            echo "<a href='watch.php?series=$name&episode=1'>". "<img src=static/images/posters/$name.jpg>" ."</a></br>";
        }
    }
    ?>
    </div>
</body>
</html>