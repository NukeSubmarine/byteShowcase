package com.nukesubmarine.byteshowcase.basicbankaccount;

import java.util.Scanner;

/**
 * ConsoleAccountCreator implements AccountCreator by using
 * System.out prompts and a Scanner on System.in to collect
 * accountNumber, sortCode, accountHolderName, and initial balance.
 *
 * After gathering each piece of data, it returns a fully populated
 * Account instance.
 */
public class ConsoleAccountCreator implements AccountCreator {
    @Override
    public Account createAccount(Scanner scanner) {
        // TODO: prompt for each field, read with scanner, then

        System.out.print("Please enter the account number: ");
        int accountNumber = scanner.nextInt();
        scanner.nextLine(); // consume the leftover newline

        System.out.print("Please enter the sort code (xx-xx-xx): ");
        String sortCode = scanner.nextLine();

        System.out.print("Please enter the account holder name: ");
        String name = scanner.nextLine();

        //      return new Account(accountNumber, sortCode, name, 0.0)
        return new Account(accountNumber, sortCode, name, 0.0);


    }
}


