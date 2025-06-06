#!/bin/bash

echo "Starting PHP7.4 container..."
docker compose -f compose.yaml up php7 -d
echo "PHP7.4 is running at http://localhost:7074/"
echo "Press Ctrl+C to stop viewing logs"
docker compose -f compose.yaml logs -f php7
