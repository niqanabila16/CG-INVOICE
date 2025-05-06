--
-- Table structure for table `cgadmins`
--

CREATE TABLE `cgadmins` (
  `admin_id` mediumint(8) UNSIGNED NOT NULL,
  `admin_username` varchar(40) NOT NULL DEFAULT '',
  `admin_password` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgadmins`
--

INSERT INTO `cgadmins` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'tryme', 'myemail@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `cgclients`
--

CREATE TABLE `cgclients` (
  `id` int(6) NOT NULL,
  `item` varchar(80) NOT NULL,
  `code` varchar(60) NOT NULL,
  `value` varchar(60) NOT NULL,
  `upc` varchar(125) NOT NULL,
  `din` varchar(20) NOT NULL,
  `dout` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgclients`
--

INSERT INTO `cgclients` (`id`, `item`, `code`, `value`, `upc`, `din`, `dout`) VALUES
(1, 'johnnywalkerpop.com', 'on pacificbuilders.com linuxvps.net host', 'HTML5 static site Bootstrap new theme XYZ', 'login johnnywa pass HiJkLmN0P', '2015-09-01', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `cgcontacts`
--

CREATE TABLE `cgcontacts` (
  `id` int(6) NOT NULL,
  `first` varchar(25) NOT NULL,
  `last` varchar(25) NOT NULL,
  `address` varchar(125) NOT NULL,
  `phone` varchar(65) NOT NULL,
  `mobile` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `website` varchar(65) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date` varchar(65) NOT NULL,
  `category` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgcontacts`
--

INSERT INTO `cgcontacts` (`id`, `first`, `last`, `address`, `phone`, `mobile`, `email`, `website`, `comment`, `date`, `category`) VALUES
(1, 'Larry', 'Oliver', '1444 W. Gazink\r\nPhoenix, AZ\r\n85029', '520-555-1234', '', 'support@tradesouthwest.com', 'http://tradesouthwest.com', 'comments go here', '2015-09-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cgevents`
--

CREATE TABLE `cgevents` (
  `event_id` int(5) UNSIGNED NOT NULL,
  `event_day` int(2) NOT NULL DEFAULT '0',
  `event_month` int(2) NOT NULL DEFAULT '0',
  `event_year` int(4) NOT NULL DEFAULT '0',
  `event_time` varchar(5) NOT NULL DEFAULT '',
  `event_title` varchar(200) NOT NULL DEFAULT '',
  `event_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgevents`
--

INSERT INTO `cgevents` (`event_id`, `event_day`, `event_month`, `event_year`, `event_time`, `event_title`, `event_desc`) VALUES
(1, 10, 8, 2018, '10:30', 'meet with bill', 'billy bob thorton');

-- --------------------------------------------------------

--
-- Table structure for table `cginvoice`
--

CREATE TABLE `cginvoice` (
  `id` int(6) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `invnum` varchar(25) DEFAULT NULL,
  `cust` varchar(12) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `work` text NOT NULL,
  `sub` int(7) DEFAULT NULL,
  `tax` int(7) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `paid` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cginvoice`
--

INSERT INTO `cginvoice` (`id`, `name`, `phone`, `address`, `date`, `invnum`, `cust`, `model`, `work`, `sub`, `tax`, `total`, `paid`, `status`) VALUES
(1, 'Joe Demagio', '480-555-2222', '1444 N. Street\r\nScottsdale, AZ 85212', '08/08/2018', '14444-7', 'jd', 'sales', '<p>4<span>paper thingys</span><b><em>3.45</em>$13.80</b></p>\r\n<p>3<span>other things</span><b><em>7.29</em>$21.87</b></p>\r\n', 36, 0, 36, 'no tax non-profit exempt', 0),
(2, 'Bellalucci Margon', '678-555-0990', '800 Easy St.\r\nSome City, NY 01901', '', '08132018-SC22', 'Margon', 'Sales', '<p>2<span>wizzy-wugs</span><b><em>12.95</em>$25.90</b></p>\r\n<p>3<span>wuggy-wizzs</span><b><em>14.95</em>$44.85</b></p>', 87, 0, 87, 'use account', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cgquote`
--

CREATE TABLE `cgquote` (
  `id` int(6) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `invnum` varchar(25) DEFAULT NULL,
  `work` text NOT NULL,
  `sub` int(7) DEFAULT NULL,
  `tax` int(7) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `paid` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgquote`
--

INSERT INTO `cgquote` (`id`, `name`, `phone`, `address`, `date`, `invnum`, `work`, `sub`, `tax`, `total`, `paid`, `status`) VALUES
(1, 'Quote Person', '', '1234 Anywhere', '2018-04-29', '44231', '2 thingys and a couple of whatchewmacallits', 0, 0, 44, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cgvendors`
--

CREATE TABLE `cgvendors` (
  `id` int(6) NOT NULL,
  `business` varchar(80) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `hours` varchar(500) NOT NULL,
  `address` varchar(125) NOT NULL,
  `note` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgvendors`
--

INSERT INTO `cgvendors` (`id`, `business`, `phone`, `hours`, `address`, `note`) VALUES
(1, 'National Widget Distributors', '602-555-1111', 'blue widgets 7.95\r\ngreen widgets 6.95\r\ngiant widgets 11.95\r\nlittle widget 4.95\r\ntry new entry\r\n', '1444 N. Some St. Phoenix, AZ 85055', '12prcnt discount on bulk and then some');

-- --------------------------------------------------------

--
-- Table structure for table `tsw_members`
--

CREATE TABLE `tsw_members` (
  `idm` int(11) NOT NULL,
  `phonenumber` varchar(65) DEFAULT NULL,
  `firstname` varchar(65) NOT NULL DEFAULT '',
  `lastname` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL,
  `dateregistered` varchar(65) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '1',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsw_members`
--

INSERT INTO `tsw_members` (`idm`, `phonenumber`, `firstname`, `lastname`, `email`, `dateregistered`, `level`, `username`, `password`, `active`, `resetToken`, `resetComplete`) VALUES
(1, '602-555-2252', 'Jack', 'Kennedy', 'tryme@cginvoice.com', '08/11/2018 16:48:53', 0, 'tryme', '29fa0863fbc89c2882dc8ae17a5f8a1b', 1, NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tsw_settings`
--

CREATE TABLE `tsw_settings` (
  `id` int(6) NOT NULL,
  `theme_url` varchar(250) NOT NULL,
  `server_email` varchar(250) NOT NULL,
  `det_name` varchar(250) NOT NULL,
  `det_moniker` varchar(250) NOT NULL,
  `comp_addr` varchar(250) NOT NULL,
  `comp_city` varchar(250) NOT NULL,
  `comp_phone` varchar(250) NOT NULL,
  `comp_slogan` varchar(250) NOT NULL,
  `comp_payUrl` varchar(1250) NOT NULL,
  `comp_payquest` varchar(250) NOT NULL,
  `comp_email` varchar(250) NOT NULL,
  `disclaimer` varchar(1250) NOT NULL,
  `mytime_zone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsw_settings`
--

INSERT INTO `tsw_settings` (`id`, `theme_url`, `server_email`, `det_name`, `det_moniker`, `comp_addr`, `comp_city`, `comp_phone`, `comp_slogan`, `comp_payUrl`, `comp_payquest`, `comp_email`, `disclaimer`, `mytime_zone`) VALUES
(1, '', '', 'Demo for CGInvoice', 'Change this', '1600 N Pennsylvania Ave', 'Washington DC', '202-555-1222', 'other information', 'https://paypal.me/', '', 'email@email.com', 'Live Long and Prosper', 'MST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cgadmins`
--
ALTER TABLE `cgadmins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cgclients`
--
ALTER TABLE `cgclients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgcontacts`
--
ALTER TABLE `cgcontacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgevents`
--
ALTER TABLE `cgevents`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `cginvoice`
--
ALTER TABLE `cginvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgquote`
--
ALTER TABLE `cgquote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgvendors`
--
ALTER TABLE `cgvendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsw_settings`
--
ALTER TABLE `tsw_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cgadmins`
--
ALTER TABLE `cgadmins`
  MODIFY `admin_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cgclients`
--
ALTER TABLE `cgclients`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cgcontacts`
--
ALTER TABLE `cgcontacts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cgevents`
--
ALTER TABLE `cgevents`
  MODIFY `event_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cginvoice`
--
ALTER TABLE `cginvoice`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cgquote`
--
ALTER TABLE `cgquote`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cgvendors`
--
ALTER TABLE `cgvendors`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tsw_settings`
--
ALTER TABLE `tsw_settings`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
