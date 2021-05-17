<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\NotificationInfo;
use BambooPaymentTests\BaseTest;

/**
 * Class NotificationInfoEntityTest
 * @package BambooPaymentTests\Entity
 */
class NotificationInfoEntityTest extends BaseTest
{
    private const PROCESS_TYPE   = 'ProcessType';
    private const PROCESS_STATUS = 'ProcessStatus';

    public function testHydrate(): void
    {
        $notificationInfo = new NotificationInfo();
        $data                 = $this->getDataOfNotificationInfo();

        /** @var NotificationInfo $notificationInfo */
        $notificationInfo = $notificationInfo->hydrate($data);

        self::assertEquals($data[self::PROCESS_TYPE], $notificationInfo->getProcessType());
        self::assertEquals($data[self::PROCESS_STATUS], $notificationInfo->getProcessStatus());
    }

    private function getDataOfNotificationInfo(): array
    {
        return [
            self::PROCESS_TYPE   => 'type',
            self::PROCESS_STATUS => 1
        ];
    }
}
