## Laravel Exam App
simple Laravel application that fetches programming jokes from the **Official Joke API** using **Guzzle**.  
The app demonstrates building a basic webpage from scratch with **Tailwind CSS** via CDN, and automatically displays a random joke on page load or when the user clicks a button.

## Tech Stack

- **PHP 8.2**  
- **Laravel v8.83.29**  
- **Composer 2.8.8**  
- **Tailwind CSS** (via CDN)  
- **Guzzle HTTP Client**  

## Requirements
- Git
- PHP 8.2 or higher
- Laravel v8.83.29
- Composer 2.8.8
- Internet connection (for Tailwind CDN and Joke API)

## Setup Local Environment
1. Clone the repository:
    ```bash
    git clone https://github.com/rommelpaa/laravel-exam-app.git
2. Navigate into the project folder::
    cd laravel-exam-app
3. Install Dependencies
    composer install
4. Serve the application locally:
    php artisan serve

Your app should now be running at http://127.0.0.1:8000.

## MVC / Project Structure
app
├─ Http/
│  └─ Controllers/
│     └─ JokeController.php      # Handles HTTP requests and responses
├─ Services/
│  └─ JokeService.php            # Contains logic to fetch random jokes using Guzzle
resources/
├─ views/
│  └─ jokes
|    └─index.blade.php          # Displays the webpage with jokes
public/
├─ index.php                     # Entry point

## How it works
1. Controller (JokeController)
    - Receives requests from the user (page load or button click).
    - Calls JokeService to fetch jokes.
    - Returns the jokes as JSON to the frontend.
2. Service (JokeService)
    - Encapsulates all logic for fetching jokes from the Official Joke API using Guzzle.
    - Returns a random set of jokes, with a default limit of 3.
3. View (jokes.blade.php)
    - Displays the frontend page.
    - Uses Tailwind CSS for styling.
    - Calls the API via JavaScript fetch to show jokes dynamically.

Usage: 
- Visit the homepage to see a random programming joke.
- Click the "Show Random Joke" button to fetch a new joke.
- Jokes are fetched automatically on page load as well.