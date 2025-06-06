<?php
/**
 * PHP7 to PHP8 Migration Test Application
 * Demonstrates common incompatibilities between PHP7 and PHP8
 */

// Error reporting settings to catch as many issues as possible
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include test files
require_once 'includes/deprecated.php';
require_once 'includes/comparisons.php';
require_once 'includes/errors.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP7 to PHP8 Migration Test</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="header-container">
        <h1>PHP7 to PHP8 Migration Test</h1>
        <div class="php-version">PHP <?php echo phpversion(); ?></div>
    </div>
    
    <p>This application demonstrates common incompatibilities and breaking changes between PHP7 and PHP8. 
       Run it in both environments to see the differences.</p>
    
    <nav>
        <ul>
            <li><a href="#deprecated">Deprecated/Removed Functions</a></li>
            <li><a href="#comparisons">String/Numeric Comparisons</a></li>
            <li><a href="#errors">Error Handling</a></li>
            <li><a href="#summary">Migration Summary</a></li>
        </ul>
    </nav>

    <!-- Deprecated/Removed Functions -->
    <div class="test-section" id="deprecated">
        <h2>Deprecated/Removed Functions</h2>
        <p>PHP8 removed several functions that were previously deprecated in PHP7.</p>
        
        <?php 
            test_each();
            test_create_function();
            test_magic_quotes();
        ?>
    </div>
    
    <!-- String/Numeric Comparisons -->
    <div class="test-section" id="comparisons">
        <h2>String/Numeric Comparisons</h2>
        <p>PHP8 changed how string and numeric types interact in comparisons and operations.</p>
        
        <?php 
            test_string_number_comparison();
            test_numeric_string_keys();
            test_string_to_number_casting();
        ?>
    </div>
    
    <!-- Error Handling -->
    <div class="test-section" id="errors">
        <h2>Error Handling</h2>
        <p>PHP8 introduced more strict error handling and type checking.</p>
        
        <?php 
            test_division_by_zero();
            test_undefined_variable();
            test_array_access();
            test_type_coercion();
            test_default_error_reporting();
        ?>
    </div>
    
    <!-- Migration Summary -->
    <div class="test-section" id="summary">
        <h2>Migration Summary</h2>
        
        <p>When migrating from PHP7 to PHP8, consider these key areas:</p>
        
        <table class="compatibility-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>PHP7 Behavior</th>
                    <th>PHP8 Behavior</th>
                    <th>Migration Impact</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Deprecated Functions</td>
                    <td>Functions like <code>each()</code>, <code>create_function()</code>, etc. work</td>
                    <td>These functions are removed completely</td>
                    <td>High - Code using these functions will fail</td>
                </tr>
                <tr>
                    <td>String/Number Comparisons</td>
                    <td>Loose comparison, non-numeric strings convert to 0</td>
                    <td>Stricter comparison rules</td>
                    <td>Medium - Logic may change in conditional statements</td>
                </tr>
                <tr>
                    <td>Error Handling</td>
                    <td>Many issues raise notices or warnings</td>
                    <td>More fatal errors and exceptions</td>
                    <td>High - Previously working code may halt execution</td>
                </tr>
                <tr>
                    <td>Type System</td>
                    <td>More permissive type coercion</td>
                    <td>Stricter type enforcement</td>
                    <td>Medium - Type-related bugs may surface</td>
                </tr>
                <tr>
                    <td>Array Handling</td>
                    <td>Creates arrays/objects on null access</td>
                    <td>TypeError on null access</td>
                    <td>Medium - Code assuming auto-creation will break</td>
                </tr>
            </tbody>
        </table>
        
        <p>Other significant PHP8 changes:</p>
        <ul>
            <li>Union Types</li>
            <li>Named Arguments</li>
            <li>Constructor Property Promotion</li>
            <li>Attributes (Annotations)</li>
            <li>match Expression (replacement for switch)</li>
            <li>Nullsafe Operator</li>
            <li>Just-In-Time Compilation</li>
        </ul>
    </div>
    
    <footer>
        <p>PHP7 to PHP8 Migration Test Suite</p>
        <p>Current PHP version: <?php echo phpversion(); ?></p>
    </footer>
</body>
</html>
