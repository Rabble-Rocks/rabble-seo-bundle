<?php

namespace Rabble\SeoBundle\Meta;

use Rabble\SeoBundle\Meta\Tag\MetaTag;

interface MetaProviderInterface
{
    /**
     * @return MetaTag[]
     */
    public function provide(array $content): array;
}
