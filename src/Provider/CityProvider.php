<?php

namespace CountryPack\Provider;

use CountryPack\Dto\CityDto;
use CountryPack\Dto\StateDto;
use CountryPack\Factory\CityFactory;
use CountryPack\Helper\DataHelper;
use Generic\GenericCollection;

class CityProvider
{
    public function __construct(
        private readonly CityFactory $cityFactory,
        private readonly DataHelper  $dataHelper,
    )
    {
    }

    /** @return GenericCollection<CityDto> */
    public function getAllForState(StateDto $stateDto): GenericCollection
    {
        $statesDataFile = $this->dataHelper->getStatesJson();
        $statesData = $statesDataFile[$stateDto->country->iso31661Alpha2->value] ?? [];
        $cities = new GenericCollection(CityDto::class);

        foreach ($statesData as $stateData) {
            if ($stateData['name'] !== $stateDto->name) {
                continue;
            }

            foreach ($stateData['cities'] as $cityData) {
                $city = $this->cityFactory->createFromData($stateDto, $cityData);
                $cities->add($city);
            }
        }

        return $cities;
    }
}