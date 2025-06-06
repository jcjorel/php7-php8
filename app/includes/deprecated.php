<?php
/**
 * PHP7-PHP8 Incompatibility Demo - Deprecated & Removed Functions
 */

/**
 * Test 1: each() function - Removed in PHP8
 */
function test_each() {
    $fruits = ['apple', 'banana', 'orange'];
    echo "<h3>each() function test</h3>";
    echo "<p>In PHP7: Works. In PHP8: Fatal error</p>";
    
    echo "<pre class='code'>
\$fruits = ['apple', 'banana', 'orange'];
while (list(\$key, \$val) = each(\$fruits)) {
    echo \"\$key => \$val\\n\";
}
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    try {
        echo "<pre>";
        reset($fruits);
        while (list($key, $val) = each($fruits)) {
            echo "$key => $val\n";
        }
        echo "</pre>";
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . "</div>";
    }
    echo "</div>";
}

/**
 * Test 2: create_function() - Removed in PHP8
 */
function test_create_function() {
    echo "<h3>create_function() test</h3>";
    echo "<p>In PHP7: Works. In PHP8: Fatal error</p>";
    
    echo "<pre class='code'>
\$greet = create_function('\$name', 'return \"Hello, \$name!\";');
echo \$greet('World');
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    try {
        $greet = create_function('$name', 'return "Hello, $name!";');
        echo $greet('World');
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . "</div>";
    }
    echo "</div>";
}

/**
 * Test 3: get_magic_quotes_gpc() - Removed in PHP8
 */
function test_magic_quotes() {
    echo "<h3>get_magic_quotes_gpc() test</h3>";
    echo "<p>In PHP7: Works (returns false). In PHP8: Fatal error</p>";
    
    echo "<pre class='code'>
if (get_magic_quotes_gpc()) {
    echo \"Magic quotes is enabled\";
} else {
    echo \"Magic quotes is disabled\";
}
</pre>";
    
    echo "<div class='result'>";
    echo "<p>Result:</p>";
    try {
        if (get_magic_quotes_gpc()) {
            echo "Magic quotes is enabled";
        } else {
            echo "Magic quotes is disabled";
        }
    } catch (Throwable $e) {
        echo "<div class='error'>ERROR: " . $e->getMessage() . "</div>";
    }
    echo "</div>";
}
