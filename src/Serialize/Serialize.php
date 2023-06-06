<?php

namespace GuiChaves\Serialize;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

class Serialize implements SerializeAdapterInterface
{
    public function __construct(private SerializerInterface $serializer) {}

    public function serialize(mixed $data, string $format, ?SerializationContext $context = null, ?string $type = null)
    {
        return $this->serializer->serialize($data, $format);
    }

    public function deserialize(string $data, string $type, string $format, ?DeserializationContext $context = null)
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}