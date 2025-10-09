<?php

namespace CountryPack\Provider;

use CountryPack\Contracts\CountryImageMapperInterface;
use CountryPack\Contracts\CountryNameMapperInterface;
use CountryPack\Contracts\IsoCodeMapperInterface;
use CountryPack\Dto\CountryDto;
use CountryPack\Enum\Iso31661Alpha2;
use Generic\GenericCollection;

class CountryProvider
{
    public function __construct(
        private readonly CountryNameMapperInterface  $countryNameMapper,
        private readonly CountryImageMapperInterface $countryImageMapper,
        private readonly IsoCodeMapperInterface      $isoCodeMapper,
    )
    {
    }

    /** @return GenericCollection<CountryDto> */
    public function getAll(bool $withFakes = true): GenericCollection
    {
        $countriesCollection = new GenericCollection(CountryDto::class);
        $fakes = [
            Iso31661Alpha2::XX,
            Iso31661Alpha2::T1,
        ];

        foreach (Iso31661Alpha2::cases() as $iso31661Alpha2) {
            if (!$withFakes && in_array($iso31661Alpha2, $fakes, true)) {
                continue;
            }

            $name = $this->countryNameMapper->mapIso31661Alpha2ToName($iso31661Alpha2);
            $iso31661Alpha3 = $this->isoCodeMapper->mapIso31661Alpha2ToIso31661Alpha3($iso31661Alpha2);
            $iso31661Numeric = $this->isoCodeMapper->mapIso31661Alpha2ToIso31661Numeric($iso31661Alpha2);
            $imagePath = $this->countryImageMapper->mapIso31661Alpha2ToImagePath($iso31661Alpha2);

            $country = new CountryDto(
                $name,
                $iso31661Alpha2,
                $iso31661Alpha3,
                $iso31661Numeric,
                $imagePath,
            );
            $countriesCollection->add($country);
        }

        return $countriesCollection;
    }

    public function getByIso31661Alpha2(Iso31661Alpha2 $iso31661Alpha2): CountryDto
    {
        $name = $this->countryNameMapper->mapIso31661Alpha2ToName($iso31661Alpha2);
        $iso31661Alpha3 = $this->isoCodeMapper->mapIso31661Alpha2ToIso31661Alpha3($iso31661Alpha2);
        $iso31661Numeric = $this->isoCodeMapper->mapIso31661Alpha2ToIso31661Numeric($iso31661Alpha2);
        $imagePath = $this->countryImageMapper->mapIso31661Alpha2ToImagePath($iso31661Alpha2);

        return new CountryDto(
            $name,
            $iso31661Alpha2,
            $iso31661Alpha3,
            $iso31661Numeric,
            $imagePath,
        );
    }
}