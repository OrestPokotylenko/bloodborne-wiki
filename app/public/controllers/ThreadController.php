<?php

require_once(__DIR__ . '/../dto/ThreadDTO.php');
require_once(__DIR__ . '/../models/ThreadModel.php');
require_once(__DIR__ . '/TimeController.php');

class ThreadController {
    private $threadModel;

    public function __construct() {
        $this->threadModel = new ThreadModel();
    }

    public function getThreads() {
        $threads = $this->threadModel->getThreads();
        $threadDTOs = array();
        foreach ($threads as $thread) {
            $threadDTO = new ThreadDTO($thread['user_id'], $thread['thread_title'], $thread['thread_id'], TimeController::getTimeByTimeZone($thread['created_at']));
            array_push($threadDTOs, $threadDTO);
        }

        return $threadDTOs;
    }
}