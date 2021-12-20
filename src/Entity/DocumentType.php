<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class DocumentType.
 */
class DocumentType extends BambooPaymentObject
{
    /** @var int */
    private $id;

    /** @var string */
    private $description;

    /** @var string */
    private $abbreviation;

    /** @var bool */
    private $isPhysicalPerson;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAbbreviation(): string
    {
        return $this->abbreviation;
    }

    /**
     * @param string $abbreviation
     */
    public function setAbbreviation(string $abbreviation): void
    {
        $this->abbreviation = $abbreviation;
    }

    /**
     * @return bool
     */
    public function isPhysicalPerson(): bool
    {
        return $this->isPhysicalPerson;
    }

    /**
     * @param bool $isPhysicalPerson
     */
    public function setIsPhysicalPerson(bool $isPhysicalPerson): void
    {
        $this->isPhysicalPerson = $isPhysicalPerson;
    }
}
