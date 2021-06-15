<?php

namespace Botble\Faq\Listeners;

use Botble\Base\Events\UpdatedContentEvent;
use Exception;
use MetaBox;

class UpdatedContentListener
{

    /**
     * Handle the event.
     *
     * @param UpdatedContentEvent $event
     * @return void
     */
    public function handle(UpdatedContentEvent $event)
    {
        try {
            MetaBox::saveMetaBoxData($event->data, 'faq_schema_config', $event->request->input('faq_schema_config'));
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
