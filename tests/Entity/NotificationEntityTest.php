<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Notification;
use BambooPaymentTests\BaseTest;

/**
 * Class NotificationEntityTest
 * @package BambooPaymentTests\Entity
 */
class NotificationEntityTest extends BaseTest
{
    private const NOTIFICATION_ID = 'NotificationId';
    private const CREATED         = 'Created';
    private const RESOURCE_TYPE   = 'ResourceType';
    private const RESOURCE_URL    = 'ResourceUrl';
    private const RESOURCE_OBJECT = 'ResourceObject';

    public function testHydrate(): void
    {
        $notification = new Notification();
        $data         = $this->getDataOfNotification();

        /** @var Notification $notification */
        $notification = $notification->hydrate($data);

        self::assertEquals($data[self::NOTIFICATION_ID], $notification->getNotificationId());
        self::assertEquals($data[self::CREATED], $notification->getCreated());
        self::assertEquals($data[self::RESOURCE_TYPE], $notification->getResourceType());
        self::assertEquals($data[self::RESOURCE_URL], $notification->getResourceUrl());
        self::assertEquals($data[self::RESOURCE_OBJECT], $notification->getResourceObject());
    }

    private function getDataOfNotification(): array
    {
        return [
            self::NOTIFICATION_ID => 1,
            self::CREATED         => '2021-04-15T14:25:33.946',
            self::RESOURCE_TYPE   => 1,
            self::RESOURCE_URL    => 'url',
            self::RESOURCE_OBJECT => 'object'
        ];
    }
}
