<?php

namespace Luceos\DoFollow;

use Flarum\Extend;

return [
    (new Extend\Formatter)
        ->configure(AddFollowAttribute::class)
        ->render(SetFollowAttributeForDomains::class),
];
