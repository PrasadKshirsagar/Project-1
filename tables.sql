
DROP SCHEMA IF EXISTS blood_connect;
CREATE SCHEMA blood_connect;
USE blood_connect;

	
CREATE TABLE user (
      user_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      username VARCHAR(45) NOT NULL,
      password VARCHAR(45) NOT NULL,
      mobile_number VARCHAR(15),
      email_id VARCHAR(45) ,
      primary key (user_id)
);

CREATE TABLE hospital (
      hospital_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      hospital_name VARCHAR(70) NOT NULL,
      username VARCHAR(45) NOT NULL,
      password VARCHAR(45) NOT NULL,
      weekdays_open TIME,
      saturday_open TIME,
      sunday_open TIME,
      weekdays_close TIME,
      saturday_close TIME,
      sunday_close TIME,
      mobile_number_1 VARCHAR(15),
      mobile_number_2 VARCHAR(15),
      email_id VARCHAR(45) ,
      primary key (hospital_id)
);

CREATE TABLE address (
      address_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      address VARCHAR(70),
      landmark VARCHAR(70),
      city VARCHAR(20),
      pincode VARCHAR(10),
      state VARCHAR(20),
      country VARCHAR(20),
      latitude FLOAT( 10, 6 ) NOT NULL ,
      longitude FLOAT( 10, 6 ) NOT NULL,
      hospital_id SMALLINT UNSIGNED,
      user_id SMALLINT UNSIGNED,
      primary key (address_id),
      foreign key (hospital_id) references hospital(hospital_id) on delete set null,
      foreign key (user_id) references user(user_id) on delete set null
);

CREATE TABLE blood_availability (
      blood_group VARCHAR(5),
      hospital_id SMALLINT UNSIGNED,
      quantity FLOAT,                        -- blood quantity in mL
      foreign key (hospital_id) references hospital(hospital_id) on delete set null
      
);

CREATE TABLE user_info (
      user_blood_group VARCHAR(5),
      age SMALLINT UNSIGNED,
      height FLOAT,                          -- height in cm
      weight FLOAT,                          -- weight in kg
      blood_pressure_systolic INT,
      blood_pressure_diastolic INT,
      haemoglobin FLOAT,                     -- in g/dL
      user_id SMALLINT UNSIGNED,
      foreign key (user_id) references user(user_id) on delete set null
);

CREATE TABLE posts (
      post_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      description VARCHAR(500),
      picture BLOB DEFAULT NULL,
      user_id SMALLINT UNSIGNED,
      primary key (post_id),
      foreign key (user_id) references user(user_id) on delete set null
);

CREATE TABLE appointment (
    appointment_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	user_id SMALLINT UNSIGNED NOT NULL,
	hospital_id SMALLINT UNSIGNED NOT NULL,
	starting_date DATE NOT NULL,
	endind_date DATE NOT NULL,
	final_date DATE,
	starting_time VARCHAR(20) NOT NULL,
	ending_time  VARCHAR(20) NOT NULL,
	final_time VARCHAR(20),
	Hospital_pending INT DEFAULT 0,
	PRIMARY KEY (appointment_id),
	FOREIGN KEY (user_id) references user(user_id) on delete cascade,
	FOREIGN KEY (hospital_id) references hospital(hospital_id) on delete cascade
);
