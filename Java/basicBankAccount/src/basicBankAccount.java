import java.util.Scanner;

public class basicBankAccount {
    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        double balance = 0;

        //Ask the user to enter his account number details
        System.out.print("Please enter your account number: ");
        int accountNumber = scanner.nextInt();

        System.out.print("Please enter the sort code (xx-xx-xx): ");
        String sortCode = scanner.nextLine();
        scanner.nextLine();

        System.out.print("Please enter the account holder name: ");
        String accountHolderName = scanner.nextLine();

        System.out.println("\n*** Your account is *** \n" + "Account name: " + accountHolderName + "\n"   + "Account Number: "
                + accountNumber + "\n" + "Sort Code: " + sortCode + "\n" + "Balance is: " + balance);
    }
}
