# Crudphp2

Pracitice PHP CRUD very useful


the XAMPP database is named information 

and below is the table used
CREATE TABLE students (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(191) NOT NULL,
    email VARCHAR(191) NOT NULL,
    phone VARCHAR(191) NOT NULL,
    course VARCHAR(191) NOT NULL
)

ENCOUNTERED HASHING PROBLEM
A must remember $hashed_password = password_hash($password, PASSWORD_BCRYPT);// hash password