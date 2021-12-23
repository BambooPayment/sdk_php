<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\CountryPaymentMethod;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class CountryPaymentMethodService.
 */
class CountryPaymentMethodService extends AbstractService
{
    private const BASE_URI = 'api/v1/payments/methods';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Retrieves the available payment methods, optionally filtered by country and type.
     *
     * @param string|null $countryId
     *
     * @return CountryPaymentMethod[]
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function fetchPaymentMethods(?string $countryIso = null): array
    {
        $params = [];
        if ($countryIso !== null) {
            $params['countries'] = $countryIso;
        }

        return $this->requestCollection(sprintf(self::BASE_URI), [], 'countryPaymentMethods');
    }

    public function getEntityClass(): string
    {
        return CountryPaymentMethod::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
