<?php
namespace iRESTful\Rodson\ClassesTests\Infrastructure\Adapters;
use iRESTful\Rodson\ClassesTests\Domain\Transforms\Adapters\TransformAdapter;
use iRESTful\Rodson\ClassesEntitiesAnnotations\Domain\AnnotatedEntity;
use iRESTful\Rodson\Classes\Infrastructure\Objects\ConcreteNamespace;
use iRESTful\Rodson\ClassesTests\Infrastructure\Objects\ConcreteTestTransform;
use iRESTful\Rodson\ClassesConfigurations\Domain\Adapters\ConfigurationAdapter;
use iRESTful\Rodson\ClassesConfigurations\Domain\Configuration;
use iRESTful\Rodson\ClassesTests\Domain\Transforms\Exceptions\TransformException;

final class ConcreteTestTransformAdapter implements TransformAdapter {
    private $baseNamespaces;
    public function __construct(array $baseNamespaces) {
        $this->baseNamespaces = $baseNamespaces;
    }

    public function fromDataToTransforms(array $data) {

        if (!isset($data['annotated_entities'])) {
            throw new TransformException('The annotated_entities keyname is mandatory in order to convert data to Transform objects.');
        }

        if (!isset($data['configuration'])) {
            throw new TransformException('The configuration keyname is mandatory in order to convert data to Transform objects.');
        }

        $output = [];
        foreach($data['annotated_entities'] as $oneAnnotatedEntity) {
            $output[] = $this->fromAnnotatedEntityToTransform($oneAnnotatedEntity, $data['configuration']);
        }

        return $output;

    }

    private function fromAnnotatedEntityToTransform(AnnotatedEntity $annotatedEntity, Configuration $configuration) {

        $name = $annotatedEntity->getEntity()->getInterface()->getNamespace()->getName().'Test';
        $namespace = new ConcreteNamespace(array_merge($this->baseNamespaces, [
            'Tests',
            'Tests',
            'Functional',
            'Entities',
            $name
        ]));

        $samples = $annotatedEntity->getSamples();
        return new ConcreteTestTransform($namespace, $samples, $configuration);
    }

}
