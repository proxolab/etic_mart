<?php

namespace Botble\Faq\Listeners;

use Botble\Base\Events\CreatedContentEvent;
use Exception;
use MetaBox;

class CreatedContentListener
{

    /**
     * Handle the event.
     *
     * @param CreatedContentEvent $event
     * @return void
     */
    public function handle(CreatedContentEvent $event)
    {
        try {
            MetaBox::saveMetaBoxData($event->data, 'faq_schema_config', $event->request->input('faq_schema_config'));
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
