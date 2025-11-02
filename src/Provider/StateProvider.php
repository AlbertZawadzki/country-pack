<?php

namespace CountryPack\Provider;

use CountryPack\Dto\StateDto;
use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Factory\CountryFactory;
use CountryPack\Factory\StateFactory;
use CountryPack\Helper\DataHelper;
use Generic\GenericCollection;

class StateProvider
{
    public function __construct(
        private readonly CountryFactory $countryFactory,
        private readonly StateFactory   $stateFactory,
        private readonly DataHelper     $dataHelper,
    )
    {
    }

    /** @return GenericCollection<StateDto> */
    public function getAllForCountry(Iso31661Alpha2 $isoCode): GenericCollection
    {
        $country = $this->countryFactory->createFromIso31661Alpha2($isoCode);
        $states = new GenericCollection(StateDto::class);
        $statesDataFile = $this->dataHelper->getStatesJson();
        $countryStates = $statesDataFile[$country->iso31661Alpha2->value] ?? [];

        foreach ($countryStates as $countryState) {
            $state = $this->stateFactory->createFromData($country, $countryState['name'], $countryState['code']);
            $states->add($state);
        }

        return $states;
    }
}