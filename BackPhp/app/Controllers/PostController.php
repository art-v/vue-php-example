<?php

namespace App\Controllers;

use App\DbConnection;
use Psr\Http\Message\ServerRequestInterface;

class PostController
{
    public function index(): array
    {
        $pdo = (new DbConnection())->getConnection();
        $stmt = $pdo->query('SELECT * FROM posts');

        $data = [];
        while ($row = $stmt->fetch()) {
            $data[$row['id']] = $row;
        }

        return [
            'data' => $data,
        ];
    }

    public function show(ServerRequestInterface $request): array
    {
        $pdo = (new DbConnection())->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM posts where id = ?');
        $stmt->execute([$request->getAttribute('id')]);

        $data = [];
        while ($row = $stmt->fetch()) {
            $data = $row;
        }

        return [
            'data' => $data
        ];
    }

    public function store(): array
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $pdo = (new DbConnection())->getConnection();
        $stm = $pdo->prepare("INSERT INTO posts (title, image, content) values (?, ?, ?)");
        $stm->execute([$data['title'], $data['image'], $data['content']]);

        return [];
    }
}