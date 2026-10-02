#!/usr/bin/env bash
set -euo pipefail

# Configuration
HOST="127.0.0.1"
PORT="8000"
URL="http://$HOST:$PORT"

# Determine script and project root directories (robust even when invoked from elsewhere)
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
ROOT_DIR="$(cd "$SCRIPT_DIR/.." && pwd)"

cd "$ROOT_DIR"

echo "Opening application at $URL (will start server if needed)"

# Ensure storage log directory exists
mkdir -p "$ROOT_DIR/storage/logs"
LOG_FILE="$ROOT_DIR/storage/logs/serve.log"
touch "$LOG_FILE"

# Function to open URL in browser if possible
open_url() {
  if command -v xdg-open >/dev/null 2>&1 && [ -n "${DISPLAY-}" ]; then
    xdg-open "$URL" >/dev/null 2>&1 || echo "Could not open browser with xdg-open"
  else
    echo "Open your browser and visit: $URL"
  fi
}

# Check if server responds
if curl -sSf "$URL" >/dev/null 2>&1; then
  echo "Server already running. Opening browser..."
  open_url
  exit 0
fi

# If port is already in use, report the process and attempt to open URL
if command -v ss >/dev/null 2>&1; then
  if ss -ltn "sport = :$PORT" | grep -q LISTEN; then
    echo "Port $PORT is already in use. Attempting to open $URL anyway."
    if command -v lsof >/dev/null 2>&1; then
      echo "Process using port $PORT:" && lsof -nP -iTCP:$PORT -sTCP:LISTEN
    else
      ss -ltnp | grep ":$PORT"
    fi
    open_url
    exit 0
  fi
fi

# Start the server in background and redirect logs
nohup php artisan serve --host="$HOST" --port="$PORT" > "$LOG_FILE" 2>&1 &
PID=$!
echo "Started artisan serve (PID $PID). Waiting for server to become ready... (logs: $LOG_FILE)"

# Wait until the server becomes available
for i in $(seq 1 30); do
  if curl -sSf "$URL" >/dev/null 2>&1; then
    echo "Server is up. Opening browser..."
    open_url
    exit 0
  fi
  sleep 1
done

echo "Timed out waiting for server at $URL. See $LOG_FILE for details."
tail -n +1 "$LOG_FILE" | sed -n '1,200p'
exit 1
