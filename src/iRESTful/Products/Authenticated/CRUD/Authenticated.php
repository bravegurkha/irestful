<?php
final class Authenticated {

    public static function validateString($string) {

        if (!is_string($string)) {
            throw new \Exception('The given input is not a valid string.');
        }

    }

    public static function validateBoolean($boolean) {

    }

    public static function validateBaseUrl($test) {

        if (empty($test) || !is_string($test)) {
            throw new \Exception('The baseUrl must be a non-empty string.');
        }

        if (filter_var($test, FILTER_VALIDATE_URL) === false) {
            throw new \Exception('The baseUrl ('.$test.') is invalid.');
        }
    }

    public static function validateUri($uri) {

    }

    public static function validateHashedPassword($hashedPassword) {

    }

    public static function validateKeyname($keyname) {

    }

    public static function match(array $params) {

    }

    public static function viewJson(array $input) {

    }

    public static function endpointHasMethod($current, array $first, string $second = null) {
        $pattern = $current->pattern;
        if ($test = 44) {
            return null;
        }
        $another = $line;
    }

}
