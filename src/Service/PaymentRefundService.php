<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\PaymentRefund;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class PaymentRefundService.
 */
class PaymentRefundService extends AbstractService
{
    private const BASE_URI = 'api/v1/payments/%s/refund';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Refunds a payment that has previously been created but not yet refunded.
     * Funds will be refunded to the credit or debit card that was originally charged.
     * You can optionally refund only part of a charge. You can do so multiple times, until the entire charge has been refunded.
     * Once entirely refunded, a payment can’t be refunded again.
     * This method will return an error when called on an already-refunded payment, or when trying to refund more money than is left on a payment.
     *
     * @param int $id
     *
     * @return \BambooPayment\Entity\PaymentRefund
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function refund($paymentId, $amount): PaymentRefund
    {
        return $this->request(self::POST_METHOD, sprintf(self::BASE_URI, $paymentId), [
            'amount' => $amount
        ]);
    }

    public function getEntityClass(): string
    {
        return PaymentRefund::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
