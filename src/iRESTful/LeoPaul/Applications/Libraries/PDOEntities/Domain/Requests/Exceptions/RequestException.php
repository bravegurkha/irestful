<?php
namespace iRESTful\LeoPaul\Applications\Libraries\PDOEntities\Domain\Requests\Exceptions;

final class RequestException extends \Exception {
    const CODE = 1;
    public function __construct($message, \Exception $parentException = null) {
        parent::__construct($message, self::CODE, $parentException);
    }
}
