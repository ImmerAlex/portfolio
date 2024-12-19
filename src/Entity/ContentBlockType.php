<?php

namespace App\Entity;

use App\Repository\ContentBlockTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContentBlockTypeRepository::class)]
class ContentBlockType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, ContentBlock>
     */
    #[ORM\OneToMany(targetEntity: ContentBlock::class, mappedBy: 'contentType')]
    private Collection $contentBlocks;

    public function __construct()
    {
        $this->contentBlocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, ContentBlock>
     */
    public function getContentBlocks(): Collection
    {
        return $this->contentBlocks;
    }

    public function addContentBlock(ContentBlock $contentBlock): static
    {
        if (!$this->contentBlocks->contains($contentBlock)) {
            $this->contentBlocks->add($contentBlock);
            $contentBlock->setContentType($this);
        }

        return $this;
    }

    public function removeContentBlock(ContentBlock $contentBlock): static
    {
        if ($this->contentBlocks->removeElement($contentBlock)) {
            // set the owning side to null (unless already changed)
            if ($contentBlock->getContentType() === $this) {
                $contentBlock->setContentType(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
