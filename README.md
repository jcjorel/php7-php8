# PHP7 to PHP8 Migration Test Application

This application demonstrates common incompatibilities between PHP7 and PHP8, helping developers understand and address migration issues.

## Incompatibilities Demonstrated

1. **Deprecated/Removed Functions**
   - `each()` function (removed in PHP8)
   - `create_function()` (removed in PHP8)
   - `get_magic_quotes_gpc()` (removed in PHP8)

2. **String/Numeric Comparisons**
   - Changes in how PHP8 handles loose comparisons with numeric strings
   - Array key handling differences with numeric strings
   - String to number casting behavior changes

3. **Error Handling**
   - Division by zero (warning in PHP7, exception in PHP8)
   - Undefined variable access (notice in PHP7, warning in PHP8)
   - Type errors and parameter coercion
   - Array/property access on non-arrays

## Requirements

- Docker
- Docker Compose

## Running the Application

### Start PHP7.4 Container

```bash
./scripts/run-php7.sh
```

This runs the application in PHP7.4 at [http://localhost:7074](http://localhost:7074)

### Start PHP8.2 Container

```bash
./scripts/run-php8.sh
```

This runs the identical code in PHP8.2 at [http://localhost:8082](http://localhost:8082)

### Running Both in Parallel

You can run both containers simultaneously to compare the behavior side by side:

```bash
docker compose up -d
```

Then access:
- PHP7.4: [http://localhost:7074](http://localhost:7074)
- PHP8.2: [http://localhost:8082](http://localhost:8082)

### Stopping the Containers

```bash
docker compose down
```

## Project Structure

```
php7-php8/
├── app/                  # Application code
│   ├── index.php         # Main application
│   ├── includes/         # PHP test files
│   │   ├── deprecated.php
│   │   ├── comparisons.php
│   │   └── errors.php
│   └── assets/
│       └── style.css     # Styling
├── docker/
│   ├── php7/
│   │   └── Dockerfile    # PHP7.4 configuration
│   └── php8/
│       └── Dockerfile    # PHP8.2 configuration
├── scripts/
│   ├── run-php7.sh       # Helper script for PHP7
│   └── run-php8.sh       # Helper script for PHP8
├── compose.yaml          # Docker configuration
└── README.md             # This file
```

## Key Migration Tips

When migrating from PHP7 to PHP8:

1. Replace removed functions with modern alternatives
2. Review type comparison logic, especially string/number comparisons
3. Implement proper error handling for operations that now throw exceptions
4. Use static analysis tools to identify potential issues
5. Test thoroughly in both environments before migrating

## Additional PHP8 Features Not Demonstrated

- Union Types
- Named Arguments
- Constructor Property Promotion 
- Attributes (annotations)
- match Expression
- Nullsafe Operator
- Just-In-Time Compilation

## License

This project is open source and available for educational purposes.
