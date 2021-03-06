<?php
namespace iRESTful\Rodson\Annotations\Infrastructure\Adapters;
use iRESTful\Rodson\Annotations\Domain\Parameters\Flows\Adapters\FlowAdapter;
use iRESTful\Rodson\Classes\Domain\Constructors\Parameters\Parameter as ConstructorParameter;
use iRESTful\Rodson\Annotations\Domain\Parameters\Flows\MethodChains\Adapters\MethodChainAdapter;
use iRESTful\Rodson\Annotations\Infrastructure\Objects\ConcreteAnnotationParameterFlow;

final class ConcreteAnnotationParameterFlowAdapter implements FlowAdapter {
    private $methodChainAdapter;
    public function __construct(MethodChainAdapter $methodChainAdapter) {
        $this->methodChainAdapter = $methodChainAdapter;
    }

    public function fromConstructorParameterToFlow(ConstructorParameter $constructorParameter) {

        $convert = function($propertyName) {

            $matches = [];
            preg_match_all('/[A-Z]{1}/s', $propertyName, $matches);

            if (!isset($matches[0]) || empty($matches[0])) {
                return $propertyName;
            }

            foreach($matches[0] as $oneElement) {
                $propertyName = str_replace($oneElement, '_'.strtolower($oneElement), $propertyName);
            }

            return $propertyName;
        };

        $propertyName = $constructorParameter->getProperty()->getName();
        $methodChain = $this->methodChainAdapter->fromConstructorParameterToMethodChain($constructorParameter);
        $keyname = $convert($propertyName);

        return new ConcreteAnnotationParameterFlow($propertyName, $methodChain, $keyname);
    }

}
