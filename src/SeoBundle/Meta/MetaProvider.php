<?php

namespace Rabble\SeoBundle\Meta;

use Rabble\SeoBundle\Meta\Tag\MetaTag;

class MetaProvider implements MetaProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function provide(array $content): array
    {
        $tags = [];
        if (isset($content['rabble:meta_description'])) {
            $tags[] = new MetaTag('meta', [
                'name' => 'description',
                'content' => $content['rabble:meta_description'],
            ]);
            $tags[] = new MetaTag('meta', [
                'name' => 'og:description',
                'content' => $content['rabble:meta_description'],
            ]);
        }
        if (isset($content['rabble:meta_keywords'])) {
            $tags[] = new MetaTag('meta', [
                'name' => 'keywords',
                'content' => $content['rabble:meta_keywords'],
            ]);
        }
        if (isset($content['title'])) {
            $tags[] = new MetaTag('meta', [
                'property' => 'og:title',
                'content' => $content['title'],
            ]);
        }
        if (isset($content['rabble:og_image'])) {
            $tags[] = new MetaTag('meta', [
                'property' => 'og:image',
                'content' => $content['rabble:og_image'],
            ]);
        }

        return $tags;
    }
}
