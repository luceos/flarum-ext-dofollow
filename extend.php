<?php

namespace Luceos\DoFollow;

use Flarum\Extend;

return [
    (new Extend\Link)
        ->setTarget(new SetTarget)
        ->setRel(new SetRel),
];
