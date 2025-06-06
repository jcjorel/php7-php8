# PHP7 vs PHP8 Testing Prompt

This document serves as a clear, step-by-step prompt for manually testing the application in both PHP7.4 and PHP8.2 environments. Follow these instructions exactly to document differences between versions.

## Step 1: Launch Testing Environment

Run this command in your terminal:

```bash
docker compose up -d
```

This will start both PHP versions simultaneously:
- PHP7.4: http://localhost:7074
- PHP8.2: http://localhost:8082

## Step 2: Setup Browser Windows

1. Open two browser windows side by side
2. In the left window, navigate to: http://localhost:7074 (PHP7.4)
3. In the right window, navigate to: http://localhost:8082 (PHP8.2)
4. Verify that both pages load and display their PHP version numbers

## Step 3: Check Initial Page Load

1. In both windows, verify:
   - Page loads without errors
   - PHP version displays correctly (7.4.x in left window, 8.2.x in right window)
   - All navigation links work when clicked

2. Record any differences in a test document using this format:
   ```
   Initial Page Load:
   - PHP7.4: [Describe behavior and appearance]
   - PHP8.2: [Describe behavior and appearance]
   - Differences: [List any differences observed]
   ```

## Step 4: Test Deprecated Functions

1. In both windows, click on "Deprecated/Removed Functions" in the navigation
2. For each function test (`each()`, `create_function()`, `get_magic_quotes_gpc()`), compare:
   - Any error messages (type, severity, content)
   - Whether the function executes or fails
   - Any visual differences in the output

3. Record observations with this format:
   ```
   Deprecated Functions:
   
   each() function:
   - PHP7.4: [Describe behavior, error messages]
   - PHP8.2: [Describe behavior, error messages]
   
   create_function():
   - PHP7.4: [Describe behavior, error messages]
   - PHP8.2: [Describe behavior, error messages]
   
   get_magic_quotes_gpc():
   - PHP7.4: [Describe behavior, error messages]
   - PHP8.2: [Describe behavior, error messages]
   ```

## Step 5: Test String/Numeric Comparisons

1. In both windows, click on "String/Numeric Comparisons" in the navigation
2. Compare results of:
   - String to number comparison examples
   - Numeric string array key behavior
   - String to number casting operations

3. Record any differences with this format:
   ```
   String/Numeric Comparisons:
   
   Comparison results:
   - PHP7.4: [List comparison results]
   - PHP8.2: [List comparison results]
   - Key differences: [Note specific differences in behavior]
   
   Array key handling:
   - PHP7.4: [Describe behavior]
   - PHP8.2: [Describe behavior]
   - Key differences: [Note specific differences in behavior]
   ```

## Step 6: Test Error Handling

1. In both windows, click on "Error Handling" in the navigation
2. Compare how each version handles:
   - Division by zero operations
   - Undefined variable access
   - Array access on non-arrays
   - Type coercion scenarios

3. Record with this format:
   ```
   Error Handling:
   
   Division by zero:
   - PHP7.4: [Describe error type/message]
   - PHP8.2: [Describe error type/message]
   
   Undefined variables:
   - PHP7.4: [Describe error type/message]
   - PHP8.2: [Describe error type/message]
   
   Non-array access:
   - PHP7.4: [Describe error type/message]
   - PHP8.2: [Describe error type/message]
   ```

## Step 7: Create Migration Assessment Summary

1. After completing all tests, create a summary of findings:
   ```
   PHP7 to PHP8 Migration Assessment:
   
   Critical Issues (Breaks Application):
   1. [List functions/features that completely fail in PHP8]
   2. [...]
   
   Warning-Level Issues (Needs Attention):
   1. [List behaviors that changed but don't break functionality]
   2. [...]
   
   Notice-Level Issues (Minor):
   1. [List minor differences that have minimal impact]
   2. [...]
   
   Migration Recommendations:
   1. [List specific code changes needed]
   2. [List alternative approaches for removed functions]
   3. [List error handling adjustments needed]
   ```

## Step 8: Document Test Environment

Include this information in your test documentation:

```
Test Environment:
- Test Date: [Current Date]
- PHP7 Version: [Exact version from page footer]
- PHP8 Version: [Exact version from page footer]
- Browser Used: [Your browser name and version]
```

## Step 9: Shutdown Test Environment

When testing is complete, run:

```bash
docker compose down
```

---

**Notes for Future Migration Testing:**
- Save your test results in a file labeled "pre-migration-test-results.md"
- After making migration changes, repeat these exact steps
- Compare results to identify if all compatibility issues were resolved
- Focus on verifying that PHP8 behavior matches the expected behavior described in this document
