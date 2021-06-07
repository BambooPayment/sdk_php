<?php

/** @noinspection ALL */

namespace BambooPayment\Entity;

/**
 * Class CommerceAction.
 */
class CommerceAction extends BambooPaymentObject
{
    /** @var int */
    private $ActionType;

    /** @var string */
    private $ActionReason;

    /** @var string */
    private $ActionURL;

    /**
     * @return int
     */
    public function getActionType(): int
    {
        return $this->ActionType;
    }

    /**
     * @return string
     */
    public function getActionReason(): string
    {
        return $this->ActionReason;
    }

    /**
     * @return string
     */
    public function getActionURL(): string
    {
        return $this->ActionURL;
    }
}
