<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Loops Activity</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        header, footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }
        main {
            display: flex;
            flex: 1;
            padding: 20px;
            justify-content: center;
            align-items: center;
        }
        .content {
            width: 80%;
            background-color: #f9f9f9;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .activity {
            margin-bottom: 20px;
        }
        .rounded-box {
            padding: 10px;
            background-color: #e1e1e1;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .input-field {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Loops</h1>
    </header>

    <main>
        <div class="content">
            <!-- Activity 1 -->
            <div class="activity">
                <h2>Activity 1: Number Counter</h2>
                <div class="rounded-box">
                    <?php
                    $count = 1;
                    echo "<h3>Counting from 1 to 10:</h3>";
                    echo "</br>";
                    while ($count <= 10) {
                        echo $count . " ";
                        $count++;
                    }
                    echo "</br>";
                    echo "</br>";
                    echo "<h3>Even numbers between 1 and 20:</h3>";
                    echo "</br>";
                    $even = 2;
                    while ($even <= 20) {
                        echo $even . " ";
                        $even += 2;
                    }
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 2 -->
            <div class="activity">
                <h2>Activity 2: Password Validator</h2>
                <div class="rounded-box">
                    <form method="POST">
                        <label for="pass">Please enter the password:</label>
                        <input type="text" id="pass" name="pass" class="input-field" required>
                        <input type="hidden" name="activity" value="password">
                        <button type="submit">Enter</button>
                    </form>

                    <?php
                    $correctPass = "password123";
                    $userInput = "";
                    $accessGranted = false;
                    do{
                        if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['activity'] == 'password'){
                            $userInput = $_POST['pass'];

                            if($userInput != $correctPass){
                                echo "</br>";
                                echo "<p> Incorect Password, Try Again :( </p>";
                            }else{
                                echo "</br>";
                                echo "<p> Access Granted :) </p>";
                                $accessGranted = true;
                            }
                        }
                    }while($accessGranted = false);
                    echo "</br>";
                    ?>
                    
                </div>
            </div>

            <!-- Activity 3 -->
            <div class="activity">
                <h2>Activity 3:Multiplication Table</h2>
                <div class="rounded-box">
                    <?php
                    $seven = 7;
                    echo "<h3>Multiplying 7: </h3>";
                    echo "</br>";
                    for($i = 1; $i <= 10; $i++ ){
                        echo "7 x $i = ".$seven * $i ."</br>";
                    }
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 4 -->
            <div class="activity">
                <h2>Activity 4:Loop Control with Break and Continue</h2>
                <div class="rounded-box">
                    <?php
                    echo "<h3>Counting to 8 and skipping 5: </h3>";
                    echo "</br>";
                    for($count = 1; $count <= 10; $count++ ){
                        if($count == 5){
                            continue;
                        }elseif($count == 9){
                            break;
                        }
                        echo "$count ";
                    }
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 4 -->
            <div class="activity">
                <h2>Activity 5: Sum of Numbers</h2>
                <div class="rounded-box">
                    <?php
                    echo "<h3>The Sum of Numbers: </h3>";
                    echo "</br>";
                    $sum = 0;
                    $add = 1;
                    while($add <= 100){
                        $sum += $add;
                        $add++;
                    }
                    echo "The sum of numbers from 1 to 100 is: $sum";
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 6 -->
            <div class="activity">
                <h2>Activity 6: Array Iteration with foreach</h2>
                <div class="rounded-box">
                    <?php
                    echo "<h3>My Favorite Movies </h3>";
                    echo "</br>";
                    $myMovies = array("Deadpool(All of them)","Nightmare Before Christmas","Iron Man (1-3)","Batman Begins","World War Z");
                    $counter = 1;
                    foreach($myMovies as $x){
                        echo "$counter. $x </br>";
                        $counter++;
                    }
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 7 -->
            <div class="activity">
                <h2>Activity 7: Key-Value Pairs with foreach</h2>
                <div class="rounded-box">
                    <?php
                    echo "<h3>Studen's Information</h3>";
                    echo "</br>";
                    $studentInfo = array(
                        "Name" => "Aldrin",
                        "Age" => 22,
                        "Grade" => "A++",
                        "City" => "Baguio City"
                        );
                    foreach($studentInfo as $x => $y){
                        echo "$x : $y </br>";
                    }
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 8 -->
            <div class="activity">
                <h2>Activity 8: Factorial Calculator</h2>
                <div class="rounded-box">
                    <form method="POST">
                        <label for="number">Enter a number:</label>
                        <input type="text" id="number" name="number" class="input-field" required>
                        <input type="hidden" name="activity" value="factorial">
                        <button type="submit">Enter</button>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['activity'] == 'factorial') {
                        $userInput = $_POST['number'];
                        $factorial = 1;

                        if(is_numeric($userInput) && $userInput >0){
                            for($i = 1; $i <= $userInput; $i++){
                                $factorial *= $i;
                        }
                        echo "</br>";
                        echo "Factorial of $userInput is: $factorial";
                        }else{
                        echo "</br>";
                        echo "Please enter valid integer";
                        }
                    }
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 9 -->
            <div class="activity">
                <h2>Activity 9:FizzBuzz Challenge</h2>
                <div class="rounded-box">
                    <?php
                    echo "<h3>Printing the FizzBuzz: </h3>";
                    echo "</br>";
                    for($i = 1; $i <= 50; $i++){
        
                        if($i%3==0 && $i%5==0){
                            echo "FizzBuzz ";
                            continue;
                        }elseif($i%5==0){
                            echo "Buzz ";
                            continue;
                        }elseif($i%3==0){
                            echo "Fizz ";
                            continue;
                        }
                        echo "$i ";
                    }
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 10 -->
            <div class="activity">
                <h2>Activity 10:Prime Number Checker</h2>
                <div class="rounded-box">
                    <form method="POST">
                        <label for="prime">Enter a number:</label>
                        <input type="text" id="prime" name="prime" class="input-field" required>
                        <input type="hidden" name="activity" value="prime-check">
                        <button type="submit">Enter</button>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['activity'] == 'prime-check') {
                        $userInput = $_POST['prime'];
                        $isPrime = true;

                        if ($userInput <= 1) {
                            $isPrime = false; 
                        }else{  
                            for ($i = 2; $i <= sqrt($userInput); $i++) {
                                if ($userInput % $i == 0) {
                                    $isPrime = false; 
                                    break;
                                }
                            }
                        }
                        if($isPrime) {
                            echo "</br>";
                            echo "<p>$userInput is a prime number.</p>";
                        }else{
                            echo "</br>";
                            echo "<p>$userInput is not a prime number.</p>";
                        }
                    }
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 11 -->
            <div class="activity">
                <h2>Activity 11: Fibonacci Sequence</h2>
                <div class="rounded-box">
                    <?php
                    echo "<h3>Printing the first 10 numbers of the Fibonacci Sequence: </h3>";
                    echo "</br>";
                    $counter = 0;
                    $first = 0;
                    $second = 1;
                    while($counter <= 10){
                        echo "$first ";
                        $next = $first + $second;
                        $first = $second;
                        $second = $next;
                        $counter++;
                    }
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>

            <!-- Activity 12 -->
            <div class="activity">
                <h2>Activity 12: Reverse a String</h2>
                <div class="rounded-box">
                    <form method="POST">
                        <label for="reverse">Enter a string:</label>
                        <input type="text" id="reverse" name="reverse" class="input-field" required>
                        <input type="hidden" name="activity" value="reverse">
                        <button type="submit">Enter</button>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['activity'] == 'reverse') {
                        $userInput = $_POST['reverse'];
                        $inputReverse = "";
                        $stringLength = strlen($userInput);
                        $x = $stringLength-1;
                        for($x; $x>=0; $x--){
                            $inputReverse = $inputReverse.$userInput[$x];
                        }
                        echo "</br>";
                        echo "Input: $userInput </br>";
                        echo "Output: $inputReverse";
                    }
                    echo "</br>";
                    echo "</br>";
                    ?>
                </div>
            </div>


        </div>
    </main>

    <footer>
        <p>&copy; 2024 PHP Loops Activity Delena Aldrin M CIT17-CITCS 3F</p>
    </footer>
</body>
</html>
