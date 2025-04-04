<?php

namespace O4l3x4ndr3\SdkTecnospeedPlugMessage\Types;

class OptionList
{
    private ?string $title;
    private ?string $buttonLabel;
    private ?array $options;

    /**
     * @param string|null $title
     * @param string|null $buttonLabel
     * @param array|null $options
     */
    public function __construct(?string $title = null, ?string $buttonLabel = null, ?array $options = null)
    {
        $this->title = $title;
        $this->buttonLabel = $buttonLabel;
        $this->options = $options;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): OptionList
    {
        $this->title = $title;
        return $this;
    }

    public function addOptions(string $title, string $description, ?string $id = null): OptionList
    {
        $this->options[] = array_filter([
            'id' => $id,
            'title' => $title,
            'description' => $description,
        ]);

        return $this;
    }

    public function clearOptions(): OptionList
    {
        $this->options = [];
        return $this;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}