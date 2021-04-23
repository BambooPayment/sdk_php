<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Core\AbstractService;

class DummyService extends AbstractService
{
    public function getEntityClass(): string
    {
        return DummyBambooObject::class;
    }

    public function getBaseUri(): string
    {
        return '';
    }
}
