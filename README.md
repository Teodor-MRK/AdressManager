# AdressManager
A simple PHP-Based Program I made, that manages Adresses in a .JSON file.

I did this simple PHP-Program, with some help of @retofroelicher, since he is my Coach at ICT-BLJ.

## What does it do?
It is just a simple PHP-Program, that connects to a .JSON file, that has 20 premade example ID's with first and last name, adress, Zip Code and Place. The Program has 4 Main Functions:
- **List:** Lists every ID in the .JSON File
- **Show Adress:** Input a ID (Integer), to see the Info of that ID
- **Insert Adress:**
Make a new ID that contains First name, Last name, Adress, Zip Code and Place.

- **Delete Adress:** Deletes a ID by Inputing the ID.

## How to use it?
This Program should work normally if you have PHP installed, but the way I used it is via a Docker Container made by the ICT-BLJ called [phpdev](https://github.com/ICT-BLJ/phpdev). On that Repository, do the **Installation** Step, and put the ```.php``` and ```.JSON``` File in ```/opt/code```, and execute the Program in the Terminal by typing ```php adressmanagement.php```

## Purpose of this Program
This Program isn't really a helpful or life-changing, but it's more for me, to show my abilities in PHP and GitHub, since this is my first Repository I made myself. 