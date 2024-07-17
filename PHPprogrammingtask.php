<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="manifest" href="/manifest.json">
</head>



<style>




.sidebar {
    position: fixed;
    top: 0;
    left: -200px; /* Initially hide the sidebar off-screen */
    height: 100%;
    width: 200px; /* Adjust sidebar width as needed */
    background-color: #007BFF;
    color: white;
    padding: 20px;
    border-radius: 0 8px 8px 0; /* Rounded corners on the right side */
    z-index: 1000;
    overflow-y: auto;
    transition: left 0.3s ease; /* Smooth transition for sliding effect */
}

.sidebar.visible {
    left: 0; /* Slide sidebar into view */
}

.sidebar h2 {
    margin-bottom: 20px;
    text-align: center;
}

.sidebar button {
    margin-bottom: 10px;
    padding: 10px;
    border: none;
    background-color: #0056b3;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    text-align: left;
}

.sidebar button:hover {
    background-color: #004080;
}



.toggle-sidebar {
    position: absolute;
    left: 20px; /* Adjust button position */
    top: 20px;
    background-color: #007BFF;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 1001;
}

.toggle-sidebar:hover {
    background-color: #00aab3;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
}


/* Section styles */
section {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
        }

        section h2 {
            margin-top: 0;
        }

        .navbar {
            background-color: #007BFF;
            overflow: hidden;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        /* Content box styles */
        .content-box {
            margin-top: 80px; /* Adjust to account for the fixed navbar */
            padding: 20px;
            text-align: center;
        }

        .content {
            display: none; /* Hide content by default */
        }

        .content.active {
            display: block; /* Show content when active */
        }

        .content p {
            margin: 0;
        }

        .button-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #f2f2f2;
            padding: 10px 0;
            text-align: center;
           
        }

        .button-bar button {
            padding: 10px 20px;
            margin: 0 5px;
            font-size: 14px;
            cursor: pointer;
        }

        .code-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .output-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .output {
            margin-top: 10px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            min-height: 100px; /* Adjust height as needed */
            overflow: auto; /* Enable scrolling for output */
        }

        .run-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .run-button:hover {
            background-color: #0056b3;
        }
        


</style>




<body>
<button class="toggle-sidebar" onclick="toggleSidebar()">☰ Menu</button>
    <div class="sidebar">
        <h2>Task Management Menu</h2>
        <button onclick="indexlink()">Task Management</button>
        <button onclick="tasklink()">PHP Task</button>
        <!-- Add more buttons for other sidebar actions as needed -->
    </div>
    <script>
        function indexlink(){
            location.href="index.php";
        }
        function tasklink(){
            location.href="PHPprogrammingtask.php";
        }


</script>
    <button class="toggle-sidebar" onclick="toggleSidebar()">Toggle Sidebar</button>






    <div class="content-box">
        <div id="variables" class="content">
            <h2>Variables & Data Types</h2>
            <div class="code-container">
                <h3>PHP Variables Example</h3>
                <pre><code>&lt;!DOCTYPE html>
&lt;html lang="en">
&lt;head>
    &lt;meta charset="UTF-8">
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0">
    &lt;title>PHP Variables Example&lt;/title>
&lt;/head>
&lt;body>
    &lt;h2>PHP Variables Example&lt;/h2>
    &lt;?php
    // Declare and initialize variables of different data types
    $integerVar = 10;
    $floatVar = 3.14;
    $stringVar = "Hello, PHP!";
    $booleanVar = true;
    $arrayVar = array("apple", "banana", "cherry");

    // Displaying variable values
    echo "&lt;p>Integer Variable: $integerVar&lt;/p>";
    echo "&lt;p>Float Variable: $floatVar&lt;/p>";
    echo "&lt;p>String Variable: $stringVar&lt;/p>";
    echo "&lt;p>Boolean Variable: " . ($booleanVar ? "true" : "false") . "&lt;/p>";
    echo "&lt;p>Array Variable: ";
    print_r($arrayVar);
    echo "&lt;/p>";
    ?>
