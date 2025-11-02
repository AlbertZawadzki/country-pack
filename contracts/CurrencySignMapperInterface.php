<?php

namespace CountryPack\Contracts;

use CountryPack\Enum\Iso4217;

interface CurrencySignMapperInterface
{
    public function mapIso4217ToSign(Iso4217 $isoCode): ?string;
}
