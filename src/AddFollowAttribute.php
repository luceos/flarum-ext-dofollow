<?php

namespace Luceos\DoFollow;

use s9e\SweetDOM\Element;
use s9e\TextFormatter\Configurator;

class AddFollowAttribute
{
    public function __invoke(Configurator $configurator)
    {
        /** @var Configurator\Items\Template $template */
        $template = $configurator->tags['URL']->template;
        $dom = $template->asDOM();

        /** @var Element $a */
        foreach ($dom->getElementsByTagName('a') as $a) {
            $a->removeAttribute('rel');

            $a
                ->prependXslIf('$FOLLOW=1')
                ->appendXslAttribute('rel', 'dofollow ugc noopener');

            $a
                ->prependXslIf('not($FOLLOW) or $FOLLOW=0')
                ->appendXslAttribute('rel', 'ugc noopener');
        }

        $dom->saveChanges();
    }
}
