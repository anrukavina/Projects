<?php

if (isset($_POST['submit'])) {

// Retrieving names from HTML form
$firstName = $_POST['name1'];
$secondName = $_POST['name2'];

// Converting the first letter of both names to lowercase
$firstName = mb_strtolower($firstName);
$secondName = mb_strtolower($secondName);

// String concatenation and string to array conversion
$concatenatedNames = $firstName . $secondName;
$namesArray = mb_str_split($concatenatedNames);

// Creating empty arrays to store the characters that appear in the concatenated names, so as the numbers of repetitions of them
$repeatingCharacters = [];
$repetitionNumbers = [];

// Filling an array in which keys are the characters and values are the numbers of occurrences of certain character in the concatenated names 

    // This was the first idea of the code that I used to count the repeating characters in concatenated names, It worked fine but I needed the count_chars function that counts the multibyte characters since Croatian language has plenty of those, and because PHP doesn't have multibyte count_chars function I had to use custom one that I found online

    /*
        foreach(count_chars($imenaZajedno, 1) as $i => $value) {
            $ponavljajucaSlova[chr($i)]= $value;
        }
    */

// NOTE: I didn't create this function myself, I found it on the following link: https://www.php.net/manual/en/function.count-chars.php#107336

function mb_count_chars($concatenatedNames) 
{
    $l = mb_strlen($concatenatedNames, 'UTF-8');
    $unique = array();
    for ($i = 0; $i < $l; $i++) {
        $char = mb_substr($concatenatedNames, $i, 1, 'UTF-8');
        if (!array_key_exists ($char, $unique))
            $unique[$char] = 0;
        $unique[$char]++;
        }
        return $unique;
}

$repeatingCharacters = mb_count_chars($concatenatedNames);

// Filling an array where the values are the numbers of repetitions of the characters that match the concatenated names in order (example: concatenated names = antonioantonela, repetition numbers = 342341334234113)

foreach ($namesArray as $keyNumber => $valueCharacter) {
    foreach ($repeatingCharacters as $keyCharacter => $valueNumber) {
        if ($valueCharacter === $keyCharacter) {
            $repetitionNumbers[] = $valueNumber;
        }
    }
}

// Creating love calculator function that accepts array as the argument

function loveCalculator($array) 
{
    $lastNumber = count($array) - 1;    // defining last number in the array

    if (count($array) == 2) {
        return $array = implode($array);    // if total number of elements of an array is equal to 2, array will be returned and convertet (imploded) to string 
    }

    for ($i = 0; $i < $lastNumber; $i++) {
        $array[$i] = $array[$i] + $array[$lastNumber--];    // addition of the first and last number of an array

        if (count($array) % 2 != 0) {
            $array[(int) ((count($array)) / 2)] = $array[(int) ((count($array)) / 2)];  // if total number of elements of an array is odd (number that is remainder after the addition of the first and last numbers of an array), number that's left is being added to an array
        }
    }

    array_splice($array, -((int) ((count($array)) / 2)));   // deleting the excess elements of an array that remain after each change in the existing array

    $newArrayString = implode($array);  // imploding an array into the string
    $array = mb_str_split($newArrayString); // splitting the string into an array (which allows us to add two-digit numbers)

    return loveCalculator($array);
}

$loveCalculator = loveCalculator($repetitionNumbers);

echo '<h2 class="text-2xl font-semibold">' . 'The result is: ' . '</h2>' , '</br> ' , '<h1 class="text-5xl font-bold">' . $loveCalculator . ' %' . '</h1>';

}