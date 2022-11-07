sql create table

create table users (
    srno AUTO_INCREMENT,
	name varchar(255) NOT NULL,
    email varchar(255) NOT NULL, 
    phone bigint NOT NULL,
    username varchar(255) NOT NULL,
    PASSWORD varchar(255) not null,
    add_id int not null,
 	PRIMARY KEY (email, phone, username)
)

insert into table 

insert into users
values (null, "Jeff", "jeff@email.com", 8128939291, "jeffdahmer", "kills", 1);
  
  
  