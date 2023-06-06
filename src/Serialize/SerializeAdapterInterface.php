<?php

namespace GuiChaves\Serialize;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;

interface SerializeAdapterInterface
{
    public function serialize($data, string $format, ?SerializationContext $context = null, ?string $type = null);

    public function deserialize(string $data, string $type, string $format, ?DeserializationContext $context = null);
}