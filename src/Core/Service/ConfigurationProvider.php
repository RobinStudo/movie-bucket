<?php

namespace App\Core\Service;

use LogicException;
use Symfony\Component\Yaml\Yaml;

class ConfigurationProvider
{
    private const CONFIG_PATH = '../config';

    public function load(string $configFile): array
    {
        $path = sprintf('%s/%s.yaml', self::CONFIG_PATH, $configFile);

        if (!file_exists($path)) {
            throw new LogicException(sprintf('Configuration file "%s" does not exist.', $configFile));
        }

        return Yaml::parseFile($path);
    }
}
