<?php

namespace Rabble\SeoBundle\Meta\Tag;

class MetaTag
{
    private string $tag;
    private array $attributes;
    private ?string $content;

    public function __construct(string $tag, array $attributes, ?string $content = null)
    {
        $this->tag = $tag;
        $this->attributes = $attributes;
        $this->content = $content;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function render(): string
    {
        $tag = '<'.$this->tag;
        foreach ($this->attributes as $key => $value) {
            $tag .= sprintf(' %s="%s"', $key, addcslashes($value, '"'));
        }
        if (null === $this->content) {
            return $tag.' />';
        }
        $tag .= '>'.$this->content.'</'.$this->tag.'>';

        return $tag;
    }
}
