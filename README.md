# GrooveStory - Music Timeline Game

A music timeline guessing game built with PHP, similar to the card game "Hitster". Players listen to songs and place them in chronological order on a timeline.

## Tech Stack

- **PHP 8.2** - Backend language
- **MariaDB** - Database
- **Apache** - Web server with mod_rewrite
- **Docker + Docker Compose** - Containerization
- **Jellyfin API** - Music metadata source

## Quick Start

### Prerequisites

- Docker and Docker Compose installed

### Running the Application

```bash
docker-compose up -d --build
```

### Access Points

- **Web App:** http://localhost:8082
- **Database Admin (Adminer):** http://localhost:8081

#### Adminer Login

- **System:** MySQL
- **Server:** db
- **Username:** groovestory
- **Password:** (see .env file)
- **Database:** groovestory

### Stopping the Application

```bash
docker-compose down
```

## Project Status

Work in progress.

## How It Works

Players guess where a song falls on a timeline by:
1. Listening to a mystery song (streamed from Jellyfin)
2. Placing it before or after another song based on release year
3. Getting points for correct placements

## Repository

https://github.com/dtk1985/GrooveStory
