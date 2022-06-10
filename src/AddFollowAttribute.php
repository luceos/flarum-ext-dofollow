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
            $a->prependXslCopyOf('@target');
            $a->prependXslCopyOf('@rel');
        }

        $dom->saveChanges();
    }
}
