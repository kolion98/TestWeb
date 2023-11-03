CREATE TABLE sample (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO sample (name, email) VALUES 
  ('John Smith', 'john.smith@example.com'),
  ('Jane Doe', 'jane.doe@example.com'),
  ('Michael Johnson', 'michael.johnson@example.com');
