<?php

namespace CountryPack\Enum;

enum LocationNameType: string
{
    case OFFICIAL = 'official';
    case BASE = 'base';
    case COLLOQUIAL = 'colloquial';
    case SHORT = 'short';
    case HISTORIC = 'historic';
    case VARIANT = 'variant';
    case PROVISIONAL = 'provisional';
    case QUARTER = 'quarter';
    case ESTIMATED = 'estimated';
    case SECTION = 'section';
    case TRANSLITERATION = 'transliteration';
    case EXONYM = 'exonym';
    case UNKNOWN = 'unknown';

    public static function fromWgdType(string $code): self
    {
        return match (strtoupper($code)) {
            'N' => self::OFFICIAL,        // Official, approved name
            'B' => self::BASE,            // Base name (root, without generic)
            'C' => self::COLLOQUIAL,      // Common, informal name
            'D' => self::SHORT,           // Abbreviated or short name
            'H' => self::HISTORIC,        // No longer used officially
            'V' => self::VARIANT,         // Alternate name
            'P' => self::PROVISIONAL,     // Temporary or unverified
            'Q' => self::QUARTER,         // Subdivision of a city/town
            'E' => self::ESTIMATED,       // Approximate or uncertain
            'X' => self::SECTION,         // Section of a feature (e.g., PPLX)
            'T' => self::TRANSLITERATION, // Transliteration of the name
            'Z' => self::EXONYM,          // Name used in a foreign language
            default => self::UNKNOWN,
        };
    }
}
