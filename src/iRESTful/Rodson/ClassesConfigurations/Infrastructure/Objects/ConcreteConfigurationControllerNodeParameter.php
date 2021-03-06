<?php
namespace iRESTful\Rodson\ClassesConfigurations\Infrastructure\Objects;
use iRESTful\Rodson\ClassesConfigurations\Domain\Controllers\Nodes\Parameters\Parameter;
use iRESTful\Rodson\Classes\Domain\Constructors\Parameters\Parameter as ConstructorParameter;
use iRESTful\Rodson\Classes\Domain\Namespaces\ClassNamespace;

final class ConcreteConfigurationControllerNodeParameter implements Parameter {
    private $constructorParameter;
    private $classNamespace;
    public function __construct(ConstructorParameter $constructorParameter, ClassNamespace $classNamespace = null) {
        $this->constructorParameter = $constructorParameter;
        $this->classNamespace = $classNamespace;
    }

    public function getConstructorParameter() {
        return $this->constructorParameter;
    }

    public function hasClassNamespace() {
        return !empty($this->classNamespace);
    }

    public function getClassNamespace() {
        return $this->classNamespace;
    }

}
