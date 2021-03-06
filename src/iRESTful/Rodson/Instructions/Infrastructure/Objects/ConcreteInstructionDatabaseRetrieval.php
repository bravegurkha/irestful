<?php
namespace iRESTful\Rodson\Instructions\Infrastructure\Objects;
use iRESTful\Rodson\Instructions\Domain\Databases\Retrievals\Retrieval;
use iRESTful\Rodson\DSLs\Domain\Projects\Controllers\HttpRequests\HttpRequest;
use iRESTful\Rodson\Instructions\Domain\Databases\Retrievals\Entities\Entity;
use iRESTful\Rodson\Instructions\Domain\Databases\Retrievals\Multiples\MultipleEntity;
use iRESTful\Rodson\Instructions\Domain\Databases\Retrievals\EntityPartialSets\EntityPartialSet;
use iRESTful\Rodson\Instructions\Domain\Databases\Retrievals\Exceptions\RetrievalException;
use iRESTful\Rodson\Instructions\Domain\Databases\Retrievals\Relations\RelatedEntity;

final class ConcreteInstructionDatabaseRetrieval implements Retrieval {
    private $httpRequest;
    private $entity;
    private $multipleEntity;
    private $entityPartialSet;
    private $relatedEntity;
    public function __construct(HttpRequest $httpRequest = null, Entity $entity = null, MultipleEntity $multipleEntity = null, EntityPartialSet $entityPartialSet = null, RelatedEntity $relatedEntity = null) {

        $amount = (empty($httpRequest) ? 0 : 1) + (empty($entity) ? 0 : 1) + (empty($multipleEntity) ? 0 : 1) + (empty($entityPartialSet) ? 0 : 1) + (empty($relatedEntity) ? 0 : 1);
        if ($amount != 1) {
            throw new RetrievalException('One of these must be non-empty: httpRequest, entity, multipleEntity, entityPartialSet, relatedEntity.  '.$amount.' given.');
        }

        if (!empty($httpRequest)) {
            $action = $httpRequest->getCommand()->getAction();
            if (!$action->isRetrieval()) {
                throw new ActionException('The given HttpRequest object is invalid for a retrieval.  It must be contain a retrieval action.');
            }
        }

        $this->httpRequest = $httpRequest;
        $this->entity = $entity;
        $this->multipleEntity = $multipleEntity;
        $this->entityPartialSet = $entityPartialSet;
        $this->relatedEntity = $relatedEntity;

    }

    public function hasHttpRequest() {
        return !empty($this->httpRequest);
    }

    public function getHttpRequest() {
        return $this->httpRequest;
    }

    public function hasEntity() {
        return !empty($this->entity);
    }

    public function getEntity() {
        return $this->entity;
    }

    public function hasMultipleEntities() {
        return !empty($this->multipleEntity);
    }

    public function getMultipleEntities() {
        return $this->multipleEntity;
    }

    public function hasEntityPartialSet() {
        return !empty($this->entityPartialSet);
    }

    public function getEntityPartialSet() {
        return $this->entityPartialSet;
    }

    public function hasRelatedEntity() {
        return !empty($this->relatedEntity);
    }

    public function getRelatedEntity() {
        return $this->relatedEntity;
    }

    public function getData() {
        $output = [];
        if ($this->hasHttpRequest()) {
            $output['http_request'] = $this->getHttpRequest()->getData();
        }

        if ($this->hasEntity()) {
            $output['entity'] = $this->getEntity()->getData();
        }

        if ($this->hasMultipleEntities()) {
            $output['entities'] = $this->getMultipleEntities()->getData();
        }

        if ($this->hasEntityPartialSet()) {
            $output['entity_partial_set'] = $this->getEntityPartialSet()->getData();
        }

        return $output;

    }

}
