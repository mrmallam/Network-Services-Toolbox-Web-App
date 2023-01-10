DROP DATABASE IF EXISTS NETWORK;
CREATE DATABASE NETWORK;
USE NETWORK;

-- devices should connect to hardware, so an IP should connect to a hardware device
DROP TABLE IF EXISTS Network_Report;
CREATE TABLE Network_Report (
	Date_Time 					DATE NOT NULL,
	Total_Data_Used				int,
	Total_Connected_Users		int,
	Average_Speed				DOUBLE(255, 2),
	Average_Connection_Quality	DOUBLE(255, 2),
	PRIMARY KEY(Date_Time)
);

DROP TABLE IF EXISTS Users;
CREATE TABLE Users
(
	ID int UNIQUE NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(ID)
);

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin
(
	ID 			int UNIQUE NOT NULL,
	Username 	varchar(255) UNIQUE NOT NULL,
	Password 	varchar(255) NOT NULL,
	PRIMARY KEY(ID),
	FOREIGN KEY(ID) REFERENCES Users(ID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Client;
CREATE TABLE Client
(
	ID 		int UNIQUE NOT NULL,
	Name 	varchar(255) UNIQUE NOT NULL,
	Username varchar(255) NOT NULL,
	Password varchar(255) NOT NULL,
	PRIMARY KEY(ID),
	FOREIGN KEY(ID) REFERENCES Users(ID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Gateway;
CREATE TABLE Gateway
(
	IPv4 varchar(15) NOT NULL,
	IPv6 varchar(45) NOT NULL,
	PRIMARY KEY(IPv4, IPv6)
);

DROP TABLE IF EXISTS HARDWARE;
CREATE TABLE HARDWARE(
	MAC_address		varchar(17) NOT NULL,
	Serial_No		varchar(255),
	Version			varchar(255),
	System_uptime	int,
	Vendor			varchar(255),
	No_of_Con_Dev	int,
	PRIMARY KEY(MAC_address)
);

DROP TABLE IF EXISTS Router;
CREATE TABLE Router(
	WiFi_SSID		varchar(255) NOT NULL,
	HW_MAC_address	varchar(17) NOT NULL,
	IPv4			varchar(15) NOT NULL,
	IPv6			varchar(45) NOT NULL,
	WiFi_password	varchar(255),
	PRIMARY KEY(WiFi_SSID),
	FOREIGN KEY(HW_MAC_address) REFERENCES HARDWARE(MAC_address)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Connected_Devices;
CREATE TABLE Connected_Devices (
	Hostname		varchar(255),
	IPv4			varchar(15) NOT NULL,
	IPv6			varchar(45) NOT NULL,
	Connection_Type varchar(255),
	MAC_address		varchar(17) NOT NULL,
	R_SSID			varchar(255) NOT NULL,
	User_ID			int NOT NULL,
	PRIMARY KEY(IPv4, IPv6),
	FOREIGN KEY(MAC_address) REFERENCES HARDWARE(MAC_address)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(R_SSID) REFERENCES Router(WiFi_SSID)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(User_ID) REFERENCES Users(ID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Status;
CREATE TABLE Status (
	CD_IPv4 			varchar(15) NOT NULL,
	CD_IPv6 			varchar(45) NOT NULL,
	Connection_uptime 	int,
	Online				boolean,
	PRIMARY KEY(CD_IPv4, CD_IPv6),
	FOREIGN KEY(CD_IPv4, CD_IPv6) REFERENCES Connected_Devices(IPv4, IPv6)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS FIREWALL;
CREATE TABLE FIREWALL(
	HW_MAC_address	varchar(17) NOT NULL,
	Security_level	int,
	PRIMARY KEY(HW_MAC_address),
	FOREIGN KEY(HW_MAC_address) REFERENCES HARDWARE(MAC_address)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Black_list;
CREATE TABLE Black_list(
	FW_HW_MAC_address	varchar(17) NOT NULL,
	Black_list_URL		varchar(255) NOT NULL,
	PRIMARY KEY(FW_HW_MAC_address, Black_list_URL),
	FOREIGN KEY(FW_HW_MAC_address) REFERENCES FIREWALL(HW_MAC_address)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS White_list;
CREATE TABLE White_list(
	FW_HW_MAC_address	varchar(17) NOT NULL,
	White_list_URL 		varchar(255) NOT NULL,
	PRIMARY KEY(FW_HW_MAC_address, White_list_URL),
	FOREIGN KEY(FW_HW_MAC_address) REFERENCES FIREWALL(HW_MAC_address)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Blocked_ports;
CREATE TABLE Blocked_ports(
	FW_HW_MAC_address	varchar(17) NOT NULL,
	Blocked_port		varchar(255) NOT NULL,
	PRIMARY KEY(FW_HW_MAC_address, Blocked_port),
	FOREIGN KEY(FW_HW_MAC_address) REFERENCES FIREWALL(HW_MAC_address)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Generates;
CREATE TABLE Generates
(
	WiFi_SSID varchar(255) NOT NULL,
	Date_Time DATE NOT NULL,
	PRIMARY KEY(WiFi_SSID, Date_Time),
	FOREIGN KEY(WiFi_SSID) REFERENCES Router(WiFi_SSID)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(Date_Time) REFERENCES Network_Report(Date_Time)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Modem;
CREATE TABLE Modem
(
	IPv4 			varchar(15) NOT NULL,
	IPv6 			varchar(45) NOT NULL,
	HW_MAC_Address 	varchar(17) NOT NULL,
	PRIMARY KEY(IPv4, IPv6),
	FOREIGN KEY(HW_MAC_Address) REFERENCES HARDWARE(MAC_address)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Sends_Through;
CREATE TABLE Sends_Through
(
	M_IPv4 varchar(15) NOT NULL,
	M_IPv6 varchar(45) NOT NULL,
	G_IPv4 varchar(15) NOT NULL,
	G_IPv6 varchar(45) NOT NULL,
	PRIMARY KEY(M_IPv4, M_IPv6, G_IPv4, G_IPv6),
	FOREIGN KEY(M_IPv4, M_IPv6) REFERENCES Modem(IPv4, IPv6)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(G_IPv4, G_IPv6) REFERENCES Gateway(IPv4, IPv6)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS External_Connections;
CREATE TABLE External_Connections
(
	R_WiFi_SSID varchar(255) NOT NULL,
	G_IPv4		varchar(15),
	G_IPv6		varchar(45),
	PRIMARY KEY(R_WiFi_SSID),
	FOREIGN KEY(R_WiFi_SSID) REFERENCES Router(WiFi_SSID)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(G_IPv4, G_IPv6) REFERENCES Gateway(IPv4, IPv6)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Can_Connect;
CREATE TABLE Can_Connect
(
	ID			int NOT NULL,
	R_WiFi_SSID	varchar(255) NOT NULL,
	PRIMARY KEY(ID, R_WiFi_SSID),
	FOREIGN KEY(ID) REFERENCES Users(ID)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(R_WiFi_SSID) REFERENCES Router(WiFi_SSID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Parental_Control;
CREATE TABLE Parental_Control
(
	User_ID		int NOT NULL,
	R_WiFi_SSID varchar(255) NOT NULL,
	Enabled 	boolean,
	Active_time	DATE,
	PRIMARY KEY(User_ID, R_WiFi_SSID),
	FOREIGN KEY(User_ID) REFERENCES Can_Connect(ID)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(R_WiFi_SSID) REFERENCES Can_Connect(R_WiFi_SSID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Can_Modify;
CREATE TABLE Can_Modify
(
	Admin_ID	int NOT NULL,
	R_WiFi_SSID	varchar(255) NOT NULL,
	PRIMARY KEY(Admin_ID, R_WiFi_SSID),
	FOREIGN KEY(Admin_ID) REFERENCES Admin(ID)
		ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(R_WiFi_SSID) REFERENCES Router(WiFi_SSID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Blocked_Keywords;
CREATE TABLE Blocked_Keywords
(
	PC_User_ID 	int NOT NULL,
	Keyword 	varchar(255) NOT NULL,
	Block_Date 	DATE,
	PRIMARY KEY(PC_User_ID, Keyword),
	FOREIGN KEY(PC_User_ID) REFERENCES Parental_Control(User_ID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

DROP TABLE IF EXISTS Blocked_Sites;
CREATE TABLE Blocked_Sites
(
	PC_User_ID 	int NOT NULL,
	URL 		varchar(255) NOT NULL,
	Block_Date 	DATE,
	PRIMARY KEY(PC_User_ID, URL),
	FOREIGN KEY(PC_User_ID) REFERENCES Parental_Control(User_ID)
		ON UPDATE CASCADE ON DELETE CASCADE
);

-- TEST DATASET
INSERT INTO HARDWARE
VALUES
("aa:aa:aa:aa", 1, 1, 1, "Cisco", 3),
("bb:bb:bb:bb", 2, 2, 2, "HP", 3),
("cc:cc:cc:cc", 3, 3, 3, "Juniper", 5),

("dd:dd:dd:dd", 4, 1, 24, NULL, NULL),
("ee:ee:ee:ee", 5, 1, 36, NULL, NULL);

INSERT INTO FIREWALL
VALUES
("aa:aa:aa:aa", 1),
("bb:bb:bb:bb", 4);

INSERT INTO Black_list
VALUES
("aa:aa:aa:aa", "chegg.com"),
("aa:aa:aa:aa", "fiverr.com"),
("bb:bb:bb:bb", "youtube.ca");

INSERT INTO White_list
VALUES
("aa:aa:aa:aa", "newegg.ca"),
("aa:aa:aa:aa", "amazon.ca"),
("bb:bb:bb:bb", "netflix.ca");

INSERT INTO Blocked_ports
VALUES
("aa:aa:aa:aa", 1),
("aa:aa:aa:aa", 2),
("bb:bb:bb:bb", 3);

INSERT INTO Router
VALUES
("Main", "aa:aa:aa:aa", "255.255.255.255", "-1", "1234"),
("Sub", "bb:bb:bb:bb", "-1", "FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF:FFFF", "5678");

INSERT INTO USERS
VALUES
(),
(),
();

INSERT INTO ADMIN
VALUES
(1, "root", "123");

INSERT INTO CLIENT
VALUES
(2, "Bob", "Bob123", "bob"),
(3, "John", "John123", "john");

INSERT INTO CAN_CONNECT
VALUES
(1, "Main"),
(1, "Sub"),
(2, "Main"),
(3, "Main");

INSERT INTO CAN_MODIFY
VALUES
(1, "Main"),
(1, "Sub");

INSERT INTO CONNECTED_DEVICES
VALUES
("bird", "1.1.1.1", "-1", "WiFi", "dd:dd:dd:dd", "Main", 1),
("bee", "2.2.2.2", "AAAA::AAAA", "Ethernet", "ee:ee:ee:ee", "Sub", 2);

INSERT INTO STATUS
VALUES
("1.1.1.1", "-1", 20, true),
("2.2.2.2", "AAAA::AAAA", 35, true);

INSERT INTO Modem
VALUES
("254.254.254.254", "-1", "cc:cc:cc:cc");

INSERT INTO Gateway
VALUES
("253.253.253.253", "-1");

INSERT INTO SENDS_THROUGH
VALUES
("254.254.254.254", "-1", "253.253.253.253", "-1");

INSERT INTO EXTERNAL_CONNECTIONS
VALUES
("Main", "253.253.253.253", "-1"),
("Sub", "253.253.253.253", "-1");

INSERT INTO PARENTAL_CONTROL
VALUES
(2, "Main", true, '2001-9-20'),
(3, "Main", false, NULL);

INSERT INTO BLOCKED_SITES
VALUES
(2, "d2l.ucalgary.ca", '2020-1-20'),
(3, "google.ca", '2001-9-20');

INSERT INTO BLOCKED_KEYWORDS
VALUES
(2, 'DAMN', '2001-9-21');

INSERT INTO Network_Report
VALUES
("2022-12-19", 4, 5, 6.0, 8.0);

INSERT INTO Generates
VALUES
("Main", "2022-12-19");