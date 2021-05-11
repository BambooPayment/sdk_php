<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Transaction;
use BambooPayment\Entity\TransactionStep;
use BambooPaymentTests\SharedData;

/**
 * Class TransactionEntityTest
 * @package BambooPaymentTests\Entity
 */
class TransactionEntityTest extends SharedData
{
    public const TRANSACTION_ID        = 'TransactionId';
    public const CREATED               = 'Created';
    public const TRANSACTION_STATUS_ID = 'TransactionStatusId';
    public const STATUS                = 'Status';
    public const DESCRIPTION           = 'Description';
    public const APPROVAL_CODE         = 'ApprovalCode';
    public const STEPS                 = Transaction::STEPS;
    public const AUTHORIZATION_DATE    = 'AuthorizationDate';
    public const ERROR_CODE            = 'ErrorCode';

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

        $steps = $transaction->getSteps();
        self::assertNotEmpty($steps);
        $this->makeTestsOfSteps($data[self::STEPS], $steps);
    }

    /**
     * @param array $dataOfSteps
     * @param TransactionStep[] $steps
     */
    private function makeTestsOfSteps(array $dataOfSteps, array $steps): void
    {
        foreach ($steps as $index => $step) {
            /* @var TransactionStep $step */
            $this->makeTestOfTransactionStep($dataOfSteps[$index], $step);
        }
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
