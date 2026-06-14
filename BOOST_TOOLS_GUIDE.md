# Laravel Boost Tools - Simple Usage Guide

This guide explains each Laravel Boost MCP tool in plain English: what it does, when to use it, and an example you can type into Cline (in **Act** mode).

> **How it works:** You don't call these tools by name. You just ask Cline in normal English, and it picks the right Boost tool for you. The "Example prompt" lines below are what you type in the Cline chat box.

---

## 1. application-info
**What it does:** Gives a full snapshot of your app - PHP version, Laravel version, database engine, installed packages (with versions), and all your Eloquent models.

**When to use:** At the start of a chat, so Cline writes code that matches *your* exact versions (Laravel 12, MongoDB, etc.) instead of guessing.

**Example prompt:**
```
Show me my application info using Boost.
```

**You get back:** "Laravel 12.62, PHP 8.4, MongoDB, models: Event, Ticket, Category, Location, Tag, Subscription, User..."

---

## 2. database-schema
**What it does:** Reads the structure of your database - tables/collections, columns, types, indexes, and relationships.

**When to use:** When you want to understand or document your data structure, or before writing a query.

**Example prompt:**
```
Use Boost to show the schema for my events and tickets tables.
```

**You get back:** Column names and types for each table, like `events: title (string), start_time (datetime), category_id (objectId)...`

---

## 3. database-connections
**What it does:** Lists the database connections configured in your app.

**When to use:** When you have more than one database, or to confirm which connection is the default.

**Example prompt:**
```
What database connections are configured?
```

**You get back:** A list like `mongodb (default)`.

---

## 4. database-query
**What it does:** Runs a **read-only** query (SELECT, SHOW, EXPLAIN, DESCRIBE) against your database. It cannot change or delete data.

**When to use:** To quickly check real data without opening a DB client.

**Example prompt:**
```
Use Boost to query how many events are in the database.
```

**You get back:** The actual rows/result, e.g. `count: 42`.

---

## 5. tinker
**What it does:** Runs PHP code inside your live app (just like `php artisan tinker`).

**When to use:** To test logic, check if a method works, or inspect a model relationship - on the fly.

**Example prompt:**
```
Use tinker to get the first event with its tickets loaded.
```

**You get back:** The result of the code, e.g. the event object and its related tickets.

> Tip: For testing app behavior, prefer real tests over creating data with tinker.

---

## 6. last-error
**What it does:** Shows the most recent backend error/exception from your app.

**When to use:** Right after something breaks, so Cline can see the real stack trace and fix it.

**Example prompt:**
```
What was the last error? Use Boost to check and fix it.
```

**You get back:** The exception message, file, and line number.

---

## 7. read-log-entries
**What it does:** Reads the last N lines from your Laravel log file (`storage/logs/laravel.log`), handling multi-line entries correctly.

**When to use:** To investigate recurring issues or see what happened over time (not just the last error).

**Example prompt:**
```
Read the last 20 log entries using Boost.
```

**You get back:** The most recent log messages with timestamps.

---

## 8. browser-logs
**What it does:** Reads logs and errors from the **browser** (frontend JavaScript console).

**When to use:** When debugging frontend/JS problems, not backend ones.

**Example prompt:**
```
Show me the last 10 browser logs.
```

**You get back:** Recent JS console output and errors.

---

## 9. list-routes
**What it does:** Lists all routes in your app. You can filter by method, name, path, controller, etc.

**When to use:** To see your API endpoints or find which controller handles a URL.

**Example prompt:**
```
Use Boost to list all my API routes for events.
```

**You get back:** A table of routes like `GET /api/events -> EventController@index`.

---

## 10. list-artisan-commands
**What it does:** Lists every Artisan command available in your app.

**When to use:** When you forget a command name or want to see custom commands.

**Example prompt:**
```
List all available artisan commands.
```

**You get back:** The full command list (migrate, db:seed, your custom ones, etc.).

---

## 11. get-config
**What it does:** Reads one config value using dot notation (e.g. `app.name`, `database.default`).

**When to use:** To check a specific setting without opening config files.

**Example prompt:**
```
What is the value of database.default in my config?
```

**You get back:** The value, e.g. `mongodb`.

---

## 12. list-available-config-keys
**What it does:** Lists every config key available in your app (in dot notation).

**When to use:** When you're not sure of the exact key name to read with `get-config`.

**Example prompt:**
```
List all available config keys related to mail.
```

**You get back:** Keys like `mail.default`, `mail.mailers.smtp.host`, etc.

---

## 13. list-available-env-vars
**What it does:** Lists the **names** of environment variables from a `.env` file (names only, helps avoid exposing secret values).

**When to use:** To see what env vars exist before referencing them in code.

**Example prompt:**
```
List the available env variable names.
```

**You get back:** Names like `APP_NAME`, `DB_CONNECTION`, `DB_DATABASE`...

---

## 14. get-absolute-url
**What it does:** Turns a relative path or named route into a full absolute URL.

**When to use:** When generating links so they're valid and complete.

**Example prompt:**
```
Give me the absolute URL for /api/events.
```

**You get back:** `http://localhost/api/events`.

---

## 15. search-docs
**What it does:** Searches the official Laravel ecosystem documentation, matched to *your* installed package versions (17,000+ docs entries).

**When to use:** Before writing code with a Laravel feature, so it follows current best practices for your version.

**Example prompt:**
```
Search the docs for how to use API resource collections in Laravel 12.
```

**You get back:** Relevant, version-correct documentation snippets.

---

## Quick Reference Table

| Tool | One-line purpose |
|---|---|
| application-info | Versions, packages, models overview |
| database-schema | Table/collection structure |
| database-connections | List DB connections |
| database-query | Run read-only queries |
| tinker | Run PHP code live |
| last-error | See the latest backend error |
| read-log-entries | Read recent app log lines |
| browser-logs | Read frontend JS logs |
| list-routes | List app routes |
| list-artisan-commands | List Artisan commands |
| get-config | Read one config value |
| list-available-config-keys | List all config keys |
| list-available-env-vars | List env var names |
| get-absolute-url | Build a full URL |
| search-docs | Search version-correct Laravel docs |

---

## Common Workflows for This Project (Event Manager)

**Understand the app before coding:**
```
Use application-info and database-schema to summarize my event manager app.
```

**Debug a failing API request:**
```
Check the last error and recent logs, then suggest a fix.
```

**Build a new feature correctly:**
```
Search the docs for Eloquent relationships, then show how Event relates to Tickets in my models.
```

**Inspect real data safely:**
```
Query how many tickets exist per event using Boost.
```

---

## Tips for Best Results
- Put Cline in **Act** mode so it actually runs the tools (Plan mode only discusses).
- Start new chats with `application-info` so the model knows your exact stack.
- `database-query` is read-only - it can never modify your data, so it's safe.
- Use a capable model (like deepseek-v4-flash) for reliable tool calling.
