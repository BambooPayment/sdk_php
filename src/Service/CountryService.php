<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\BambooPaymentObject;
use BambooPayment\Entity\Country;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class CountryService.
 */
class CountryService extends AbstractService
{
    private const BASE_URI        = 'api/v1/countries';
    private const DOCUMENTS_TYPES = '/api/v1/countries/%s/document-types';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Retrieves all the countries available in CheckoutPro.
     *
     * @param array $params
     * @param string|null $resultKey
     *
     * @return array
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function all(array $params = [], ?string $resultKey = null): array
    {
        return parent::all($params, 'countries');
    }

    /**
     * Retrieves the information of a country.
     *
     * @param int $id
     * @param string|null $resultKey
     *
     * @return \BambooPayment\Entity\BambooPaymentObject
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function fetch($id, ?string $resultKey = null): BambooPaymentObject
    {
        return parent::fetch($id, 'country');
    }

    public function getEntityClass(): string
    {
        return Country::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
