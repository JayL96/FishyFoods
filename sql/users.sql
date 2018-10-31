SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `telephone` varchar(13) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;