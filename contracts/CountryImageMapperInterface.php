<?php

namespace CountryPack\Contracts;

use CountryPack\Enum\Iso31661Alpha2;

interface CountryImageMapperInterface
{
    public function mapIso31661Alpha2ToImagePath(Iso31661Alpha2 $isoCode): ?string;
}
