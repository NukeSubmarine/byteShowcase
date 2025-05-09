///  ** Interface ** which defines the contract (no implementation).
/// ** this is the contract for making Accounts.

//Interface com.nukesubmarine.byteshowcase.basicbankaccount.AccountGenerator
package com.nukesubmarine.byteshowcase.basicbankaccount;

import java.util.Scanner;

/**
 * AccountCreator defines the contract for any class that
 * knows how to gather input and assemble a new Account object.
 *
 * Implementations of this interface (e.g. ConsoleAccountCreator)
 * will prompt the user (or another source) for all the fields
 * required to construct an Account.
 */
public interface AccountCreator {
        Account createAccount(Scanner scanner);
}
