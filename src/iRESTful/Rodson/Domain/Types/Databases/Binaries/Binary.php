<?php
namespace iRESTful\Rodson\Domain\Types\Databases\Binaries;

interface Binary {
    public function hasSpecificBitSize();
    public function getSpecificBitSize();
    public function hasMaxBitSize();
    public function getMaxBitSize();
}
