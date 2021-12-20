<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Core\AbstractService;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;
use BambooPayment\ResponseInterpreter\ResponseInterpreterPCI;

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

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterPCI();
    }
}
