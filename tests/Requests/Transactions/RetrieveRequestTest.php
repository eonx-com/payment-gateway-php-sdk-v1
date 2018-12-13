<?php
declare(strict_types=1);

namespace Tests\EoneoPay\PhpSdk\Requests\Transactions;

use EoneoPay\PhpSdk\Requests\Transactions\RetrieveRequest;
use Tests\EoneoPay\PhpSdk\TestCases\TransactionTestCase;

/**
 * @covers \EoneoPay\PhpSdk\Requests\Transactions\RetrieveRequest
 */
class RetrieveRequestTest extends TransactionTestCase
{
    /**
     * Test retrieve transaction successfully.
     *
     * @return void
     *
     * @throws \EoneoPay\Utils\Exceptions\BaseException
     */
    public function testRetrieveTransactionSuccessfully(): void
    {
        $data = $this->getData();

        /** @var \EoneoPay\PhpSdk\Responses\Transaction $response */
        $response = $this->createClient($data)->get(new RetrieveRequest([
            'id' => $data['id']
        ]));

        // assertions
        $this->assertTransactionResponse($data, $response);
    }
}
