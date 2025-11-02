<?php

namespace CountryPack\Contracts;

use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Enum\Iso4217;

interface CountryDialCodeMapperInterface
{
    public function mapIso31661Alpha2ToDialCode(Iso31661Alpha2 $isoCode): ?string;
}
