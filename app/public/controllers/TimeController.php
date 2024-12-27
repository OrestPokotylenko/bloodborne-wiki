<?php

class TimeController {
    public static function getTimeByTimeZone(string $time): DateTime {
        $dateTime = new DateTime($time);
        $userTimeZone = new DateTimeZone($_SESSION['timezone']);
        $dateTime->setTimezone($userTimeZone);
        return $dateTime;
    }
}