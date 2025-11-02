<?php

namespace CountryPack\Factory;

use CountryPack\Contracts\CityNameMapperInterface;
use CountryPack\Dto\CityDto;
use CountryPack\Dto\StateDto;

final class CityFactory
{
    public function __construct(
        private readonly CityNameMapperInterface $cityNameMapper,
    )
    {
    }

    public function createFromData(StateDto $stateDto, array $cityData): CityDto
    {
        $name = $this->cityNameMapper->mapToName($stateDto, $cityData['name']);

        return new CityDto(
            $stateDto,
            $name,
            null,
            null,
        );
    }
}