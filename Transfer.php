<?php

class Transfer extends Transaction
{
    private $fromAccount;
    private $toAccount;

    public function __construct($comment, $amount, $dueDate, Account $fromAccount, Account $toAccount)
    {
        parent::__construct($comment, $amount, $dueDate);
        $this->fromAccount = $fromAccount;
        $this->toAccount = $toAccount;
    }

    public function perform(Account $account = null)
    {
        $this->fromAccount->setBalance($this->fromAccount->getBalance() - $this->amount);
        $this->toAccount->setBalance($this->toAccount->getBalance() + $this->amount);
    }
    public function getFromAccount()
{
    return $this->fromAccount;
}
}