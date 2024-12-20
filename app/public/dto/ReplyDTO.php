<?php

class ReplyDTO {
    public readonly ?int $replyId;
    public readonly int $threadId;
    public readonly int $userId;
    public readonly string $content;
    public readonly ?DateTime $replyDate;

    public function __construct(int $threadId, int $userId, string $content, ?int $replyId = null, ?DateTime $replyDate = null) {
        $this->replyId = $replyId;
        $this->threadId = $threadId;
        $this->userId = $userId;
        $this->content = $content;
        $this->replyDate = $replyDate;
    }
}