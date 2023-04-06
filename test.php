<?php

require_once 'Account.php';
require_once 'Transaction.php';
require_once 'Deposit.php';
require_once 'Withdrawal.php';
require_once 'Transfer.php';
require_once 'AccountManager.php';

// Create AccountManager instance
$accountManager = new AccountManager();

// Create accounts
$account1 = new Account(1, 1000);
$account2 = new Account(2, 2000);

// Add accounts to AccountManager
$accountManager->addAccount($account1);
$accountManager->addAccount($account2);

// Perform deposit
$deposit = new Deposit("Salary", 500, "2023-03-01");
$accountManager->performTransaction($deposit, 1);

// Perform withdrawal
$withdrawal = new Withdrawal("Rent", 300, "2023-03-02");
$accountManager->performTransaction($withdrawal, 1);

// Perform transfer
$transfer = new Transfer("Gift", 100, "2023-03-03", $account1, $account2);
$accountManager->performTransaction($transfer);

// Get account balances
echo "Account 1 balance: " . $account1->getBalance() . PHP_EOL;
echo "Account 2 balance: " . $account2->getBalance() . PHP_EOL;

// Get transactions sorted by comment
$transactionsByComment = $accountManager->getTransactionsSortedByComment(1);
echo "Transactions sorted by comment:" . PHP_EOL;
foreach ($transactionsByComment as $transaction) {
    echo $transaction->getComment() . " - " . $transaction->getAmount() . " - " . $transaction->getDueDate() . PHP_EOL;
}

// Get transactions sorted by date
$transactionsByDate = $accountManager->getTransactionsSortedByDate(1);
echo "Transactions sorted by date:" . PHP_EOL;
foreach ($transactionsByDate as $transaction) {
    echo $transaction->getComment() . " - " . $transaction->getAmount() . " - " . $transaction->getDueDate() . PHP_EOL;
}