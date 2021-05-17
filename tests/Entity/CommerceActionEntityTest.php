<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\CommerceAction;
use BambooPaymentTests\BaseTest;

/**
 * Class RecurrentPaymentInfoEntityTest
 * @package BambooPaymentTests\Entity
 */
class CommerceActionEntityTest extends BaseTest
{
    private const ACTION_TYPE   = 'ActionType';
    private const ACTION_REASON = 'ActionReason';
    private const ACTION_URL    = 'ActionURL';


    public function testHydrate(): void
    {
        $commerceAction = new CommerceAction();
        $data           = $this->getDataOfCommerceAction();

        /** @var CommerceAction $refund */
        $commerceAction = $commerceAction->hydrate($data);

        self::assertEquals($data[self::ACTION_TYPE], $commerceAction->getActionType());
        self::assertEquals($data[self::ACTION_REASON], $commerceAction->getActionReason());
        self::assertEquals($data[self::ACTION_URL], $commerceAction->getActionURL());
    }

    private function getDataOfCommerceAction(): array
    {
        return [
            self::ACTION_TYPE   => 1,
            self::ACTION_REASON => 'action reason',
            self::ACTION_URL    => 'url'
        ];
    }
}
