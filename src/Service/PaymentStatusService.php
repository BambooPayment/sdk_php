<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\BambooPaymentObject;
use BambooPayment\Entity\PaymentStatus;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class PaymentStatusService.
 */
class PaymentStatusService extends AbstractService
{
    private const BASE_URI = 'api/v1/payments/%s';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Retrieves the status of a payment and its associated transaction status.
     *
     * @param int $id
     *
     * @return \BambooPayment\Entity\PaymentStatus
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function fetch($id, ?string $resultKey = null): BambooPaymentObject
    {
        return $this->request(self::GET_METHOD, sprintf(self::BASE_URI, $id));
    }

    public function getEntityClass(): string
    {
        return PaymentStatus::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
