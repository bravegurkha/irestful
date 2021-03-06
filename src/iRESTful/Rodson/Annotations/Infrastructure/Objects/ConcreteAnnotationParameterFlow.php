<?php
namespace iRESTful\Rodson\Annotations\Infrastructure\Objects;
use iRESTful\Rodson\Annotations\Domain\Parameters\Flows\Flow;
use iRESTful\Rodson\Annotations\Domain\Parameters\Flows\MethodChains\MethodChain;
use iRESTful\Rodson\Annotations\Domain\Parameters\Flows\Exceptions\FlowException;

final class ConcreteAnnotationParameterFlow implements Flow {
    private $propertyName;
    private $methodChain;
    private $keyname;
    public function __construct($propertyName, MethodChain $methodChain, $keyname) {

        if (empty($propertyName) || !is_string($propertyName)) {
            throw new FlowException('The propertyName must be a non-empty string.');
        }

        if (empty($keyname) || !is_string($keyname)) {
            throw new FlowException('The keyname must be a non-empty string.');
        }

        $this->propertyName = $propertyName;
        $this->methodChain = $methodChain;
        $this->keyname = $keyname;

    }

    public function getPropertyName() {
        return $this->propertyName;
    }

    public function getMethodChain() {
        return $this->methodChain;
    }

    public function getKeyname() {
        return $this->keyname;
    }

}
