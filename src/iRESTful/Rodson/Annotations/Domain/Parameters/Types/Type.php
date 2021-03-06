<?php
namespace iRESTful\Rodson\Annotations\Domain\Parameters\Types;

interface Type {
    public function isUnique();
    public function isKey();
    public function hasDatabaseType();
    public function getDatabaseType();
    public function hasDefault();
    public function getDefault();
}
