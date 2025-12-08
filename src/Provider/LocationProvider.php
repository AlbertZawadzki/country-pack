<?php

namespace CountryPack\Provider;

use CountryPack\Dto\LocationDto;
use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Factory\LocationFactory;
use Generic\Decoder\CsvDecoder;
use Generic\GenericCollection;

class LocationProvider
{
    public function __construct(
        private readonly LocationFactory $locationFactory,
        private readonly CsvDecoder      $csvDecoder,
    )
    {
    }

    private function getCsvFileContent(Iso31661Alpha2 $iso31661Alpha2): array
    {
        $fileName = strtolower($iso31661Alpha2->value . '.csv');
        $filePath = __DIR__ . "/../../Resources/data/locations/{$fileName}";

        if (!file_exists($filePath) || !is_readable($filePath)) {
            return [];
        }

        $data = file($filePath);

        return $this->csvDecoder->decodeCsv($data);
    }

    /** @return GenericCollection<LocationDto> */
    public function getAllLocationsForCountry(Iso31661Alpha2 $iso31661Alpha2): GenericCollection
    {
        $locationsData = $this->getCsvFileContent($iso31661Alpha2);
        $locations = new GenericCollection(LocationDto::class);

        foreach ($locationsData as $locationData) {
            $location = $this->locationFactory->createFromData($locationData);
            $locations->add($location);
        }

        return $locations;
    }
}