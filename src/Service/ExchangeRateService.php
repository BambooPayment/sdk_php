<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\BambooPaymentObject;
use BambooPayment\Entity\ExchangeRate;
use BambooPayment\ResponseInterpreter\ResponseInterpreterCheckoutPro;
use BambooPayment\ResponseInterpreter\ResponseInterpreterInterface;

/**
 * Class ExchangeRateService.
 */
class ExchangeRateService extends AbstractService
{
    private const BASE_URI = 'api/v1/countries/%s/exchange-rates';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    /**
     * Converts an amount in USD to the specified country's local currency.
     *
     * @param float $amount
     * @param string $countryIso
     *
     * @return \BambooPayment\Entity\BambooPaymentObject
     *
     * @throws \BambooPayment\Exception\ApiErrorException
     * @throws \BambooPayment\Exception\AuthenticationException
     * @throws \BambooPayment\Exception\InvalidRequestException
     * @throws \BambooPayment\Exception\UnknownApiErrorException
     */
    public function getConversion(float $amount, string $countryIso): BambooPaymentObject
    {
        return $this->request(
            self::GET_METHOD,
            sprintf(self::BASE_URI, $countryIso),
            [
                'amount' => $amount
            ],
            'amount'
        );
    }

    public function getEntityClass(): string
    {
        return ExchangeRate::class;
    }

    public function getResponseInterpreter(): ResponseInterpreterInterface
    {
        return new ResponseInterpreterCheckoutPro();
    }
}
