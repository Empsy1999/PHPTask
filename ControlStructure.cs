using System;

class Program
{
    static void Main()
    {
        // Prompt user to enter an integer
        Console.Write("Enter an integer: ");
        int number = Convert.ToInt32(Console.ReadLine());

        // Check if the number is even or odd
        if (number % 2 == 0)
        {
            Console.WriteLine(number + " is even.");
        }
        else
        {
            Console.WriteLine(number + " is odd.");
        }
    }
}
