<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class NotificationInfo.
 */
class NotificationInfo extends BambooPaymentObject
{
    /** @var string */
    private $ProcessType;

    /** @var int */
    private $ProcessStatus;

    /**
     * @return string
     */
    public function getProcessType(): string
    {
        return $this->ProcessType;
    }

    /**
     * @return int
     */
    public function getProcessStatus(): int
    {
        return $this->ProcessStatus;
    }
}
