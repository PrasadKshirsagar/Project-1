--
--This is just overview Modify It
--
--For authentication of the user You may add more or remove. Also add something for recovery
CREATE TABLE authentication (
  authentication_id INT(10) unsigned NOT NULL AUTO_INCREMENT,
  username VARCHAR(45) NOT NULL,
  password BLOB,			--
  role VARCHAR(15),			--Have to check whether we will provide radio button or user have to type we may also use 0 for user and 1 for hospital
  PRIMARY KEY (user_id)
); 

CREATE TABLE profile (
  profile_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  mobile_no TEXT NOT NULL,
  email_id varchar(255) DEFAULT NULL,
  PRIMARY KEY  (profile_id),
  CONSTRAINT authentication_id FOREIGN KEY (authentication_id) REFERENCES authentication (authentication_id) ON DELETE CASCADE
);

--For storing Address you can add more
CREATE TABLE address (
	address_id INT(10) unsigned NOT NULL AUTO_INCREMENT,
	street_address VARCHAR(200) NOT NULL,
	landmark VARCHAR(100) NOT NULL,
	city VARCHAR(30) NOT NULL, 
	pincode INT(6) NOT NULL,
	CONSTRAINT profile_id FOREIGN KEY (profile_id) REFERENCES profile (profile_id) ON DELETE CASCADE,
	CONSTRAINT state_id FOREIGN KEY (state_id) REFERENCES state (state_id)
);


--I am assuming country is India so I am not creating a table for country 
CREATE TABLE state (
	state_id INT UNSIGNED NOT NULL,
	state_name VARCHAR(30);
	PRIMARY KEY (state_id);
);

--For hospital
CREATE TABLE hospital(
	hospital_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	CONSTRAINT profile_id FOREIGN KEY (profile_id) REFERENCES profile (profile_id) ON DELETE CASCADE
);

-- I have created this table so as to keep record of the days at which hospital opens actually there will be a more than one relation between hospital and day
CREATE TABLE day (
	day_id INT UNSIGNED NOT NULL,	--day_id will be 1,2,3,4,5,6 and 7 depending upon name of day
	day_name VARCHAR(10);
	PRIMARY KEY (day_id)
);

--This table is many-many relation between hospital and day on which it is opened
CREATE TABLE open_day (
	open_day_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	CONSTRAINT hospital_id FOREIGN KEY (hospital_id) REFERENCES hospital (hospital_id) ON DELETE CASCADE,
	CONSTRAINT day_id FOREIGN KEY (day_id) REFERENCES day (day_id)
);

-- We will keep some timing slot like morning, night,evening etc
CREATE TABLE timing(
	timing_id INT UNSIGNED NOT NULL,
	timing_slot VARCHAR(20),	
	PRIMARY KEY timing_id
);

CREATE TABLE open_timing (
	open_timing_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	CONSTRAINT hospital_id FOREIGN KEY (hospital_id) REFERENCES hospital (hospital_id) ON DELETE CASCADE,
	CONSTRAINT timing_id FOREIGN KEY (timing_id) REFERENCES timing (timing_id)
);

CREATE TABLE blood_group (
	blood_group_id INT NOT NULL,
	blood_name VARCHAR(10),
	PRIMARY KEY blood_group_id
);

CREATE TABLE blood_availability (
	id  INT UNSIGNED NOT NULL AUTO_INCREMENT,
	unit_available INT,
	CONSTRAINT hospital_id FOREIGN KEY (hospital_id) REFERENCES hospital (hospital_id) ON DELETE CASCADE,
	CONSTRAINT blood_group_id FOREIGN KEY (blood_group_id) REFERENCES blood_group (blood_group_id)
);

CREATE TABLE user (
	user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	CONSTRAINT profile_id FOREIGN KEY (profile_id) REFERENCES profile (profile_id) ON DELETE CASCADE,
	PRIMARY KEY user_id
);

CREATE TABLE donor (
	donor_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	date_donation DATE,			--It will store the donor's date when he/she has donated blood
	time_donation TIMESTAMP,
	unit_donation INT,			--How much unit donated
	CONSTRAINT hospital_id FOREIGN KEY (hospital_id) REFERENCES hospital (hospital_id) ON DELETE CASCADE,	--this is the Hospital in which he donated
	CONSTRAINT blood_group_id FOREIGN KEY (blood_group_id) REFERENCES blood_group (blood_group_id),			--this is his/her blood group
	CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES user (user_id) ON DELETE CASCADE					--this is his/her user id
);