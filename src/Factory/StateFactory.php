<?php

namespace CountryPack\Factory;

use CountryPack\Contracts\StateNameMapperInterface;
use CountryPack\Dto\CountryDto;
use CountryPack\Dto\StateDto;

final class StateFactory
{
    public function __construct(
        private readonly StateNameMapperInterface $stateNameMapper,
    )
    {
    }

    public function createFromData(CountryDto $countryDto, string $name, ?string $code): StateDto
    {
        $name = $this->stateNameMapper->mapToName($countryDto, $name);

        return new StateDto(
            $countryDto,
            $name,
            $code,
        );
    }
}