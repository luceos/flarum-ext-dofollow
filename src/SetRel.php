<?php

namespace Luceos\DoFollow;

use Laminas\Diactoros\Uri;

class SetRel
{
    public function __invoke(Uri $uri, Uri $siteUrl, array $attributes)
    {
        return $uri->getHost() === $siteUrl->getHost() ? 'ugc' : 'noopener ugc nofollow';
    }
}
