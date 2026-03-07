# Sanctum — Backend

A Laravel REST API powering a community platform centered around structured wellness, healing, and instructional protocols. Users can post protocols, start threads, comment, vote, and leave reviews.

---

## Tech Stack

- **Laravel** — REST API
- **Supabase/PostgreSQL** — Primary database
- **Laravel Sanctum** — Token-based authentication
- **Typesense** — Full-text search for protocols and threads
- **Eloquent Observers** — Auto-sync Typesense on model changes

---

## Requirements

- PHP 
- Composer
- PostgreSQL
- Typesense (local or cloud)

---

## Setup Instructions

### 1. Clone the repository

```bash
git clone <repository-url>
```

### 2. Install dependencies

```bash
composer install
```

### 3. Configure environment

```bash
cp .env.example .env
```

Open `.env` and fill in your database and Typesense credentials (see [Configuration](#configuration) below).

### 4. Run migrations and seed

```bash
php artisan migrate
php artisan db:seed
```

This will:
- Create all tables
- Set up Typesense collections
- Seed wellness-themed protocols, threads, comments, votes, and reviews
- Create a test admin account (`admin@gmail.com` / `admin123`)

### 5. Start the server

```bash
php artisan serve
```

API is available at `http://localhost:8000/api`.

---

## Configuration

### Database

**Supabase (default):**
Set `DB_URL` in your `.env` with your Supabase connection string:
```env
DB_URL=postgresql://postgres:[password]@db.[project-ref].supabase.co:5432/postgres
```

**Local PostgreSQL:**
Comment out `DB_URL` and use individual values instead:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=discussion_hub
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### Typesense
#### Cloud 

```env
TYPESENSE_API_KEY=your_cloud_api_key
TYPESENSE_HOST=xxx.a1.typesense.net
TYPESENSE_PORT=443
TYPESENSE_PROTOCOL=https
```

---

## API Overview

Protected routes require a `Bearer` token in the `Authorization` header obtained from `/api/login`.

### Authentication

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| POST | `/api/register` | Register a new user | Public |
| POST | `/api/login` | Login and receive token | Public |
| POST | `/api/logout` | Invalidate token | Protected |
| GET | `/api/me` | Get authenticated user | Protected |

### Protocols

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/protocols/{id}` | Get protocol by ID | Public |
| POST | `/api/protocols` | Create a protocol | Protected |
| DELETE | `/api/protocols/{id}` | Soft delete a protocol | Protected |

### Threads

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/threads/{id}` | Get threads by protocol ID | Public |
| GET | `/api/threads/view/{id}` | Get single thread by ID | Public |
| POST | `/api/threads` | Create a thread | Protected |
| DELETE | `/api/threads/{id}` | Soft delete a thread | Protected |

**Query params for thread list:**
- `threadSort=recent` (default) — sort by newest
- `threadSort=upvoted` — sort by upvote count
- `perPage=10` — results per page
- `page=1` — page number

### Comments

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/threads/{threadId}/comments` | Get comments for a thread | Public |
| POST | `/api/threads/{threadId}/comments` | Post a comment | Protected |
| DELETE | `/api/comments/{id}` | Soft delete a comment | Protected |

**Request body for creating a comment:**
```json
{
  "comment": "Your comment text",
  "parent_id": null
}
```

Pass `parent_id` to reply to an existing comment. Omit or pass `null` for top-level comments.

### Reviews

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/api/reviews/{id}` | Get reviews by protocol ID | Public |
| POST | `/api/protocols/{id}/reviews` | Submit a review | Protected |
| DELETE | `/api/reviews/{id}` | Soft delete a review | Protected |
| GET | `/api/protocols/{protocolId}/reviews/has-reviewed` | Check if authenticated user has reviewed | Protected |

**Request body for creating a review:**
```json
{
  "rating": 5,
  "feedback": "This protocol changed my life."
}
```

### Votes

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| POST | `/api/threads/{votableId}/vote` | Vote on a thread | Protected |
| POST | `/api/comments/{votableId}/vote` | Vote on a comment | Protected |
| GET | `/api/threads/{votableId}/vote/user` | Get user's vote on a thread | Protected |
| GET | `/api/comments/{votableId}/vote/user` | Get user's vote on a comment | Protected |

**Request body for voting:**
```json
{
  "type": "upvote"
}
```

Voting the same type again toggles the vote off. Voting the opposite type switches it.
---

### Soft Deletes

All major models use `SoftDeletes`. Deleting a Protocol cascades soft deletes to its Threads via `ProtocolObserver`. Typesense is kept in sync automatically through Eloquent Observers.

---

## Observers & Typesense Sync

| Observer | Events Handled |
|----------|---------------|
| `ProtocolObserver` | created, updated → index; deleted → remove + cascade threads |
| `ThreadObserver` | created, updated → index; deleted → remove |
| `VoteObserver` | created, updated, deleted → recalculate vote counts |
| `ReviewObserver` | created, updated, deleted → recalculate review counts and average rating |

---

## Test Account

After seeding, a test account is available:

```
Email:    admin@gmail.com
Password: admin123
```

---
