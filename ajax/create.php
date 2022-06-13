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
            'title' => !empty($article['title']) ? $article['title'] : "",
            'link' => !empty($article['link']) ? $article['link'] : "",
            'keywords' => !empty($article['keywords']) ? $article['keywords'][0] : "",
            'description' => !empty($article['description']) ? $article['description'] : "",
            'pubDate' => !empty($article['pubDate']) ? $article['pubDate'] : "",
            'category' => !empty($article['category']) ? $article['category'][0] : ""
        ];
        //Выполняем запрос
        $statement->execute($data);
    }
    echo "yes";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
// Закрываем соединение
$conn = null;