&lt;/body>
&lt;/html>
                </code></pre>
            </div>
            <button class="run-button" onclick="runCode('variables')">Run</button>
            <div class="output-container" id="variables-output">
                <h3>Output:</h3>
                <div class="output" id="variables-output-content"></div>
            </div>
        </div>



        <div id="control-structures" class="content">
            <h2>Control Structures</h2>
            <div class="code-container">
                <h3>PHP Script to Check Number</h3>
                <pre><code>&lt;?php
    $number = 10; // Replace with actual input number
    if ($number > 0) {
        echo "The number is positive.";
    } elseif ($number < 0) {
        echo "The number is negative.";
    } else {
        echo "The number is zero.";
    }
?>
                </code></pre>
            </div>
            <button class="run-button" onclick="runCode('control-structures')">Run</button>
            <div class="output-container" id="control-structures-output">
                <h3>Output:</h3>
                <div class="output" id="control-structures-output-content"></div>
            </div>
        </div>





        <div id="loops" class="content">
            <h2>Loops</h2>
            <div class="code-container">
                <h3>PHP Script to Print Fibonacci Numbers</h3>
                <pre><code>&lt;?php
    // PHP script to print the first 10 Fibonacci numbers
    $num1 = 0;
    $num2 = 1;
    $count = 10; // Number of Fibonacci numbers to print

    echo "First $count Fibonacci numbers:\n";

    $i = 1;
    while ($i <= $count) {
        echo $num1 . ", ";

        $sum = $num1 + $num2;
        $num1 = $num2;
        $num2 = $sum;

        $i++;
    }
?>
                </code></pre>
            </div>
            <button class="run-button" onclick="runCode('loops')">Run</button>
            <div class="output-container" id="loops-output">
                <h3>Output:</h3>
                <div class="output" id="loops-output-content"></div>
            </div>
        </div>











        
        <div id="arrays" class="content">
            <h2>Arrays</h2>
            <div class="code-container">
                <h3>PHP Script to Create and Print Associative Array</h3>
                <pre><code>&lt;?php
            // PHP script to create and print an associative array
            $student = array(
                "name" => "Peter Pan",
                "age" => 20,
                "gender" => "Male",
                "course" => "Computer Science"
            );
        
            // Printing each key and value
            foreach ($student as $key => $value) {
                echo "&lt;p>$key: $value&lt;/p>";
            }
        ?>
                </code></pre>
            </div>
            <button class="run-button" onclick="runCode('arrays')">Run</button>
            <div class="output-container" id="arrays-output">
                <h3>Output:</h3>
                <div class="output" id="arrays-output-content"></div>
            </div>
        </div>

        

        <div id="functions" class="content">
            <h2>Functions</h2>
            <div class="code-container">
                <h3>PHP Function to Multiply Two Numbers</h3>
                <pre><code>&lt;?php
            // PHP function to multiply two numbers
            function multiply($num1, $num2) {
                return $num1 * $num2;
            }
        
            // Example usage
            $result = multiply(5, 10);
            echo "&lt;p>Result of multiplication: $result&lt;/p>";
        ?>
                </code></pre>
            </div>
            <button class="run-button" onclick="runCode('functions')">Run</button>
            <div class="output-container" id="functions-output">
                <h3>Output:</h3>
                <div class="output" id="functions-output-content"></div>
            </div>
        </div>



        <div id="string-manipulation" class="content">
            <h2>String Manipulation</h2>
            <div class="code-container">
                <h3>PHP Script to Reverse a String</h3>
                <pre><code>&lt;?php
            // PHP function to reverse a string without using built-in functions
            function reverseString($str) {
                $length = strlen($str);
                $reversed = '';
                for ($i = $length - 1; $i >= 0; $i--) {
                    $reversed .= $str[$i];
                }
                return $reversed;
            }
        
            // Example usage
            $originalString = "Hello, PHP!";
            $reversedString = reverseString($originalString);
            echo "&lt;p>Original String: $originalString&lt;/p>";
            echo "&lt;p>Reversed String: $reversedString&lt;/p>";
        ?>
                </code></pre>
            </div>
            <button class="run-button" onclick="runCode('string-manipulation')">Run</button>
            <div class="output-container" id="string-manipulation-output">
                <h3>Output:</h3>
                <div class="output" id="string-manipulation-output-content"></div>
            </div>
        </div>



        <div id="forms-handling" class="content">
    <h2>Forms Handling</h2>
    <div class="code-container">
        <h3>PHP Script to Handle Form Data (POST Method)</h3>
        <pre><code>&lt;!-- HTML Form -->
