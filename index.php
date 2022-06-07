<?php
require_once "vendor/autoload.php";

use Classes\ArticlesClass;

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
            $body = new ArticlesClass();
            $body = $body->apiQurey();
            $news[] = json_decode($body, true); //Переводим в массив json полученый запросом к api сохранем в массив
            $i = 0;// Создаю пременную для счётчика количества новостей
            ?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 article">
                <!--Запускаем цикл прербора массива для вывода на странице -->
                <?php foreach ($news[0]['results'] as $value) { ?>

                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2><?= $value['title'] ?></h2>
                                <p class="card-text"><?= $value['description'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">

                                    <a href="<?= $value['link'] ?>" target="_blank"><small
                                                class="text-muted">Подробнее</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i = ++$i; //С каждой итерацие цикла увеличиваем на 1
                    //Условие чтобы определять количество выводимых новостей на странице
                    if ($i == 9) {
                        break;
                    }
                } ?>

            </div>
        </div>
    </div>
    <div class="text-center buttons">
        <button type="button" class="btn btn-success">Сохранить в архив</button>
        <a class="btn btn-dark" href="read.php">Посмотреть архив</a>
    </div>

</main>

<footer class="text-muted py-5">

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(".btn-success").click(function () {
            let articles = <?= $body;?>;
            $.ajax({
                type: 'POST',
                url: 'ajax/create.php',
                data: {articles: articles},
                success: function (data) {
                    alert(data);
                    if (data === "В таблицу articles добавлены новости") {
                        $('.col').html('<h2 class="text-center">Запись сохранена</h2>');
                    } else {
                        $('.col').html('<h2 class="text-center">Запись не сохранена</h2>');
                    }
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                }
            });
        });
    });
</script>
</body>
</html>
