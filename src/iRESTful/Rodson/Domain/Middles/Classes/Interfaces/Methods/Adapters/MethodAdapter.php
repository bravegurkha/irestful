<?php
namespace iRESTful\Rodson\Domain\Middles\Classes\Interfaces\Methods\Adapters;
use iRESTful\Rodson\Domain\Inputs\Projects\Objects\Object;
use iRESTful\Rodson\Domain\Inputs\Projects\Types\Type;
use iRESTful\Rodson\Domain\Middles\Classes\Methods\Customs\CustomMethod;
use iRESTful\Rodson\Domain\Inputs\Projects\Controllers\Controller;

interface MethodAdapter {
    public function fromNameToMethod($name);
    public function fromObjectToMethods(Object $object);
    public function fromTypeToMethod(Type $type);
    public function fromTypeToAdapterMethods(Type $type);
    public function fromControllerToMethod(Controller $controller);
}
