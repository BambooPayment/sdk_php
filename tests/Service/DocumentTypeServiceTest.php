<?php

namespace BambooPaymentTests\Service;

use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\Service\DocumentTypeService;
use BambooPaymentTests\BaseTest;

class DocumentTypeServiceTest extends BaseTest
{
    public function testGetDocumentsTypes(): void
    {
        $bambooPaymentClient = $this->createBambooPaymentClient('documents-types');
        $service             = new DocumentTypeService($bambooPaymentClient);

        self::assertCount(3, $service->fetchDocumentTypesByCountry(1));
    }

    private function createBambooPaymentClient($endpoint, ?string $keyResponse = null, $statusCode = null): \BambooPayment\Core\BambooPaymentClient
    {
        return $this->createBambooClientWithApiRequestMocked(
            'documents-types',
            $endpoint,
            $statusCode,
            new ResponseInterpreterCheckoutPro(),
            'documentTypes'
        );
    }
}
