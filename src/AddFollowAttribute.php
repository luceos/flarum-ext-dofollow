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
                ->prependXslIf('$BLANK')
                ->appendXslAttribute('target', '_blank');

            $a
                ->prependXslIf('$FOLLOW and $BLANK')
                ->appendXslAttribute('rel', 'noopener');
            $a
                ->prependXslIf('$FOLLOW')
                ->appendXslAttribute('rel', '');

            $a
                ->prependXslIf('not($FOLLOW) or $FOLLOW=0')
                ->appendXslAttribute('rel', 'ugc noopener');
        }

        $dom->saveChanges();
    }
}
