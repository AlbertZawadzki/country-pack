<?php

namespace CountryPack\Provider;

use CountryPack\Dto\CountryDto;
use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Factory\CountryFactory;
use Generic\GenericCollection;

class CountryProvider
{
    public function __construct(
        private readonly CountryFactory $countryFactory,
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

            $country = $this->countryFactory->createFromIso31661Alpha2($iso31661Alpha2);
            $countriesCollection->add($country);
        }

        return $countriesCollection;
    }

    public function getByIso31661Alpha2(Iso31661Alpha2 $iso31661Alpha2): CountryDto
    {
        return $this->countryFactory->createFromIso31661Alpha2($iso31661Alpha2);
    }
}