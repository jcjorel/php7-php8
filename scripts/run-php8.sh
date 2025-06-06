#!/bin/bash

echo "Starting PHP8.2 container..."
docker compose -f compose.yaml up php8 -d
echo "PHP8.2 is running at http://localhost:8082/"
echo "Press Ctrl+C to stop viewing logs"
docker compose -f compose.yaml logs -f php8
