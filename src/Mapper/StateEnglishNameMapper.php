<?php

namespace CountryPack\Mapper;

use CountryPack\Contracts\StateNameMapperInterface;
use CountryPack\Dto\CountryDto;

class StateEnglishNameMapper implements StateNameMapperInterface
{
    public function mapToName(CountryDto $countryDto, string $name): string
    {
        return $name;
    }
}