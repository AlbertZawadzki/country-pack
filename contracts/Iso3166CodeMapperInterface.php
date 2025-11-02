<?php

namespace CountryPack\Contracts;

use CountryPack\Enum\Iso31661Alpha2;
use CountryPack\Enum\Iso31661Alpha3;
use CountryPack\Enum\Iso31661Numeric;

interface Iso3166CodeMapperInterface
{
    public function mapIso31661Alpha2ToIso31661Alpha3(Iso31661Alpha2 $isoCode): ?Iso31661Alpha3;

    public function mapIso31661Alpha3ToIso31661Alpha2(Iso31661Alpha3 $isoCode): ?Iso31661Alpha2;

    public function mapIso31661Alpha2ToIso31661Numeric(Iso31661Alpha2 $isoCode): ?Iso31661Numeric;

    public function mapIso31661NumericToIso31661Alpha2(Iso31661Numeric $isoCode): ?Iso31661Alpha2;

    public function mapIso31661Alpha3ToIso31661Numeric(Iso31661Alpha3 $isoCode): ?Iso31661Numeric;

    public function mapIso31661NumericToIso31661Alpha3(Iso31661Numeric $isoCode): ?Iso31661Alpha3;
}
