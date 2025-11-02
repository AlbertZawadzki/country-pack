<?php

namespace CountryPack\Contracts;

use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Enum\Iso4217;

interface CountryCurrencyMapperInterface
{
    public function mapIso31661Alpha2ToIso4217(Iso31661Alpha2 $isoCode): ?Iso4217;
}
