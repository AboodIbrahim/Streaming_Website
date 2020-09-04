<?php
if (! $_GET['series']) header('Location: index.php');

if ($_GET['episode']) $episode = $_GET['episode'];
else header('Location: watch.php?series='.$_GET['series']."&episode=". 1);

$file_name = 'data/' . $_GET['series'] . '.json';
$f = fopen($file_name, 'r');

$episodes = json_decode(fread($f, filesize($file_name)));
$current_episode = $episodes[$episode-1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="static/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="static/css/toggler.css">
    <link rel="stylesheet" href="static/css/watch.css?version=3">
    <?php echo '<script>var description = '.json_encode($current_episode->description).'</script>'?>
    <title>
        <?php echo ucwords(str_replace('_', ' ', $_GET['series'])) ?>
        |
        <?php echo $current_episode->title; ?>
    </title>
</head>
<body>
    <nav>
        <a href="/">
            <img src="static/svg/favicon.svg" alt="">
        </a>

        <div class="mode-toggler">
            <div class="background">
            <div class="toggler"></div>
            </div>
        </div>
    </nav>

    <div class="main container">
        <div class="section">
            <?php echo '<iframe src='.$current_episode->stream_url.' frameborder=0 allowfullscreen=true></iframe>';?>
            <div class="info">
                <p class="title"><?php echo $current_episode->title?></p>
                <p class="description"></p>
            </div>
        </div>

        <div class="section">
            <div class="list">
                <div class="list-header">
                    <div class="series-info">
                        <p class="series-title"><?php echo ucwords(str_replace('_', ' ', $_GET['series']))?></p>
                        <p class="count"><?php echo count($episodes) , ' episode' ?></p>
                    </div>
                    <button class="toggle-collapse"></button>
                </div>
                <ul>
                <?php
                for($i=1; $i<count($episodes)+1; $i++){
                    echo "<a href=/watch.php?series=".$_GET['series']."&episode=". $i .">";
                    if ($i == $episode) echo "<div class='item active'>";
                    else echo "<div class=item>";
                    echo "<span>".$i."</span><li>".$episodes[$i-1]->title."</li></div></a>";
                }
                ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="static/js/main.js?version=4"></script>
</body>
</html>