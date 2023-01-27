**Note! if you're using mysql database, you must run/start your xampp which is the "Apache and MySQL".

First, make sure to include these files:

php - this folder consist of php installer packages. Must be 8.1.1 version (updated)
www - this folder consist of the laravel project.
.gitignore - for git push purposes.
main.js - this serves as the main configuration of electron.
package.json - the node package manager setup.

Inside the www folder, must do these commands in gitbash
-composer i
-npm i
-cp .env.example .env
-php artisan key:generate
-php artisan migrate:fresh --seed
-php artisan serve

**Note! Don't forget your database name.

To run the laravel project with electron, use this command:
-npm start

To build the laravel project with electron, use this command:
-npm run build

***NOTE!! If opening the app would display error, delete the dist folder using "rm -rf dist" and re-run "npm run build" command. 

To run the app using an icon, go to dist/laravel-electron-win32-x64 folder and locate the laravel-electron.exe and send it to the desktop by creating a shortcut. 