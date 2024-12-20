<?php

class ThreadDTO {
    public readonly int $threadId;
    public readonly int $userId;
    public readonly string $title;
    public readonly ?DateTime $createdAt;

    public function __construct(int $threadId, int $userId, string $title, ?DateTime $createdAt = null) {
        $this->threadId = $threadId;
        $this->userId = $userId;
        $this->title = $title;
        $this->createdAt = $createdAt;
    }
}