<?php

namespace CountryPack\Contracts;

use CountryPack\Dto\CurrencyDto;
use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Enum\Iso4217;

interface CurrencyNameMapperInterface
{
    public function mapIso4217ToName(Iso4217 $isoCode): ?string;
}
