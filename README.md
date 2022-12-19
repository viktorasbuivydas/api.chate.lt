# run project locally

composer install
php artisan serve

# run websockets

php artisan websocket:serve

# Create admin user with super admin role

php artisan create:user {username} {email} {password} {role}
php artisan create:user Admin admin@gmail.com password "super admin"
