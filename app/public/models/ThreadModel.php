<?php

include_once(__DIR__ . '/BaseModel.php');
include_once(__DIR__ . '/../dto/ThreadDTO.php');

class ThreadModel extends BaseModel {
    public function getThreads(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM threads;');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addThread(ThreadDTO $thread): void {
        $stmt = $this->pdo->prepare('INSERT INTO threads (user_id, thread_title) VALUES (?, ?);');
        $stmt->execute([$thread->userId, $thread->title]);
    }
}