<?php

class ThreadDTO {
    public readonly ?int $threadId;
    public readonly int $userId;
    public readonly string $title;
    public readonly ?DateTime $createdAt;

    public function __construct(int $userId, string $title, ?int $threadId = null, ?DateTime $createdAt = null) {
        $this->threadId = $threadId;
        $this->userId = $userId;
        $this->title = $title;
        $this->createdAt = $createdAt;
    }
}