<?php 

namespace Test;

use PHPUnit\Framework\TestCase;
use Jean\TestWorkbeer\Account;

class BankTest extends TestCase
{
    public function mock()
    {
        return [
            'first_name' => 'Jean',
            'amount' => 500
        ];
    }

    public function test_create_account()
    {
        $account = $this->mock();

        $accountCreated = Account::create($account);

        // $this->assertTrue($accountCreated);
        // $this->assertNotTrue(!$accountCreated);
        $this->assertArrayHasKey('name', $accountCreated);
    }

    public function test_withdraw_account()
    {
        $account = $this->mock();
        $withdraw = 250;

        $account = Account::withdraw($account, $withdraw);

        $this->assertEquals('250', $account['amount']);
    }

    public function test_withdraw_no_amount_account()
    {
        $account = $this->mock();
        $withdraw = 2500;

        $account = Account::withdraw($account, $withdraw);

        $this->assertEquals('500', $account['amount']);
    }

    public function test_deposit_account()
    {
        $account = $this->mock();
        $deposit = 2500;

        $account = Account::deposit($account, $deposit);

        $this->assertEquals(3000, $account['amount']);
    }

    public function test_deposit_negative_value_account()
    {
        $account = $this->mock();
        $deposit = -100;

        $account = Account::deposit($account, $deposit);

        $this->assertEquals(500, $account['amount']);
    }
}