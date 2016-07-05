DROP TABLE cont;
CREATE TABLE `cont` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
DROP TABLE menus;
CREATE TABLE `menus` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
DROP TABLE old_message;
CREATE TABLE `old_message` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
DROP TABLE sub_menus;
CREATE TABLE `sub_menus` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `p_id` int(2) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
DROP TABLE users;
CREATE TABLE `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
