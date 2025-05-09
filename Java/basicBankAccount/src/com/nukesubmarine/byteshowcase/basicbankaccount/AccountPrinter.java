package com.nukesubmarine.byteshowcase.basicbankaccount;

/**
 * Defines the contract for any component that can display
 * or serialize an Account’s details to the user or another medium.
 * * Print out the details of the given account.
 */
    public interface AccountPrinter{

        void print(Account account);
    }

