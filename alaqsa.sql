use alaqsa;
create table Users (
id int auto_increment primary key ,
user_name varchar(50) not null ,
password varchar(50) not null ,
email varchar(50) not null ,
picture varchar(50)
);
 create table Posts(
post_id int auto_increment primary key ,
text varchar(250) ,
picture varchar(50),
created_at varchar(50),
User_id int 
);
create table Comments(
commment_id int auto_increment primary key not null ,
textCom  varchar(255) not null,
created_at_com  timestamp not null,
post_comment_id int not null,
user_comment_id int not null
);



