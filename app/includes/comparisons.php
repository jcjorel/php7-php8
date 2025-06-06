<?php
/**
 * PHP7-PHP8 Incompatibility Demo - String & Numeric Comparisons
 */

/**
 * Test 1: String and Number comparison
 * PHP8 changed the behavior of numeric string comparisons
 */
function test_string_number_comparison() {
    echo "<h3>String to Number comparison</h3>";
    echo "<p>In PHP7: Non-numeric strings convert to 0 when compared with numbers.</p>";
    echo "<p>In PHP8: Non-numeric strings behave differently in comparisons.</p>";
    
    echo "<pre class='code'>
var_dump(0 == \"0\");      // true in both PHP7 & PHP8
var_dump(0 == \"0.0\");    // true in both PHP7 & PHP8
var_dump(0 == \"foo\");    // true in PHP7, false in PHP8
var_dump(0 == \"\");       // true in PHP7, false in PHP8
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    echo "<pre>";
    var_dump(0 == "0");      // true in both PHP7 & PHP8
    var_dump(0 == "0.0");    // true in both PHP7 & PHP8
    var_dump(0 == "foo");    // true in PHP7, false in PHP8
    var_dump(0 == "");       // true in PHP7, false in PHP8
    echo "</pre>";
    echo "</div>";
}

/**
 * Test 2: Numeric string array keys
 * PHP8 is more strict with array keys
 */
function test_numeric_string_keys() {
    echo "<h3>Numeric string array keys</h3>";
    echo "<p>In PHP7: Numeric strings as array keys get converted to integers.</p>";
    echo "<p>In PHP8: Behavior changed for some edge cases.</p>";
    
    echo "<pre class='code'>
\$array = [];
\$array[\"10\"] = \"value1\";
\$array[\"10.0\"] = \"value2\"; // In PHP7 overwrites key 10, in PHP8 creates a new string key
\$array[\"10.5\"] = \"value3\"; // String key in both

print_r(\$array);
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    
    try {
        $array = [];
        $array["10"] = "value1";
        $array["10.0"] = "value2"; 
        $array["10.5"] = "value3";
        
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . "</div>";
    }
    echo "</div>";
}

/**
 * Test 3: String to number casting in various operations
 * PHP8 is more strict when casting strings to numbers
 */
function test_string_to_number_casting() {
    echo "<h3>String to number casting</h3>";
    echo "<p>In PHP7: Strings with leading numbers convert to those numbers.</p>";
    echo "<p>In PHP8: Stricter behavior in mathematical operations.</p>";
    
    echo "<pre class='code'>
\$str1 = \"42abc\";
\$str2 = \"abc\";

// String with leading number to int conversion
echo \"\$str1 + 10 = \" . (\$str1 + 10) . \"\\n\"; // 52 in PHP7, warning in PHP8

// Non-numeric string to int conversion
echo \"\$str2 + 10 = \" . (\$str2 + 10) . \"\\n\"; // 10 in PHP7, warning in PHP8
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    
    try {
        $str1 = "42abc";
        $str2 = "abc";
        
        echo "<pre>";
        // String with leading number to int conversion
        echo "$str1 + 10 = " . ($str1 + 10) . "\n";
        
        // Non-numeric string to int conversion
        echo "$str2 + 10 = " . ($str2 + 10) . "\n";
        echo "</pre>";
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . "</div>";
    }
    echo "</div>";
}
