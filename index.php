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
            // Через api и curl подключаемся к бесплатному агрегатору рандомных новостей
            $ch = curl_init('https://newsdata.io/api/1/news?apikey=pub_7531e15acc5686c2a4618b2c72cdccbe2344&language=ru');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',)
            );

            $result = curl_exec($ch);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($result, 0, $header_size);
            $body = substr($result, $header_size);
            curl_close($ch);

            $news_one[] = json_decode($body, true); //Переводим в массив json полученый запросом к api сохранем в массив

            $i = 0;// Создаю пременную для счётчика количества новостей
            ?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<!--Запускаем цикл прербора массива для вывода на странице -->
                <?php foreach ($news_one[0]['results'] as $value) : ?>

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
                    if ($i == 9) {
                        break;
                    }
                    ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

</main>

<footer class="text-muted py-5">

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
