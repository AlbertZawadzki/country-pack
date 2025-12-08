<?php

namespace CountryPack\Contracts;

use CountryPack\Dto\CountryDto;
use CountryPack\Dto\LocationDto;

interface LocationNameMapperInterface
{
    public function mapToName(array $locationData): string;
}
