<?php

namespace CountryPack\Factory;

use CountryPack\Contracts\CurrencyNameMapperInterface;
use CountryPack\Contracts\CurrencySignMapperInterface;
use CountryPack\Dto\CurrencyDto;
use CountryPack\Enum\Iso4217;

final class CurrencyFactory
{

    public function __construct(
        private readonly CurrencyNameMapperInterface $currencyNameMapper,
        private readonly CurrencySignMapperInterface $currencySignMapper,
    )
    {
    }

    public function createFromIso4217(Iso4217 $isoCode): CurrencyDto
    {
        $name = $this->currencyNameMapper->mapIso4217ToName($isoCode);
        $sign = $this->currencySignMapper->mapIso4217ToSign($isoCode);

        return new CurrencyDto(
            $isoCode,
            $name,
            $sign
        );
    }
}