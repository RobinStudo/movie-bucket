<?php

namespace App\Core\Service;

use LogicException;

class ViewManager
{
    private const CONFIG_FILE = 'view';
    private array $config;

    public function __construct()
    {
        $configurationProvider = new ConfigurationProvider();
        $this->config = $configurationProvider->load(self::CONFIG_FILE);
    }

    public function render(string $viewPath): void
    {
        $path = $this->buildPath($this->config['layout_template']);
        $contentPath = $this->buildPath($viewPath);

        if (!file_exists($contentPath)) {
            throw new LogicException(sprintf('View "%s" does not exist', $viewPath));
        }

        require $path;
    }

    private function buildPath(string $viewPath): string
    {
        return sprintf('%s/%s.php', $this->config['directory'], $viewPath);
    }
}
