<?php

namespace BambooPayment\Entity;

use GeneratedHydrator\Configuration;
use GeneratedHydrator\GeneratedHydrator;
use function get_class;

class BambooPaymentObject
{
    private function getHydrator(): GeneratedHydrator
    {
        $config        = new Configuration(get_class($this));
        $hydratorClass = $config->createFactory()->getHydratorClass();

        return new $hydratorClass();
    }

    public function hydrate(array $data): self
    {
        $object = $this->getObjectClass();

        $hydrator = $this->getHydrator();
        $hydrator->hydrate($data, $object);

        return $object;
    }

    public function toArray(): array
    {
        return $this->getHydrator()->extract($this);
    }

    private function getObjectClass(): self
    {
        $class = get_class($this);

        return new $class();
    }
}
