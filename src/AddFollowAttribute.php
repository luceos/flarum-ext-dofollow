<?php

namespace Luceos\DoFollow;

use s9e\SweetDOM\Element;
use s9e\TextFormatter\Configurator;

class AddFollowAttribute
{
    public function __invoke(Configurator $configurator)
    {
        $dom = $configurator->tags['URL']->template->asDOM();

        /** @var Element $a */
        foreach ($dom->getElementByTagName('a') as $a) {
//            $a->removeAttribute('rel');
            $a->prependXslIf('$FOLLOW')->appendXslAttribute('rel', 'dofollow');
        }

        $dom->saveChanges();
    }
}
