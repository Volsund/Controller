<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Explore countries!</title>
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

<h2>Here are all the countries you can see:</h2>

<ul>

    <?php foreach ($countries as $country): ?>

<!--        <li>--><?php //echo $country['name']; ?><!--</li>-->

        <li><a href='/countries/<?php echo $country['id']; ?>'><?php echo $country['name']; ?></a></li>

    <?php endforeach; ?>

</ul>

<h3> Add new country:</h3>

<form method="POST">

    <input name="name"></input>

    <button type="submit">Submit</button>
</form>

<div class="footer">
    <p>EJ 2020</p>
</div>

</body>
</html>