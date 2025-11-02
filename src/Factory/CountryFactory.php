<?php

namespace CountryPack\Factory;

use CountryPack\Contracts\CountryCurrencyMapperInterface;
use CountryPack\Contracts\CountryDialCodeMapperInterface;
use CountryPack\Contracts\CountryImageMapperInterface;
use CountryPack\Contracts\CountryNameMapperInterface;
use CountryPack\Contracts\Iso3166CodeMapperInterface;
use CountryPack\Dto\CountryDto;
use CountryPack\Enum\Iso31661Alpha2;

final class CountryFactory
{

    public function __construct(
        private readonly CountryNameMapperInterface     $countryNameMapper,
        private readonly CountryDialCodeMapperInterface $countryDialCodeMapper,
        private readonly CountryCurrencyMapperInterface $countryCurrencyMapper,
        private readonly CountryImageMapperInterface    $countryImageMapper,
        private readonly Iso3166CodeMapperInterface     $isoCodeMapper,
        private readonly CurrencyFactory                $currencyFactory,
    )
    {
    }

    public function createFromIso31661Alpha2(Iso31661Alpha2 $iso31661Alpha2): CountryDto
    {
        $currency = null;
        $currencyIso = $this->countryCurrencyMapper->mapIso31661Alpha2ToIso4217($iso31661Alpha2);
        if ($currencyIso) {
            $currency = $this->currencyFactory->createFromIso4217($currencyIso);
        }

        $name = $this->countryNameMapper->mapIso31661Alpha2ToName($iso31661Alpha2);
        $dialCode = $this->countryDialCodeMapper->mapIso31661Alpha2ToDialCode($iso31661Alpha2);
        $iso31661Alpha3 = $this->isoCodeMapper->mapIso31661Alpha2ToIso31661Alpha3($iso31661Alpha2);
        $iso31661Numeric = $this->isoCodeMapper->mapIso31661Alpha2ToIso31661Numeric($iso31661Alpha2);
        $imagePath = $this->countryImageMapper->mapIso31661Alpha2ToImagePath($iso31661Alpha2);

        return new CountryDto(
            $name,
            $currency,
            $dialCode,
            $iso31661Alpha2,
            $iso31661Alpha3,
            $iso31661Numeric,
            $imagePath,
        );
    }
}