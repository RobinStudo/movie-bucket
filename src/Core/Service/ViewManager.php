<?php

namespace App\Core\Service;

use App\Core\Util\UrlHelper;
use LogicException;

class ViewManager
{
    private const CONFIG_FILE = 'view';
    private array $config;

    public function __construct(private ConfigurationProvider $configurationProvider)
    {
        $this->config = $this->configurationProvider->load(self::CONFIG_FILE);
    }

    public function render(string $viewPath, array $data = []): void
    {
        $path = $this->buildPath($this->config['layout_template']);
        $contentPath = $this->buildPath($viewPath);

        if (!file_exists($contentPath)) {
            throw new LogicException(sprintf('View "%s" does not exist', $viewPath));
        }

        require $path;
    }

    private function asset(string $path): string
    {
        return UrlHelper::getBasePath() . $path;
    }

    private function buildPath(string $viewPath): string
    {
        return sprintf('%s/%s.php', $this->config['directory'], $viewPath);
    }
}
