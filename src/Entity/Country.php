<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Country.
 */
class Country extends BambooPaymentObject
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $isoCode;

    /** @var string */
    private $phonePrefix;

    /** @var string */
    private $keywords;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    /**
     * @return string
     */
    public function getPhonePrefix(): string
    {
        return $this->phonePrefix;
    }

    /**
     * @return string
     */
    public function getKeywords(): string
    {
        return $this->keywords;
    }
}
