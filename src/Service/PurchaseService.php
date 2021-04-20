<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\Purchase;

class PurchaseService extends AbstractService
{
    private const BASE_URI     = 'v1/api/purchase';
    private const ROLLBACK_URI = '/%s/rollback';
    private const REFUND_URI   = '/%s/refund';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    public function refund(int $id): Purchase
    {
        return $this->request('post', sprintf(self::BASE_URI . self::REFUND_URI, $id));
    }

    public function rollback(int $id): Purchase
    {
        return $this->request('post', sprintf(self::BASE_URI . self::ROLLBACK_URI, $id));
    }

    public function getEntityClass(): string
    {
        return Purchase::class;
    }
}
