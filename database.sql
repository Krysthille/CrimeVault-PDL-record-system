CREATE DATABASE database;
-- open phpmyadmin and create a database named database with the following table and variables 
CREATE TABLE crimvevault_records(
    -> id INT,
    -> image LONGBOB,
    -> name VARCHAR(50),
    -> gender ENUM('male', 'female'),
    -> birthdate DATE,
    -> address VARCHAR(100),
    -> civilstatus VARCHAR(20),
    -> citizenship VARCHAR(20),
    -> dateofarrest DATE,
    -> timeofarrest TIME(),
    -> locationofarrest VARCHAR(50),
    -> arrestingofficer VARCHAR(50),
    -> charge VARCHAR(100),
    -> statute VARCHAR(200),
    -> description VARCHAR(200),
    -> courtdate DATE,
    -> casenumber VARCHAR(200),
    -> disposition VARCHAR(200),
    -> criminalhistory VARCHAR(200)
)
--create another table named crimevault_login
CREATE TABLE crimvevault_login(
    -> id INT AUTO INCREMENT,
    -> username VARCHAR(50),
    -> password VARCHAR(50)
)