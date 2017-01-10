#CREATE database usersDataBase;

use usersdatabase;
CREATE TABLE  IF NOT EXISTS countries (
`id` int(10) unsigned NOT NULL auto_increment,
`country_name` varchar(255),
primary key(`id`)
);

CREATE TABLE IF NOT EXISTS users (
`id` int(10) unsigned NOT NULL auto_increment,
`user_name` varchar(255),
`user_email` varchar(255),
`user_country_id` int(10) unsigned, 
primary key (`id`),

foreign key (`user_country_id`) references countries(`id`) ON UPDATE CASCADE
);


