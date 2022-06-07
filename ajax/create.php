<?php
require_once "../vendor/autoload.php";

//Подключаем файл соединения с бд
use Db\DbConnectionManager;
use Db\QueryManager;

try {
//Перебираем массив данных новостей
    $connectionManager = new DbConnectionManager();
    $connection = $connectionManager->getConnection();
    $sql = new QueryManager();
    $sql = $sql->setArticles();
    $statement = $connection->prepare($sql);
    foreach ($_POST['articles']['results'] as $article) {
        $data = [
            'title' => $article['title'],
            'link' => $article['link'],
            'keywords' => $article['keywords'][0],
            'description' => $article['description'],
            'pubDate' => $article['pubDate'],
            'category' => $article['category'][0]
        ];
        //Выполняем запрос
        $statement->execute($data);
    }
    echo "В таблицу articles добавлены новости";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

// Закрываем соединение
$conn = null;