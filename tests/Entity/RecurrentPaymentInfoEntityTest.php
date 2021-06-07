<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\RecurrentPaymentInfo;
use BambooPaymentTests\BaseTest;

/**
 * Class RecurrentPaymentInfoEntityTest
 * @package BambooPaymentTests\Entity
 */
class RecurrentPaymentInfoEntityTest extends BaseTest
{
    private const FIRST_TRANSACTION   = 'FirstTransaction';
    private const RECURRING_INDICATOR = 'RecurringIndicator';


    public function testHydrate(): void
    {
        $recurrentPaymentInfo = new RecurrentPaymentInfo();
        $data                 = $this->getDataOfRecurrentPaymentInfo();

        /** @var RecurrentPaymentInfo $recurrentPaymentInfo */
        $recurrentPaymentInfo = $recurrentPaymentInfo->hydrate($data);

        self::assertEquals($data[self::FIRST_TRANSACTION], $recurrentPaymentInfo->getFirstTransaction());
        self::assertEquals($data[self::RECURRING_INDICATOR], $recurrentPaymentInfo->getRecurringIndicator());
    }

    private function getDataOfRecurrentPaymentInfo(): array
    {
        return [
            self::FIRST_TRANSACTION   => '2021-04-15T16:14:32.123',
            self::RECURRING_INDICATOR => '1'
        ];
    }
}
