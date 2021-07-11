<?php

namespace Rabble\SeoBundle\EventListener;

use Rabble\ContentBundle\Event\DefaultFieldTypesEvent;
use Rabble\FieldTypeBundle\FieldType\ImageType;
use Rabble\FieldTypeBundle\FieldType\StringType;
use Rabble\FieldTypeBundle\FieldType\TextareaType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DefaultFieldTypesSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            DefaultFieldTypesEvent::class => 'registerDefaultFields',
        ];
    }

    public function registerDefaultFields(DefaultFieldTypesEvent $event): void
    {
        $event->addFieldType(new TextareaType([
            'name' => 'rabble:meta_description',
            'label' => 'content.meta_description',
            'component' => 'metadata',
            'required' => false,
            'translatable' => true,
            'translation_domain' => 'RabbleSeoBundle',
            'attr' => [
                'rows' => 5,
            ],
        ]));
        $event->addFieldType(new StringType([
            'name' => 'rabble:meta_keywords',
            'label' => 'content.meta_keywords',
            'component' => 'metadata',
            'required' => false,
            'translatable' => true,
            'translation_domain' => 'RabbleSeoBundle',
        ]));
        $event->addFieldType(new ImageType([
            'name' => 'rabble:og_image',
            'label' => 'content.og_image',
            'component' => 'metadata',
            'required' => false,
            'translation_domain' => 'RabbleSeoBundle',
        ]));
    }
}
