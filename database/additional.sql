create table crspurchased(
sid int not null,
crsid int not null,
ttime datetime not null,
transid varchar(20) not null,
feedback varchar(200),
rating int default(5) 
);

create table instdescp(
username varchar(50) not null unique,
insdec varchar(200),
primary key(username)
);

create table complaints(
id int not null,
role int not null,
containt varchar(500) not null
);

commit;



