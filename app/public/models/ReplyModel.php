<?php

require_once(__DIR__ . '/BaseModel.php');
require_once(__DIR__ . '/../dto/ReplyDTO.php');

class ReplyModel extends BaseModel {
    public function getReplies($threadId): array {
        $stmt = $this->pdo->prepare('SELECT * FROM replies WHERE thread_id = ?;');
        $stmt->execute([$threadId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addReply(ReplyDTO $reply): void {
        $stmt = $this->pdo->prepare('INSERT INTO replies (thread_id, user_id, reply_text, parent_reply_id) VALUES (?, ?, ?, ?);');
        $stmt->execute([$reply->threadId, $reply->userId, $reply->content, $reply->parentReplyId]);
    }
}