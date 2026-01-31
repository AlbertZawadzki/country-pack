<?php

namespace CountryPack\Provider;

use CountryPack\Dto\LocationDto;
use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Factory\LocationFactory;
use Generic\Coder\CsvDecoder;
use Generic\GenericCollection;

class LocationProvider
{
    private CsvDecoder $csvDecoder;

    public function __construct(
        private readonly LocationFactory $locationFactory,
    )
    {
        $this->csvDecoder = new CsvDecoder();
    }

    private function getCsvFileContent(Iso31661Alpha2 $iso31661Alpha2): array
    {
        $outputDir = __DIR__ . "/../../Resources/data/locations/" . strtolower($iso31661Alpha2->value);
        if (!is_dir($outputDir)) {
            return [];
        }

        $allData = [];
        $csvFiles = glob($outputDir . '/*.csv');
        sort($csvFiles, SORT_NATURAL);

        foreach ($csvFiles as $filePath) {
            if (!is_readable($filePath)) {
                continue;
            }

            $fileLines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (empty($fileLines)) {
                continue;
            }

            $decoded = $this->csvDecoder->decodeCsv($fileLines);
            $allData = array_merge($allData, $decoded);
        }

        return $allData;
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