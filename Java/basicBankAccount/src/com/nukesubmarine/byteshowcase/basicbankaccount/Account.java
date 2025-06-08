package com.nukesubmarine.byteshowcase.basicbankaccount;

/**
 * Domain model representing a bank account.
 *
 * Holds the account number, sort code, account holder’s name,
 * and current balance. Provides getters and setters for each field.
 */

public class Account {

    private int accountNumber;
    private String sortCode;
    private String accountHolderName;
    private double balance;

    public Account(int accountNumber, String sortCode, String accountHolderName, double balance) {
        this.accountNumber = accountNumber;
        this.sortCode = sortCode;
        this.accountHolderName = accountHolderName;
        this.balance = balance;
    }

    public int getAccountNumber() {
        return accountNumber;
    }

    public void setAccountNumber(int accountNumber) {
        this.accountNumber = accountNumber;
    }

    public String getSortCode() {
        return sortCode;
    }

    public void setSortCode(String sortCode) {
        this.sortCode = sortCode;
    }

    public String getAccountHolderName() {
        return accountHolderName;
    }

    public void setAccountHolderName(String accountHolderName) {
        this.accountHolderName = accountHolderName;
    }

    public double getBalance() {
        return balance;
    }

    public void setBalance(double balance) {
        this.balance = balance;
    }
}
