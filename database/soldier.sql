SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `admin` (`id`, `name`, `email`, `gender`, `dob`, `password`,`dp` ) VALUES
(0, 'admin1', 'admin1@admin.com', 'Male', '1998-02-02', '1234','');


CREATE TABLE `SOLDIERS`
              (`id` int(15) NOT NULL,
               `SSNO` INT NOT NULL ,
               `RNO` INT NOT NULL ,
               `name` varchar(50) NOT NULL ,
               `email` varchar(255) NOT NULL,
               `dob` DATE NULL ,
               `gender` varchar(10) DEFAULT NULL,
               `RANK` varchar(50) NOT NULL,
               `password` varchar(75) NOT NULL,
               `LOCATION` CHAR(50) NOT NULL ,
               `salary` INT NOT NULL,
               `dp` varchar(255) NOT NULL,
	           UNIQUE(`SSNO`),
		       UNIQUE(`RNO`),
		       UNIQUE(`name`)
               ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
			   

INSERT INTO `SOLDIERS`( `id`,`ssno`, `rno`, `name`,`email`, `dob`,`gender`, `rank`, `password` ,`location`, `salary`,`dp`)
	VALUES 
  (1,601, 14, 'SOMNATH SHARMA', 'user1@user.com', '1947/02/12','MALE','MAJOR','1234', 'KASHMIR', 800000, ''),
	(2,602, 13, 'VIKRAM BATRA', 'user2@user.com','1950/02/11','MALE', 'GENREAL MAJOR', '1234','GOA', 300000, ''),
  (3,603, 15, 'SATISH KOLI','user3@user.com', '1949/02/10','MALE', 'CAPTAIN','1234', 'JAMMU', 80000, ''),
  (4,604, 16, 'SOHAM  PATIL','user4@user.com', '1948/10/09','MALE', 'BRIGADIER', '1234','PUNJAB', 140000, ''),
  (5,605, 17, 'VISHESH NAIK','user5@user.com', '1947/09/08','MALE', 'COLONEL','1234', 'DELHI', 120000, ''),
	(6,606, 12, 'NIRMAL SINGH','user6@user.com', '1946/08/07','MALE', 'GENREAL MAJOR','1234', 'GOA', 300000, ''),
  (7,607, 18, 'YOGENDRA SINGH', 'user7@user.com','1949/07/06','MALE', 'CAPTAIN','1234', 'JAMMU', 80000, ''),
  (8,608, 19, 'DYANCHAND THAPA','user8@user.com', '1948/06/05', 'MALE','BRIGADIER','1234', 'PUNJAB', 140000, ''),
  (9,609, 20, 'VISHAL NAIK','user9@user.com','1947/05/04', 'MALE','COLONEL', 'DELHI','1234', 120000, ''),
	(10,610, 21, 'OMKAR SINGH','user10@user.com', '1947/04/03','MALE', 'COLONEL', 'DELHI','1234', 120000, ''),
  (11,611, 31, 'NIRMALA SINGH','user11@user.com', '1946/08/07','FEMALE', 'GENREAL MAJOR','1234', 'GOA', 300000, ''),
  (12,612, 32, 'YOGENDRAI SINGH', 'user12@user.com','1949/07/06','FEMALE', 'CAPTAIN','1234', 'JAMMU', 80000, ''),
  (13,613, 33, 'DYANI THAPA','user13@user.com', '1948/06/05', 'FEMALE','BRIGADIER','1234', 'PUNJAB', 140000, ''),
  (14,614, 34, 'VISHALI NAIK','user14@user.com','1947/05/04', 'FEMALE','COLONEL', 'DELHI','1234', 120000, ''),
	(15,615, 35, 'OMAI SINGH','user15@user.com', '1947/04/03','FEMALE', 'COLONEL', 'DELHI','1234', 120000, '');

	
CREATE TABLE `DEPARTMENT` ( `id` int(15) NOT NULL,
                           `DRNO`  INT NOT NULL ,
	                         `DNAME` CHAR (25) NOT NULL,
                           `DNO` INT NOT NULL ,
                           `DLOCATION` CHAR (25) NOT NULL,
                          UNIQUE(`DNAME`),
				          FOREIGN KEY(`DNO`)REFERENCES SOLDIERS(`RNO`)
			                   
                          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
						 
INSERT INTO `DEPARTMENT`(
    
	`id`,`drno`, `dname`, `dno`, `dlocation`)
	VALUES 
	(11,01,'WEAPON TRANING', 13, 'DELHI'),
	(12,02,'ELECTRONIC EQUIPMENTS ', 15, 'JAMMU'),
	(13,03,'ARTILLERY', 13, 'DELHI'),
	(14,04,'MEDICAL EQUIPMENTS', 14, 'GOA'),
	(15,05,'PLATOON EQUPMENTS', 17, 'KASHMIR'),
	(16,06,'MAPS DATABASE', 17, 'KASHMIR'),
	(17,07,'CANTEEN', 16, 'PUNJAB'),
	(18,08,'FRUITS', 16, 'PUNJAB'),
	(19,09,'TRANSPORT SERVICES', 16, 'PUNJAB'),
	(20,10,'GUARDS', 16, 'PUNJAB');
	
CREATE TABLE `RESOURCES` ( `id` int(15) NOT NULL,
                            `RNAME` CHAR (25) NOT NULL,
                        `RRNO` INT NOT NULL ,
                        `RDEP` CHAR (25) NOT NULL,
				        `RLOCATION` varchar(25) NOT NULL,
                       	FOREIGN KEY(`RRNO`)REFERENCES SOLDIERS(`RNO`),
						UNIQUE(`RRNO`),
						UNIQUE(`RLOCATION`),
						UNIQUE(`RNAME`)
                       ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
					   

INSERT INTO `RESOURCES`(
	`id`,`rname`, `rrno`, `rdep`, `rlocation`)
	VALUES 
(52,'Personnel Equipments ','13', 'D501' ,'JAMMU'),
(53,'LIQUOR','14', 'D500','DELHI' ),
(54,'MEDICAL TREATMENT','15', 'D502','GOA' ),
(55,'Supplies ','16', 'D503','BIHAR' ),
(56,'Technology','17', 'D504' ,'SURAT');


CREATE TABLE `WEAPONS` (`id` int(15) NOT NULL,
                      `WNAME` CHAR (25) NOT NULL ,
					  `WDEPTNAME` VARCHAR(50) NOT NULL,
                      `WRNO` INT NOT NULL ,
                      `WNUMBER` INT NOT NULL ,
                      `WLOCATION` VARCHAR(25) NOT NULL,
			          FOREIGN KEY(`WDEPTNAME`)REFERENCES DEPARTMENT(`DNAME`),
					  UNIQUE(`WNUMBER`)

                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `WEAPONS`(
	`id`,`wdeptname`, `wname`, `wrno`, `wnumber`, `wlocation`)
	VALUES 
	
(21,'PLATOON EQUPMENTS','AK47','13', '09', 'JAMMU' ),
(22,'PLATOON EQUPMENTS','AK104','13','08', 'JAMMU' ),
(23,'PLATOON EQUPMENTS','INSAS','14' , '07' , 'DELHI' ),
(24,'WEAPON TRANING','SLR','15','05', 'KASHMIR' ),
(25,'WEAPON TRANING','MOTOR','13','04', 'JAMMU' ),
(26,'ARTILLERY','GRANADES','14' , '10' , 'DELHI' ),
(27,'ARTILLERY','ROCKET LAUNCHER','13','11', 'KASHMIR' ),
(28,'WEAPON TRANING','SNIPER','14' , '12' , 'DELHI' );


CREATE TABLE `ITEMS` (`id` int(15) NOT NULL,
                      `IDEPTNAME` CHAR(25) NOT NULL ,
					 `INAME` VARCHAR(25) NOT NULL , 
                     `IDNO` INT NOT NULL ,
                     `ILOCATION` CHAR (25) NOT NULL ,
                     `IRNUM` INT NOT NULL ,
                     `IQUATY` INT NOT NULL,

			         FOREIGN KEY(`IDEPTNAME`)REFERENCES RESOURCES(`RNAME`)
			        
                      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
					 
INSERT INTO `ITEMS`(
	`id`,`ideptname`, `iname`, `idno`, `ilocation`, `irnum`, `iquaty`)
	VALUES 
(31,'LIQUOR','SCOTCH','104','DELHI','17','210'),
(32,'Supplies','WHEAT','106','SURAT','20','20'),
(33,'Technology','AL ROBOTICS','17','BIHAR','19','240'),
(34,'Personnel Equipments ','BIKE','17','BIHAR','18','24'),
(35,'LIQUOR','ROYAL STAG','17','DELHI','16','240'),
(36,'MEDICAL TREATMENT','OXYGEN','17','BIHAR','15','24'),
(37,'Supplies ','POTATO','17','BIHAR','14','220'),
(38,'Technology','RADIO','17','SURAT','13','500');

			
CREATE TABLE `DEPENDANT` (`id` int(15) NOT NULL,
                        `DNAME` VARCHAR (25) NOT NULL ,
				        `DSSN` INT NOT NULL ,
				        `DSNAME` VARCHAR(25) NOT NULL ,
                        `DEP_NUMBER` INT NOT NULL ,
				        `DEP_PHONE` INT NOT NULL ,
                        `DEP_LOCATION` VARCHAR(25) NOT NULL ,
                        `DEP_DOB` DATE NULL,
                        `DEP_RELATION` VARCHAR(25) NOT NULL ,
				        FOREIGN KEY(`DSSN`)REFERENCES SOLDIERS(`SSNO`),
						FOREIGN KEY(`DSNAME`)REFERENCES SOLDIERS(`NAME`)     
                       ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `DEPENDANT`(
	`id`,`dname`, `dssn`, `dsname`, `dep_number`, `dep_phone`, `dep_location`, `dep_dob`, `dep_relation`)
	VALUES 
(41,'NIARESH SHARMA','601','SOMNATH SHARMA','1601','368598','MUMBAI','1939/02/04','FATHER'),
(42,'SURESH BATRA','602','VIKRAM BATRA','1602','365458','PUNE','1941/03/13','FATHER'),
(43,'PRIYA KOLI','603','SATISH KOLI','1603','368598','MUMBAI','1939/02/14','MOTHER'),
(44,'MANVI PATIL','604','SOHAM  PATIL','1604','365458','PUNE','1941/03/12','MOTHER'),
(45,'SHREYA NAIK','605','VISHESH NAIK','1605','368598','MUMBAI','2001/02/10','DAUGHTER'),
(46,'SHIVANI SINGH','606','NIRMAL SINGH','1606','365458','PUNE','2000/03/05','DAUGHTER'),
(47,'VERIYA THAPA','607','DYANCHAND THAPA','1607','368598','MUMBAI','1989/02/03','SISTER'),
(48,'SOHAM NAIK','608','VISHAL NAIK','1608','365458','PUNE','1991/03/02','SON');


CREATE TABLE `Sol_leave` (
  `id` int(11) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `start_date` varchar(24) NOT NULL,
  `last_date` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `Sol_leave` (`id`, `reason`, `start_date`, `last_date`, `email`, `status`) VALUES
(60, 'I got sick', '2021-07-28', '2021-07-30', 'test@gmail.com', 'Canceled'),
(61, ' drnrdng', '2021-07-09', '2021-07-11', 'emp1@emp.com', 'Accepted'),
(62, ' drnrdng', '2021-07-14', '2021-07-25', 'emp1@emp.com', 'Canceled'),
(63, ' drnrdng', '2021-07-16', '2021-07-25', 'emp1@emp.com', 'pending'),
(64, ' dcw', '2021-07-10', '2021-07-11', 'emp3@emp.com', 'Accepted'),
(65, ' efwe', '2021-07-23', '2021-07-25', 'emp3@emp.com', 'Canceled'),
(66, ' ewfew', '2021-07-24', '2021-07-18', 'emp3@emp.com', 'Accepted'),
(67, ' drnrdng', '2021-07-01', '2021-07-02', 'emp3@emp.com', 'Canceled'),
(68, ' i got sick', '2021-07-03', '2021-07-06', 'test@gmail.com', 'Accepted'),
(69, ' i got sick', '2021-07-04', '2021-07-07', 'test@gmail.com', 'Canceled'),
(70, ' drnrdng', '2021-07-04', '2021-07-07', 'test@gmail.com', 'Accepted');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `SOLDIERS`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `DEPARTMENT`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `RESOURCES`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `WEAPONS`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `ITEMS`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `DEPENDANT`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `Sol_leave`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;


ALTER TABLE `SOLDIERS`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;


ALTER TABLE `DEPARTMENT`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;


ALTER TABLE `RESOURCES`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

ALTER TABLE `WEAPONS`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;


ALTER TABLE `ITEMS`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;


ALTER TABLE `DEPENDANT`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

ALTER TABLE `Sol_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

