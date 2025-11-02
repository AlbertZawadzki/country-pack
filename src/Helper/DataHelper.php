<?php

namespace CountryPack\Helper;

use RuntimeException;

class DataHelper
{
    public function getStatesJson(): array
    {
        $filePath = __DIR__ . '/../../Resources/data/en-states.json';

        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new RuntimeException("State data file is missing or not readable at: {$filePath}");
        }

        $jsonContent = file_get_contents($filePath);
        if ($jsonContent === false) {
            throw new RuntimeException("Failed to read state data file at: {$filePath}");
        }

        $data = json_decode($jsonContent, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Error decoding states JSON: ' . json_last_error_msg());
        }

        return $data;
    }
}