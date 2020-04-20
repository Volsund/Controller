<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $country['name']; ?> </title>
    <link rel="stylesheet" type="text/css" href="/app/public/css/style.css">
</head>

<body>
<header class="header">
    <div class="header__inner">
        <nav>
            <ul><a href="/">Home</a></ul>
        </nav>
    </div>
</header>

<div class="content">
    <h1><?php echo $country['name']; ?></h1>

    <h2>Most interesting cities in <?php echo $country['name']; ?>: </h2>
    <ul>
        <?php foreach ($cities as $city): ?>

            <li><b><?php echo $city['name']; ?></b></li>

        <?php endforeach; ?>
    </ul>

    <h3> Add new city:</h3>

    <form method="POST">

        <input name="name"></input>

        <button type="submit">Submit</button>
    </form>
</div>
<div class="footer">
    <p>EJ 2020</p>
</div>

</body>
</html>
