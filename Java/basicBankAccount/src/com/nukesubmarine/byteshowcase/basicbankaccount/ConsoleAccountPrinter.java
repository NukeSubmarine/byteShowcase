package com.nukesubmarine.byteshowcase.basicbankaccount;

/**
 * Console‐based AccountPrinter implementation.
 *
 * <p>Formats and writes an Account’s fields to System.out,
 * showing holder name, account number, sort code, and balance.
 */
public class ConsoleAccountPrinter implements AccountPrinter{

    @Override
    public void print(Account account){
        System.out.println("\n*** Your account is ***");
        System.out.println("Account holder name: " + account.getAccountHolderName());
        System.out.println("Account number: " + account.getAccountNumber());
        System.out.println("Sort code: " + account.getSortCode());
        System.out.println("The balance is: " + account.getBalance());
    }
}
