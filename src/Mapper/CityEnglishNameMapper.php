<?php

namespace CountryPack\Mapper;

use CountryPack\Contracts\CityNameMapperInterface;
use CountryPack\Dto\StateDto;

class CityEnglishNameMapper implements CityNameMapperInterface
{
    public function mapToName(StateDto $stateDto, string $name): string
    {
        return $name;
    }
}