<?php
require_once "vendor/autoload.php";

use Classes\ArticlesClass;
use Classes\CurrencyClass;
use Classes\ArrayClasses\SortClass;
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
                <span>Home task</span>
                <p>Веддите пожалуйста диапозон чисел массива</p>
                <form action="" method="POST" class="random_array">
                    <input type="text" id="one_index" class="inp_ind" placeholder="введите первое число массива" required="required" >
                    <input type="text" id="two_index" class="inp_ind" placeholder="введите конечное число массива" required="required">
                    <button class="gen_arr" id="gen_array" >Сгенерировть массив</button>
                </form>
                <form action="" method="POST" class="sort_button">
                    <?php
                    $buttons = [
                      'Сортировка пузырьком',
                      'Сортировка вставками',
                      'Сортировка слиянием',
                      'Быстрая сортировка',
                      'ортировка вставками',
                    ];
                    ?>
                    <input type="button" class="type_sort" id="bubble" name="Сортировка пузырьком" value="Сортировка пузырьком">
                    <input type="button" class="type_sort" id="ins" name="ортировка вставками" value="Сортировка вставками">
                    <input type="button" class="type_sort" id="merg" name="Сортировка слиянием" value="Сортировка слиянием">
                    <input type="button" class="type_sort" id="fast" name="Быстрая сортировка" value="Быстрая сортировка">
                    <input type="button" class="type_sort" id="select" name="Сортировка выбором" value="Сортировка выбором">
                </form>
                <form action="" class="search">
                    <select name="type_search" id="type_search">
                        <option value="Последовательный поиск">Последовательный поиск</option>
                        <option value="Индексно–последовательный поиск">Индексно – последовательный поиск</option>
                        <option value="Бинарный поиск">Бинарный поиск</option>
                    </select>
                    <select name="type_search" id="type_search_array">
                        <option value="Несортированнный">Несортированный массив</option>
                        <option value="Сортированый">Сортированный массив</option>
                    </select>
                    <label for="search_numb">Введите число для поиска</label>
                    <input type="number" id="search_numb">
                    <input type="button" id="search" value="Найти">
                    <h3 class="search_title"></h3>
                    <span class="search_result"></span>
                </form>
                <h3>Сгенерированный массив</h3>
                <span class="type_sort"></span>
                <br>
                <span class="sort_array text-center" style="word-wrap: break-word;"></span>
                <br>
                <span class="generated_array text-center" style="word-wrap: break-word;"></span>

            </div>
        </div>
    </section>
    <section class="py-5 text-center container">
        <?php
        //Получаем список валют
        $currency_array = new CurrencyClass();
        $currency_array = $currency_array->apiQurey();
        $currency_array = json_decode($currency_array, true);
        $array_fin[] = $currency_array['Valute'];
        ?>
        <div class="head_currency">
            <div class="date">
                <h2 class="text-center">Дата</h2>
                <h3 class="text-center"><?= mb_strimwidth($currency_array['Date'], 0, 10); ?></h3>
            </div>
            <div class="time">
                <h3 class="text-center">Время</h3>
                <h3 class="text-center"><?= substr(mb_strimwidth($currency_array['Date'], 11, 14), 0, 5); ?></h3>
            </div>
        </div>
        <div class="converter">
            <h3 class="text-center">Онлайн конвертер</h3>
            <form action="" method="post">
                <div class="type_cur">
                    <label for="cur">Выберите валюту</label>
                    <select name="cur" id="cur">
                        <?php
                        foreach ($array_fin[0] as $key => $value) {
                            ?>
                            <option value="<?= $value['CharCode'] ?>"> <?= $value['Name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="nal">
                    <label for="summ">Введите сумму</label>
                    <input type="number" min="0.000" max="1000000.000" step="0.01" id="summ">
                </div>

                <div class="nal">
                    <label for="result">Результат</label>
                    <input type="number" min="1.00" max="1000000.00" step="0.01" id="result" value="" placeholder="Рос. рублей">
                    <span></span>
                </div>
            </form>
        </div>
        <h3 class="text-center">Курсы валют в настоящее время</h3>
        <div class="currency_block">
            <?php
            foreach ($array_fin[0] as $key => $currency) {

                ?>
                <div class="currency">
                    <div class="name">Валюта <?= $currency['Name']; ?> обозначение: <?= $currency['CharCode']; ?></div>

                    <div class="value">Курс на текучий текущий момент: <b><?= $currency['Value']; ?></b></div>
                </div>
            <?php } ?>
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
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
<script>
    $(document).ready(function () {
        $(".btn-success").click(function () {
            let articles = <?= $body ?>;
            $.ajax({
                type: 'POST',
                url: 'ajax/create.php',
                data: {
                    articles: articles
                },
                success: function (data) {
                    if (data === "yes") {
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
