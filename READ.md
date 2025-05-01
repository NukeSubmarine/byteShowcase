# 💼 BankAccount Project

## 📋 Project Brief

Create a project named **BankAccount** that will receive input via the terminal, capturing bank account details as described below.

Within the project, create a class named `BankTerminal.java` to implement the entire programme logic.

---

## 🔍 Key Concepts to Review

- ✅ Rules for declaring variables
- ✅ Terminal usage and `main(String[] args)`
- ✅ Using the `Scanner` class for input
- ✅ String concatenation and the use of the `concat()` method

---

## 📌 Required Attributes

| Attribute       | Type     | Example       |
|----------------|----------|---------------|
| Account Number | Integer  | 20486573      |
| Sort Code      | Text     | 20-45-60      |
| Account Holder | Text     | OLIVER WATSON |
| Balance        | Decimal  | £1,205.75     |

---

## 💬 Interaction with the Terminal

The system should prompt the user to enter each piece of information via the terminal, for example:

Please enter the sort code!

User inputs:

20-45-60

*(Then presses ENTER for the next prompt)*

---
## 🖨️ Final Output

After collecting all data, the system should display the following message:

Hello OLIVER WATSON, thank you for opening an account with our bank. Your sort code is 20-45-60, account number 20486573, and your balance of £1,205.75 is now available for withdrawal.

ℹ️ The placeholders (e.g., `OLIVER WATSON`, `20-45-60`, etc.) will be dynamically filled using the 