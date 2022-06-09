<?php

namespace Luceos\DoFollow;

use Flarum\Foundation\Config;
use Laminas\Diactoros\Uri;
use s9e\TextFormatter\Renderer;
use s9e\TextFormatter\Utils;

class SetFollowAttributeForDomains
{
    public function __construct(Config $config)
    {
        $this->url = $config->url();
    }

    public function __invoke(Renderer $renderer, $context, string $xml)
    {
        return Utils::replaceAttributes($xml, 'URL', function ($attributes) {
            $uri = isset($attributes['url'])
                ? new Uri($attributes['url'])
                : null;

            $attributes['FOLLOW'] = $this->url->getHost() === $uri?->getHost() ? 1 : 0;

            return $attributes;
        });
    }
}
