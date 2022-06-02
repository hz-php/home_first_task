<?php
//Подключаем файл соединения с бд
require_once '../db/dbconn.php';

try {
//Перебираем массив данных новостей
    foreach ($_POST['articles']['results'] as $article) {
        $data = [
            'title' => $article['title'],
            'link' => $article['link'],
            'keywords' => $article['keywords'][0],
            'description' => $article['description'],
            'pubDate' => $article['pubDate'],
            'category' => $article['category'][0]
        ];
//Подготавливаем запрос в бд и выполняем его
        $sql = "INSERT INTO articles (title, link, keywords, description, pubDate, category) VALUES (:title, :link, :keywords, :description, :pubDate, :category)";
        $statement = $conn->prepare($sql);
        $statement->execute($data);

    }
    echo "В таблицу articles добавлено 9 новостей";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}

// Закрываем соединение
$conn = null;