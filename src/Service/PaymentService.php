<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\Payment;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class PaymentService.
 */
class PaymentService extends AbstractService
{
    private const BASE_URI = 'api/v1/payments';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    public function getEntityClass(): string
    {
        return Payment::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
