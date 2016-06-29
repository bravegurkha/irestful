<?php
namespace iRESTful\Rodson\Domain\Types\Databases\Integers\Exceptions;

final class IntegerException extends \Exception {
    const CODE = 1;
    public function __construct($message, \Exception $parentException = null) {
        parent::__construct($message, self::CODE, $parentException);
    }
}
