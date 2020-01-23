DROP TABLE IF EXISTS items;
CREATE TABLE items (
email varchar(40) NOT NULL,
title VARCHAR(50) NOT NULL,
kakaolink VARCHAR(100) NOT NULL,
farm VARCHAR(50) NOT NULL,
crop VARCHAR(50) NOT NULL,
address1 VARCHAR(50) NOT NULL,
address2 VARCHAR(50) NOT NULL,
amount VARCHAR(50) NOT NULL,
randomcode VARCHAR(50) NOT NULL,
callitem VARCHAR(50) NOT NULL,
intro VARCHAR(50) NOT NULL,
picture VARCHAR(50) DEFAULT NULL
);

DROP TABLE IF EXISTS farms;
CREATE TABLE farms (
email varchar(40) NOT NULL,
farmname VARCHAR(50) NOT NULL,
category VARCHAR(50) NOT NULL,
address1 VARCHAR(50) NOT NULL,
address2 VARCHAR(50) NOT NULL,
phonenum VARCHAR(50) NOT NULL,
intro VARCHAR(50) NOT NULL,
callitem VARCHAR(50) NOT NULL,
picture VARCHAR(50) DEFAULT NULL
);

DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews (
email varchar(40) NOT NULL,
photo VARCHAR(50) NOT NULL,
review VARCHAR(50) NOT NULL,
callitem VARCHAR(50) NOT NULL
);

DROP TABLE IF EXISTS members;
CREATE TABLE members (
username varchar(30) NOT NULL,
email varchar(40) NOT NULL unique,
pw varchar(30) NOT NULL
);

DROP TABLE IF EXISTS baskets;
CREATE TABLE baskets (
email varchar(30) NOT NULL,
callitem varchar(50) NOT NULL unique
);

DROP TABLE IF EXISTS orders;
CREATE TABLE orders (
email varchar(30) NOT NULL,
callitem varchar(50) NOT NULL unique
);
