--
-- Database: `cisample`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `todo_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `title`, `text`, `todo_date`, `user_id`, `completed`) VALUES
(1, 'Hello World!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla \r\nsapien eros, lacinia eu, consectetur vel, dignissim et, massa. Praesent suscipit nunc vitae neque. Duis a ipsum. Nunc a erat. Praesent \r\nnec libero. Phasellus lobortis, velit sed pharetra imperdiet, justo ipsum facilisis arcu, in eleifend elit nulla sit amet tellus. \r\nPellentesque molestie dui lacinia nulla. Sed vitae arcu at nisl sodales ultricies. Etiam mi ligula, consequat eget, elementum sed, \r\nvulputate in, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', '2015-01-09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role_id`) VALUES
(1, 'Administrator', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
