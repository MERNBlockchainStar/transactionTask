<?php

class Withdrawal extends Transaction
{
    public function perform(Account $account)
    {
        $account->setBalance($account->getBalance() - $this->amount);
    }
}