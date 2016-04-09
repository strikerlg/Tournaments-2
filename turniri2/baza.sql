USE turniri;

CREATE TABLE IF NOT EXISTS user (
  user_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(64),
  username VARCHAR(64) UNIQUE,
  password CHAR(64),
  activation_code CHAR(64),
  active tinyint(1) DEFAULT 0,
  subscription tinyint(1) DEFAULT 0
);

CREATE TABLE IF NOT EXISTS turnir (
  turnir_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(64),
  sport_game VARCHAR(64),
  tournament_type ENUM('single stage/single elimination','single stage/double elimination','single stage/round robin','group round robin/final single','group round robin/final double'),
  number_of_participants int,
  start_time DATE,
  description VARCHAR(256),
  host_id int,
  current_stage_time text  # Round 1; Round 2; Semi-Final; Final; Group Round 1 etc...
);