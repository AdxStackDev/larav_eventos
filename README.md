# 🎫 Event Manager - Laravel MongoDB Application

A comprehensive event management system built with Laravel 12 and MongoDB, featuring a complete RESTful API for managing events, tickets, subscriptions, categories, locations, and tags.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![MongoDB](https://img.shields.io/badge/MongoDB-5.5-green.svg)](https://www.mongodb.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

---

## 📋 Table of Contents

- [Features](#-features)
- [Architecture](#-architecture)
- [Requirements](#-requirements)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [API Documentation](#-api-documentation)
- [Database Structure](#-database-structure)
- [Usage Examples](#-usage-examples)
- [Testing](#-testing)
- [Contributing](#-contributing)
- [License](#-license)

---

## ✨ Features

### Core Functionality
- 🎪 **Event Management** - Create, update, delete, and manage events
- 🎟️ **Ticket System** - Multiple ticket types with pricing and quantity control
- 📅 **Subscriptions** - User subscriptions to events and categories
- 📂 **Categories** - Organize events with categories and tags
- 📍 **Locations** - Venue management with geolocation support
- 🏷️ **Tags** - Flexible tagging system for categorization

### Technical Features
- ✅ **RESTful API** - Complete API with standardized responses
- ✅ **Repository Pattern** - Clean architecture with dependency injection
- ✅ **Service Layer** - Business logic separation
- ✅ **Eloquent Relationships** - Optimized with eager loading
- ✅ **Soft Deletes** - Data preservation and recovery
- ✅ **Event-Driven Architecture** - Observers and listeners
- ✅ **Request Validation** - Custom validation with error messages
- ✅ **MongoDB Integration** - NoSQL database with Laravel MongoDB

---

## 🏗️ Architecture

### Design Pattern
```
Request → Controller → Service → Repository → Model → MongoDB
                ↓
            Observer → Event → Listener
```

### Project Structure
```
app/
├── Events/              # Event broadcasting classes
├── Http/
│   ├── Controllers/
│   │   └── Api/        # API controllers
│   └── Requests/       # Form request validation
├── Listeners/          # Event listeners
├── Models/             # Eloquent MongoDB models
├── Observers/          # Model observers
├── Repositories/       # Repository pattern implementation
│   └── Interfaces/     # Repository contracts
└── Services/           # Business logic layer
```

---

## 📦 Requirements

- **PHP** >= 8.2
- **Composer** >= 2.0
- **MongoDB** >= 5.0 (or MongoDB Atlas)
- **MongoDB PHP Extension** >= 1.15
- **Node.js** >= 18.x (for frontend assets)
- **NPM** or **Yarn**

---

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/AdxStackDev/larav_eventos.git
cd larav_eventos
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Configure MongoDB Connection

Edit `.env` file with your MongoDB credentials:

**For MongoDB Atlas (Cloud):**
```env
DB_CONNECTION=mongodb
DB_HOST=your-cluster.mongodb.net
DB_PORT=27017
DB_DATABASE=eventos
DB_USERNAME=your_username
DB_PASSWORD=your_password
DB_DSN=mongodb+srv://username:password@cluster.mongodb.net/eventos?retryWrites=true&w=majority
```

**For Local MongoDB:**
```env
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=eventos
DB_USERNAME=
DB_PASSWORD=
```

### 5. Build Assets
```bash
npm run build
```

### 6. Start the Application
```bash
# Start Laravel development server
php artisan serve

# Or use the dev script (runs server, queue, logs, and Vite)
composer run dev
```

The application will be available at `http://localhost:8000`

---

## ⚙️ Configuration

### MongoDB Setup

#### Option 1: MongoDB Atlas (Recommended)
1. Create account at [MongoDB Atlas](https://www.mongodb.com/cloud/atlas)
2. Create a cluster
3. Get connection string
4. Update `.env` with your credentials

#### Option 2: Local MongoDB
1. Download from [MongoDB Community Server](https://www.mongodb.com/try/download/community)
2. Install and start MongoDB service:
   ```bash
   # Windows
   net start MongoDB
   
   # Linux/Mac
   sudo systemctl start mongod
   ```
3. Update `.env` with local connection

### Clear Configuration Cache
```bash
php artisan config:clear
php artisan cache:clear
```

---

## 📚 API Documentation

### Base URL
```
http://localhost:8000/api
```

### Available Endpoints

#### Events
```http
GET    /api/events           # List all events
GET    /api/events/{id}      # Get single event
POST   /api/events           # Create event
PUT    /api/events/{id}      # Update event
DELETE /api/events/{id}      # Delete event
```

#### Tickets
```http
GET    /api/tickets          # List all tickets
GET    /api/tickets/{id}     # Get single ticket
POST   /api/tickets          # Create ticket
PUT    /api/tickets/{id}     # Update ticket
DELETE /api/tickets/{id}     # Delete ticket
```

#### Subscriptions
```http
GET    /api/subscriptions    # List all subscriptions
GET    /api/subscriptions/{id} # Get single subscription
POST   /api/subscriptions    # Create subscription
PUT    /api/subscriptions/{id} # Update subscription
DELETE /api/subscriptions/{id} # Delete subscription
```

#### Categories
```http
GET    /api/categories       # List all categories
GET    /api/categories/{id}  # Get single category
POST   /api/categories       # Create category
PUT    /api/categories/{id}  # Update category
DELETE /api/categories/{id}  # Delete category
```

#### Locations
```http
GET    /api/locations        # List all locations
GET    /api/locations/{id}   # Get single location
POST   /api/locations        # Create location
PUT    /api/locations/{id}   # Update location
DELETE /api/locations/{id}   # Delete location
```

#### Tags
```http
GET    /api/tags             # List all tags
GET    /api/tags/{id}        # Get single tag
POST   /api/tags             # Create tag
PUT    /api/tags/{id}        # Update tag
DELETE /api/tags/{id}        # Delete tag
```

### Response Format
All API responses follow this structure:
```json
{
    "success": true,
    "message": "Optional message",
    "data": {}
}
```

**For complete API documentation, see [API_DOCUMENTATION.md](API_DOCUMENTATION.md)**

---

## 🗄️ Database Structure

### Collections (Tables)

#### Events
```javascript
{
    _id: ObjectId,
    title: String,
    description: String,
    image: String,
    start_time: DateTime,
    end_time: DateTime,
    user_id: ObjectId,
    category_id: ObjectId,
    location_id: ObjectId,
    created_at: DateTime,
    updated_at: DateTime,
    deleted_at: DateTime
}
```

#### Tickets
```javascript
{
    _id: ObjectId,
    name: String,
    description: String,
    price: Number,
    quantity: Number,
    event_id: ObjectId,
    category_id: ObjectId,
    location_id: ObjectId,
    created_at: DateTime,
    updated_at: DateTime,
    deleted_at: DateTime
}
```

#### Subscriptions
```javascript
{
    _id: ObjectId,
    user_id: ObjectId,
    event_id: ObjectId,
    category_id: ObjectId,
    start_date: DateTime,
    expire_date: DateTime,
    created_at: DateTime,
    updated_at: DateTime,
    deleted_at: DateTime
}
```

### Relationships

```
User (1) ──────< (Many) Event
User (1) ──────< (Many) Subscription

Category (1) ──< (Many) Event
Category (1) ──< (Many) Ticket
Category (1) ──< (Many) Subscription

Location (1) ──< (Many) Event
Location (1) ──< (Many) Ticket

Event (1) ─────< (Many) Ticket
Event (1) ─────< (Many) Subscription
```

---

## 💡 Usage Examples

### Create an Event
```bash
curl -X POST http://localhost:8000/api/events \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Summer Music Festival",
    "description": "Annual summer music event",
    "start_time": "2026-07-15 18:00:00",
    "end_time": "2026-07-15 23:00:00"
  }'
```

### Get Events with Relationships
```bash
curl http://localhost:8000/api/events
```

### Create a Ticket
```bash
curl -X POST http://localhost:8000/api/tickets \
  -H "Content-Type: application/json" \
  -d '{
    "name": "VIP Ticket",
    "description": "VIP access with backstage pass",
    "price": 150.00,
    "quantity": 100,
    "event_id": "event_id_here"
  }'
```

### Using Relationships in Code
```php
// Get event with all relationships
$event = Event::with(['user', 'category', 'location', 'tickets'])
    ->find($id);

// Get user's events
$user = User::find($userId);
$events = $user->events;

// Get all tickets for an event
$event = Event::find($eventId);
$tickets = $event->tickets;
```

---

## 🧪 Testing

### Run Tests
```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter EventTest
```

### Manual API Testing

Use tools like:
- **Postman** - Import API collection
- **Insomnia** - REST client
- **cURL** - Command line testing
- **Thunder Client** - VS Code extension

---

## 🔧 Development

### Composer Scripts
```bash
# Setup project (install, migrate, build)
composer run setup

# Run development environment
composer run dev

# Run tests
composer run test
```

### Code Style
```bash
# Format code with Laravel Pint
./vendor/bin/pint
```

### Debugging
```bash
# View logs in real-time
php artisan pail

# Clear all caches
php artisan optimize:clear
```

---

## 📝 Key Features Explained

### Event-Driven Architecture
The application uses Laravel's event system:
- **EventObserver** - Monitors event lifecycle
- **GlobalEvent** - Broadcasts event creation
- **SendEventNotification** - Handles notifications

### Repository Pattern
Clean separation of concerns:
```php
Controller → Service → Repository → Model
```

Benefits:
- Testable code
- Swappable data sources
- Clean architecture
- Dependency injection

### Soft Deletes
All models support soft deletes:
```php
// Soft delete
$event->delete();

// Restore
$event->restore();

// Permanent delete
$event->forceDelete();

// Query with trashed
Event::withTrashed()->get();
```

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Coding Standards
- Follow PSR-12 coding standards
- Write descriptive commit messages
- Add tests for new features
- Update documentation

---

## 🐛 Known Issues

- MongoDB migrations are not used (MongoDB is schema-less)
- Some migration files have incomplete schemas (models define the structure)

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👥 Authors

- **AdxStackDev** - [GitHub](https://github.com/AdxStackDev)

---

## 🙏 Acknowledgments

- Laravel Framework
- MongoDB Laravel Package
- Laravel Sanctum
- All contributors and supporters

---

## 📞 Support

For support, email your-email@example.com or open an issue on GitHub.

---

## 🔗 Links

- [Laravel Documentation](https://laravel.com/docs)
- [MongoDB Laravel Documentation](https://www.mongodb.com/docs/drivers/php/laravel-mongodb/)
- [API Documentation](API_DOCUMENTATION.md)
- [MongoDB Atlas](https://www.mongodb.com/cloud/atlas)

---

<p align="center">Made with ❤️ using Laravel and MongoDB</p>
