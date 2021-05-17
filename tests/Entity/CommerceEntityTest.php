<?php

namespace BambooPaymentTests\Entity;

use BambooPayment\Entity\Commerce;
use BambooPaymentTests\SharedData;

/**
 * Class CommerceEntityTest
 * @package BambooPaymentTests\Entity
 */
class CommerceEntityTest extends SharedData
{
    public const COMMERCE_ID   = 'CommerceID';
    public const CREATED       = 'Created';
    public const NAME          = 'Name';
    public const LEGAL_NAME    = 'LegalName';
    public const DOCUMENT      = 'Document';
    public const DOCUMENT_TYPE = 'DocumentType';
    public const ADDRESS       = Commerce::ADDRESS;


    public function testHydrate(): void
    {
        $commerce = new Commerce();
        $data     = $this->getDataOfCommerce();
        $commerce = $commerce->hydrate($data);

        self::assertEquals($data[self::COMMERCE_ID], $commerce->getCommerceID());
        self::assertEquals($data[self::CREATED], $commerce->getCreated());
        self::assertEquals($data[self::NAME], $commerce->getName());
        self::assertEquals($data[self::LEGAL_NAME], $commerce->getLegalName());
        self::assertEquals($data[self::DOCUMENT], $commerce->getDocument());
        self::assertEquals($data[self::DOCUMENT_TYPE], $commerce->getDocumentType());

        /* make test to address */
        $this->makeTestOfAddress($data[self::ADDRESS], $commerce->getAddress());
    }

    protected function getDataOfCommerce(): array
    {
        return [
            self::COMMERCE_ID   => '100492',
            self::CREATED       => '2021-05-03T15:22:22.360',
            self::NAME          => 'Commerce Name',
            self::LEGAL_NAME    => 'Commerce Legal Name',
            self::DOCUMENT      => '123321456',
            self::DOCUMENT_TYPE => '1',
            self::ADDRESS       => $this->getDataOfAddress()
        ];
    }
}
