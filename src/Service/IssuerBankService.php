<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\IssuerBank;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class IssuerBankService.
 */
class IssuerBankService extends AbstractService
{
    private const BASE_URI = 'api/v1/countries/%s/issuer-banks';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Retrieves the issuer banks for a given country which CheckoutPro accepts when collecting a payment.
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
        return $this->requestCollection(sprintf(self::BASE_URI, $countryId), [], 'issuerBanks');
    }

    public function getEntityClass(): string
    {
        return IssuerBank::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
