--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_image`, `product_price`) VALUES
(1, 'FF_ITEM_FILCOD', 'Cod Fillet', 'product_fillet.jpg', '4.59'),
(2, 'FF_ITEM_FILHAD', 'Haddock Fillet', 'product_haddock.jpg', '4.19'),
(3, 'FF_ITEM_HAKE', 'Hake', 'product_hake.jpg', '3.99'),
(4, 'FF_ITEM_LEM', 'Lemon Sole', 'product_lemsole.jpg', '6.50'),
(5, 'FF_ITEM_LOB', 'Lobster', 'product_lobster.jpg', '20.00'),
(6, 'FF_ITEM_MACK', 'Mackerel', 'product_mack.jpg', '2.50'),
(7, 'FF_ITEM_MEG', 'Megrim Sole', 'product_megrim.jpg', '4.59'),
(8, 'FF_ITEM_MIX', 'Fish Pie Mix', 'product_mix.jpg', '3.50'),
(9, 'FF_ITEM_MONK', 'Monkfish Tail', 'product_monk.jpg', '5.00'),
(10, 'FF_ITEM_MUSS', 'Mussels', 'product_mussel.jpg', '2.59'),
(11, 'FF_ITEM_OYS', 'Oysters', 'product_oyster.jpg', '1.50'),
(12, 'FF_ITEM_PLAI', 'Plaice', 'product_plaice.jpg', '3.29'),
(13, 'FF_ITEM_SALFIL', 'Salmon Fillet', 'product_salfil.jpg', '5.59'),
(14, 'FF_ITEM_SALPOR', 'Salmon', 'product_salpor.jpg', '9.99'),
(15, 'FF_ITEM_SMOKSAL', 'Smoked Salmon', 'product_smoksal.jpg', '10.99');

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`product_id`), ADD UNIQUE KEY `product_code` (`product_code`);
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
