SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--

CREATE TABLE IF NOT EXISTS `orders` (
 `order_id` int(11) NOT NULL AUTO_INCREMENT,
 `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `ordered_name`, varchar(100) NOT NULL,
 `ordered_email`, varchar(100) NOT NULL,
 `order_date`, CURRENT_TIMESTAMP NOT NULL, 
 `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `payment_gross` float(10,2) NOT NULL,
 `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
 `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
