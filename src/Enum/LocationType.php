<?php

namespace CountryPack\Enum;

enum LocationType: string
{
    case ADMINISTRATIVE_REGION = 'administrative_region';
    case HYDROGRAPHIC = 'hydrographic';
    case PARK = 'park';
    case SETTLEMENT = 'settlement';
    case ROAD = 'road';
    case SPOT = 'spot';
    case HYPSOGRAPHIC = 'hypsographic';
    case UNDERSEA = 'undersea';
    case VEGETATION = 'vegetation';
    case UNKNOWN = 'unknown';

    public static function fromWgdType(string $code): self
    {
        return match (strtoupper($code)) {
            'A' => self::ADMINISTRATIVE_REGION,  // Countries, provinces, states, districts, councils
            'H' => self::HYDROGRAPHIC,           // Rivers, lakes, bays, streams, canals, oceans
            'L' => self::PARK,                   // Reservations, regions, grazing areas
            'P' => self::SETTLEMENT,             // Towns, villages, settlements
            'R' => self::ROAD,                   // Roads, trails, railways
            'S' => self::SPOT,                   // Buildings, sites, ruins, wells, monuments
            'T' => self::HYPSOGRAPHIC,           // Mountains, hills, valleys, cliffs
            'U' => self::UNDERSEA,               // Underwater mountains, basins, trenches
            'V' => self::VEGETATION,             // Forests, orchards, vineyards, wooded areas
            default => self::UNKNOWN,
        };
    }
}
