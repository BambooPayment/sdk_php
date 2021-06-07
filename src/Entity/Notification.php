<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class Notification.
 */
class Notification extends BambooPaymentObject
{
    /** @var int */
    private $NotificationId;

    /** @var string */
    private $Created;

    /** @var int */
    private $ResourceType;

    /** @var string */
    private $ResourceUrl;

    /** @var string */
    private $ResourceObject;

    /**
     * @return int
     */
    public function getNotificationId(): int
    {
        return $this->NotificationId;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->Created;
    }

    /**
     * @return int
     */
    public function getResourceType(): int
    {
        return $this->ResourceType;
    }

    /**
     * @return string
     */
    public function getResourceUrl(): string
    {
        return $this->ResourceUrl;
    }

    /**
     * @return string
     */
    public function getResourceObject(): string
    {
        return $this->ResourceObject;
    }
}
