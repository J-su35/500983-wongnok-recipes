-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2022 at 11:01 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_dir`
--

DROP TABLE IF EXISTS `admin_dir`;
CREATE TABLE IF NOT EXISTS `admin_dir` (
  `a_id` int(222) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_dir`
--

INSERT INTO `admin_dir` (`a_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `commentbar`
--

DROP TABLE IF EXISTS `commentbar`;
CREATE TABLE IF NOT EXISTS `commentbar` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(222) NOT NULL,
  `text` text NOT NULL,
  `date_time` varchar(222) NOT NULL,
  `recipy_id` int(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentbar`
--

INSERT INTO `commentbar` (`id`, `user_id`, `text`, `date_time`, `recipy_id`) VALUES
(39, 3, ' great', ' 07:35PM 7-Nov-2017 ', 58),
(42, 12, ' ff', ' 08:10PM 7-Nov-2017 ', 58),
(43, 12, ' wao nic ', ' 09:59PM 7-Nov-2017 ', 56);

-- --------------------------------------------------------

--
-- Table structure for table `full_recipy`
--

DROP TABLE IF EXISTS `full_recipy`;
CREATE TABLE IF NOT EXISTS `full_recipy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(222) NOT NULL,
  `title_text` text NOT NULL,
  `image` varchar(222) NOT NULL,
  `ing_text` text NOT NULL,
  `disc` text NOT NULL,
  `rid` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `full_recipy`
--

INSERT INTO `full_recipy` (`id`, `title`, `title_text`, `image`, `ing_text`, `disc`, `rid`) VALUES
(10, 'lemon dizzy cake', 'its delicious, perfect as it is, and never fails to impress all :-)... personal preference is granulated sugar in the topping, and a of spoonful of lemon juice in the in the batter too to make it more lemony... ', '59d9ded79cbf9.jpg', '<ul><li>225g unsalted butter, softened</li><li>225g caster sugar</li><li>4&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/glossary/egg\">eggs</a><h2><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/glossary/egg\"></a></h2></li><li>finely grated zest 1&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/glossary/lemon\">lemon</a><h2><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/glossary/lemon\"></a></h2></li><li>225g self-raising flour</li>For the drizzle topping<ul><li>juice 1½&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/glossary/lemon\">lemons</a><h2><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/glossary/lemon\"></a></h2></li><li>85g caster sugar</li></ul></ul>', '<ul>\n<li>Heat oven to 180C/fan 160C/gas 4.&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/content/top-five-whisks\">Beat together</a>&nbsp;225g softened unsalted butter and 225g caster sugar until pale and creamy, then add 4 eggs, one at a time, slowly mixing through. Sift in 225g flour, then add the finely grated zest of 1 lemon and&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/content/top-five-mixing-bowls\">mix</a>&nbsp;until well combined. Line a loaf tin (8 x 21cm) with greaseproof paper, then spoon in the mixture and level the top with a spoon.</li>\n\n<li>Bake for 45-50 mins until a thin skewer inserted into the centre of the cake comes out clean. While the cake is cooling in its tin, mix together the juice of 1 1/2 lemons and 85g caster sugar to make the drizzle. Prick the warm cake all over with a skewer or fork, then pour over the drizzle – the juice will sink in and the sugar will form a lovely, crisp topping. Leave in the tin until completely cool, then remove and serve. Will keep in an airtight container for 3-4 days, or freeze for up to 1 month.\n\n</li>\n\n</ul>\n\n', '52'),
(11, 'crunchy bran french toast', 'a definite winner at the breakfast table. One of the best breakfast sandwiches that can be made with simple and healthy ingredients. A bit of a tangy taste due to the orange juice and orange zest but the crunchy cereal helped it come all together. This will be a staple at the breakfast in the future.', '59d9e3051ecf3.jpg', '8 slices whole-grain bread\r\n4 tablespoons light cream cheese\r\n4 teaspoons low-sugar orange marmalade\r\n2 large eggs plus 2 egg whites\r\nZest and juice of 1 orange\r\n1 teaspoon vanilla extract\r\n1 1/2 cups bran flakes cereal\r\n1 to 2 tablespoons vegetable oil\r\n1 to 2 tablespoons unsalted butter\r\n2 tablespoons confectioners\' sugar (optional)', 'Spread 4 bread slices with 1 tablespoon cream cheese each; spread the other 4 slices with 1 teaspoon marmalade each. Combine to make 4 sandwiches.Whisk the whole eggs, egg whites, orange zest and juice, and vanilla in a shallow bowl. Place the bran flakes in a resealable plastic bag and crush with a rolling pin or your hands. Pour the crumbs onto a plate. Dip both sides of each sandwich in the egg mixture, then in the crumbs, gently pressing the crumbs onto the bread.Heat 1 tablespoon each oil and butter in a skillet or griddle over medium heat. Add the sandwiches in batches and cook until the outsides are golden and the insides are melted, 3 to 4 minutes per side. (Add more oil and butter, if needed.)Slice the French toast sandwiches into triangles. Let cool before serving to little ones, as the cream cheese can get quite hot. Sprinkle with confectioners\' sugar, if desired, and the kids won\'t even ask for syrup!', '55'),
(12, 'Easy Garlic-Herb Salad Croutons', '<ul><li>Learn how to make your own croutons to perk up that lunch salad! Perfectly crisp and crunchy and filled with garlicky-herb flavors.</li></ul> ', '59d9e7d3342b7.jpg', '<ul><li>4 cups 1-in dry bread cubes</li><li>4 garlic cloves, minced</li><li>1 teaspoon Italian seasoning</li><li>1 teaspoon salt</li><li>1/2 teaspoon pepper</li><li>3 tablespoons olive oil</li><li>Salad for serving</li></ul>', '<ol><li>Preheat oven to 300F. Lightly grease a baking sheet. Set aside.</li><li>In a medium bowl, toss bread cubes with seasonings, Drizzle with olive oil and toss to coat. Spread in a single layer on baking sheet. Bake croutons at 300F 40 minutes or until a deep golden brown, stirring every 10 minutes.</li><li>Cool croutons slightly then serve with salad.</li></ol>', '56'),
(13, ' LEMON FIRE BRIGADE french onion soup', '<ul><li>Combine the onions, olive oil, butter, and salt in a 4-quart sauté pan or Dutch oven. Cook, stirring occasionally.</li></ul> ', '59d9e9bcb6285.jpg', '<ul><li>7 large yellow onions, cut into 1/4 inch thick slices</li><li>1 tablespoon extra-virgin olive oil</li><li>1 tablespoon unsalted butter</li><li>1 1/2 teaspoons kosher salt</li><li>2 1/2 cups dry white wine</li><li>2 tablespoons mushroom bouillon (I used better than bouillon organic mushroom base)</li><li>2 quarts water</li><li>4-6 slices day-old sourdough bread or whole-wheat bread, each sliced 1/2 to 1-inch thick, toasted</li><li>7 ounces Gruyère cheese, grated or sliced thin</li><li>Freshly ground black pepper</li></ul>', '<ul><li>Combine the onions, olive oil, butter, and salt in a 4-quart sauté pan or Dutch oven. Cook, stirring occasionally, over medium heat until the onions are soft and translucent, about 10 minutes. Adjust the heat to medium-high, spread the onions over the bottom of the pot, and cook without stirring until the bottom of the pot begins to turn brown, about 5 minutes. Stir the onions with a non-abrasive spoon or spatula to scrape up the browned bits. Add 1/2 cup of the wine and deglaze the pot, stirring to pick up any remaining browned bits. Continue cooking until the browned fond forms again. Scrape and deglaze the pot with another 1/2 cup wine and repeat the process 3 more times until the onions have slowly turned a deep caramel hue.Add the bouillon to the onions and stir until evenly coated. Pour in the water, bring the pot to a simmer over medium-low heat, and cook until the soup is seasoned well from the caramelized onions, about 20 minutes. Taste to adjust for seasonings.Preheat the oven to 400º. Arrange ovenproof bowls over a rimmed baking sheet and ladle the soup into the bowls filling them almost to the rims. Place a slice of toasted bread onto each serving and top with the Gruyère. Bake until the cheese is bubbling, about 15 to 20 minutes, season with ground black pepper and serve.</li></ul>', '58'),
(14, 'Bourbon Glazed Meatloaf', 'To make fresh breadcrumbs just tear up a slice or two of bread and whiz in a food processor.', '59d9eb11888ba.jpg', '1 lb ground beef\r\n1 lb ground pork\r\n1 egg, beaten\r\n1/2 cup fresh breadcrumbs (you can also use dried)\r\n1/2 yellow onion, peeled and minced\r\n1 tsp salt\r\nlots of fresh cracked pepper\r\nBourbon glaze\r\n1 cup fruit jam or preserves, I like to use apricot or cherry\r\n1/4 cup dark brown sugar (use regular brown sugar if you don\'t have dark)\r\n1 Tbsp hot chili sauce or Sriracha (use more if you like things hotter)\r\n1/2 cup bourbon (or any kind of whiskey or cognac)\r\n1/2 cup of your favorite barbecue sauce\r\n1/4 cup water', 'Set oven to 350F\r\nTo make the sauce, put all the ingredients in a sauce pan and stir to combine. Bring to a boil lower the heat and simmer/boil gently, uncovered, for about 10 minutes until thickened. If you used a chunky jam you may want to use an immersion blender to puree the glaze.\r\nPut the meats in a large mixing bowl, breaking them apart into small pieces as you add them.\r\nAdd the egg, breadcrumbs, onion and salt and pepper to the bowl. Mix everything well with your fingertips. You want to thoroughly incorporate all the elements without over-doing it.\r\nForm the meat into a loaf, not too tall and not too wide. You want it to cook evenly, so try to get it even from end to end.\r\nYou can set it directly in a pan or on a baking sheet, or set it on a rack if you have one. Whatever you do, be sure to line the pan with foil since the glaze will drip and make a mess.\r\nSpread a layer of glaze all over the meatloaf and bake it for about 60 minutes, or until a thermometer inserted in the center reads 160F. I baste another layer of sauce on the meat halfway through the cooking.\r\nRemove the meat and let it rest for a few minutes before slicing. Slather on a final coat of glaze just before serving, (heat it up on the stove so it is hot) and serve extra sauce on the side.', '59');

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

DROP TABLE IF EXISTS `post_rating`;
CREATE TABLE IF NOT EXISTS `post_rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock',
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`rating_id`, `post_id`, `rating_number`, `total_points`, `created`, `modified`, `status`) VALUES
(12, 1, 1, 4, '2017-11-07 16:32:12', '2017-11-07 16:32:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `rid` int(222) NOT NULL AUTO_INCREMENT,
  `rimage` varchar(222) NOT NULL,
  `resname` varchar(222) NOT NULL,
  `rtext` text NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`rid`, `rimage`, `resname`, `rtext`) VALUES
