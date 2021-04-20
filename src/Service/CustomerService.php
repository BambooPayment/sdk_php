<?php /** @noinspection ALL */

namespace BambooPayment\Service;

use BambooPayment\Core\AbstractService;
use BambooPayment\Entity\Customer;

class CustomerService extends AbstractService
{
    private const BASE_URI            = 'v1/api/customer';
    private const FETCH_USER_BY_EMAIL = 'v1/api/customer/GetCustomerByEmail';

    public function getBaseUri(): string
    {
        return self::BASE_URI;
    }

    public function fetchByEmail(string $email): array
    {
        return $this->requestCollection(
            self::FETCH_USER_BY_EMAIL,
            [
                'email' => $email
            ]
        );
    }

    public function getEntityClass(): string
    {
        return Customer::class;
    }
}
