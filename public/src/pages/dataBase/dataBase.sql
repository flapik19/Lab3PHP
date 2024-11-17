CREATE TABLE usersData { 
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    bg_color VARCHAR(8) DEFAULT '#ffffff',
    font_color VARCHAR(8) DEFAULT '#000000'
};