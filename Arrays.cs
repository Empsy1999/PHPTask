using System;

class Program
{
    static void Main()
    {
        // Declare an array of integers
        int[] numbers = { 10, 20, 30, 40, 50 };

        // Find the sum of the array elements
        int sum = 0;
        foreach (int num in numbers)
        {
            sum += num;
        }

        // Output the sum
        Console.WriteLine("Sum of array elements: " + sum);
    }
}