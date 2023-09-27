<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# Setting up DreizettPlus Web Application

Follow these steps to set up the DreizettPlus web application on your system:

1. **Copy the Environment File:**
    - Copy the `.env.example` file to `.env`:
      ```
      cp .env.example .env
      ```

2. **Start Docker Containers:**
    - Make sure you have Docker and Docker Compose installed on your system.
    - Run the following command to start the Docker containers:
      ```
      docker-compose up
      ```

3. **Configure Laravel:**
    - Access the Docker container for the web application with a bash shell:
      ```
      docker exec -it dreizettplus_web-app bash
      ```
    - Inside the container, run the following commands:
      a) Generate an application key:
         ```
         php artisan key:generate
         ```
      b) Migrate the database:
         ```
         php artisan migrate
         ```
      c) Seed the database (if needed):
         ```
         php artisan db:seed
         ```

4. **Install JavaScript Dependencies:**
    - Ensure you have Node.js 18 or higher installed on your system.
    - Install the required JavaScript dependencies:
      ```
      npm install
      ```

5. **Build JavaScript Assets:**
    - Compile and build the JavaScript assets for the application:
      ```
      npm run dev
      ```

That's it! Your DreizettPlus web application should now be set up and ready to use. You can access it in your web browser to start using the application.
