<?php


namespace App\Controllers;


use App\DbConnection;

class InstallController
{
    public function install(): array
    {
        $pdo = (new DbConnection())->getConnection();
        $pdo->query("create table posts(
            id int auto_increment,
            title varchar(255) null,
            image varchar(255) null,
            content text null,
            constraint posts_pk
                primary key (id));
        ");
        $pdo->query("insert into posts (title, image, content) values ('Пост 1', 'https://images11.esquire.ru/upload/img_cache/ec8/ec8bc5d117080f11dc1ee5edfdd0c880_ce_700x436x0x131_cropped_960x600.jpg', 'Описание')");
        return ['message' => 'success'];
    }
}