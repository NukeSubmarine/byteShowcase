///  ** Interface ** which defines the contract (no implementation).
/// ** this is the contract for making Accounts.

package com.nukesubmarine.byteshowcase.basicbankaccount;//Interface com.nukesubmarine.byteshowcase.basicbankaccount.AccountGenerator

import java.util.Scanner;
import com.nukesubmarine.byteshowcase.basicbankaccount.Account;

public interface AccountGenerator {
        Account generateAccount(Scanner scanner);
}
