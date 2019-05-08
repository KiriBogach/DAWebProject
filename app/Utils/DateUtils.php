<?php

class DateUtils {

    public static $MYSQL_DATE_FORMAT = 'Y/m/d';
    public static $SPANISH_DATE_FORMAT = 'd/m/Y';
    public static $MYSQL_DATETIME_FORMAT = 'Y/m/d H:i:s';
    public static $SPANISH_DATETIME_FORMAT = 'd/m/Y H:i:s';

    public static function parseDate($dateString) {
        return DateTime::createFromFormat(static::$MYSQL_DATE_FORMAT, $dateString);
    }

    public static function dateToString($date) {
        return $date->format(static::$SPANISH_DATE_FORMAT);
    }

    public static function parseDateTime($dateString) {
        return DateTime::createFromFormat(static::$MYSQL_DATETIME_FORMAT, $dateString);
    }

    public static function dateTimeToString($date) {
        return $date->format(static::$SPANISH_DATETIME_FORMAT);
    }
}