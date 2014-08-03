CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table with users data.' AUTO_INCREMENT=1 ;

-- Insert primary user
-- login: root
-- passwd: root (md5)
INSERT INTO `users` (`id`, `login`, `passwd`) VALUES ('1', 'root', '63a9f0ea7bb98050796b649e85481845');
