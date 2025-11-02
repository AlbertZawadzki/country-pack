<?php

namespace CountryPack\Provider;

use CountryPack\Dto\StateDto;
use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Factory\CountryFactory;
use CountryPack\Factory\StateFactory;
use Generic\GenericCollection;
use RuntimeException;

class StateProvider
{
    public function __construct(
        private readonly CountryFactory $countryFactory,
        private readonly StateFactory $stateFactory,
    )
    {
    }

    /** @return GenericCollection<StateDto> */
    public function getAllForCountry(Iso31661Alpha2 $isoCode): GenericCollection
    {
        $country = $this->countryFactory->createFromIso31661Alpha2($isoCode);
        $states = new GenericCollection(StateDto::class);
        $statesDataFile = $this->loadStatesData();
        $countryStates = $statesDataFile[$country->iso31661Alpha2->value] ?? [];

        foreach ($countryStates as $countryState){
            $state = $this->stateFactory->createFromData($country, $countryState['name'], $countryState['state_code']);
            $states->add($state);
        }

        return $states;
    }

    private function loadStatesData(): array
    {
        $filePath = __DIR__ . '/../../Resources/data/en-states.json';

        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new RuntimeException("State data file is missing or not readable at: {$filePath}");
        }

        $jsonContent = file_get_contents($filePath);
        if ($jsonContent === false) {
            throw new RuntimeException("Failed to read state data file at: {$filePath}");
        }

        $data = json_decode($jsonContent, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Error decoding states JSON: ' . json_last_error_msg());
        }

        return $data;
    }
}