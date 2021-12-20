<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\Purchase;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;
use BambooPayment\ResponseInterpreter\ResponseInterpreterPCI;

/**
 * Class PurchaseService.
 */
class PurchaseService extends AbstractService
{
    private const BASE_URI     = 'v1/api/purchase';
    private const ROLLBACK_URI = '/%s/rollback';
    private const REFUND_URI   = '/%s/refund';
    private const COMMIT_URI   = '/%s/commit';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Refund a confirmed purchase.
     *
     * @param int $id
     *
     * @return \BambooPayment\Entity\Purchase
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function refund(int $id): Purchase
    {
        return $this->request('post', sprintf(self::BASE_URI . self::REFUND_URI, $id));
    }

    /**
     * Cancel a pre-authorized purchase.
     *
     * @param int $id
     *
     * @return \BambooPayment\Entity\Purchase
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function rollback(int $id): Purchase
    {
        return $this->request('post', sprintf(self::BASE_URI . self::ROLLBACK_URI, $id));
    }

    /**
     * Confirm a pre-authorized purchase.
     *
     * @param int $id
     *
     * @return \BambooPayment\Entity\Purchase
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function commit(int $id): Purchase
    {
        return $this->request('post', sprintf(self::BASE_URI . self::COMMIT_URI, $id));
    }

    public function getEntityClass(): string
    {
        return Purchase::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterPCI();
    }
}
