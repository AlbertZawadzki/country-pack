<?php

namespace CountryPack\Contracts;

use CountryPack\Enum\Iso31661Alpha2;

interface CountryNameMapperInterface
{
    public function mapIso31661Alpha2ToName(Iso31661Alpha2 $isoCode): ?string;
}
