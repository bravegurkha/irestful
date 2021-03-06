<?php
namespace iRESTful\LeoPaul\Applications\Libraries\PDO\Domain\Servers\Exceptions;

final class ServerException extends \Exception {
    const CODE = 1;
    public function __construct($message, \Exception $parentException = null) {
        parent::__construct($message, self::CODE, $parentException);
    }
}
