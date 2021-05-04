<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Transaction;
use BambooPaymentTests\SharedDataTest;

/**
 * Class TransactionEntityTest
 * @package BambooPaymentTests\Entity
 */
class TransactionEntityTest extends SharedDataTest
{
    private const TRANSACTION_ID        = 'TransactionId';
    private const CREATED               = 'Created';
    private const TRANSACTION_STATUS_ID = 'TransactionStatusId';
    private const STATUS                = 'Status';
    private const DESCRIPTION           = 'Description';
    private const APPROVAL_CODE         = 'ApprovalCode';
    private const STEPS                 = Transaction::STEPS;

    public function testHydrate(): void
    {
        $transaction = new Transaction();
        $data        = $this->getDataOfTransaction();
        $transaction = $transaction->hydrate($data);
        self::assertEquals($data[self::TRANSACTION_ID], $transaction->getTransactionId());
        self::assertEquals($data[self::CREATED], $transaction->getCreated());
        self::assertEquals($data[self::TRANSACTION_STATUS_ID], $transaction->getTransactionStatusId());
        self::assertEquals($data[self::STATUS], $transaction->getStatus());
        self::assertEquals($data[self::DESCRIPTION], $transaction->getDescription());
        self::assertEquals($data[self::APPROVAL_CODE], $transaction->getApprovalCode());
        self::assertNotEmpty($transaction->getSteps());
    }

    private function getDataOfTransaction(): array
    {
        return [
            self::TRANSACTION_ID        => '100492',
            self::CREATED               => '2021-05-03T15:22:22.360',
            self::TRANSACTION_STATUS_ID => 1,
            self::STATUS                => 'Approved',
            self::DESCRIPTION           => null,
            self::APPROVAL_CODE         => '123456',
            self::STEPS                 => [
                $this->getDataOfTransactionStep()
            ]
        ];
    }
}
