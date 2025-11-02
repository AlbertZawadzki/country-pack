<?php

namespace CountryPack\Contracts;

use CountryPack\Dto\CountryDto;

interface StateNameMapperInterface
{
    public function mapToName(CountryDto $countryDto, string $name): string;
}
