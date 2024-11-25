<?php

namespace WPDevUtils\Inc;

abstract class Logger {

    public static function log(mixed $log): void
    {

        if (true !== WP_DEBUG) return;

        if (is_array($log) || is_object($log)) {
            error_log(print_r($log, true));
        } else {
            error_log($log);
        }
    }


    public static function console_logger($var): void
    {

        $json = json_encode($var);
        echo "<script>";
        echo "console.log(";
        echo $json;
        echo ");";
        echo "</script>";

    }


    public static function printer($array) {

        if(is_iterable($array)) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        } else {
            echo "<pre>";
            echo $array;
            echo "</pre>";
        }
    }

}


