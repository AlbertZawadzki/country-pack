<?php

namespace CountryPack\Mapper;

use CountryPack\Contracts\CountryImageMapperInterface;
use CountryPack\Enum\Iso31661Alpha2;

class CountryImageMapper implements CountryImageMapperInterface
{
    public function mapIso31661Alpha2ToImagePath(Iso31661Alpha2 $isoCode): ?string
    {
        return match ($isoCode) {
            Iso31661Alpha2::XX,
            Iso31661Alpha2::T1
            => null,
            default => sprintf('https://flagcdn.com/w640/%s.png', strtolower($isoCode->name)),
        };
    }
}