(52, '59d9dceab50c5.jpg', 'Lemon drizzel cake', '<ul><li>Heat oven to 180C/fan 160C/gas 4.&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/content/top-five-whisks\">Beat together</a>&nbsp;225g softened unsalted butter and 225g caster sugar until pale and creamy, then add 4 eggs, one at a time, slowly mixing through. Sift in 225g flour, then add the finely grated zest of 1 lemon and&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bbcgoodfood.com/content/top-five-mixing-bowls\">mix</a>&nbsp;until well combined. Line a loaf tin (8 x 21cm) with greaseproof paper, then spoon in the mixture and level the top with a spoon.</li></ul>'),
(55, '59d9e3051ecf3.jpg', 'crunchy bran french toast', 'a definite winner at the breakfast table. One of the best breakfast sandwiches that can be made with simple and healthy ingredients. A bit of a tangy taste due to the orange juice and orange zest but the crunchy cereal helped it come all together. This will be a staple at the breakfast in the future'),
(56, '59d9e6ba87bef.jpg', 'Easy Garlic-Herb Salad Croutons', '<ul><li>Learn how to make your own croutons to perk up that lunch salad! Perfectly crisp and crunchy and filled with garlicky-herb flavors.</li></ul>'),
(58, '59d9e94d7ef4f.jpg', ' french onion soup', '<ul><li>Combine the onions, olive oil, butter, and salt in a 4-quart sauté pan or Dutch oven. Cook, stirring occasionally, over medium heat until the onions are soft and translucent, about 10 minutes. Adjust the heat to medium-high, spread the onions over the bottom of the pot, and cook without stirring until the bottom of the pot begins to turn brown</li></ul>'),
(59, '59d9eac3c4a56.jpg', 'Bourbon Glazed Meatloaf', '<ul><li>To make fresh breadcrumbs just tear up a slice or two of bread and whiz in a food processor.</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(244) NOT NULL,
  `lastname` varchar(244) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(3, 'navjot', 'singh', 'ns949405@gmail.com', '74587458'),
(12, 'rohit', 'singh', 'rohit@gmail.com', '74587458'),
(16, 'rohit@gmail.com', 'rohit@gmail.com', 'rohit@gmail.com', 'rohit@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
