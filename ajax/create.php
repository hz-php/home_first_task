<?php
//Подключаем файл соединения с бд
require_once '../Db/DbConnectionManager.php';
require_once '../Db/QueryManager.php';


try {
//Перебираем массив данных новостей
    $connectionManager = new \Db\DbConnectionManager();
    $connection = $connectionManager->getConnection();
    $sql = new \Db\QueryManager();
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