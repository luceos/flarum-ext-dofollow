<?php

namespace Luceos\DoFollow;

use Laminas\Diactoros\Uri;

class SetTarget
{
    public function __invoke(Uri $uri, Uri $siteUrl, array $attributes)
    {
        return $uri->getHost() === $siteUrl->getHost() ? '_self' : '_blank';
    }
}
