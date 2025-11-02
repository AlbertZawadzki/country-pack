<?php

namespace CountryPack\Contracts;

use CountryPack\Dto\CountryDto;
use CountryPack\Dto\StateDto;

interface CityNameMapperInterface
{
    public function mapToName(StateDto $stateDto, string $name): string;
}
