<?php

class Account
{
    private $id;
    private $balance;
    private $transactions = [];

    public function __construct($id, $balance = 0)
    {
        $this->id = $id;
        $this->balance = $balance;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    public function addTransaction(Transaction $transaction)
    {
        $this->transactions[] = $transaction;
    }

    public function getTransactions()
    {
        return $this->transactions;
    }
}