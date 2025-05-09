package com.nukesubmarine.byteshowcase.basicbankaccount;

import java.util.Scanner;
import com.nukesubmarine.byteshowcase.basicbankaccount.AccountPrinter;
import com.nukesubmarine.byteshowcase.basicbankaccount.ConsoleAccountPrinter;

public class basicBankAccount {
    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

       AccountCreator creator = new ConsoleAccountCreator();
       AccountPrinter printer = new ConsoleAccountPrinter();

       Account account = creator.createAccount(scanner);

       printer.print(account);
    }
}
