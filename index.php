<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\BankAccount;
use App\InvalidAmountException;
use App\InsufficientFundsException;

echo "=== Тестирование BankAccount ===\n";

try {
    $account = new BankAccount(100.0);
    echo "Начальный баланс: " . $account->getBalance() . "\n";

    $account->deposit(50.0);
    echo "После пополнения: " . $account->getBalance() . "\n";

    $account->withdraw(30.0);
    echo "После снятия: " . $account->getBalance() . "\n";

    $account->withdraw(200.0); // Это вызовет исключение
} catch (InvalidAmountException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
} catch (InsufficientFundsException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}

echo "=== Завершение работы ===\n";