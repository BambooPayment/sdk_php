<?php

namespace BambooPayment\Entity;

use GeneratedHydrator\Configuration;
use function get_class;

/**
 * Class BambooPaymentObject.
 */
class BambooPaymentObject
{
    private function getHydrator()
    {
        $config        = new Configuration(get_class($this));
        $hydratorClass = $config->createFactory()->getHydratorClass();

        return new $hydratorClass();
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function hydrate(array $data): BambooPaymentObject
    {
        $object = $this->getObjectClass();

        $hydrator = $this->getHydrator();
        $hydrator->hydrate($data, $object);

        return $object;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->getHydrator()->extract($this);
    }

    /**
     * @return $this
     */
    private function getObjectClass(): self
    {
        $class = get_class($this);

        return new $class();
    }
}
