<?php

namespace BambooPaymentTests\Service;

use BambooPayment\Entity\Address;
use BambooPayment\Entity\Customer;
use BambooPayment\Exception\UnknownApiErrorException;
use BambooPayment\Service\CustomerService;
use BambooPaymentTests\BaseTest;

class CustomerServiceTest extends BaseTest
{
    public function testFetchCustomer(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('customers', 'getCustomer');
        $service             = new CustomerService($bambooPaymentClient);

        $customer = $service->fetch(53479);

        self::assertInstanceOf(Customer::class, $customer);
        self::assertEquals('Email222222@bamboopayment.com', $customer->getEmail());
    }

    public function testFetchCustomerByEmail(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('customers', 'getCustomerByEmail');
        $service             = new CustomerService($bambooPaymentClient);

        $customers = $service->fetchByEmail('Email222222@bamboopayment.com');

        self::assertCount(1, $customers);
        self::assertEquals('Email222222@bamboopayment.com', $customers[0]->getEmail());
    }

    public function testCustomerToArray(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('customers', 'getCustomer');
        $service             = new CustomerService($bambooPaymentClient);

        $customer = $service->fetch(53479)->toArray();

        $address = new Address();
        $address = $address->hydrate(
            [
                'AddressId'     => 51615,
                'AddressType'   => 1,
                'Country'       => 'UY',
                'State'         => 'Montevideo',
                'AddressDetail' => '10000',
                'PostalCode'    => null,
                'City'          => 'MONTEVIDEO'
            ]
        );

        self::assertEquals(
            [
                'CustomerId'         => 53479,
                'Created'            => '2021-04-06T16:08:43.767',
                'CommerceCustomerId' => null,
                'Owner'              => 'Commerce',
                'Email'              => 'Email222222@bamboopayment.com',
                'Enabled'            => true,
                'ShippingAddress'    => null,
                'BillingAddress'     => $address,
                'AdditionalData'     => null,
                'PaymentProfiles'    => [],
                'CaptureURL'         => 'https://testapi.siemprepago.com/v1/Capture/',
                'UniqueID'           => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                'URL'                => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                'FirstName'          => 'PrimerNombre 2222',
                'LastName'           => 'PrimerApellido 2222',
                'DocNumber'          => '12345672',
                'DocumentTypeId'     => 2,
                'PhoneNumber'        => '24022330'
            ],
            $customer
        );
    }

    public function testCreateCustomerWithoutEmail(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('customers', 'createCustomerWithoutEmail');
        $service             = new CustomerService($bambooPaymentClient);

        $this->expectException(UnknownApiErrorException::class);
        $this->expectExceptionMessage('Email invalido');

        $service->create(
            [
                'FirstName'      => 'PrimerNombre',
                'LastName'       => 'PrimerApellido',
                'DocNumber'      => 12345672,
                'DocumentTypeId' => 2,
                'PhoneNumber'    => '24022330',
                'BillingAddress' => [
                    'AddressType'   => 1,
                    'Country'       => 'UY',
                    'State'         => 'Montevideo',
                    'City'          => 'MONTEVIDEO',
                    'AddressDetail' => '10000'
                ]
            ]
        );
    }

    public function testUpdateCustomer(): void
    {
        $bambooPaymentClient = $this->createBambooClientWithApiRequestMocked('customers', 'update');
        $service             = new CustomerService($bambooPaymentClient);
        $customer            = $service->update(
            53479,
            [
                'CustomerId'         => 53479,
                'Created'            => '2021-04-06T16:08:43.767',
                'CommerceCustomerId' => null,
                'Owner'              => 'Commerce',
                'Email'              => 'Email@bamboopayment.com',
                'Enabled'            => true,
                'ShippingAddress'    => null,
                'BillingAddress'     => [],
                'AdditionalData'     => null,
                'PaymentProfiles'    => [],
                'CaptureURL'         => 'https://testapi.siemprepago.com/v1/Capture/',
                'UniqueID'           => 'UI_f6094ccb-7140-480d-af2f-52ea1fe35d6b',
                'URL'                => 'https://testapi.siemprepago.com/v1/api/Customer/53479',
                'FirstName'          => 'PrimerNombre 2222',
                'LastName'           => 'PrimerApellido 2222',
                'DocNumber'          => '12345672',
                'DocumentTypeId'     => 2,
                'PhoneNumber'        => '24022330'
            ]
        );

        self::assertInstanceOf(Customer::class, $customer);
        self::assertEquals('Email222222@bamboopayment.com', $customer->getEmail());
    }
}
