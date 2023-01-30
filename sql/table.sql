CREATE TABLE users (
    id  INT AUTO_INCREMENT NOT NULL, 
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL, 
    phone VARCHAR(15) NOT NULL, 

    PRIMARY KEY(id)
);

SELECT * FROM users;

INSERT INTO users (full_name , email, phone )
VALUES ('And', 'and@gmail.com', '1111-9999');


CREATE TABLE banner (
    id  INT AUTO_INCREMENT NOT NULL, 
    banner_name VARCHAR(100) NOT NULL, 

    PRIMARY KEY(id)
);