<?php

class DateUtils {

    public static $MYSQL_DATE_FORMAT = 'Y/m/d';
    public static $SPANISH_DATE_FORMAT = 'd/m/Y';
    public static $MYSQL_DATETIME_FORMAT = 'Y/m/d H:i:s';
    public static $SPANISH_DATETIME_FORMAT = 'd/m/Y H:i:s';
    public static $JS_DATE_FORMAT = 'Y-m-d';
    public static $DB_PHOTO_FORMAT = 'Y_m_d_H_i_s';

    public static function parseDate($dateString) {
        return DateTime::createFromFormat(static::$MYSQL_DATE_FORMAT, $dateString);
    }

    public static function dateToString($date) {
        return $date->format(static::$SPANISH_DATE_FORMAT);
    }

    public static function dateToMYSQL($date) {
        return $date->format(static::$MYSQL_DATE_FORMAT);
    }

    public static function parseDateTime($dateString) {
        return DateTime::createFromFormat(static::$MYSQL_DATETIME_FORMAT, $dateString);
    }

    public static function dateTimeToString($date) {
        return $date->format(static::$SPANISH_DATETIME_FORMAT);
    }

    public static function parseDateFromJavascript($dateString) {
        return DateTime::createFromFormat(static::$JS_DATE_FORMAT, $dateString);
    }

    public static function getNowString() {
        return (new DateTime())->format(static::$DB_PHOTO_FORMAT);
    }
}