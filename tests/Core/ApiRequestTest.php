<?php

namespace BambooPaymentTests\Core;

use BambooPayment\Core\ApiRequest;
use BambooPayment\Core\ApiResponse;
use BambooPayment\HttpClient\HttpClient;
use BambooPaymentTests\BaseTest;
use GuzzleHttp\Psr7\Response;

class ApiRequestTest extends BaseTest
{
    public function testRequest(): void
    {
        $apiRequest = $this->getMockBuilder(ApiRequest::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs(['get', '/api', [], '123456', 'https://testapi.siemprepago.com/', []])
            ->setMethods(['httpClient'])
            ->getMock();

        $httpClient = $this->createPartialMock(HttpClient::class, ['request']);
        $httpClient->method('request')->willReturn(new Response(200, [], '{}'));

        $apiRequest->method('httpClient')->willReturn($httpClient);

        $apiResponse = $apiRequest->request();
        self::assertEquals(200, $apiResponse->code);
        self::assertIsArray($apiResponse->json);
        self::assertIsArray($apiResponse->headers);
    }

    public function testGetHttpClient(): void
    {
        $apiRequest = new ApiRequest('get', '/api', [], '123456', 'https://testapi.siemprepago.com/', []);
        $apiRequest->httpClient();
        
        /* @phpstan-ignore-next-line */
        self::assertTrue(true);
    }

    public function testInterpretResponse(): void
    {
        $apiRequest = new ApiRequest('get', '/api', [], '123456', 'https://testapi.siemprepago.com/', []);

        $apiResponse = new ApiResponse($this->getMockData('customers', 'getCustomer'), 200);

        $result = $apiRequest->interpretResponse($apiResponse);

        self::assertEquals(
            [
                'CustomerId'         => 53479,
                'Created'            => '2021-04-06T16:08:43.767',
                'CommerceCustomerId' => null,
                'Owner'              => 'Commerce',
                'Email'              => 'Email222222@bamboopayment.com',
                'Enabled'            => true,
                'ShippingAddress'    => null,
                'BillingAddress'     => [
                    'AddressId'     => 51615,
                    'AddressType'   => 1,
                    'Country'       => 'UY',
                    'State'         => 'Montevideo',
                    'AddressDetail' => '10000',
                    'PostalCode'    => null,
                    'City'          => 'MONTEVIDEO'
                ],
                'Plans'              => null,
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
            $result
        );
    }

    public function testInterpretResponseWithErrorCodeLowerThan200(): void
    {
        $apiRequest = new ApiRequest('get', '/api', [], '123456', 'https://testapi.siemprepago.com/', []);

        $apiResponse = new ApiResponse($this->getMockData('customers', 'getCustomer'), 100);

        $this->expectExceptionMessage('Invalid API route or response');
        $apiRequest->interpretResponse($apiResponse);
    }

}
