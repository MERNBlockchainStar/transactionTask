<?php

class AccountManager
{
    private $accounts = [];

    public function addAccount(Account $account)
    {
        $this->accounts[$account->getId()] = $account;
    }

    public function getAccount($id)
    {
        return $this->accounts[$id] ?? null;
    }

    public function getAllAccounts()
    {
        return $this->accounts;
    }

    public function performTransaction(Transaction $transaction, $accountId = null)
    {
        if ($transaction instanceof Transfer) {
            $transaction->perform();
            $account = $transaction->getFromAccount();
        } else {
            $account = $this->getAccount($accountId);
            if (!$account) {
                return false;
            }
    
            $transaction->perform($account);
        }
        $account->addTransaction($transaction);
        return true;
    }

    public function getTransactionsSortedByComment($accountId)
    {
        $account = $this->getAccount($accountId);
        if (!$account) {
            return null;
        }

        $transactions = $account->getTransactions();
        usort($transactions, function ($a, $b) {
            return strcmp($a->getComment(), $b->getComment());
        });

        return $transactions;
    }

    public function getTransactionsSortedByDate($accountId)
    {
        $account = $this->getAccount($accountId);
        if (!$account) {
            return null;
        }

        $transactions = $account->getTransactions();
        usort($transactions, function ($a, $b) {
            return $a->getDueDate() <=> $b->getDueDate();
        });

        return $transactions;
    }
}