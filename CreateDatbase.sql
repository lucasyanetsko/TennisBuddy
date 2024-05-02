/** This is the code that creates the DB and the available courts 
that the user has to choose from on the AvailableCourts.php page **/


CREATE DATABASE IF NOT EXISTS users_and_courts;

USE users_and_courts;

CREATE TABLE users (
    userID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(40),
    password_md5 VARCHAR(32),
    first_name VARCHAR(40),
    last_name VARCHAR(40)
);

CREATE TABLE courts (
    courtID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    court_name VARCHAR(40),
    city VARCHAR(25),
    start_date DATE,
    end_date DATE,
    position VARCHAR(30),
    description VARCHAR(250)
);

CREATE TABLE assigned_courts (
    courtID SMALLINT,
    userID SMALLINT,
    date_selected DATE,
    date_approved DATE
);



-- grant all privileges on all tables in GuestBook database to Lucas
GRANT ALL PRIVILEGES ON users_and_courts.* TO 'Lucas'@'localhost';

 USE users_and_courts;
INSERT INTO courts (court_name, city, start_date, end_date, position, description) VALUES
('East City Park', 'Charlotte', '2024-05-1', '2080-05-15', 'Court 1', 'Beautiful park with well-maintained tennis courts'),
('John Memorial Park', 'Lake Norman', '2024-05-1', '2080-05-16', 'Court 2', 'Scenic location overlooking the river'),
('BlueGrass Park', 'Huntersville', '2024-05-1', '2080-05-17', 'Court 3', 'Convenient location with multiple tennis courts'),
('Tennis World Park', 'Mooresville', '2024-05-1', '2080-05-18', 'Court 4', 'Courts near the beach for a refreshing game');







