SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `elements`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `name` varchar(15) NOT NULL,
  `day` datetime NOT NULL,
  `comment` varchar(150) NOT NULL,
  `title_id` int(11) NOT NULL,
  `ip_id` varchar(10) NOT NULL,
  `emotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments_ind`
--

CREATE TABLE `comments_ind` (
  `content_id` int(10) NOT NULL,
  `name` varchar(15) NOT NULL,
  `day` datetime NOT NULL,
  `comment` varchar(150) NOT NULL,
  `title_id` int(11) NOT NULL,
  `ip_id` varchar(10) NOT NULL,
  `emotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments_us`
--

CREATE TABLE `comments_us` (
  `comments_id` int(10) NOT NULL,
  `name` varchar(15) NOT NULL,
  `day` datetime NOT NULL,
  `comment` varchar(150) NOT NULL,
  `title_id` int(11) NOT NULL,
  `ip_id` varchar(10) NOT NULL,
  `emotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `count_id` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int(10) NOT NULL,
  `title_id` int(11) NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(30) NOT NULL,
  `title_day` datetime NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news_ind`
--

CREATE TABLE `news_ind` (
  `title_id` int(100) NOT NULL,
  `title_name` varchar(30) NOT NULL,
  `title_day` datetime NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news_us`
--

CREATE TABLE `news_us` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(30) NOT NULL,
  `title_day` datetime NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL,
  `rank_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`rank_id`, `rank_title`) VALUES
(1, '-'),
(2, '-'),
(3, '-'),
(4, '-'),
(5, '-'),
(6, '-'),
(7, '-'),
(8, '-'),
(9, '-'),
(10, '-');

-- --------------------------------------------------------

--
-- Table structure for table `rank_ind`
--

CREATE TABLE `rank_ind` (
  `rank_id` int(11) NOT NULL,
  `rank_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank_ind`
--

INSERT INTO `rank_ind` (`rank_id`, `rank_title`) VALUES
(1, '-'),
(2, '-'),
(3, '-'),
(4, '-'),
(5, '-'),
(6, '-'),
(7, '-'),
(8, '-'),
(9, '-'),
(10, '-');

-- --------------------------------------------------------

--
-- Table structure for table `rank_us`
--

CREATE TABLE `rank_us` (
  `rank_id` int(11) NOT NULL,
  `rank_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank_us`
--

INSERT INTO `rank_us` (`rank_id`, `rank_title`) VALUES
(1, '-'),
(2, '-'),
(3, '-'),
(4, '-'),
(5, '-'),
(6, '-'),
(7, '-'),
(8, '-'),
(9, '-'),
(10, '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comments_ind`
--
ALTER TABLE `comments_ind`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `comments_us`
--
ALTER TABLE `comments_us`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`count_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `news_ind`
--
ALTER TABLE `news_ind`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `news_us`
--
ALTER TABLE `news_us`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `rank_ind`
--
ALTER TABLE `rank_ind`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `rank_us`
--
ALTER TABLE `rank_us`
  ADD PRIMARY KEY (`rank_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `comments_ind`
--
ALTER TABLE `comments_ind`
  MODIFY `content_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments_us`
--
ALTER TABLE `comments_us`
  MODIFY `comments_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `count_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `news_ind`
--
ALTER TABLE `news_ind`
  MODIFY `title_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `news_us`
--
ALTER TABLE `news_us`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
