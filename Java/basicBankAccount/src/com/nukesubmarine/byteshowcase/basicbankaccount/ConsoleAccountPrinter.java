package com.nukesubmarine.byteshowcase.basicbankaccount;

public class ConsoleAccountPrinter implements AccountPrinter{

    Override
    public void print(Account account){
        System.out.println("\n*** Your accout is ***");
        System.out.println("Account holder name: " + account.getAccountHolderName());
        System.out.println("Account number: " + account.getAccountNumber());
        System.out.println("Sort code: " + account.getSortCode());
        System.out.println("The balanca is: " + account.getBalance());
    }
}
