<?php
namespace iRESTful\Rodson\DSLs\Domain\Projects\Converters\Adapters;

interface ConverterAdapter {
    public function fromDataToConverters(array $data);
    public function fromDataToConverter(array $data);
}
