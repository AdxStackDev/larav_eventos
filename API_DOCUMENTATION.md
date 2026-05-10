# Event Manager API Documentation

## Base URL
```
http://localhost:8000/api
```

## Response Format
All API responses follow this structure:
```json
{
    "success": true|false,
    "message": "Optional message",
    "data": {} | []
}
```

---

## 🎫 Events API

### List All Events
```http
GET /api/events
```
**Response:** Returns latest 10 events with user, category, and location relationships.

### Get Single Event
```http
GET /api/events/{id}
```
**Response:** Returns event with all relationships (user, category, location, tickets, subscriptions).

### Create Event
```http
POST /api/events
Content-Type: application/json

{
    "title": "Summer Music Festival",
    "description": "Annual summer music event",
    "image": "https://example.com/image.jpg",
    "start_time": "2026-07-15 18:00:00",
    "end_time": "2026-07-15 23:00:00",
    "user_id": "user_id_here",
    "category_id": "category_id_here",
    "location_id": "location_id_here"
}
```

**Validation Rules:**
- `title`: required, string, max 255 chars
- `description`: required, string
- `image`: optional, valid URL
- `start_time`: optional, valid date
- `end_time`: optional, valid date, must be after start_time
- `user_id`, `category_id`, `location_id`: optional, string

### Update Event
```http
PUT /api/events/{id}
Content-Type: application/json

{
    "title": "Updated Event Title",
    "description": "Updated description"
}
```

### Delete Event
```http
DELETE /api/events/{id}
```
**Note:** Soft delete - event is not permanently removed.

---

## 🎟️ Tickets API

### List All Tickets
```http
GET /api/tickets
```
**Response:** Returns all tickets with event, category, and location relationships.

### Get Single Ticket
```http
GET /api/tickets/{id}
```

### Create Ticket
```http
POST /api/tickets
Content-Type: application/json

{
    "name": "VIP Ticket",
    "description": "VIP access with backstage pass",
    "price": 150.00,
    "quantity": 100,
    "event_id": "event_id_here",
    "category_id": "category_id_here",
    "location_id": "location_id_here"
}
```

**Validation Rules:**
- `name`: required, string, max 255 chars
- `description`: optional, string
- `price`: required, numeric, min 0
- `quantity`: required, integer, min 1
- `event_id`: required, string
- `category_id`, `location_id`: optional, string

### Update Ticket
```http
PUT /api/tickets/{id}
```

### Delete Ticket
```http
DELETE /api/tickets/{id}
```

---

## 📅 Subscriptions API

### List All Subscriptions
```http
GET /api/subscriptions
```
**Response:** Returns all subscriptions with user, event, and category relationships.

### Get Single Subscription
```http
GET /api/subscriptions/{id}
```

### Create Subscription
```http
POST /api/subscriptions
Content-Type: application/json

{
    "user_id": "user_id_here",
    "event_id": "event_id_here",
    "category_id": "category_id_here",
    "start_date": "2026-01-01",
    "expire_date": "2026-12-31"
}
```

**Validation Rules:**
- `user_id`: required, string
- `event_id`, `category_id`: optional, string
- `start_date`: required, valid date
- `expire_date`: required, valid date, must be after start_date

### Update Subscription
```http
PUT /api/subscriptions/{id}
```

### Delete Subscription
```http
DELETE /api/subscriptions/{id}
```

---

## 📂 Categories API

### List All Categories
```http
GET /api/categories
```
**Response:** Returns all categories with events, tickets, and subscriptions relationships.

### Get Single Category
```http
GET /api/categories/{id}
```

### Create Category
```http
POST /api/categories
Content-Type: application/json

{
    "name": "Music",
    "description": "Music events and concerts",
    "tags": ["rock", "pop", "jazz"]
}
```

**Validation Rules:**
- `name`: required, string, max 255 chars
- `description`: optional, string
- `tags`: optional, array

### Update Category
```http
PUT /api/categories/{id}
```

### Delete Category
```http
DELETE /api/categories/{id}
```

---

## 📍 Locations API

### List All Locations
```http
GET /api/locations
```
**Response:** Returns all locations with events and tickets relationships.

### Get Single Location
```http
GET /api/locations/{id}
```

### Create Location
```http
POST /api/locations
Content-Type: application/json

{
    "address": "123 Main Street",
    "city": "New York",
    "state": "NY",
    "country": "USA",
    "zip": "10001",
    "latitude": 40.7128,
    "longitude": -74.0060,
    "timezone": "America/New_York",
    "event_id": "event_id_here"
}
```

**Validation Rules:**
- `address`: required, string, max 255 chars
- `city`: required, string, max 100 chars
- `state`: optional, string, max 100 chars
- `country`: required, string, max 100 chars
- `zip`: optional, string, max 20 chars
- `latitude`: optional, numeric, between -90 and 90
- `longitude`: optional, numeric, between -180 and 180
- `timezone`: optional, string, max 50 chars
- `event_id`: optional, string

### Update Location
```http
PUT /api/locations/{id}
```

### Delete Location
```http
DELETE /api/locations/{id}
```

---

## 🏷️ Tags API

### List All Tags
```http
GET /api/tags
```

### Get Single Tag
```http
GET /api/tags/{id}
```

### Create Tag
```http
POST /api/tags
Content-Type: application/json

{
    "name": "Outdoor",
    "description": "Outdoor events"
}
```

**Validation Rules:**
- `name`: required, string, max 255 chars, unique
- `description`: optional, string

### Update Tag
```http
PUT /api/tags/{id}
```

### Delete Tag
```http
DELETE /api/tags/{id}
```

---

## Error Responses

### 404 Not Found
```json
{
    "success": false,
    "message": "Resource not found"
}
```

### 422 Validation Error
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "field_name": ["Error message"]
    }
}
```

### 500 Server Error
```json
{
    "success": false,
    "message": "Internal server error"
}
```

---

## Testing with cURL

### Create an Event
```bash
curl -X POST http://localhost:8000/api/events \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Test Event",
    "description": "This is a test event"
  }'
```

### Get All Events
```bash
curl http://localhost:8000/api/events
```

### Get Single Event with Relationships
```bash
curl http://localhost:8000/api/events/{event_id}
```

---

## Relationships Overview

### Event Relationships
- **belongsTo:** User, Category, Location
- **hasMany:** Tickets, Subscriptions

### Ticket Relationships
- **belongsTo:** Event, Category, Location

### Subscription Relationships
- **belongsTo:** User, Event, Category

### Category Relationships
- **hasMany:** Events, Tickets, Subscriptions

### Location Relationships
- **hasMany:** Events, Tickets

### User Relationships
- **hasMany:** Events, Subscriptions

---

## Notes

- All endpoints support soft deletes (data is not permanently removed)
- MongoDB ObjectIDs are used as primary keys
- Timestamps (created_at, updated_at, deleted_at) are automatically managed
- All date fields accept ISO 8601 format: `YYYY-MM-DD HH:MM:SS`
