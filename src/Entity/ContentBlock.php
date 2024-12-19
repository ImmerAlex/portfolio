<?php

namespace App\Entity;

use App\Repository\ContentBlockRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContentBlockRepository::class)]
class ContentBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::INTEGER)]
    private ?int $blockIndex = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'contentBlocks')]
    private ?ContentBlockType $contentType = null;

    #[ORM\ManyToOne(inversedBy: 'contentBlocks')]
    private ?Project $project = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlockIndex(): ?int
    {
        return $this->blockIndex;
    }

    public function setBlockIndex(int $blockIndex): static
    {
        $this->blockIndex = $blockIndex;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getContentType(): ?ContentBlockType
    {
        return $this->contentType;
    }

    public function setContentType(?ContentBlockType $contentType): static
    {
        $this->contentType = $contentType;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): static
    {
        $this->project = $project;

        return $this;
    }

    public function __toString(): string
    {
        return $this->blockIndex;
    }
}
