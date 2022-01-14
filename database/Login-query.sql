create table Students(
sid int auto_increment not null,
fname varchar(32) not null,
lname varchar(32) not null,
Gender varchar(8) not null,
studemail varchar(20) not null,
collegename varchar(32) not null,
studcityname varchar(25) not null,
username varchar(30) not null unique,
password varchar(32) not null,
primary key(sid)
);

create table instructor(
insid int auto_increment not null,
instfname varchar(32) not null,
instlname varchar(32) not null,
Gender varchar(8) not null,
email varchar(30) not null,
contact varchar(32)  not null,
city varchar(24) not null,
experience int not null,
insusername varchar(32) not null, 
inspassword varchar(32) not null,
primary key(insid)
);

use techify;
drop table students;
commit;

use techify;
-- INSERT INTO Students(fname,lname,Gender,studemail,collegename,studcityname,username,password) 
-- VALUES('deepak','sharma','male','deep@gmail.com','NIT Delhi','deepak','admin')