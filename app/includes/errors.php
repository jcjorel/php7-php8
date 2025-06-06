<?php
/**
 * PHP7-PHP8 Incompatibility Demo - Error Handling Changes
 */

/**
 * Test 1: Division by zero 
 * PHP7: Warning and returns INF, -INF, or NAN
 * PHP8: Throws DivisionByZeroError exception
 */
function test_division_by_zero() {
    echo "<h3>Division by zero</h3>";
    echo "<p>In PHP7: Warning + returns INF, -INF, or NAN.</p>";
    echo "<p>In PHP8: Throws DivisionByZeroError exception.</p>";
    
    echo "<pre class='code'>
\$result = 1/0;
echo \"Result: \$result\";
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    try {
        $result = 1/0;
        echo "Result: $result";
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . " [" . get_class($e) . "]</div>";
    }
    echo "</div>";
}

/**
 * Test 2: Undefined variable access
 * PHP7: Notice, returns null
 * PHP8: Warning, returns null
 */
function test_undefined_variable() {
    echo "<h3>Undefined variable access</h3>";
    echo "<p>In PHP7: Notice + returns null.</p>";
    echo "<p>In PHP8: Warning + returns null.</p>";
    
    echo "<pre class='code'>
echo \$undefined;
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    echo "<pre>";
    // Intentionally suppress notice/warning to avoid cluttering the output
    // but in real world, this would produce different levels of errors
    echo @$undefined;
    echo "</pre>";
    echo "<p>Note: Error message suppressed for display purposes. PHP7 produces a Notice while PHP8 produces a Warning.</p>";
    echo "</div>";
}

/**
 * Test 3: Array key/property access on non-arrays
 * PHP7: Creates array when attempting to use it
 * PHP8: Error
 */
function test_array_access() {
    echo "<h3>Array/property access on non-array</h3>";
    echo "<p>In PHP7: Converts variables to arrays when needed.</p>";
    echo "<p>In PHP8: TypeError is thrown.</p>";
    
    echo "<pre class='code'>
\$var = null;
\$var['key'] = 'value';
print_r(\$var);
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    try {
        $var = null;
        $var['key'] = 'value';
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . " [" . get_class($e) . "]</div>";
    }
    echo "</div>";
}

/**
 * Test 4: Type coercion in function parameters 
 * PHP7: More permissive with numeric strings
 * PHP8: More strict in parameter type checking
 */
function test_type_coercion() {
    echo "<h3>Type coercion in function parameters</h3>";
    echo "<p>In PHP7: More permissive with numeric strings.</p>";
    echo "<p>In PHP8: Stricter parameter type checking.</p>";
    
    echo "<pre class='code'>
function sum_numbers(int \$a, int \$b) {
    return \$a + \$b;
}

echo sum_numbers(\"10\", \"20\"); // Works in PHP7, warning in PHP8
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    try {
        function sum_numbers(int $a, int $b) {
            return $a + $b;
        }
        
        echo sum_numbers("10", "20"); // Works in PHP7, warning in PHP8
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . " [" . get_class($e) . "]</div>";
    }
    echo "</div>";
}

/**
 * Test 5: Default error reporting and display
 * Shows differences in how errors are handled
 */
function test_default_error_reporting() {
    echo "<h3>Default error reporting and display</h3>";
    echo "<p>In PHP7: Some errors are notices.</p>";
    echo "<p>In PHP8: More errors are warnings or exceptions.</p>";
    
    echo "<div class='result'>";
    echo "<p>PHP Version: " . phpversion() . "</p>";
    echo "<p>Error reporting level: " . error_reporting() . "</p>";
    echo "</div>";
}
