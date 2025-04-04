<?php

namespace O4l3x4ndr3\SdkTecnospeedPlugMessage\Types;

class ButtonList
{
    private array $buttons;

    public function __construct()
    {
        $this->buttons = [];
    }

    public function addButton(string $type, string $phone, string $url, string $label, ?string $id = null): ButtonList
    {
        $this->buttons[] = array_filter([
            'id' => $id,
            'type' => $type,
            'phone' => $phone,
            'url' => $url,
            'label' => $label,
        ]);

        return $this;
    }

    public function clearButtons(): ButtonList
    {
        $this->buttons = [];
        return $this;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}