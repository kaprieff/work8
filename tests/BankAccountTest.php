<?php

declare(strict_types=1);

namespace App\Tests;

use App\BankAccount;
use App\InvalidAmountException;
use App\InsufficientFundsException;
use PHPUnit\Framework\TestCase;

class BankAccountTest extends TestCase
{
    public function testConstructorWithNegativeBalanceThrowsException(): void
    {
        $this->expectException(InvalidAmountException::class);
        new BankAccount(-100.0);
    }

    public function testConstructorWithZeroBalance(): void
    {
        $account = new BankAccount(0.0);
        $this->assertEquals(0.0, $account->getBalance());
    }

    public function testDepositPositiveAmount(): void
    {
        $account = new BankAccount(100.0);
        $account->deposit(50.0);
        $this->assertEquals(150.0, $account->getBalance());
    }

    public function testDepositZeroAmountThrowsException(): void
    {
        $account = new BankAccount(100.0);
        $this->expectException(InvalidAmountException::class);
        $account->deposit(0.0);
    }

    public function testDepositNegativeAmountThrowsException(): void
    {
        $account = new BankAccount(100.0);
        $this->expectException(InvalidAmountException::class);
        $account->deposit(-50.0);
    }

    public function testWithdrawPositiveAmount(): void
    {
        $account = new BankAccount(100.0);
        $account->withdraw(50.0);
        $this->assertEquals(50.0, $account->getBalance());
    }

    public function testWithdrawZeroAmountThrowsException(): void
    {
        $account = new BankAccount(100.0);
        $this->expectException(InvalidAmountException::class);
        $account->withdraw(0.0);
    }

    public function testWithdrawNegativeAmountThrowsException(): void
    {
        $account = new BankAccount(100.0);
        $this->expectException(InvalidAmountException::class);
        $account->withdraw(-50.0);
    }

    public function testWithdrawMoreThanBalanceThrowsException(): void
    {
        $account = new BankAccount(100.0);
        $this->expectException(InsufficientFundsException::class);
        $account->withdraw(150.0);
    }
}