&lt;form action="" method="post">
    &lt;label for="name">Name:&lt;/label>
    &lt;input type="text" id="name" name="name" required>&lt;br><br>
    
    &lt;label for="email">Email:&lt;/label>
    &lt;input type="email" id="email" name="email" required>&lt;br><br>
    
    &lt;label for="message">Message:&lt;/label>
    &lt;textarea id="message" name="message" rows="4" required>&lt;/textarea>&lt;br><br>
    
    &lt;button type="submit">Submit&lt;/button>
&lt;/form>

&lt;?php
    // PHP script to process form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        echo "&lt;h3>Form Submitted Successfully!&lt;/h3>";
        echo "&lt;p>Name: $name&lt;/p>";
        echo "&lt;p>Email: $email&lt;/p>";
        echo "&lt;p>Message: $message&lt;/p>";
    }
?>
        </code></pre>
    </div>
    <div class="output-container" id="forms-handling-output">
        <h3>Output:</h3>
        <div class="output" id="forms-handling-output-content"></div>
    </div>
</div>




<div id="sessions-cookies" class="content">
    <h2>Sessions & Cookies</h2>
    <div class="code-container">
        <h3>PHP Script to Set and Retrieve Session Variable</h3>
        <pre><code>&lt;?php
            // Start session
            session_start();

            // Set session variables
            $_SESSION['username'] = 'john_doe';
            $_SESSION['role'] = 'admin';

            echo "&lt;p>Session variables are set.&lt;/p>";
        ?>
        </code></pre>
    </div>
    <button class="run-button" onclick="retrieveSession()">Retrieve Session Variables</button>
    <div class="output-container" id="retrieve-session-output">
        <h3>Retrieved Session Variables:</h3>
        <div class="output" id="session-variables-output"></div>
    </div>
</div>



<div id="file-handling" class="content">
    <h2>File Handling</h2>
    <div class="code-container">
        <h3>PHP Script to Read and Display File Contents</h3>
        <pre><code>&lt;?php
            // Specify the path to your file
            $filePath = 'path/to/your/file.txt';

            // Check if the file exists and is readable
            if (file_exists($filePath) && is_readable($filePath)) {
                // Read the file contents
                $fileContents = file_get_contents($filePath);

                // Display the file contents
                echo "&lt;p>File Contents:&lt;/p>";
                echo "&lt;pre>&lt;code>" . htmlspecialchars($fileContents) . "&lt;/code>&lt;/pre>";
            } else {
                echo "&lt;p>File not found or is not readable.&lt;/p>";
            }
        ?>
        </code></pre>
    </div>
    <button class="run-button" onclick="runCode('file-handling')">Run</button>
    <div class="output-container" id="file-handling-output">
        <h3>Output:</h3>
        <div class="output" id="file-handling-output-content"></div>
    </div>
</div>



<div id="database-connection" class="content">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Database Connection</h2>
        </div>
        <div class="card-body">
            <p>Learn how to connect to databases, execute queries, fetch results, and manage database connections in PHP.</p>

            <div class="code-container">
                <h3>PHP Script for Database Connection and Data Retrieval</h3>
                <pre><code>&lt;?php
                // Replace with your actual database credentials
                $servername = "localhost";
                $username = "username";
                $password = "password";
                $dbname = "database";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to retrieve data
                $sql = "SELECT * FROM your_table_name";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '&lt;table class="table">';
                    echo '&lt;thead>&lt;tr>&lt;th>ID&lt;/th>&lt;th>Name&lt;/th>&lt;th>Email&lt;/th>&lt;/tr>&lt;/thead>&lt;tbody>';
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '&lt;tr>&lt;td>' . $row["id"] . '&lt;/td>&lt;td>' . $row["name"] . '&lt;/td>&lt;td>' . $row["email"] . '&lt;/td>&lt;/tr>';
                    }
                    echo '&lt;/tbody>&lt;/table>';
                } else {
                    echo "0 results";
                }

                // Close connection
                $conn->close();
                ?>
                </code></pre>
            </div>

            <button class="run-button" onclick="runCode('database-connection')">Run</button>
            
            <div class="output-container" id="database-connection-output">
                <h3>Output:</h3>
                <div class="output" id="database-connection-output-content"></div>
            </div>
        </div>
    </div>
