<?php

namespace Edgar\EzUISites\Data;

class SiteData
{
    private $identifier;

    private $name;

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSite(): string
    {
        return $this->identifier;
    }
}
