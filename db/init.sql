CREATE TABLE IF NOT EXISTS student (
  id INT PRIMARY KEY AUTO_INCREMENT,
  full_name VARCHAR(255) NOT NULL
);

INSERT INTO student (full_name) VALUES ('Wout Struys');