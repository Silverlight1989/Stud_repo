CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` char(16) NOT NULL,
  `password` char(40) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE="INNO-DB" DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
