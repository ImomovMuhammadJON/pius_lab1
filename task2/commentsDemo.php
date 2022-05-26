<?php

include "User.php";
include "Comment.php";

//Создаем пользователей до временной границы
$user1 = new User(1234, "test", "email@example.com", 12345678);
$user2 = new User(1267, "test1", "email@example.com", 12345678);

//Немного ждем
sleep(20);

//Задаем временную границу
$border = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));

//Немного ждем
sleep(20);

//Создаем пользователей после временной границы
$user3 = new User(1289, "test2", "email@example.com", 12345678);
$user4 = new User(123410, "test3", "email@example.com", 12345678);

echo $user1->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user2->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user3->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";
echo $user4->getCreationDateTime()->format("d-m-Y h:i:s") . "<br>";

//Создаем массив комментов
$comments[] = new Comment($user1, "test1");
$comments[] = new Comment($user2, "test2");
$comments[] = new Comment($user3, "test3");
$comments[] = new Comment($user4, "test4");

//Выведуться только сообщения test3 и test4
foreach ($comments as $comment) {
    if ($comment->getUser()->getCreationDateTime() > $border) {
        echo $comment->getMessage()."<br>";
    }
}
