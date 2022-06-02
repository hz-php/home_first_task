<?php
//Подключение к бд
require_once 'Db/DbConnectionManager.php';
require_once 'Db/QueryManager.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Home task</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<header>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h2>Home task</h2>
            </div>
        </div>
    </section>
</header>
<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <?php
            //Делаем запрос в бд и сохраняем результатв ассоциативный массив

            $connectionManager = new \Db\DbConnectionManager();
            $connection = $connectionManager->getConnection();
            $query = new \Db\QueryManager();
            $query = $query->getArticles();
            $sql = $connection->query($query)->fetchAll(PDO::FETCH_ASSOC);
            $i = 0;
            ?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 article">
                <!--Запускаем цикл прербора массива для вывода на странице -->
                <?php foreach ($sql as $key => $value) : ?>

                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2><?= $value['title'] ?></h2>
                                <p class="card-text"><?= $value['description'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">

                                    <a href="<?= $value['link'] ?>" target="_blank"><small class="text-muted">Подробнее</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i = ++$i; //С каждой итерацие цикла увеличиваем на 1
                    //Условие чтобы определять количество выводимых новостей на странице
                    if ($i == 30) {
                        break;
                    }
                    ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="text-center buttons">
        <a class="btn btn-success" href="index.php">Главная</a>
    </div>

</main>

<footer class="text-muted py-5">

</footer>
</body>
</html>
