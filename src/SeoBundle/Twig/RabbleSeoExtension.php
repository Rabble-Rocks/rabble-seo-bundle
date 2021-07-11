<?php

namespace Rabble\SeoBundle\Twig;

use Rabble\SeoBundle\Meta\MetaProviderInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RabbleSeoExtension extends AbstractExtension
{
    private MetaProviderInterface $metaProvider;

    public function __construct(MetaProviderInterface $metaProvider)
    {
        $this->metaProvider = $metaProvider;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('rabble_meta', [$this, 'render_meta'], ['is_safe' => ['html']]),
        ];
    }

    public function render_meta(array $content): string
    {
        return implode("\n", $this->metaProvider->provide($content));
    }
}
