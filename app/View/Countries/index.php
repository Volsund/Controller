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

<div class="content">
    <h1>Explore countries:</h1>

    <ul>

        <?php foreach ($countries as $country): ?>

            <li>
                <a href='/countries/<?php echo $country['id']; ?>'>
                    <?php echo $country['name']; ?>
                </a>
                <form class="delete" method="POST" action="/delete/countries/<?php echo $country['id']; ?>">
                    <button type="submit">X</button>
                </form>

            </li>

        <?php endforeach; ?>

    </ul>

    <h3> Add new country:</h3>

    <form method="POST" action="/country/add">

        <input name="name"></input>

        <button type="submit">Submit</button>
    </form>
</div>
<div class="footer">
    <p>EJ 2020</p>
</div>

</body>
</html>