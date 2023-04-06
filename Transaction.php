<?php

abstract class Transaction
{
    protected $comment;
    protected $amount;
    protected $dueDate;

    public function __construct($comment, $amount, $dueDate)
    {
        $this->comment = $comment;
        $this->amount = $amount;
        $this->dueDate = $dueDate;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }

    abstract public function perform(Account $account);
}