SET time_zone = "+00:00";

-- Database: `blogger`

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(250) NOT NULL UNIQUE,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- --------------------------------------------------------

-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postId` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `postAuthor` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL UNIQUE,
  `postBody` varchar(10000) NOT NULL,
  `postTag` varchar(40) NOT NULL,
  `postThumbnail` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