</div>

    </div>

     <!-- Buttons below sidebar -->
     <div class="button-bar">
        <button onclick="toggleSection('variables')">Variables & Data Types</button>
        <button onclick="toggleSection('control-structures')">Control Structures</button>
        <button onclick="toggleSection('loops')">Loops</button>
        <button onclick="toggleSection('arrays')">Arrays</button>
        <button onclick="toggleSection('functions')">Functions</button>
        <button onclick="toggleSection('string-manipulation')">String Manipulation</button>
        <button onclick="toggleSection('forms-handling')">Forms Handling</button>
        <button onclick="toggleSection('sessions-cookies')">Sessions & Cookies</button>
        <button onclick="toggleSection('file-handling')">File Handling</button>
        <button onclick="toggleSection('database-connection')">Database Connection</button>
    </div>

    <script>

function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('visible');
            sidebar.classList.toggle('hidden');
        }





          // Smooth scrolling for anchor links
          document.querySelectorAll('.sidebar a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1); // Get target section ID without the '#'
                const targetSection = document.getElementById(targetId);

                if (targetSection) {
                    // Scroll to the target section smoothly
                    targetSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });


        function toggleSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content').forEach(section => {
                section.classList.remove('active');
            });

            // Show the selected section
            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.classList.add('active');
            }
        }

        function runCode(sectionId) {
        // Clear previous output
        const outputContainer = document.getElementById(`${sectionId}-output-content`);
        outputContainer.innerHTML = '';

        // Simulate running the PHP code (static output for demonstration)
        let output = '';
        if (sectionId === 'variables') {
            output = `<p>Integer Variable: 10</p>
                      <p>Float Variable: 3.14</p>
                      <p>String Variable: Hello, PHP!</p>
                      <p>Boolean Variable: true</p>
                      <p>Array Variable: Array ( [0] => apple [1] => banana [2] => cherry )</p>`;
        } else if (sectionId === 'control-structures') {
            const number = 10; // Replace with actual input number
            if (number > 0) {
                output = "The number is positive.";
            } else if (number < 0) {
                output = "The number is negative.";
            } else {
                output = "The number is zero.";
            }
        } else if (sectionId === 'loops') {
            // Simulate output for Fibonacci numbers
            output = `First 10 Fibonacci numbers:<br>0, 1, 1, 2, 3, 5, 8, 13, 21, 34, `;
        } else if (sectionId === 'arrays') {
            // Simulate output for associative array
            output = `<p>name: Peter Pan</p>
                      <p>age: 20</p>
                      <p>gender: Male</p>
                      <p>course: Computer Science</p>`;
        } else if (sectionId === 'functions') {
            // Simulate output for the multiply function
            const num1 = 5;
            const num2 = 10;
            const result = num1 * num2;
            output = `<p>Result of multiplication: ${result}</p>`;
        } else if (sectionId === 'string-manipulation') {
            // Simulate output for reversing a string
            const originalString = "Hello, PHP!";
            const reversedString = "!PHP ,olleH";
            output = `<p>Original String: ${originalString}</p>`;
            output += `<p>Reversed String: ${reversedString}</p>`;
        } else if (sectionId === 'forms-handling') {
        // Simulate form submission
        const formData = {
            name: 'Peter Pan', // Replace with actual form data for testing
            email: 'john.doe@example.com',
            message: 'This is a test message.'
        };

        output = `
            <h3>Form Submitted Successfully!</h3>
            <p>Name: ${formData.name}</p>
            <p>Email: ${formData.email}</p>
            <p>Message: ${formData.message}</p>
        `;
    }

        outputContainer.innerHTML = output;
    }



    function retrieveSession() {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    const outputContainer = document.getElementById('session-variables-output');
                    outputContainer.innerHTML = `
                        <p>Username: ${response.username}</p>
                        <p>Role: ${response.role}</p>
                    `;
                } else {
                    console.error('Failed to retrieve session variables.');
                }
            }
        };
        xhr.open('GET', 'retrieve_session.php', true);
        xhr.send();
    }
</script>
</body>
</html>
