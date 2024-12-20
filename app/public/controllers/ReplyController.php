<?php

require_once(__DIR__ . "/../dto/ReplyDTO.php");
require_once(__DIR__ . "/../models/ReplyModel.php");
require_once(__DIR__ . "/TimeController.php");

class ReplyController {

    private $replyModel;

    public function __construct() {
        $this->replyModel = new ReplyModel();
    }

    public function getReplies($threadId) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $replies = $this->replyModel->getReplies($threadId);
        $replyDTOs = array();
        foreach ($replies as $reply) {
            $replyDTO = new ReplyDTO($reply['thread_id'], $reply['user_id'], $reply['reply_text'], $reply['reply_id'], TimeController::getTimeByTimeZone($reply['reply_date']));
            array_push($replyDTOs, $replyDTO);
        }

        return $replyDTOs;
    }

    public function addReply($threadId, $userId, $content) {
        $reply = new ReplyDTO($threadId, $userId, $content);
        $this->replyModel->addReply($reply);
    }
}