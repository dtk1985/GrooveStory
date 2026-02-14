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

### Database Schema

The application uses a MariaDB database with the following structure:

```sql
-- Songs synced from Jellyfin
songs: id, jellyfin_id, artist, title, release_year, album, created_at

-- Game sessions
games: id, session_id, score, status, created_at, updated_at

-- Cards placed on timeline
game_cards: id, game_id, song_id, position, placed_at
```

### Security Features

- **Prepared Statements:** All database queries use PDO prepared statements to prevent SQL injection
- **Environment Variables:** Credentials stored in `.env` file (gitignored)
- **Read-only Jellyfin Account:** Dedicated service account with minimal permissions
- **Input Validation:** All user inputs are validated before database operations

## How It Works

Players guess where a song falls on a timeline by:
1. Listening to a mystery song (streamed from Jellyfin)
2. Placing it before or after another song based on release year
3. Getting points for correct placements

## Repository

https://github.com/dtk1985/GrooveStory
