<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\DocumentType;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class DocumentTypeService.
 */
class DocumentTypeService extends AbstractService
{
    private const BASE_URI = 'api/v1/countries/%s/document-types';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Retrieves the types of documents for a given country which CheckoutPro accepts when collecting a payment.
     *
     * @param int $countryId
     *
     * @return array
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function fetchDocumentTypesByCountry(int $countryId): array
    {
        return $this->requestCollection(sprintf(self::BASE_URI, $countryId), [], 'documentTypes');
    }

    public function getEntityClass(): string
    {
        return DocumentType::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
