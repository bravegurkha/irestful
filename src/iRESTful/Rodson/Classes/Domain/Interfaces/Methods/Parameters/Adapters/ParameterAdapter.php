<?php
namespace iRESTful\Rodson\Classes\Domain\Interfaces\Methods\Parameters\Adapters;

interface ParameterAdapter {
    public function fromDataToParameter(array $data);
}
