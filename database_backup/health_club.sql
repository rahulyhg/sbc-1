-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2016 at 06:28 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `health_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Abs/Core'),
(2, 'Cardio'),
(3, 'Resistance'),
(4, 'Warm Up'),
(5, 'Cool Down'),
(6, 'Jumpstart'),
(7, 'Bonus'),
(8, 'Navigator');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Other'),
(2, 'Produce'),
(3, 'Refrigerated Animal Protein'),
(4, 'Miscellaneous Refrigerated'),
(5, 'Dry Goods'),
(6, 'Frozen');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Beans and Legumes', '<p>Serving Sizes: 1 serving = ½ cup cooked beans or legumes. One tablespoon of peanut butter is one serving. Can be considered a protein serving.</p>\n<p>Examples:</p>\n<ul>\n<li>Black beans (black turtle beans)</li>	\n<li>Garbanzo beans (chick peas)</li>	\n<li>Kidney beans </li>	\n<li>Navy beans or white beans</li>	\n<li>Great northern beans</li>	\n<li>Lentils (red, black, brown, green, white) </li>	\n<li>Peas (green, yellow, black-eyed, split, snow, sugar snap)</li>\n<li>Pinto beans (mottled beans)</li>	\n<li>Lima beans</li>	\n<li>Mung beans</li>	\n<li>Adzuki beans</li>	\n<li>Fava beans</li>	\n<li>Green beans (French green beans)</li>	\n<li>Red beans</li>	\n<li>Peanuts</li>	\n</ul>', NULL, NULL),
(2, 'Fruit', '<p>Serving sizes to be determined by food. For whole fruits like apples, oranges, or bananas, a serving size is one medium-size piece. Fruits that need to be sliced and diced like pineapple and melon, one serving size is ½ cup. One serving of berries is ½ cup.</p>\n<p>Examples:</p>\n<ul>\n<li>Apple</li>	\n<li>Banana</li>	\n<li>Grapes</li>	\n<li>Pears</li>	\n<li>Kiwi</li>	\n<li>Pomegranate</li>	\n<li>Persimmon</li>	\n<li>Avocado</li>	\n<li>Olives</li>	\n<li>Berries (blueberries, black berries, raspberries, strawberries, cranberries)</li>\n<li>Citrus (orange, grapefruit, lemon, lime, tangerine, mandarin, clementine, kumquat, pomelo) </li>\n<li>Pitted fruits (peaches, nectarines, apricots, plums, pluots, cherries)</li>\n<li>Other tropical Fruits (mango, papaya, pineapple, passion fruit, mangosteen, dragon fruit, tamarind, rambutan, lychee)</li>\n<li>Melon (watermelon, cantaloupe, honeydew, Crenshaw, canary, galia, horned melon, bitter melon, hami)</li>\n</ul>', NULL, NULL),
(3, 'Grains, Gluten-Free', '<p>Serving Sizes: 1 serving = ½ cup of cooked grains; 1 slice of gluten-free bread, 1 medium-sized ear of corn.</p>\n<p>Examples:</p>\n<ul>\n<li>Amaranth</li>	\n<li>Buckwheat</li>	\n<li>Corn (organic and non-GMO when possible)</li>	\n<li>Millet</li>	\n<li>Oats (Steel cut or rolled oats)</li>	\n<li>Quinoa (technically a seed but many people refer to it as a grain) </li>\n<li>Rice (brown, jasmine, basmati, wild)</li>	\n<li>Sorghum</li>	\n<li>Teff</li>	\n</ul>', NULL, NULL),
(4, 'Healthy Fats', '<p>Serving Sizes: 1 serving = 1 tablespoon of oil; ½ avocado; 1 tablespoon of nut or seed butter or a small handful of nuts or seeds (approximately ⅛ - ¼ cup depending on the size); 2 tablespoons of mayonnaise or vegan mayonnaise.<p>\n<p>Examples:</p>\n<ul>\n<li>Avocado</li>	\n<li>Coconut oil</li>	\n<li>Olive oil</li>	\n<li>Hemp oil </li>	\n<li>Sesame oil</li>	\n<li>Nuts and seeds (types listed above)</li>	\n<li>Mayonnaise (organic)</li>	\n<li>Vegan mayonnaise</li>	\n</ul>', NULL, NULL),
(5, 'Nuts and Seeds', '<p>Serving Sizes: 1 serving = 1 tablespoon of nut or seed butter or a small handful of nuts or seeds (approximately ⅛ - ¼ cup depending on the size).</p>\n<p>Examples:</p>\n<ul>\n<li>Almonds</li>	\n<li>Brazil Nuts</li>	\n<li>Cashews</li>	\n<li>Chestnuts</li>	\n<li>Hazelnut</li>	\n<li>Macadamia</li>	\n<li>Pecans</li>	\n<li>Pine Nuts</li>	\n<li>Pistachios</li>	\n<li>Walnuts</li>	\n<li>Chia seeds</li>	\n<li>Flaxseed</li>	\n<li>Hemp seeds</li>	\n<li>Pumpkin seeds</li>	\n<li>Sesame seeds</li>	\n<li>Sunflower seeds</li>	\n </ul>', NULL, NULL),
(6, 'Plant-Based Milks, Unsweetened', '<p>Serving Sizes: 1 serving = 1 cup non-dairy milk</p>\n<p>Examples:</p>\n<ul>\n<li>Almond milk</li>	\n<li>Coconut milk</li>	\n<li>Rice milk</li>	\n<li>Hemp milk</li>	\n<li>Cashew milk</li>	\n<li>Oat milk</li>	\n<li>Flax milk</li>	\n<li>Hazelnut milk</li>	\n<li>Quinoa milk</li>	\n</ul>', NULL, NULL),
(7, 'Plant-Based Protein Powder', '<p>Serving size to be determined by product. Usually it is one scoop or the equivalent of 3 tablespoons.</p> \n<p>Note: Choose organic when possible and avoid products with added sugars, artificial flavors or colors, and preservatives. Also be aware of soy, gluten and dairy based protein powders, as they are common food allergies and can be highly processed.</p>\n<p>Examples:</p>\n<ul>\n<li>Hemp protein powder</li>	\n<li>Pea protein powder</li>	\n<li>Rice protein powder</li>	\n<li>Plant-based protein blends (combinations of different protein powders such as hemp, pea, rice and quinoa blends and similar varieties)</li>	\n</ul>', NULL, NULL),
(8, 'Protein', '<p>Serving Sizes: 1 serving = palm-sized portion of beef, bison, buffalo, chicken, lamb, fish, and shellfish; 1 small pork chop; 2 strips of bacon or 2 slices of Canadian bacon, 2 turkey links or sausages; 1 egg or 3 egg whites; 1 cup of cooked grains or oats; 3 tablespoons of plant-based protein powder, ½ cup or one palm-sized portion of tempeh; one handful of nuts or seeds. </p>\n<p>Examples:</p>\n<ul>\n<li>Beef (lean cuts only, organic grass-fed or grass-finished when possible): bottom round, eye of round, round tip (sirloin tip), tenderloin, top loin (strip loin), top round, top sirloin, lean ground meat</li>\n<li>Bison or buffalo (lean cuts only, organic grass-fed or grass-finished when possible): bottom round, eye of round, round tip (sirloin tip), tenderloin, top loin (strip loin), top round, top sirloin, lean ground meat</li>\n<li>Bacon (uncured, nitrate-free)</li>	\n<li>Canadian bacon (uncured, nitrate-free)</li>	\n<li>Pork chops (lean)</li>	\n<li>Chicken (skin removed, organic when possible): breast, thighs, wings, drumsticks, lean ground meat</li>\n<li>Lamb (lean cuts only, organic grass-fed or grass-finished when possible)</li>\n<li>Turkey (skin removed, organic when possible): breast, thighs, wings, drumsticks, lean ground meat</li>\n<li>Eggs or egg whites</li>	\n<li>Fish (wild-caught and sustainably sources when possible): bass, bluefish, catfish, cod, flounder, grouper, haddock, halibut, herring, mackerel, monkfish, orange roughy, perch, pollock, red snapper salmon (fresh or canned and drained), sardines (packed in water, tomato sauce, or mustard), shark, sole, swordfish, tilapia, trout, tuna (fresh or chunk light and low-sodium canned in water)</li>\n<li>Shellfish (wild-caught and sustainably sources when possible): clams, conch, cuttlefish, crab, lobster, mussels, octopus, oysters, shrimp, squid, scallops</li>	\n<li>Plant-based protein sources: Tempeh (fermented soy, organic if possible), Protein powder (see choices below), beans, legumes, grains (millet, amaranth, brown rice, quinoa, etc…) hemp or hemp seeds, nuts, seeds, oats</li>\n</ul>', NULL, NULL),
(9, 'Vegetables', '<p>Serving sizes for vegetables are unlimited.</p>\n<p>Examples:</p>\n<ul>\n<li>Leafy Greens: spinach, chard, mustard greens, kale, arugula, cabbage (green, red, Napa, Chinese, etc…), radicchio, beet greens, collard greens, dandelion greens, watercress, endive, lettuce (red leaf, green leaf, romaine, butter, etc…), bok choy</li>\n<li>Roots and Tubers: carrots, potatoes, yams, beets, onions, garlic, radish, parsnip, ginger, turnip, parsley root, jicama, rutabaga, cassava, daikon, maca, yacón, kohlrabi, celery root, turmeric, taro, shallots, Jerusalem artichoke</li>\n<li>Stems: asparagus, rhubarb, celery, bamboo, leeks, green onions</li>\n<li>Flowering Vegetables: cucumbers, pumpkin, squashes, eggplant, peppers, tomatoes, avocado, peapods, corn, olives</li>\n<li>Vegetable Flowers: artichoke, broccoli, cauliflower, Brussels sprouts</li>\n<li>Ocean Vegetables (seaweed): agar agar, arame, dulse, hijiki, kelp, kombu, nori, wakame, bladderwrack</li>\n<li>Fungi: Mushrooms (white button, crimini, oyster, maitake, shiitake, portabella, enoki, lobster, chanterelle, porcini, morel, truffle, wood ear)</li>	\n<li>Sprouts: alfalfa, clover, mung bean, lentil, radish, broccoli, kale, mustard</li>\n</ul>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `food_recipe`
--

CREATE TABLE IF NOT EXISTS `food_recipe` (
  `food_id` int(10) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `food_recipe_food_id_index` (`food_id`),
  KEY `food_recipe_recipe_id_index` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_recipe`
--

INSERT INTO `food_recipe` (`food_id`, `recipe_id`, `created_at`, `updated_at`) VALUES
(9, 35, NULL, NULL),
(8, 20, NULL, NULL),
(9, 21, NULL, NULL),
(9, 44, NULL, NULL),
(9, 27, NULL, NULL),
(8, 57, NULL, NULL),
(8, 28, NULL, NULL),
(1, 29, NULL, NULL),
(9, 29, NULL, NULL),
(2, 52, NULL, NULL),
(2, 49, NULL, NULL),
(2, 33, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `single` tinyint(1) DEFAULT NULL,
  `department_id` int(10) unsigned DEFAULT NULL,
  `food_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingredients_department_id_index` (`department_id`),
  KEY `ingredients_food_id_index` (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=197 ;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `single`, `department_id`, `food_id`) VALUES
(1, 'plant-based unsweetend milk', NULL, 5, NULL),
(2, 'frozen strawberries', NULL, 6, NULL),
(3, 'plant-based protein powder', NULL, 5, NULL),
(4, 'water', NULL, 5, NULL),
(5, 'unsalted raw or dry-roasted almonds', NULL, 5, NULL),
(6, 'cinnamon', NULL, 5, NULL),
(7, 'ice', NULL, 4, NULL),
(8, 'unsweetened coconut milk', NULL, 5, NULL),
(9, 'coconut water or filtered water', NULL, 5, NULL),
(10, 'spinach', NULL, 2, NULL),
(11, 'kale', NULL, 2, NULL),
(12, 'mango', 1, 2, NULL),
(13, 'pineapple', 0, 2, NULL),
(14, 'banana', 1, 2, NULL),
(15, 'orange', 1, 2, NULL),
(16, 'frozen blueberries', NULL, 6, NULL),
(17, 'unsweetened sunflower seed butter', NULL, 5, NULL),
(18, 'gluten-free rolled oats', NULL, 5, NULL),
(19, 'carrot', NULL, 2, NULL),
(20, 'beet', NULL, 2, NULL),
(21, 'Medjool dates', NULL, 2, NULL),
(22, 'romaine lettuce', NULL, 2, NULL),
(23, 'avocado', 1, 2, NULL),
(24, 'cucumber', 1, 2, NULL),
(25, 'liquid stevia ', NULL, 5, NULL),
(26, 'frozen pitted cherries', NULL, 6, NULL),
(27, 'raw cacao nibs', NULL, 5, NULL),
(28, 'Granny smith apple', 1, 2, NULL),
(29, 'coconut oil', NULL, 5, NULL),
(30, 'garlic', NULL, 2, NULL),
(31, 'black pepper', NULL, 5, NULL),
(32, 'boneless, skinless chicken breast', NULL, 3, NULL),
(34, 'goji berries or cranberries', NULL, 5, NULL),
(35, 'lemon', 1, 2, NULL),
(36, 'olive oil', NULL, 5, NULL),
(37, 'Celtic Sea Salt', NULL, 5, NULL),
(38, 'low-sodium vegetable broth', NULL, 5, NULL),
(39, 'crushed red pepper', NULL, 5, NULL),
(40, 'greens of choice (spinach, kale, chard, etc.)', NULL, 2, NULL),
(42, 'organic tempeh', NULL, 4, NULL),
(43, 'brown rice', NULL, 5, NULL),
(44, 'extra-virgin olive oil', NULL, 5, NULL),
(45, 'onion', 1, 2, NULL),
(48, 'green bell pepper', NULL, 2, NULL),
(49, 'grape tomatoes', NULL, 2, NULL),
(50, 'cayenne pepper', NULL, 5, NULL),
(52, 'black beans', NULL, 5, NULL),
(54, 'mixed greens', NULL, 2, NULL),
(55, 'tangerine', 1, 2, NULL),
(56, 'almonds', NULL, 5, NULL),
(57, 'tomato', 1, 2, NULL),
(58, 'dried basil', NULL, 2, NULL),
(59, 'organic extra-virgin olive oil', NULL, 5, NULL),
(61, 'sea salt', NULL, 5, NULL),
(62, 'Nutritional yeast', NULL, 5, NULL),
(63, 'fresh cod fillet', 1, 3, NULL),
(65, 'Dijon mustard', NULL, 5, NULL),
(66, 'lemon juice', NULL, 5, NULL),
(68, 'Red Bliss potato', 1, 2, NULL),
(69, 'boneless, skinless turkey breast', NULL, 3, NULL),
(72, 'brown rice or quinoa penne', NULL, 5, NULL),
(73, 'garbanzo beans', NULL, 5, NULL),
(76, 'ground sunflower seeds or gluten-free flour', NULL, 5, NULL),
(78, 'cumin', NULL, 5, NULL),
(79, 'paprika', NULL, 5, NULL),
(80, 'salt and pepper', NULL, 5, NULL),
(81, 'lettuce leaves', NULL, 2, NULL),
(82, 'coconut water', NULL, 5, NULL),
(84, 'frozen peaches', NULL, 6, NULL),
(85, 'red bell pepper', 1, 2, NULL),
(86, 'yellow or green bell pepper', NULL, 2, NULL),
(87, 'mushrooms', NULL, 2, NULL),
(88, 'cherry tomatoes', NULL, 2, NULL),
(89, 'walnuts', NULL, 5, NULL),
(90, 'uncooked quinoa', NULL, 5, NULL),
(92, 'bell peppers', 1, 2, NULL),
(94, 'red onion', 1, 2, NULL),
(96, 'zucchini', NULL, 2, NULL),
(101, 'Coconut aminos', NULL, 5, NULL),
(102, 'raisins', NULL, 5, NULL),
(103, 'gluten-free bread', NULL, 6, NULL),
(104, 'vegetable broth', NULL, 5, NULL),
(106, 'potato', 1, 2, NULL),
(108, 'celery', NULL, 2, NULL),
(109, 'green beans', NULL, 5, NULL),
(110, 'corn kernels', NULL, 5, NULL),
(111, 'Bragg''s Sprinkle Seasoning', NULL, 5, NULL),
(112, 'cod fillet', NULL, 3, NULL),
(113, 'organic celery', NULL, 2, NULL),
(114, 'organic zucchini', NULL, 2, NULL),
(115, 'organic red onion', 1, 2, NULL),
(116, 'organic red pepper', NULL, 2, NULL),
(117, 'sun-dried tomaotes', NULL, 5, NULL),
(118, 'chili powder', NULL, 5, NULL),
(121, 'pine nuts', NULL, 5, NULL),
(123, 'broccoli', NULL, 2, NULL),
(125, 'frozen organic corn', NULL, 6, NULL),
(126, 'extra-lean ground turkey', NULL, 3, NULL),
(127, 'Italian herb seasoning', NULL, 5, NULL),
(128, 'cannellini beans', NULL, 5, NULL),
(129, 'red quinoa', NULL, 5, NULL),
(130, 'brown rice or quinoa linguine', NULL, 5, NULL),
(131, 'fresh basil', NULL, 2, NULL),
(132, 'salmon fillet', NULL, 3, NULL),
(133, 'bay leaves', NULL, 5, NULL),
(135, 'rice vinegar', NULL, 5, NULL),
(136, 'apple', 1, 2, NULL),
(138, 'fresh greens', NULL, 2, NULL),
(140, 'freshly ground pepper', NULL, 5, NULL),
(142, 'baby spinach', NULL, 2, NULL),
(144, 'almond butter', NULL, 5, NULL),
(145, 'fresh berries (your choice)', NULL, 2, NULL),
(146, 'flax seeds', NULL, 5, NULL),
(147, 'sweet potato', 1, 2, NULL),
(148, 'organic oat bran or quinoa cereal', NULL, 5, NULL),
(149, 'veggies (your choice)', NULL, 2, NULL),
(150, 'protein (your choice)', NULL, 3, NULL),
(151, 'hummus', NULL, 4, NULL),
(152, 'baby carrots', NULL, 2, NULL),
(153, 'honey', NULL, 5, NULL),
(154, 'organic, roasted seaweed snacks', NULL, 5, NULL),
(155, 'fish or seafood (your choice)', NULL, 3, NULL),
(156, 'balsamic vinegar', NULL, 5, NULL),
(157, 'legumes (your choice)', NULL, 5, NULL),
(158, 'lean eye of round steak', NULL, 3, NULL),
(159, 'grilled shrimp or tuna', NULL, 3, NULL),
(160, 'brussel sprouts', NULL, 2, NULL),
(161, 'fish', NULL, 3, NULL),
(162, 'fresh or frozen peaches', NULL, 2, NULL),
(163, 'egg', 1, 4, NULL),
(164, 'brown rice tortilla', 1, 4, NULL),
(165, 'vanilla bean or vanilla extract', NULL, 5, NULL),
(166, 'blueberries, fresh or frozen', NULL, 2, NULL),
(167, 'Chia and Oatmeal Pudding', NULL, 5, NULL),
(168, 'chia seed', NULL, 5, NULL),
(169, 'sherry vinegar', NULL, 5, NULL),
(170, 'fresh parsley', NULL, 2, NULL),
(171, 'cabbage', 1, 2, NULL),
(172, 'white beans', NULL, 5, NULL),
(174, 'shrimp', NULL, 3, NULL),
(175, 'brown rice cake', 1, 5, NULL),
(176, 'dairy-free mayonnaise', NULL, 4, NULL),
(177, 'bacon', NULL, 3, NULL),
(178, 'cauliflower', 1, 2, NULL),
(179, 'cayenne or red pepper flakes ', NULL, 5, NULL),
(180, 'parchment paper', 1, 5, NULL),
(181, 'baby spinach or salad greens', NULL, 2, NULL),
(182, 'fresh ginger', 1, 2, NULL),
(183, 'mushrooms (your choice)', NULL, 2, NULL),
(184, 'gluten-free pasta', NULL, 5, NULL),
(185, 'sesame seed', NULL, 5, NULL),
(186, 'wild salmon', NULL, 3, NULL),
(187, 'romaine lettuce or salad greens of choice', NULL, 2, NULL),
(188, 'capers', NULL, 5, NULL),
(189, 'ground turkey', NULL, 3, NULL),
(190, 'eggplant', 1, 2, NULL),
(191, 'fresh salsa', NULL, 5, NULL),
(192, 'sunflower seed butter', NULL, 5, NULL),
(193, 'unsweetened cocoa powder', NULL, 5, NULL),
(194, 'apple or peach', 1, 2, NULL),
(195, 'spinach or mixed green salad', NULL, 2, NULL),
(196, 'raw veggies (your choice)', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_recipe`
--

CREATE TABLE IF NOT EXISTS `ingredient_recipe` (
  `recipe_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quanity_s` decimal(3,1) DEFAULT NULL,
  `quanity_w` decimal(3,1) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` tinyint(3) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`recipe_id`,`ingredient_id`),
  KEY `ingredient_recipe_recipe_id_index` (`recipe_id`),
  KEY `ingredient_recipe_ingredient_id_index` (`ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredient_recipe`
--

INSERT INTO `ingredient_recipe` (`recipe_id`, `ingredient_id`, `quantity`, `unit`, `quanity_s`, `quanity_w`, `note`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(1, 2, '1', 'cup', NULL, 7.5, '', NULL, NULL, NULL),
(1, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(1, 4, '1/4', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(1, 5, '1', 'tbsp', NULL, 0.3, 'chopped', NULL, NULL, NULL),
(1, 6, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(1, 7, '1', 'handful', NULL, NULL, '', NULL, NULL, NULL),
(2, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(2, 8, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(2, 9, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(2, 10, '2', 'handfuls', NULL, 4.0, '', NULL, NULL, NULL),
(2, 11, '2', 'leaves', NULL, 0.8, '', NULL, NULL, NULL),
(2, 12, '1', 'cup', 1.0, NULL, 'frozen', NULL, NULL, NULL),
(2, 13, '1', 'cup', NULL, 8.0, 'frozen', NULL, NULL, NULL),
(2, 14, '1', '', 1.0, NULL, 'frozen', NULL, NULL, NULL),
(2, 15, '1', '', 1.0, NULL, 'peeled', NULL, NULL, NULL),
(3, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(3, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(3, 4, '1/4', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(3, 7, '1', 'handful', NULL, NULL, '', NULL, NULL, NULL),
(3, 16, '3/4', 'cup', NULL, 3.8, '', NULL, NULL, NULL),
(3, 17, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(3, 18, '1', 'tbsp', NULL, 0.2, '', NULL, NULL, NULL),
(4, 2, '12', '', NULL, 15.0, 'whole', NULL, NULL, NULL),
(4, 3, '2', 'tbsp', NULL, 1.0, '', NULL, NULL, NULL),
(4, 10, '1', 'handful', NULL, 2.0, '', NULL, NULL, NULL),
(4, 19, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(4, 20, '1', '', 1.0, NULL, 'small', NULL, NULL, NULL),
(4, 21, '1', 'cup', NULL, 6.0, '', NULL, NULL, NULL),
(4, 82, '1.5', 'cups', NULL, 12.0, '', NULL, NULL, NULL),
(5, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(5, 7, '1', 'handful', NULL, NULL, '', NULL, NULL, NULL),
(5, 9, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(5, 14, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(5, 22, '7', 'leaves', 0.5, NULL, '', NULL, NULL, NULL),
(5, 23, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(5, 24, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(5, 25, '', '', NULL, NULL, 'if needed', NULL, NULL, NULL),
(6, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(6, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(6, 26, '3/4', 'cup', NULL, 6.0, '', NULL, NULL, NULL),
(6, 27, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(7, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(7, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(7, 4, '2', 'tbsp', NULL, 1.0, '', NULL, NULL, NULL),
(7, 7, '1', 'handful', NULL, NULL, '', NULL, NULL, NULL),
(7, 10, '1/4', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(7, 28, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(7, 29, '2', 'tbsp', NULL, NULL, 'melted', NULL, NULL, NULL),
(8, 22, '2', 'leaves', 0.3, NULL, '', NULL, NULL, NULL),
(8, 23, '1', '', 1.0, NULL, 'mashed', NULL, NULL, NULL),
(8, 30, '1', 'tbsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(8, 31, '1/8', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(8, 32, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(9, 11, '2', 'cups', NULL, 5.0, '', NULL, NULL, NULL),
(9, 23, '1', '', 1.0, NULL, 'cubed', NULL, NULL, NULL),
(9, 34, '1', 'tbsp', NULL, NULL, 'dried', NULL, NULL, NULL),
(9, 35, '1', '', 1.0, NULL, 'juiced', NULL, NULL, NULL),
(9, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(9, 37, '1', 'pinch', NULL, NULL, 'to taste', NULL, NULL, NULL),
(10, 29, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(10, 30, '1/2', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(10, 38, '1/4', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(10, 39, '1/8', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(10, 40, '1/2', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(10, 42, '3', 'oz', NULL, 3.0, 'cubed', NULL, NULL, NULL),
(10, 43, '1/2', 'cup', NULL, 3.4, 'cooked', NULL, NULL, NULL),
(10, 87, '1', 'cup', NULL, 3.0, 'sliced', NULL, NULL, NULL),
(11, 10, '1/2', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(11, 19, '1/4', 'cup', 1.5, NULL, 'chopped', NULL, NULL, NULL),
(11, 30, '1/4', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(11, 31, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(11, 38, '1/2', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(11, 39, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(11, 43, '1/3', 'cup', NULL, 2.3, 'cooked', NULL, NULL, NULL),
(11, 44, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(11, 45, '1/4', 'cup', 0.4, NULL, 'chopped', NULL, NULL, NULL),
(11, 48, '1/4', 'cup', 0.5, NULL, 'chopped', NULL, NULL, NULL),
(11, 49, '1/4', 'cup', NULL, 2.0, 'sliced in half', NULL, NULL, NULL),
(11, 50, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(11, 52, '1/2', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(11, 87, '1/4', 'cup', NULL, 0.7, 'chopped', NULL, NULL, NULL),
(12, 32, '3', 'oz', NULL, 3.0, 'chopped', NULL, NULL, NULL),
(12, 43, '1/3', 'cup', NULL, 2.3, 'chilled', NULL, NULL, NULL),
(12, 54, '1', 'cup', NULL, 2.6, '', NULL, NULL, NULL),
(12, 55, '1', '', 1.0, NULL, 'small, peeled', NULL, NULL, NULL),
(12, 56, '2', 'tbsp', NULL, 1.0, '', NULL, NULL, NULL),
(13, 37, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(13, 57, '2', '', 1.0, NULL, 'large, chopped', NULL, NULL, NULL),
(13, 58, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(13, 59, '11', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(14, 5, '1/4', 'cup', NULL, 1.2, 'chopped', NULL, NULL, NULL),
(14, 30, '1/4', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(14, 35, '', '', 0.2, NULL, 'to taste', NULL, NULL, NULL),
(14, 40, '2', 'cups', NULL, 6.0, '', NULL, NULL, NULL),
(14, 44, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(14, 63, '4', 'oz', NULL, 4.0, '', NULL, NULL, NULL),
(15, 4, '1', 'tsp', NULL, 0.2, '', NULL, NULL, NULL),
(15, 5, '2', 'tbsp', NULL, 0.6, 'chopped', NULL, NULL, NULL),
(15, 30, '1/4', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(15, 65, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(15, 66, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(15, 68, '1/2', 'cup', 2.5, NULL, 'cubed, skin on', NULL, NULL, NULL),
(15, 69, '3', 'oz', NULL, 3.0, 'oven-roasted', NULL, NULL, NULL),
(15, 109, '1', 'cup', NULL, 5.3, 'steamed', NULL, NULL, NULL),
(16, 10, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(16, 29, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(16, 32, '3', 'oz', NULL, 3.0, 'roasted, cubed', NULL, NULL, NULL),
(16, 72, '1/3', 'cup', NULL, 2.7, 'cooked', NULL, NULL, NULL),
(17, 10, '1', 'cup', NULL, 8.0, 'chopped', NULL, NULL, NULL),
(17, 19, '1', '', 1.0, NULL, 'grated', NULL, NULL, NULL),
(17, 29, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(17, 30, '1', 'clove', NULL, NULL, 'minced', NULL, NULL, NULL),
(17, 45, '1', '', 1.0, NULL, 'minced', NULL, NULL, NULL),
(17, 73, '2', 'cups', NULL, 11.6, 'cooked and crushed well', NULL, NULL, NULL),
(17, 76, '1', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(17, 78, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(17, 79, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(17, 80, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(17, 81, '6', '', NULL, 0.5, '', NULL, NULL, NULL),
(18, 11, '1/2', 'bunch', NULL, 3.5, '', NULL, NULL, NULL),
(18, 36, '1/4', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(18, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(18, 62, '', '', NULL, NULL, 'optional, to taste', NULL, NULL, NULL),
(19, 103, '2', 'slices', NULL, NULL, '', NULL, NULL, NULL),
(19, 149, '', '', NULL, NULL, '', NULL, NULL, NULL),
(20, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(20, 40, '2', 'handfuls', NULL, 4.0, '', NULL, NULL, NULL),
(20, 150, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(20, 156, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(21, 151, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(21, 196, '', '', NULL, NULL, '', NULL, NULL, NULL),
(22, 24, '1', 'cup', 1.0, NULL, 'sliced', NULL, NULL, NULL),
(22, 101, '1', 'tbps', NULL, NULL, '', NULL, NULL, NULL),
(23, 36, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(23, 57, '1', '', 1.0, NULL, 'medium', NULL, NULL, NULL),
(23, 61, '', '', NULL, NULL, 'pinch', NULL, NULL, NULL),
(24, 108, '2', 'sticks', 0.2, NULL, '', NULL, NULL, NULL),
(24, 144, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(25, 151, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(25, 152, '1', 'cup', 12.0, 4.0, '', NULL, NULL, NULL),
(26, 36, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(26, 49, '1', 'handful', NULL, 2.0, 'sliced', NULL, NULL, NULL),
(26, 156, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(27, 43, '1/2', 'cup', NULL, 3.4, 'cooked', NULL, NULL, NULL),
(27, 149, '2', 'cup', NULL, 11.0, 'lightly steamed', NULL, NULL, NULL),
(28, 36, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(28, 40, '2', 'handfuls', NULL, 4.0, '', NULL, NULL, NULL),
(28, 155, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(28, 156, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(29, 36, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(29, 40, '', '', NULL, 4.0, '', NULL, NULL, NULL),
(29, 156, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(29, 157, '1/2', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(30, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(30, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(30, 4, '1/4', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(30, 7, '1', 'handful', NULL, NULL, '', NULL, NULL, NULL),
(30, 18, '1', 'tbsp', NULL, 0.2, '', NULL, NULL, NULL),
(30, 29, '1/2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(30, 84, '3/4', 'cup', NULL, 7.5, '', NULL, NULL, NULL),
(31, 14, '1/2', 'cup', 0.8, NULL, 'sliced', NULL, NULL, NULL),
(31, 103, '1', 'slice', NULL, NULL, '', NULL, NULL, NULL),
(31, 144, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(32, 3, '4', 'tbsp', NULL, 2.0, '', NULL, NULL, NULL),
(32, 4, '1/4', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(32, 6, '', '', NULL, NULL, 'dash', NULL, NULL, NULL),
(32, 18, '1/2', 'cup', NULL, 1.6, '', NULL, NULL, NULL),
(32, 29, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(32, 102, '1/4', 'cup', NULL, 1.3, '', NULL, NULL, NULL),
(33, 8, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(33, 90, '1/2', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(33, 145, '1/2', 'cup', NULL, 3.0, '', NULL, NULL, NULL),
(34, 23, '1/2', 'cup', 0.5, NULL, 'sliced or mashed', NULL, NULL, NULL),
(34, 31, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(34, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(34, 66, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(34, 103, '1', 'slice', NULL, NULL, '', NULL, NULL, NULL),
(35, 43, '1/2', 'cup', NULL, 3.4, '', NULL, NULL, NULL),
(35, 149, 'unlimited', '', NULL, NULL, 'steamed or lightly cooked', NULL, NULL, NULL),
(36, 10, '2', 'cups', NULL, 16.0, '', NULL, NULL, NULL),
(36, 19, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(36, 24, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(36, 85, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(36, 86, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(36, 87, '3 to 5', '', NULL, 5.0, '', NULL, NULL, NULL),
(36, 88, '1', 'handful', NULL, 1.0, '', NULL, NULL, NULL),
(37, 81, '', '', NULL, 0.5, '', NULL, NULL, NULL),
(37, 159, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(38, 4, '1', 'tsp', NULL, 0.2, '', NULL, NULL, NULL),
(38, 30, '1/4', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(38, 32, '3', 'oz', NULL, 3.0, 'diced', NULL, NULL, NULL),
(38, 65, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(38, 66, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(38, 89, '2', 'tbsp', NULL, NULL, 'chopped', NULL, NULL, NULL),
(38, 136, '1', '', 1.0, NULL, 'small, sliced, skin on', NULL, NULL, NULL),
(38, 138, '1', 'cup', NULL, 3.0, '', NULL, NULL, NULL),
(39, 11, '', 'leaves', NULL, 1.0, '', NULL, NULL, NULL),
(39, 61, '', '', NULL, NULL, 'sprinkle', NULL, NULL, NULL),
(39, 153, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(40, 152, '1', 'cup', 12.0, 4.0, '', NULL, NULL, NULL),
(41, 154, '0.35', 'oz', NULL, NULL, '', NULL, NULL, NULL),
(42, 4, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(42, 19, '1', '', 1.0, NULL, 'sliced', NULL, NULL, NULL),
(42, 80, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(42, 87, '3', '', NULL, 3.0, 'diced', NULL, NULL, NULL),
(42, 104, '2', 'cups', NULL, 16.0, '', NULL, NULL, NULL),
(42, 106, '2', '', 2.0, NULL, 'medium sized, chopped', NULL, NULL, NULL),
(42, 108, '2', 'stalks', 1.0, NULL, 'diced', NULL, NULL, NULL),
(42, 109, '1', 'cup', NULL, 5.3, '', NULL, NULL, NULL),
(42, 110, '1', 'cup', NULL, 6.2, '', NULL, NULL, NULL),
(42, 111, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(43, 23, '1', '', 1.0, NULL, 'diced', NULL, NULL, NULL),
(43, 44, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(43, 52, '1', 'can', NULL, 15.0, 'cooked', NULL, NULL, NULL),
(43, 57, '1', 'cup', 1.0, NULL, 'chopped', NULL, NULL, NULL),
(43, 80, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(43, 94, '1', '', 1.0, NULL, 'chopped', NULL, NULL, NULL),
(43, 113, '1', 'cup', 0.2, NULL, 'chopped', NULL, NULL, NULL),
(43, 114, '1', 'cup', 1.0, NULL, 'chopped', NULL, NULL, NULL),
(43, 115, '1', 'cup', 1.0, NULL, 'chopped', NULL, NULL, NULL),
(43, 116, '1', 'cup', 2.0, NULL, 'chopped', NULL, NULL, NULL),
(43, 117, '1', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(43, 118, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(44, 149, '', '', NULL, NULL, '', NULL, NULL, NULL),
(44, 158, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(45, 15, '1', '', 1.0, NULL, 'medium', NULL, NULL, NULL),
(45, 35, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(45, 44, '1', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(45, 132, '2', '6 oz', NULL, 12.0, 'skin removed', NULL, NULL, NULL),
(45, 133, '2', '', NULL, NULL, '', NULL, NULL, NULL),
(45, 135, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(47, 23, '1', '', 1.0, NULL, 'diced', NULL, NULL, NULL),
(47, 30, '3', 'cloves', NULL, NULL, '', NULL, NULL, NULL),
(47, 35, '1', '', 1.0, NULL, 'juiced', NULL, NULL, NULL),
(47, 44, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(47, 80, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(47, 88, '1', 'cup', NULL, 7.1, 'sliced in half', NULL, NULL, NULL),
(47, 121, '1', 'cup', NULL, 5.0, '', NULL, NULL, NULL),
(47, 123, '2', 'cups', NULL, 12.3, '', NULL, NULL, NULL),
(47, 130, '1', 'lb', NULL, 16.0, '', NULL, NULL, NULL),
(47, 131, '1/3', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(48, 30, '3', 'large cloves', NULL, NULL, 'diced', NULL, NULL, NULL),
(48, 44, '4', 'tbps', NULL, NULL, '', NULL, NULL, NULL),
(48, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(48, 109, '1', 'lb', NULL, 16.0, '', NULL, NULL, NULL),
(48, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(49, 145, '1/2', 'cup', NULL, 3.0, '', NULL, NULL, NULL),
(49, 146, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(50, 6, '', '', NULL, NULL, 'sprinkle', NULL, NULL, NULL),
(50, 29, '1/2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(50, 147, '1', '', 1.0, NULL, 'medium, baked', NULL, NULL, NULL),
(51, 9, '2', 'cups', NULL, 16.0, '', NULL, NULL, NULL),
(51, 11, '3', 'leaves', NULL, 1.0, '', NULL, NULL, NULL),
(51, 14, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(51, 35, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(51, 136, '2', '', 2.0, NULL, '', NULL, NULL, NULL),
(52, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(52, 145, '1/2', 'cup', NULL, 3.0, '', NULL, NULL, NULL),
(52, 148, '1/2', 'cup', NULL, 2.4, '', NULL, NULL, NULL),
(53, 4, '11', 'cups', NULL, 88.0, '', NULL, NULL, NULL),
(53, 24, '1', 'cup', 0.5, NULL, 'diced', NULL, NULL, NULL),
(53, 30, '1', 'clove', NULL, NULL, 'diced', NULL, NULL, NULL),
(53, 56, '1', 'cup', NULL, 5.0, '', NULL, NULL, NULL),
(53, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(53, 87, '1', 'cup', NULL, 3.0, '', NULL, NULL, NULL),
(53, 88, '1', 'cup', NULL, 7.1, 'sliced', NULL, NULL, NULL),
(53, 90, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(53, 92, '1', 'cup', 2.0, NULL, 'chopped ', NULL, NULL, NULL),
(53, 94, '1', 'cup', 1.5, NULL, 'diced', NULL, NULL, NULL),
(53, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(54, 19, '1', '', 1.0, NULL, 'sliced thinly', NULL, NULL, NULL),
(54, 23, '1', '', 1.0, NULL, 'sliced', NULL, NULL, NULL),
(54, 24, '1', '', 1.0, NULL, 'sliced thinly', NULL, NULL, NULL),
(54, 85, '1', '', 1.0, NULL, 'sliced thinly', NULL, NULL, NULL),
(54, 96, '3', '', 3.0, NULL, '', NULL, NULL, NULL),
(54, 101, '', '', NULL, NULL, 'for dipping', NULL, NULL, NULL),
(55, 6, '1/8', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(55, 29, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(55, 30, '1/4', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(55, 32, '3', 'oz', NULL, 3.0, 'diced and chilled', NULL, NULL, NULL),
(55, 102, '2', 'tbsp', NULL, 0.2, '', NULL, NULL, NULL),
(55, 103, '1', 'slice', NULL, NULL, '', NULL, NULL, NULL),
(56, 37, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(56, 57, '2', '', 2.0, NULL, 'large, chopped', NULL, NULL, NULL),
(56, 58, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(56, 59, '11', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(57, 160, '', '', NULL, NULL, '', NULL, NULL, NULL),
(57, 161, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(58, 10, '1/2', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(58, 19, '1/4', 'cup', 1.5, NULL, 'chopped', NULL, NULL, NULL),
(58, 30, '1/4', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(58, 31, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(58, 38, '1/2', 'cup', NULL, 4.0, '', NULL, NULL, NULL),
(58, 44, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(58, 45, '1/4', 'cup', 0.4, NULL, 'chopped', NULL, NULL, NULL),
(58, 50, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(58, 87, '1/4', 'cup', NULL, 0.7, 'chopped', NULL, NULL, NULL),
(58, 88, '1/2', 'cup', NULL, 3.6, 'sliced in half', NULL, NULL, NULL),
(58, 92, '1/4', 'cup', 0.5, NULL, 'chopped ', NULL, NULL, NULL),
(58, 125, '1/3', 'cup', NULL, 2.0, 'thawed', NULL, NULL, NULL),
(58, 126, '3', 'oz', NULL, NULL, 'pan-browned', NULL, NULL, NULL),
(59, 30, '1/4', 'tsp', NULL, NULL, 'minced', NULL, NULL, NULL),
(59, 39, '1/8', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(59, 44, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(59, 127, '1/4', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(59, 128, '1/2', 'cup', NULL, 3.2, '', NULL, NULL, NULL),
(59, 129, '1/3', 'cup', NULL, 2.0, 'cooked', NULL, NULL, NULL),
(59, 142, '1 1/2', 'cups', NULL, 12.0, '', NULL, NULL, NULL),
(60, 4, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(60, 19, '1', '', 1.0, NULL, 'sliced', NULL, NULL, NULL),
(60, 57, '3', '', 3.0, NULL, 'diced', NULL, NULL, NULL),
(60, 80, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(60, 104, '2', 'cups', NULL, 16.0, '', NULL, NULL, NULL),
(60, 106, '2', '', 2.0, NULL, 'medium sized, chopped', NULL, NULL, NULL),
(60, 108, '2', 'stalks', 1.0, NULL, 'diced', NULL, NULL, NULL),
(60, 109, '1', 'cup', NULL, 5.3, '', NULL, NULL, NULL),
(60, 110, '1', 'cup', NULL, 6.2, '', NULL, NULL, NULL),
(60, 111, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(61, 30, '3', 'large cloves', NULL, NULL, 'diced', NULL, NULL, NULL),
(61, 44, '4', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(61, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(61, 109, '1', 'lb', NULL, 16.0, '', NULL, NULL, NULL),
(61, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(62, 4, '', '', NULL, 8.0, '', NULL, NULL, NULL),
(62, 35, '', '', 0.5, NULL, '', NULL, NULL, NULL),
(63, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(63, 3, '2', 'tbsp', NULL, 1.0, '', NULL, NULL, NULL),
(63, 7, '1/4', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(63, 25, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(63, 144, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(63, 162, '1', 'cup', NULL, 10.0, 'sliced', NULL, NULL, NULL),
(64, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(64, 3, '3', 'tbsp', NULL, 1.5, '', NULL, NULL, NULL),
(64, 14, '1/2', '', 0.5, NULL, 'frozen', NULL, NULL, NULL),
(64, 23, '1/2', '', 0.5, NULL, '', NULL, NULL, NULL),
(64, 24, '1/2', '', 0.5, NULL, 'cut into large chunks', NULL, NULL, NULL),
(64, 25, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(65, 23, '1/2', '', 0.5, NULL, 'sliced', NULL, NULL, NULL),
(65, 36, '1/4', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(65, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(65, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(65, 163, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(65, 164, '1', '', 1.0, NULL, 'warmed', NULL, NULL, NULL),
(65, 191, '1', 'tbsp', NULL, 0.5, '', NULL, NULL, NULL),
(66, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(66, 3, '2', 'tbsp', NULL, 1.0, '', NULL, NULL, NULL),
(66, 7, '1/4', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(66, 14, '1', '', 1.0, NULL, 'frozen', NULL, NULL, NULL),
(66, 165, '1/8', 'tsp', NULL, NULL, 'seeds scraped out of the vanilla bean', NULL, NULL, NULL),
(66, 192, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(67, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(67, 3, '2', 'tbsp', NULL, 0.5, '', NULL, NULL, NULL),
(67, 7, '1/4', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(67, 14, '1/2', '', 0.5, NULL, 'frozen', NULL, NULL, NULL),
(67, 25, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(67, 166, '1/2', 'cup', NULL, 1.8, '', NULL, NULL, NULL),
(68, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(68, 18, '1/4', 'cup', NULL, 0.9, '', NULL, NULL, NULL),
(68, 61, '', '', NULL, NULL, 'dash', NULL, NULL, NULL),
(68, 145, '1/2', 'cup', NULL, 3.0, '', NULL, NULL, NULL),
(68, 168, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(69, 1, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(69, 3, '2', 'tbsp', NULL, 1.0, '', NULL, NULL, NULL),
(69, 7, '1/4', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(69, 14, '1/2', '', NULL, 0.5, 'riped, frozen', NULL, NULL, NULL),
(69, 25, '', '', NULL, NULL, '', NULL, NULL, NULL),
(69, 144, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(69, 193, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(70, 24, '1/2', '', NULL, 0.5, 'rough chopped', NULL, NULL, NULL),
(70, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(70, 57, '2', '', 2.0, NULL, 'riped, quartered', NULL, NULL, NULL),
(70, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(70, 131, '1/4', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(70, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(70, 169, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(71, 24, '1/2', '', 0.5, NULL, 'sliced', NULL, NULL, NULL),
(71, 32, '3', 'oz', NULL, 3.0, 'chopped', NULL, NULL, NULL),
(71, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(71, 45, '1', 'tbsp', 0.1, NULL, 'red,white or spring finely chopped', NULL, NULL, NULL),
(71, 54, '1', 'cup', NULL, 2.6, '', NULL, NULL, NULL),
(71, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(71, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(71, 169, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(71, 170, '2', 'tbsp', NULL, NULL, 'chopped', NULL, NULL, NULL),
(71, 185, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(72, 45, '1', 'tsp', 0.1, NULL, '', NULL, NULL, NULL),
(72, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(72, 65, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(72, 131, '1/4', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(72, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(72, 171, '2', 'cups', 0.3, NULL, 'shredded', NULL, NULL, NULL),
(72, 172, '1/2', 'cup', NULL, 5.0, '', NULL, NULL, NULL),
(73, 22, '4', 'leaves', 0.4, NULL, '', NULL, NULL, NULL),
(73, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(73, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(73, 108, '1', 'tbsp', 0.1, NULL, 'diced', NULL, NULL, NULL),
(73, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(73, 163, '1', '', 1.0, NULL, 'hard boiled, peeled and chopped', NULL, NULL, NULL),
(74, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(74, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(74, 101, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(74, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(74, 171, '1', 'cup', 0.2, NULL, 'thinly sliced', NULL, NULL, NULL),
(74, 174, '3', 'oz', NULL, 3.0, 'cooked and shelled', NULL, NULL, NULL),
(74, 175, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(74, 185, '2', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(75, 22, '4', 'leaves', 0.4, NULL, '', NULL, NULL, NULL),
(75, 85, '1/2', '', 0.5, NULL, 'sliced thinly', NULL, NULL, NULL),
(75, 151, '1/2', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(75, 170, '2', 'tbsp', NULL, NULL, 'finely chopped', NULL, NULL, NULL),
(76, 22, '2', 'leaves', NULL, NULL, '', NULL, NULL, NULL),
(76, 57, '2', 'slices', NULL, NULL, '', NULL, NULL, NULL),
(76, 103, '1', 'slice', NULL, NULL, '', NULL, NULL, NULL),
(76, 176, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(76, 177, '2', 'slices', NULL, 2.0, 'uncured, nitrate free, cooked', NULL, NULL, NULL),
(77, 24, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(77, 151, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(78, 101, '1', '', NULL, NULL, '', NULL, NULL, NULL),
(78, 145, '1/2', 'cup', NULL, 3.0, '', NULL, NULL, NULL),
(79, 92, '1', '', 1.0, NULL, 'sliced', NULL, NULL, NULL),
(80, 194, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(81, 36, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(81, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(81, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(81, 178, '1', '', 1.0, NULL, 'small head cut into florets', NULL, NULL, NULL),
(81, 179, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(82, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(82, 45, '1/2', '', 0.5, NULL, 'thinly sliced', NULL, NULL, NULL),
(82, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(82, 92, '1', '', 1.0, NULL, 'thinly sliced', NULL, NULL, NULL),
(82, 112, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(82, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(82, 180, '1', '', 1.0, NULL, '', NULL, NULL, NULL),
(82, 181, '1', 'cup', NULL, 8.0, '', NULL, NULL, NULL),
(83, 29, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(83, 30, '2', 'cloves', NULL, NULL, 'finely chopped', NULL, NULL, NULL),
(83, 42, '1/2', 'cup', NULL, 4.0, 'cubed', NULL, NULL, NULL),
(83, 45, '1/2', '', 0.5, NULL, 'slice thin', NULL, NULL, NULL),
(83, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(83, 101, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(83, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(83, 171, '1 ', 'cup', 0.2, NULL, 'shredded', NULL, NULL, NULL),
(83, 182, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(83, 183, '1', 'cup', NULL, 3.0, 'sliced', NULL, NULL, NULL),
(83, 184, '1/2', 'cup', NULL, 2.0, 'cooked, Asian style if available', NULL, NULL, NULL),
(83, 185, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(84, 23, '1/4', '', 0.3, NULL, 'peel and pit discarded, mashed', NULL, NULL, NULL),
(84, 24, '1/2', '', 0.5, NULL, 'sliced', NULL, NULL, NULL),
(84, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(84, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(84, 65, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(84, 66, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(84, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(84, 170, '2', 'tbsp', NULL, NULL, 'finely chopped', NULL, NULL, NULL),
(84, 186, '3', 'oz', NULL, 3.0, 'fresh or canned and drained', NULL, NULL, NULL),
(84, 187, '1	', 'cup', NULL, 3.0, 'chopped', NULL, NULL, NULL),
(85, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(85, 43, '1/2', 'cup', NULL, 3.4, '', NULL, NULL, NULL),
(85, 45, '1', 'tbsp', 0.2, NULL, 'finely chopped', NULL, NULL, NULL),
(85, 66, '1', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(85, 85, '1/2', '', 0.5, NULL, 'chopped', NULL, NULL, NULL),
(85, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(85, 170, '2', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(85, 174, '3', 'oz', NULL, 3.0, 'cooked, shelled and deveined', NULL, NULL, NULL),
(85, 188, '2', 'tsp', NULL, NULL, 'optional', NULL, NULL, NULL),
(86, 36, '1/8', 'tsp', NULL, NULL, '', NULL, NULL, NULL),
(86, 45, '1', 'slice', 0.1, NULL, '', NULL, NULL, NULL),
(86, 57, '1', 'slice', 0.1, NULL, '', NULL, NULL, NULL),
(86, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(86, 65, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(86, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(86, 189, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(87, 158, '3', 'oz', NULL, 3.0, '', NULL, NULL, NULL),
(87, 195, '1', 'cup', NULL, 7.9, '', NULL, NULL, NULL),
(88, 4, '1/4', 'cup', NULL, 2.0, '', NULL, NULL, NULL),
(88, 30, '2', 'cloves', NULL, NULL, 'finely chopped', NULL, NULL, NULL),
(88, 36, '1', 'tbsp', NULL, NULL, '', NULL, NULL, NULL),
(88, 45, '1/2', '', 0.5, NULL, 'sliced', NULL, NULL, NULL),
(88, 57, '2', '', 2.0, NULL, 'chopped', NULL, NULL, NULL),
(88, 61, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(88, 73, '1/2', 'cup', NULL, 2.8, '', NULL, NULL, NULL),
(88, 131, '1/4', 'cup', NULL, NULL, '', NULL, NULL, NULL),
(88, 140, '', '', NULL, NULL, 'to taste', NULL, NULL, NULL),
(88, 190, '1', 'cup', NULL, 8.8, 'chopped', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leads_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `name`) VALUES
(1, 'Breakfast'),
(2, 'Lunch'),
(3, 'Snack'),
(4, 'Dinner'),
(5, 'Before Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE IF NOT EXISTS `measurements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `weight` decimal(7,4) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `measurements_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `user_id`, `weight`, `date`, `created_at`, `updated_at`) VALUES
(1, 22, 65.7708, '2016-06-23', '2016-06-23 05:00:41', '2016-06-23 05:00:41'),
(2, 32, 57.1526, '2016-07-19', '2016-07-18 23:07:51', '2016-07-18 23:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_09_214734_update_users_table_1', 1),
('2016_05_10_142807_update_users_table_2', 1),
('2016_05_10_181027_create_subscriptions_table', 1),
('2016_05_11_180027_create_questions_table', 1),
('2016_05_11_183214_update_users_table_3', 1),
('2016_05_11_200915_update_users_table_4', 1),
('2016_05_13_214107_create_programs_table', 1),
('2016_05_17_231014_create_recipes_table', 1),
('2016_05_18_173455_update_programs_table_1', 1),
('2016_05_20_202451_update_recipes_table_1', 1),
('2016_05_21_185043_create_workouts_table', 1),
('2016_05_23_104346_create_measurements_table', 1),
('2016_05_24_172004_update_subscriptions_table_1', 1),
('2016_05_24_174849_update_users_table_5', 1),
('2016_05_26_053657_create_social_accounts_table', 1),
('2016_05_26_055203_update_subscription_exp_date_column_type', 1),
('2016_05_26_060101_add_new_column_auth_ref_id_subscriptions', 1),
('2016_05_26_060845_update_users_weight_weight_goal_column_type', 1),
('2016_05_27_092921_update_user_table_alter_column_data_type', 1),
('2016_05_27_114703_create_program_recipe_table', 1),
('2016_05_27_133709_update_program_recipe_table_1', 1),
('2016_05_27_160813_create_mindsets_table', 1),
('2016_05_31_233740_add_new_column', 1),
('2016_05_31_234254_alter_column_nullable_subscriptions', 1),
('2016_06_01_080203_add_new_column_num_of_months_in_subscription', 1),
('2016_06_06_130450_create_foods_table', 1),
('2016_06_08_123520_update_ingredients_table_1', 1),
('2016_06_10_143405_update_ingredient_recipe_table_1', 1),
('2016_06_10_145800_update_ingredient_recipe_table_2', 1),
('2016_06_16_120833_create_sessions_table', 1),
('2016_06_16_150100_create_departments_table', 1),
('2016_06_16_152400_create_categories_table', 1),
('2016_06_28_170239_create_leads_table', 2),
('2016_07_01_113541_update_ingredients_table_2', 3),
('2016_07_01_114550_update_ingredient_recipe_table_3', 3),
('2016_07_13_115132_create_playlists_table', 4),
('2016_07_13_141827_update_workouts_table', 4),
('2016_07_14_091948_update_workout_table1', 4),
('2016_07_15_110247_update_workouts_table3', 4),
('2016_09_01_150709_add_new_column_price_in_subscription', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mindsets`
--

CREATE TABLE IF NOT EXISTS `mindsets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8_unicode_ci NOT NULL,
  `day` smallint(5) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mindsets`
--

INSERT INTO `mindsets` (`id`, `name`, `instructions`, `day`, `created_at`, `updated_at`) VALUES
(1, 'Who are you, anyway?', 'This is the very first day of your journey to discovering your own Summer Body, and I want you to take just a few minutes today to think about your true, inner self. That’s right; in order to bring about transformation on the outside, you’ve got to look inward first. Go to your peaceful place in your mind (picture some palm trees swaying in the summer breeze if it helps!), and strip away all those layers of who you think everyone else wants you to be, and decide to start embracing who you truly are. What lights your fire? Write down a quick list of things you love and remind yourself whenever you need some inspiration. And as you continue down this brand new path in your life, focus on rediscovering your true self, and respecting that person! ', 1, NULL, NULL),
(2, 'Acknowledge your achievements', 'You’ve arrived at day two; congratulations! That’s right, I just congratulated you on 24 hours of being committed to this exciting new “summer” phase in your life, and you should take a moment to recognize each and every achievement along the way. As you do this consistently, you’ll start to see yourself in a different light. The more credit you give yourself for your successes, the more successful you will become. Your motivation gains momentum and before you know it, your new lifestyle will feel like second nature. And that’s how you get an endless Summer Body. ', 2, NULL, NULL),
(3, 'Transform Your Environment', 'Take some time today to detox your space and say sayonara to anything that isn’t supporting your new lifestyle and habits.  Out with the old, in with the new! You need to live in an environment that supports love, growth, and change.\n\nFirst, get rid of the foods that are weighing you down, both literally and figuratively. You know exactly what I’m talking about here. And by the way, if you sometimes dip into the kids’ stash of junk food, I urge you to consider replacing those sugary snacks with healthy, whole ones. After all, you don’t want to set up bad eating habits for your kids at a young age! \n\nNext, begin to rearrange objects in your home so that it reflects who you are on the inside and how you want to function. De-clutter your space, create clean surfaces, and infuse your home with touches of bright, uplifting colors. \n\nFinally, start to clean out the relationships with people who don’t support you or bring good into your life. All of these things are all holding you back from being the very best version of yourself so why have them hanging around? If it doesn’t help propel you toward your Summer Body goals, then it’s got to go! ', 3, NULL, NULL),
(4, 'Find Your Bigger “Why?”', 'Of course you want to rock a Summer Body all year long (who doesn’t??), but there’s always a bigger “why” underneath the surface. If you dig deep and ask yourself why you really want to lose the weight, the answer can really bolster your motivation. Are you determined to improve your health so you can be around to watch your kids grow up? Do you want to have more energy to accomplish goals in your life? Maybe you just want to fit comfortably into an airplane seat so you can visit family who live far away. Whatever it is, grab hold of that underlying reason you want to shed the pounds and don’t let go! Remind yourself of what drives you the next time you feel temptation creeping in.', 4, NULL, NULL),
(5, 'Set Up Your Summer Body Support', 'One of the best ways to ensure success when you’re losing weight is to set up a strong support system. Whether it’s finding a friend to lose weight with you so that you can be accountable to each other, or asking a trusted confidante to help you stay on track and cheer you on, it’s always easier, breezier when you’ve got a community around you. These are people you can call when you’re having a tough time, or to celebrate with you when you see results! And remember, there are other <a href="https://www.facebook.com/Summer-Body-Club-1098642800175180/" target="_blank">Summer Body Club members on the Summer Body Facebook page, so get plugged in! </a>', 5, NULL, NULL),
(6, 'Think About What You’re <i>REALLY</i> Hungry For', 'Discovering who you are at your core and what makes you happy is critical to living a life in which you truly feel fulfilled. On your very first day, I asked you to think about who you really are, underneath all the outer layers. Let’s take that a step further today and get you thinking about what you’re really hungry for, because I think we can all agree it’s not food. What is it that you’re using food to soothe? Is there something missing, a void you’re trying to fill by eating? This may not be something you can identify in just a few minutes, so we’ll be revisiting this theme regularly. Today, let’s start by rewinding back to your childhood. Think about those long, hot summer days (or any season, really!), and grasp onto your favorite memories. What made you happy then? Now consider ways in which you can recapture that free, whimsical, magical feeling in your adult life, and then...do it! ', 6, NULL, NULL),
(7, 'Have Some Fun In the Sun!', 'Hey, look at you! Today marks one week since you started, and I think that warrants a little celebratory dancing! But don’t just shake what your mama gave you in the privacy of your own home; get outside, breathe in the fresh air and do a little shimmy! Why outside, you ask? Well, a little sunshine goes a long way toward improving your mood and motivation. In fact, did you know that sunlight deprivation can cause a condition known as SAD, or Seasonal Affective Disorder? Take a few minutes over your lunch break today to walk outside (and I encourage you to kick off your shoes and walk around in the grass if possible—connecting with Mother Earth can make you feel more grounded). Spending even just 10 minutes outdoors provides your body with a quick dose of Vitamin D, which all kinds of studies have shown is imperative to our health, immunity, and wellbeing. A little bit of time in nature can go a long way to reduce stress, rediscover your joy, and keep you motivated for success!', 7, NULL, NULL),
(8, '60 Seconds to Feeling Stress-Free', 'You’re heading toward your goal of a Summer Body, but let’s face it, not every day of our lives is a carefree, relaxing summer vacation. Ok, precious few days are like that for most of us! But just because we live in a fast-paced, crazy world chock-full of obligations and deadlines, that doesn’t mean we can’t create our own “summer moments” of turning down the dial on all that stress. After all, it’s that sneaky, persistent stress that can be our biggest weight loss saboteur! So, how can you escape it all without hitting the spa? It’s simple. Follow these steps:\n\n1. Take your hand and place it over your belly. Allow yourself to feel it go in and out with your breath.\n2. Now breathe in through your nose, hold your breath for 3 counts, and then sloooowly breathe out through your mouth.\n3. Continue this sequence for a full minute.\n\nAhhhh...better already!', 8, NULL, NULL),
(9, 'Write It Out', 'When you set sail toward your Summer Body, you’re bound to hit some rough waters along the way. That’s why I want you to be prepared with some life vests on board! When the waves of temptation come crashing toward you, there’s a trick I recommend you try right away. Before you do something that could really rock your boat (like reaching for food or a beverage), break out a journal. Yep, you can right the ship when you write it all down. Grab the laptop, tablet, phone, or even go old school with a pen and pad, and just get it all out on paper. \nJournaling is one of the best ways to let go of your missteps and uncover the valuable lessons you can carry forward. Be honest. No one will read this but you. Here are some specific instructions to follow, but there’s no wrong way to journal!  \n	<ul><li>Allow yourself about 3 minutes to really get it all out. Words may start pouring onto the page, and they may not even make sense; that’s okay! Go with your natural, stream-of-consciousness flow, and don’t hold back. </li>\n<li>Then, write this: “That’s the past. Today is a new day.” This helps you remember that you have control over those negative, nonproductive thoughts and feelings, and not the other way around. You can choose to leave all of that behind you and move forward into a new, bright, sunny future. </li>\n<li>To take things a step further, share your story with others. People connect at the point of struggle. When you open up about overcoming your pitfalls, you just might inspire someone else to do the same! </li></ul>\nDiscover more tips and inspiration on telling your personal story in this <a href="http://www.cynthiapasquella.com/story-struggle-can-set-free-bo-eason/" target="_blank"> free show</a>.', 9, NULL, NULL),
(10, 'Unlock the Power of Visualization ', 'Want in on a key secret to Summer Body success? I’ll give you a hint; some of the world’s top athletes use this technique to stay at the top of their game. You know the saying, “be the ball”? Well, that’s what I want you to do, but instead of a ball, I want you to close your eyes and visualize (ding, ding! That’s the word of the day!), yourself having already achieved your goal. Visualization is one of the most powerful ways to set yourself up to win at anything, including weight loss. \nLet’s practice right now. Close your eyes and see yourself standing there, in all of your Summer Body glory. Of course, you have to be realistic here—we can’t all be swimsuit models (even they don’t really look like that!), but the idea is that you’re seeing yourself at a healthy weight and size. What does it feel like in your strong Summer Body? Allow all of your senses to run wild, getting as detailed as possible about what it’s like to have achieved your desired results. Now, write your Summer Body Club goal in BIG letters and post it somewhere you can see it every day. And whenever you can, practice visualization. The more you see it in your mind’s eye, the more you’ll do the things that are necessary in order to see it in the mirror!', 10, NULL, NULL),
(11, 'Embrace the Freedom of Saying “No” ', 'Pop Quiz: How often do you do something for yourself? I’m talking about anything from taking yourself out on a date, getting a massage, or just taking 15 minutes out of your day to bliss out over something you love. You may be thinking, “Yeah, right. Something for me; what a joke! How can I find time for myself when I spend my WHOLE day working, taking care of my family, cooking, cleaning and running errands?” I hear you loud and clear. But let’s talk about this for a second. \n\nFirst, it’s critical to realize that you matter, too! Because if no one is taking care of you, pretty soon, you won’t be able to take care of others. You deserve to be showered with the same love and dedication that you give your partner, your kids, your friends, your job, and even your pets! What does this have to do with saying “no,” you ask? If you can find it in yourself to turn down some plans or a commitment and, instead, spend that time on you, then you’ll start to see something amazing occur. You’ll begin to shift your priorities. You’ll begin to protect your time that is meant only for you. It all starts by giving yourself permission to say “no!” to the things that just aren’t that important, and realize just how important you really are! \n', 11, NULL, NULL),
(12, 'Celebrate Small Successes ', '“One small step for a man, one giant leap for mankind,” were the famous words uttered by Neil Armstrong after he took his first steps on the moon. I’m not suggesting you seek out lower gravity environments to feel lighter, but what I am suggesting is that you give yourself huge props for every tiny step you take on this journey. Little steps lead to BIG changes. You’ve been at this for twelve days now, and regardless of how much progress you’ve made thus far, the truth is, you are already transforming. Eating healthy meals the first week, second week, and so on means a cleaner body, mind, and spirit at the end of your journey. Once you look back on this time, you’ll see exactly how far you’ve come. Discover more tips and inspiration on celebrating your successes in this <a href="http://www.cynthiapasquella.com/struggle-verge-losing-still-succeed-jj-virgin/" target="_blank">free show</a>.', 12, NULL, NULL),
(13, 'How Do You Talk to Yourself?', 'Today, your mindset challenge is all about shutting down any negative self-talk you’ve been engaging in and replacing it with positive self-talk. What does that mean, exactly? Ok, you know when you catch a glimpse of yourself in the mirror when you’re wearing your grubby clothes, hunching over, and your hair is a hot mess? What do you say to yourself in that moment? If I had to guess, I’d say it isn’t pretty. Listen, we are all our own worst critics. But the more you indulge in thinking negatively about yourself, the less likely you are to succeed at reaching your goal. When you wake up in the morning, look at yourself in the mirror and tell yourself that you are beautiful, amazing, kind, smart, special, and any other positive adjective that describes the wonderful person you are! \n\nWe’re in a summer state of mind all year round here at Summer Body Club, anytime those “cold, prickly” thoughts seep into your brain, consciously replace them with “warm fuzzies”! You’ll start to feel better, loved, AND more confident in yourself. Discover more tips and inspiration on accepting yourself in this  <a href="http://www.cynthiapasquella.com/acceptance-believe-youre-good-enough-when-not-nina-savelle-rocklin/" target="_blank">free show</a>.\n', 13, NULL, NULL),
(14, 'Change Your Thoughts, Change Your Reality', 'Your thoughts can literally change your reality and can have a HUGE impact when it comes to goal-setting and goal-getting. One simple step that can make (or break) your goals is to change your intention and reinforce it.  In other words, decide what you plan on doing and then make it happen. That’s all there is to it!\n\nStart to pay close attention to your intentions. If you intend to do something, you’re much more likely to actually follow through and do it. Intend to eat the meals recommended on this plan, and then take the actions necessary to actually do it. Go to the grocery store, buy the foods, then go home and prepare them. Those actions started with a thought, an intention. The same is true for every action you take!\n\nIt’s easy to slip into the habit of paying no attention to our thoughts and intentions, so start now to create a new habit of clearly defining your intentions, and live your life the way you really want to!\n', 14, NULL, NULL),
(15, 'Shhhh! Be Quiet', 'You’ve probably heard it over and over again, but meditation really is one of the most beneficial practices to add to your daily routine. Deepak Chopra says, “Through meditation you will learn to experience the field of pure silence and pure awareness. In that field of pure silence is the field of infinite correlation, the field of infinite organizing power, the ultimate ground of creation where everything is inseparably connected with everything else.” \n\nTake just a few minutes out of your day to just be with yourself. This can be before you begin your day or right after you put the kids to bed. Simply take a few deep breaths to center yourself and be in the present moment. This may be somewhat intimidating at first; you may be worried that negative thoughts or emotions will bubble to the surface when you really go inward. It will definitely take some practice to turn down the volume on all of that to find silence and peace. But stick with it! \n\nEven if you can only handle a few seconds at first, that’s a great starting point. It’s worth the effort, because once this becomes part of your daily routine, you will feel its benefits in every area of your life. ', 15, NULL, NULL),
(16, 'Treat Yourself', 'Who says there’s anything wrong with that?! You’ve been working SO hard; you deserve to splurge a little on yourself! Buy a bouquet of your favorite flowers, get a massage, take a long bath, make your favorite Summer Body meal and eat it by candlelight, or go see that movie you’ve been dying to watch. Do whatever feels like a celebration to you, as long as it’s in line with what you need to do in order to achieve your goals. Whether you spend that time with someone or not, you deserve to make yourself feel special because you are special.', 16, NULL, NULL),
(17, 'Repeat After Me', 'You. Do. Not. Have. To. Be. Perfect. In fact, I’m going to burst your bubble right here and now. No one is perfect! And striving for perfection won’t get you where you want to be. Many of us set goals thinking, “Ok, it’s all or nothing! Let’s do this!” Then, the first time we slip up we think, “Great! I’ve blown it already!” and then very often, that leads to us giving up. \n\nInstead of focusing on what’s going wrong and how imperfect you are, choose to be thankful for what’s going right! If you slipped up and ate some junk food, don’t beat yourself up. A little stumble won’t take you off your path. You’ll do better next time! Realize that this is a goal you’ve set for life and make the decision that tomorrow will be better. Follow your Summer Body Club guidelines and honor yourself by making choices that serve you today rather than continuing to punish yourself for yesterday.  You’re doing great! \n\nAs an extra bonus,  <a href="http://www.cynthiapasquella.com/008download" target="_blank"> download your step-by-step checklist for 4 Steps to Living the Life You Want But Don''t Have in 30 Days or Less</a> . It will kick start your motivation and help you arrive at your goals fast!\n', 17, NULL, NULL),
(18, 'Overcome Emotional Eating – For Good! ', 'Did you know that emotional eating actually has NOTHING to do with cravings or food? To find the underlying cause of your habits, it’s time to take a trip down memory lane. The same way our parents gave us a genetic legacy with things like our hair and eye color, our upbringing also gives us an eating legacy, based on what we were taught about food and how we use it in our lifestyle.\n\nThink back to your first memory of food. Do you recall it helping you get through a certain moment in your life? How did it make you feel? Did you equate specific meals with love or celebration? Did you ever feel conflicted about eating certain foods over others? Connect deeply to that and allow yourself to just be with it. Realize that you are not the things that happened to you and your past choices do not define you. Visualize yourself physically detaching from the emotion and the event that caused it. Feel how liberating that is and how it frees you from your emotional prison. Then breathe deeply and let it go. Know that you are beautiful, and all that matters is this moment in time. Repeat as needed. Discover more tips and inspiration on finding the root of your behaviors in this  <a href="http://www.cynthiapasquella.com/addiction-why-the-problem-is-never-the-problem-roy-nelson/" target="_blank">free show.</a>\n', 18, NULL, NULL),
(19, '5 Mood Boosters To Keep You Going!', '<strong>1. Smile:</strong> If you’re feeling frustrated or having a hard day, the last thing you want to do is smile. But, as the saying goes, fake it till you make it! When you fake a smile or a laugh, you’ll start to feel better, and that just makes for an overall better day. \n\n<strong>2. Give lots of compliments:</strong> Find something good about every person you meet and tell them. When you make someone else happy, YOU end up feeling happy, too! A compliment can go a long way.\n\n<strong>3. Dress nicely:</strong> When you look good, you FEEL good! Pick an outfit you feel confident in and work it! You’ll not only look amazing but you’ll feel unstoppable in your clothes and in your own skin.\n\n<strong>4. Laugh:</strong> What better way to improve your day than with a bit of laughter? A good joke is always enough to turn that frown upside down. Call your funniest friend or watch a silly video on YouTube! Find a way to chuckle and you’ll see how much better you’ll feel about the day and yourself.\n\n<strong>5. Move a little:</strong> We all have a favorite song that we love to get down to. Put it on while driving to work, while you’re making dinner, or even when you have a few minutes to yourself and just bust a move. Lose yourself in the music and let go for a moment. Don’t be afraid of feeling silly. That alone can make your day just a little better!', 19, NULL, NULL),
(20, 'Find YOUR People', 'Jim Rohn once said, “You’re the average of the five people you spend the most time with.” If the people in your life are not doing anything to lift you higher or get you to where you want to be, find a new support group. As we discussed back on Day 5, it’s imperative that you surround yourself with people who have your back and support you.\n\nSometimes the people living in our own home with us aren’t the best supporters of our weight loss journey. You can’t change them, but you can take steps to find a group of people online or in real life who have the same goals as you do! Find a way to be around people that make you want to be better. \n\nClick here to claim your free action guide, <a href="http://www.cynthiapasquella.com/004download" target="_blank">“How To Cut Toxic People Out Of Your Life – Even If They’re Family”</a>!', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mahavirnahata@gmail.com', '0457e6ad9f4cdf14e7ea2750a7a9ef0ae7f4bee8babc671e58685d923f7a16c0', '2016-06-21 02:23:31'),
('manikkhanna68@gmail.com', '4edb4077658479311a65e5e775c381e340bdbda3bfa7b0050574ba1c772b789f', '2016-06-25 09:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `workouts` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `user_id`, `workouts`, `created_at`, `updated_at`) VALUES
(1, 32, 'a:8:{i:0;s:2:"67";i:1;s:2:"69";i:2;s:2:"82";i:3;s:2:"68";i:4;s:2:"16";i:5;s:2:"92";i:6;s:2:"93";i:7;s:2:"89";}', '2016-07-15 01:05:16', '2016-07-15 04:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `days` smallint(5) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `type`, `name`, `description`, `short_description`, `days`, `created_at`, `updated_at`) VALUES
(1, 'a', 'Navigator', 'You are a Navigator (Map Follower, Autopilot)! You prefer that someone else do the heavy lifting when it comes to your meal plans and workouts so you can simply follow what works without having to worry about willpower. Having a done-for-you weight loss program in the Summer Body Club lets you focus on the important things like fun in the sun, pool parties, and backyard BBQs!', 'Simply follow what works without having to worry about willpower.', 84, '2016-05-21 03:30:51', '2016-05-21 03:30:51'),
(2, 'b', 'Adventurer', 'You are fun-loving and get excited about creating your own adventures in life. You like guidelines but prefer to customize your meal plans and workouts. With the Summer Body Club, you will receive guidelines on weight loss with the ability to choose what foods and workouts are best for you so you feel empowered and confident at beach parties, summer vacations, outdoor BBQs, or enjoying summer sports!', 'Customize your meal plans and workouts based on guidelines.', NULL, '2016-05-21 03:30:51', '2016-05-21 03:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `program_recipe`
--

CREATE TABLE IF NOT EXISTS `program_recipe` (
  `program_id` int(10) unsigned NOT NULL,
  `recipe_id` int(10) unsigned NOT NULL,
  `day` smallint(5) unsigned DEFAULT NULL,
  KEY `program_recipe_program_id_index` (`program_id`),
  KEY `program_recipe_recipe_id_index` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_recipe`
--

INSERT INTO `program_recipe` (`program_id`, `recipe_id`, `day`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(1, 6, 6),
(1, 7, 7),
(1, 8, 1),
(1, 9, 2),
(1, 19, 3),
(1, 10, 4),
(1, 20, 5),
(1, 11, 6),
(1, 12, 7),
(1, 21, 1),
(1, 22, 2),
(1, 23, 3),
(1, 18, 4),
(1, 24, 5),
(1, 25, 6),
(1, 26, 7),
(1, 14, 1),
(1, 27, 2),
(1, 15, 3),
(1, 28, 4),
(1, 16, 5),
(1, 29, 6),
(1, 17, 7),
(1, 30, 8),
(1, 5, 9),
(1, 31, 10),
(1, 32, 11),
(1, 1, 12),
(1, 33, 13),
(1, 34, 14),
(1, 35, 8),
(1, 13, 9),
(1, 36, 10),
(1, 20, 11),
(1, 37, 12),
(1, 38, 13),
(1, 9, 14),
(1, 39, 8),
(1, 21, 9),
(1, 40, 10),
(1, 41, 11),
(1, 24, 12),
(1, 26, 13),
(1, 42, 14),
(1, 43, 8),
(1, 44, 9),
(1, 45, 10),
(1, 61, 10),
(1, 46, 11),
(1, 47, 13),
(1, 28, 14),
(1, 4, 15),
(1, 49, 16),
(1, 6, 17),
(1, 50, 18),
(1, 51, 19),
(1, 52, 20),
(1, 2, 21),
(1, 19, 15),
(1, 53, 16),
(1, 54, 17),
(1, 55, 18),
(1, 35, 19),
(1, 11, 20),
(1, 20, 21),
(1, 21, 15),
(1, 22, 16),
(1, 23, 17),
(1, 18, 18),
(1, 24, 19),
(1, 25, 20),
(1, 26, 21),
(1, 29, 15),
(1, 57, 16),
(1, 58, 17),
(1, 59, 18),
(1, 27, 19),
(1, 56, 20),
(1, 28, 21),
(2, 1, 1),
(2, 21, 1),
(2, 14, 1),
(2, 8, 1),
(2, 9, 2),
(2, 2, 2),
(2, 22, 2),
(2, 27, 2),
(2, 15, 3),
(2, 3, 3),
(2, 19, 3),
(2, 23, 3),
(2, 18, 4),
(2, 28, 4),
(2, 4, 4),
(2, 10, 4),
(2, 5, 5),
(2, 20, 5),
(2, 24, 5),
(2, 16, 5),
(2, 29, 6),
(2, 6, 6),
(2, 25, 6),
(2, 11, 6),
(2, 17, 7),
(2, 7, 7),
(2, 26, 7),
(2, 12, 7),
(1, 27, 12),
(1, 62, 1),
(1, 62, 2),
(1, 62, 3),
(1, 62, 4),
(1, 62, 5),
(1, 62, 6),
(1, 62, 7),
(1, 62, 8),
(1, 62, 9),
(1, 62, 10),
(1, 62, 11),
(1, 62, 12),
(1, 62, 13),
(1, 62, 14),
(1, 62, 15),
(1, 62, 16),
(1, 62, 17),
(1, 62, 18),
(1, 62, 19),
(1, 62, 20),
(1, 62, 21),
(1, 63, 22),
(1, 62, 22),
(1, 62, 23),
(1, 64, 23),
(1, 62, 24),
(1, 65, 24),
(1, 62, 25),
(1, 66, 25),
(1, 62, 21),
(1, 67, 26),
(1, 62, 26),
(1, 62, 27),
(1, 68, 27),
(1, 69, 28),
(1, 62, 28),
(1, 70, 22),
(1, 71, 23),
(1, 72, 24),
(1, 73, 25),
(1, 74, 26),
(1, 75, 27),
(1, 76, 28),
(1, 77, 22),
(1, 78, 23),
(1, 79, 24),
(1, 80, 25),
(1, 81, 26),
(1, 23, 27),
(1, 78, 28),
(1, 82, 22),
(1, 83, 23),
(1, 84, 24),
(1, 85, 25),
(1, 86, 26),
(1, 87, 27),
(1, 88, 28);

-- --------------------------------------------------------

--
-- Table structure for table `program_user`
--

CREATE TABLE IF NOT EXISTS `program_user` (
  `program_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `program_start` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`program_id`,`user_id`),
  KEY `program_user_program_id_index` (`program_id`),
  KEY `program_user_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `program_user`
--

INSERT INTO `program_user` (`program_id`, `user_id`, `program_start`, `active`, `created_at`, `updated_at`) VALUES
(1, 8, '2016-06-21', 1, '2016-06-20 20:54:14', '2016-06-20 20:54:14'),
(1, 14, '2016-06-21', 1, '2016-06-21 01:33:36', '2016-06-21 01:33:36'),
(1, 15, '2016-06-21', 1, '2016-06-21 01:42:51', '2016-06-21 01:42:51'),
(1, 17, '2016-06-21', 1, '2016-06-21 02:14:54', '2016-06-21 02:14:54'),
(1, 18, '2016-06-21', 1, '2016-06-21 02:15:48', '2016-06-21 02:15:48'),
(1, 21, '2016-06-26', 1, '2016-06-26 11:28:39', '2016-06-26 11:28:39'),
(1, 22, '2016-06-23', 1, '2016-06-23 04:58:49', '2016-06-23 04:58:49'),
(1, 24, '2016-06-23', 1, '2016-06-23 09:03:19', '2016-06-23 09:03:19'),
(1, 25, '2016-06-23', 1, '2016-06-23 09:03:24', '2016-06-23 09:03:24'),
(1, 26, '2016-06-24', 1, '2016-06-23 19:20:48', '2016-06-23 19:20:48'),
(1, 27, '2016-06-25', 1, '2016-06-25 09:40:20', '2016-06-25 09:40:20'),
(1, 28, '2016-06-25', 1, '2016-06-25 01:09:47', '2016-06-25 01:09:47'),
(1, 31, '2016-06-26', 1, '2016-06-26 11:14:53', '2016-06-26 11:14:53'),
(1, 32, '2016-06-30', 1, '2016-06-27 11:49:57', '2016-06-27 11:49:57'),
(1, 34, '2016-07-18', 1, '2016-07-18 02:04:36', '2016-07-18 02:04:36'),
(1, 35, '2016-07-19', 1, '2016-07-19 03:19:23', '2016-07-19 03:19:23'),
(1, 37, '2016-09-06', 1, '2016-09-05 13:38:06', '2016-09-05 13:38:06'),
(2, 30, '2016-06-26', 1, '2016-06-25 22:50:57', '2016-06-25 22:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` enum('a','b') COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `group`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Are you more likely to stick to a diet if you have an exact meal plan and workout?', 'a', 1, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(2, 'Do you prefer exact instructions when starting a new project?', 'a', 2, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(3, 'Does having the freedom to create your own meal plans make it too easy for you to go overboard and cheat?', 'a', 3, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(4, 'Have you successfully lost weight in the past and kept it off for at least 3 months using an exact, done-for-you meal plan?', 'a', 4, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(5, 'Are you too busy to create a meal plan but will follow one if it’s given to you?', 'a', 5, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(6, 'If given a list of healthy ingredients do you prefer to create your own meal plans?', 'b', 6, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(7, 'When assembling furniture, do you ignore the instructions and try to figure it out on your own first?', 'b', 7, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(8, 'Do you prefer having flexibility in a diet?', 'b', 8, '2016-06-20 11:18:33', '2016-06-20 11:18:33'),
(9, 'Does having a strict daily meal plan and workout make it more stressful for you to stick to a diet?', 'b', 9, '2016-06-20 11:18:33', '2016-06-20 11:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `question_user`
--

CREATE TABLE IF NOT EXISTS `question_user` (
  `question_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `answer` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`question_id`,`user_id`),
  KEY `question_user_question_id_index` (`question_id`),
  KEY `question_user_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_user`
--

INSERT INTO `question_user` (`question_id`, `user_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(1, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(1, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(1, 16, 1, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(1, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(1, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(1, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(1, 22, 1, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(1, 24, 1, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(1, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(1, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(1, 27, 1, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(1, 28, 1, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(1, 29, 1, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(1, 30, 1, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(1, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(1, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(1, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(1, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(1, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(1, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(1, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(2, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(2, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(2, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(2, 16, 0, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(2, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(2, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(2, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(2, 22, 1, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(2, 24, 0, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(2, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(2, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(2, 27, 1, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(2, 28, 1, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(2, 29, 1, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(2, 30, 0, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(2, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(2, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(2, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(2, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(2, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(2, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(2, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(3, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(3, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(3, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(3, 16, 0, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(3, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(3, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(3, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(3, 22, 1, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(3, 24, 1, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(3, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(3, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(3, 27, 1, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(3, 28, 1, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(3, 29, 1, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(3, 30, 1, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(3, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(3, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(3, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(3, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(3, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(3, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(3, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(4, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(4, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(4, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(4, 16, 0, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(4, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(4, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(4, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(4, 22, 1, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(4, 24, 0, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(4, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(4, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(4, 27, 1, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(4, 28, 1, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(4, 29, 1, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(4, 30, 0, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(4, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(4, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(4, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(4, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(4, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(4, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(4, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(5, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(5, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(5, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(5, 16, 0, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(5, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(5, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(5, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(5, 22, 0, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(5, 24, 1, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(5, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(5, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(5, 27, 0, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(5, 28, 1, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(5, 29, 1, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(5, 30, 0, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(5, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(5, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(5, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(5, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(5, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(5, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(5, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(6, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(6, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(6, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(6, 16, 1, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(6, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(6, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(6, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(6, 22, 0, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(6, 24, 0, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(6, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(6, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(6, 27, 1, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(6, 28, 1, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(6, 29, 1, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(6, 30, 1, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(6, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(6, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(6, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(6, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(6, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(6, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(6, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(7, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(7, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(7, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(7, 16, 1, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(7, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(7, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(7, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(7, 22, 0, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(7, 24, 1, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(7, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(7, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(7, 27, 1, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(7, 28, 1, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(7, 29, 1, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(7, 30, 1, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(7, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(7, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(7, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(7, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(7, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(7, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(7, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(8, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(8, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(8, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(8, 16, 1, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(8, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(8, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(8, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(8, 22, 1, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(8, 24, 0, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(8, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(8, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(8, 27, 0, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(8, 28, 0, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(8, 29, 0, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(8, 30, 1, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(8, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(8, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(8, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(8, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(8, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(8, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(8, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51'),
(9, 8, 1, '2016-06-20 20:53:52', '2016-06-20 20:53:52'),
(9, 14, 1, '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(9, 15, 1, '2016-06-21 01:41:56', '2016-06-21 01:41:56'),
(9, 16, 0, '2016-06-21 01:58:06', '2016-06-21 01:58:06'),
(9, 17, 1, '2016-06-21 02:14:44', '2016-06-21 02:14:44'),
(9, 18, 1, '2016-06-23 08:58:18', '2016-06-23 08:58:18'),
(9, 21, 1, '2016-06-21 02:53:35', '2016-06-21 02:53:35'),
(9, 22, 1, '2016-06-23 04:56:40', '2016-06-23 04:56:40'),
(9, 24, 1, '2016-06-23 09:01:47', '2016-06-23 09:01:47'),
(9, 25, 1, '2016-06-23 09:02:03', '2016-06-23 09:02:03'),
(9, 26, 1, '2016-06-23 19:15:20', '2016-06-23 19:15:20'),
(9, 27, 1, '2016-06-25 00:57:26', '2016-06-25 00:57:26'),
(9, 28, 0, '2016-06-25 01:07:51', '2016-06-25 01:07:51'),
(9, 29, 0, '2016-06-25 10:01:29', '2016-06-25 10:01:29'),
(9, 30, 1, '2016-06-25 22:29:24', '2016-06-25 22:29:24'),
(9, 31, 1, '2016-06-26 11:14:09', '2016-06-26 11:14:09'),
(9, 32, 1, '2016-06-27 11:48:46', '2016-06-27 11:48:46'),
(9, 33, 1, '2016-07-18 01:59:16', '2016-07-18 01:59:16'),
(9, 34, 1, '2016-07-18 02:03:08', '2016-07-18 02:03:08'),
(9, 35, 1, '2016-07-19 03:17:17', '2016-07-19 03:17:17'),
(9, 36, 1, '2016-07-19 03:21:11', '2016-07-19 03:21:11'),
(9, 37, 1, '2016-09-05 13:37:51', '2016-09-05 13:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE IF NOT EXISTS `recipes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8_unicode_ci NOT NULL,
  `day` smallint(5) unsigned DEFAULT NULL,
  `date` date NOT NULL,
  `meal_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipes_meal_id_foreign` (`meal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `instructions`, `day`, `date`, `meal_id`, `created_at`, `updated_at`) VALUES
(1, 'Strawberry Almond Smoothie', 'Blend milk, strawberries, protein powder, and water until smooth. \nAdd almonds, cinnamon, and ice and blend to desired consistency. ', NULL, '2016-05-27', 1, NULL, NULL),
(2, 'Green Piña Colada Smoothie', 'Blend all ingredients for 2 to 3 minutes and enjoy!', NULL, '2016-05-27', 1, NULL, NULL),
(3, 'Blueberry Sunbutter Smoothie', 'Blend milk, blueberries, protein powder, and water until smooth. \nAdd sunflower seed butter, oats, and ice and blend to desired consistency. ', NULL, '2016-05-27', 1, NULL, NULL),
(4, 'Carrot, Beet and Spinach Detox Smoothie', 'Place all ingredients except strawberries in blender and blend for 90 seconds. \nAdd strawberries and blend on high until smooth (helps to use the chop ice function to start).  Pour in glass and enjoy!', NULL, '2016-05-27', 1, NULL, NULL),
(5, 'Green Love Smoothie', 'Blend all ingredients for 2 to 3 minutes. Enjoy! ', NULL, '2016-05-27', 1, NULL, NULL),
(6, 'Chocolate Cherry Smoothie', 'Blend all ingredients for 2 to 3 minutes and add water to thin, if desired.\r', NULL, '2016-05-27', 1, NULL, NULL),
(7, 'Green Apple Smoothie', 'Blend all ingredients except coconut oil and ice until smooth. \nAdd remaining ingredients and blend to desired consistency.', NULL, '2016-05-27', 1, NULL, NULL),
(8, 'Chicken Avocado Lettuce Wraps', 'In a small bowl, combine avocado, garlic, pepper, and chicken. \nFill 2 outer romaine lettuce leaves with mixture and enjoy!', NULL, '2016-05-27', 2, NULL, NULL),
(9, 'Cleansing Kale Salad', 'Place kale and goji berries (or cranberries) in bowl. \nPour lemon juice, olive oil, and sea salt over and mix well. \nTop with avocado and enjoy!', NULL, '2016-05-27', 2, NULL, NULL),
(10, 'Mushroom Tempeh Stir-Fry', 'In a medium pan, stir together coconut oil, garlic, vegetable broth, and crushed red pepper.  Add greens and mushrooms and sauté until mushrooms are slightly tender.  Add tempeh and heat through.  Place sautéed veggies and tempeh over rice and serve.\r', NULL, '2016-05-27', 2, NULL, NULL),
(11, 'Quick Black Bean Casserole', 'In a small saucepan over medium heat, sauté garlic in olive oil with onion, mushrooms, carrots, and green bell peppers.\nAdd grape tomatoes, spinach, vegetable broth, and a dash each cayenne pepper, black pepper, and crushed red pepper.\nQuickly bring to a boil, then reduce to a simmer and stir for 10–12 minutes. \nStir in cooked brown rice and black beans and cook to heat through.', NULL, '2016-05-27', 2, NULL, NULL),
(12, 'Citrus Chicken Salad', 'Place mixed greens in a salad bowl. Top with sections from tangerine, then brown rice, and sprinkle with almonds. * If desired, season with herbs of your choice, such as thyme.', NULL, '2016-05-27', 2, NULL, NULL),
(13, 'Simply Sexy Tomato Soup', 'Combine tomatoes and basil in blender and blend well. Place mixture in pot and add olive oil. Heat on medium-high heat until warm. Add Celtic sea salt to taste.  Serve with side of Garden Salad.\r', NULL, '2016-05-27', 2, NULL, NULL),
(14, 'Greens Over Almond Cod', 'In a shallow dish, bake cod fillet at 350°F for 10 minutes, or until fish easily flakes with fork. \nSauté mixed greens in olive oil and garlic. \nPlace cod fillet on plate, cover with sautéed greens, garnish with chopped almonds, and serve with fresh lemon. ', NULL, '2016-05-27', 4, NULL, NULL),
(15, 'Roasted Turkey with Warm Red Bliss Potato Salad', 'Preheat the oven to 425 degrees. Roast the potatoes for 15 minutes, or until golden brown. While the potatoes cook, whisk the Dijon mustard, water, lemon juice and garlic together in a small bowl. Steam the green beans until tender, but not mushy.  When potatoes are done, toss them in the Dijon mixture. Serve the turkey, potatoes and green beans, topped with chopped almonds. Yum!', NULL, '2016-05-27', 4, NULL, NULL),
(16, 'Coconut Chicken', 'Sauté spinach in coconut oil and mix with cubed chicken and cooked penne. \nIf desired, season with minced garlic and cracked pepper.', NULL, '2016-05-27', 4, NULL, NULL),
(17, 'Veggie Burger', 'Sauté onions and garlic until transparent. \nMix all ingredients, except oil, in a bowl. \nForm 6 patties from the mixture. \nPlace coconut oil in pan and cook patties over medium-high heat until golden brown on each side. \nWrap in lettuce leaf and enjoy!\n\nServe with garden salad.', NULL, '2016-05-27', 4, NULL, NULL),
(18, 'Kale Chips', 'Preheat oven to 300°F. \nRinse and dry kale and remove the stems. \nCut into large pieces, place in a bowl with olive oil and toss until lightly coated. \nArrange in a single layer on a baking sheet and bake for 20 minutes or until crisp, turning halfway through. \nSprinkle with salt and nutritional yeast, if desired, and dig in!', NULL, '2016-05-27', 3, NULL, NULL),
(19, 'Veggie Sandwich on gluten-free bread', 'Suggested Veggie Sandwich Combos:\n\nLettuce, tomato and avocado\n\nCucumber, carrot and hummus\n\nRoasted portobello, broccoli, and red pepper\n\nShredded raw beets, sliced pear and arugula\n\nBaby spinach, artichoke hearts, and roasted red pepper\r', NULL, '2016-05-27', 2, NULL, NULL),
(20, 'Summer Body Simple Salad', 'Toss greens with olive oil and vinegar, and top with the protein of your choice. Enjoy!', NULL, '2016-05-27', 2, NULL, NULL),
(21, 'Veggies and Hummus', 'Enjoy your favorite raw veggies dipped in 2 tbsp of hummus.', NULL, '2016-05-27', 3, NULL, NULL),
(22, 'Cucumber Slices Snack', 'Combine cucumber slices and coconut aminos in a bowl, and enjoy.  ', NULL, '2016-05-27', 3, NULL, NULL),
(23, 'Summer Tomatoes', 'Thinly slice the tomato, then lightly drizzle olive oil over the top, and add pinch of salt. ', NULL, '2016-05-27', 3, NULL, NULL),
(24, 'Celery and Almond Butter', 'Spread almond butter over two celery sticks. Enjoy! ', NULL, '2016-05-27', 3, NULL, NULL),
(25, 'Carrots and Hummus', 'Enjoy an easy snack of baby carrots dipped in hummus. \r', NULL, '2016-05-27', 3, NULL, NULL),
(26, 'Grape Tomato Snack', 'Cut the grape tomatoes in half, toss with olive oil and vinegar. Enjoy!', NULL, '2016-05-27', 3, NULL, NULL),
(27, 'Veggies and Rice Dinner', 'Top ½ cup of cooked brown rice with steamed veggies of your choice, and then dig in!', NULL, '2016-05-27', 4, NULL, NULL),
(28, 'Fish or Seafood Salad', 'Toss the greens with olive oil and balsamic vinegar. Top greens with cooked fish or seafood of your choice. Enjoy! ', NULL, '2016-05-27', 4, NULL, NULL),
(29, 'Legumes Salad', 'Mix cooked legumes with the greens of your choice. Toss with olive oil and balsamic vinegar, and enjoy!', NULL, '2016-05-27', 4, NULL, NULL),
(30, 'Peach Coconut Smoothie', 'In a blender, combine milk, protein powder, peaches, and water. \nBlend until smooth. \nAdd coconut oil, rolled oats, and ice, and blend to desired consistency.', NULL, '2016-05-27', 1, NULL, NULL),
(31, 'Toast with Almond Butter and Banana', 'Gluten-free toast with almond butter and sliced banana.', NULL, '2016-05-27', 1, NULL, NULL),
(32, 'Cinnamon Raisin Oatmeal', 'In a small bowl, mix together protein powder and oats. \nPour hot water over the mixture until you reach desired consistency (suggested amount: 1/4 cup water). \nSwirl in coconut oil, raisins, and a dash of cinnamon. ', NULL, '2016-05-27', 1, NULL, NULL),
(33, 'Quinoa with Fresh Berries', 'Bring quinoa and coconut milk to a boil, reduce heat to low and cook, covered, for 15 minutes. Turn heat off and let sit for 5 minutes. Top with your choice of fresh berries. ', NULL, '2016-05-27', 1, NULL, NULL),
(34, 'Avocado Toast', 'Avocado on gluten-free toast with lemon juice, sea salt and pepper.', NULL, '2016-05-27', 1, NULL, NULL),
(35, 'Brown Rice and Unlimited Veggies', 'Brown rice with unlimited steamed or lightly cooked veggies of your choice. ', NULL, '2016-05-27', 2, NULL, NULL),
(36, 'Rainbow Salad', 'Top with olive oil, balsamic vinegar, and a squeeze of lemon.', NULL, '2016-05-27', 2, NULL, NULL),
(37, 'Grilled Shrimp or Tuna Wraps', 'Grilled shrimp or tuna and veggie lettuce wraps.', NULL, '2016-05-27', 2, NULL, NULL),
(38, 'Chicken Apple Walnut Salad', 'In a small bowl, whisk Dijon mustard with water, lemon juice, and garlic. \nToss with chicken and place over greens of your choice. \nTop with apple and sprinkle with walnuts.', NULL, '2016-05-27', 2, NULL, NULL),
(39, 'Kale and Honey Snack', 'Kale leaves with honey and a sprinkle of sea salt.', NULL, '2016-05-27', 3, NULL, NULL),
(40, 'Carrots and Salsa', 'Enjoy an easy snack of baby carrots dipped in salsa.', NULL, '2016-05-27', 3, NULL, NULL),
(41, 'Seaweed Snack ', 'Package of organic, roasted seaweed snacks.', NULL, '2016-05-27', 3, NULL, NULL),
(42, 'Classic Vegetable Soup - 1 cup Snack', 'Place all ingredients except salt and pepper in a large pot and bring to a boil. \nReduce heat, cover and simmer for 10 minutes. \nUncover and simmer for another 15 minutes. \nAdd salt and pepper to taste. Serve and enjoy!', NULL, '2016-05-27', 3, NULL, NULL),
(43, 'Vegtastic Chili ', 'Place base ingredients in a bowl. Add cooked black beans to bowl. \nBlend all sauce ingredients in a food processor until slightly creamy. \nAdd to bowl, toss and top with avocado.\r\rIngredients for base:\r1 cup chopped organic celery\r1 cup chopped organic zucchini\r1 cup chopped organic red onion\r1 cup chopped organic red pepper\rAdditional ingredients: 1 can black beans, cooked\r1 avocado, diced\r\rIngredients for sauce: \r1 cup sun-dried tomatoes\r1 cup chopped tomatoes\r1 cup chopped red onion\r2 tablespoons chili powder\r1 tablespoon extra virgin olive oil\r1 teaspoon salt and pepper\r', NULL, '2016-05-27', 4, NULL, NULL),
(44, 'Steak and Veggies', 'Lean eye of round steak with steamed or lightly cooked veggies.', NULL, '2016-05-27', 4, NULL, NULL),
(45, 'Citrus Salmon', 'Preheat oven to 375 degrees F. Peel orange and remove 4 slices for garnish. \nSqueeze juice from orange and lemon and mix with rice vinegar and olive oil in a glass baking dish. Place salmon in dish and marinate for 1 hour.  Bake at 375 degrees F for 15 minutes. Serve with 1 cup brown rice or over a bed of greens for a delicious dinner!\r', NULL, '2016-05-27', 4, NULL, NULL),
(46, 'Green Smoothie Your Choice', 'Choose from Green Apple Smoothie, Green Love Smoothie or a Green Pina Colada Smoothie!', NULL, '2016-05-27', 4, NULL, NULL),
(47, 'Broccoli Avocado Pesto Pasta', 'Bring a large pot of water to a boil. \nAdd linguine and cook according to package directions. \nMeanwhile, steam broccoli for 3 to 5 minutes until bright green and set aside. \nMake the pesto sauce by placing the avocado, basil, garlic, pine nuts, lemon juice, and extra virgin olive oil in a food processor and blending until smooth. \nAdd sea salt and pepper to taste. \nDrain pasta when it’s finished cooking and place it into a large bowl. \nAdd pesto sauce and broccoli and toss. \nTop with cherry tomatoes and serve.', NULL, '2016-05-27', 4, NULL, NULL),
(48, 'Garlicky Green Beans Snack', 'Preheat oven to 400 degrees F. \nToss green beans, olive oil and garlic in a bowl. \nBake for 20 minutes until tender and crispy. \nEnjoy as a snack or side dish.', NULL, '2016-05-27', 3, NULL, NULL),
(49, 'Fruit and Flax Breakfast', 'Fresh fruit sprinkled with flax seeds.', NULL, '2016-05-27', 1, NULL, NULL),
(50, 'Sweet Potato Breakfast', 'Baked sweet potato with coconut oil and sprinkle of cinnamon', NULL, '2016-05-27', 1, NULL, NULL),
(51, 'Sweet and Simple Smoothie', 'Blend for 2 to 3 minutes and enjoy!', NULL, '2016-05-27', 1, NULL, NULL),
(52, 'Breakfast Cereal with Berries', 'Organic oat bran or quinoa cereal with almond milk and berries of your choice.', NULL, '2016-05-27', 1, NULL, NULL),
(53, 'Power Up Quinoa Salad', 'Preparation: Soak the quinoa for 15 minutes to loosen the outer coating of saponin and remove any bitter taste. Drain well.\r\rCombine quinoa and water in a pot and bring to a rapid boil. \nCover with a tight fitting lid, reduce to a simmer, and cook until the water is fully absorbed.  This will take approximately 15 minutes. \nRemove from heat and allow it to sit for 5 minutes with the lid on. \nFluff quinoa gently with a fork and add remaining ingredients.\r', NULL, '2016-05-27', 2, NULL, NULL),
(54, 'Zucchini Spring Rolls', 'Slice zucchini thinly using a knife or mandolin. \nAdd veggies to slice of zucchini and roll. \nDip in coconut aminos and enjoy!\r', NULL, '2016-05-27', 2, NULL, NULL),
(55, 'Open-Faced Moroccan Chicken Salad', 'In a small bowl, whisk together coconut oil, garlic, and cinnamon. \nToss chicken and raisins in oil. \nSpoon chicken salad onto bread (fresh or toasted).', NULL, '2016-05-27', 2, NULL, NULL),
(56, 'Simply Sexy Tomato Soup', 'Combine tomatoes and basil in blender and blend well. \nPlace mixture in pot and add olive oil. \nHeat on medium-high heat until warm. \nAdd Celtic sea salt to taste.  \nServe with side of Garden Salad.', NULL, '2016-05-27', 4, NULL, NULL),
(57, 'Fish and Brussel Sprouts', 'Your choice of baked fish and roasted brussels sprouts.', NULL, '2016-05-27', 4, NULL, NULL),
(58, 'Spicy Turkey and Corn Stew', 'In a small saucepan over medium heat, sauté garlic in olive oil with onion, mushrooms, carrots, and green bell pepper.\n Add tomatoes, spinach, vegetable broth, and a dash each cayenne pepper, black pepper, and crushed red pepper. Quickly bring to a boil, then reduce to a simmer and stir for 10–12 minutes. \nStir in thawed corn and ground turkey and heat through.', NULL, '2016-05-27', 4, NULL, NULL),
(59, 'Spinach and Cannellini Beans over Red Quinoa', 'In a medium pan, sauté baby spinach in olive oil with garlic, seasoning, and crushed red pepper. \nAdd cannellini beans (boiled, steamed vacuum sealed, or canned, drained and rinsed) and heat through. \nServe over quinoa.', NULL, '2016-05-27', 4, NULL, NULL),
(60, 'Classic Vegetable Soup', 'Place all ingredients except salt and pepper in a large pot and bring to a boil. \nReduce heat, cover and simmer for 10 minutes. Uncover and simmer for another 15 minutes. \nAdd salt and pepper to taste. \nServe and enjoy!', NULL, '2016-05-27', 2, NULL, NULL),
(61, 'Garlicky Green Beans', 'Preheat oven to 400 degrees F. \nToss green beans, olive oil and garlic in a bowl. \nBake for 20 minutes until tender and crispy. \nEnjoy as a snack or side dish.', NULL, '2016-05-27', 4, NULL, NULL),
(62, 'Hot Water with Lemon', 'Before Breakfast squeeze one half lemon into a cup hot water and start your morning!', NULL, '2016-05-27', 5, NULL, NULL),
(63, 'Peach and Almond Smoothie', 'Blend peach, milk, protein powder and almond butter until smooth.  Add ice and blend to desired consistency.  Sweeten with stevia if needed.\r', NULL, '2016-05-27', 1, NULL, NULL),
(64, 'Green Morning Shake', 'Blend milk, cucumber, avocado, banana and protein powder.  Add ice and blend to desired consistency.  Sweeten with stevia if needed.', NULL, '2016-05-27', 1, NULL, NULL),
(65, 'Scrambled Egg Tortilla', 'Place a small heavy bottom skillet over medium heat and let heat for 1 minute.  Add oil and egg, cook stirring constantly until egg reaches desired doneness.  Serve in tortilla with salsa and avocado.', NULL, '2016-05-27', 1, NULL, NULL),
(66, 'Banana  Smoothie', 'Blend banana, sunflower seed butter, milk, vanilla and protein powder.  Add ice and blend to desired consistency.', NULL, '2016-05-27', 1, NULL, NULL),
(67, 'Creamy Blueberry Smoothie', 'Blend milk, banana, blueberries, and protein powder.  Add ice and blend to desired consistency. Sweeten with stevia if needed.', NULL, '2016-05-27', 1, NULL, NULL),
(68, 'Chia and Oatmeal Pudding', 'In a bowl combine oats, chia seeds, milk and salt.  Let sit for 15 minutes at room temperature or overnight covered in the refrigerator.  Stir in berries before serving.', NULL, '2016-05-27', 1, NULL, NULL),
(69, 'Almond Butter and Chocolate Smoothie', 'Blend milk, cocoa powder, almond butter, banana and protein powder.  Add ice and blend to desired consistency. Sweeten with stevia if needed.\r', NULL, '2016-05-27', 1, NULL, NULL),
(70, 'Quick Chilled Tomato Soup', 'In a blender combine tomatoes, cucumber, vinegar, basil, olive oil, salt and pepper.  Blend until smooth.  Serve immediately or chill until ready to serve.', NULL, '2016-05-27', 2, NULL, NULL),
(71, 'Chicken, Cucumber and Sesame Salad', 'In a medium bowl, combine oil and vinegar. Add chicken.', NULL, '2016-05-27', 2, NULL, NULL),
(72, 'Basil and Bean Salad', 'In a medium sized bowl combine cabbage, onion, mustard, olive oil, beans, basil, salt and pepper. Mix thoroughly and eat immediately or store covered in the refrigerator.', NULL, '2016-05-27', 2, NULL, NULL),
(73, 'Olive Oil Egg Salad Lettuce Wraps', 'In a small bowl combine eggs, olive oil, celery, salt and pepper.  Mix gently until just combined. Fill romaine leaves with egg salad and serve.', NULL, '2016-05-27', 2, NULL, NULL),
(74, 'Shrimp Slaw with Brown Rice Cake', 'In a large bowl combine shrimp, cabbage, sesame, olive oil, coconut aminos, salt and pepper. Serve with 1 brown rice cake.', NULL, '2016-05-27', 2, NULL, NULL),
(75, 'Hummus Lettuce Wraps', 'Take each leaf and place ⅓ of the hummus, in the middle, top with parsley and red pepper.  Roll leaves and serve.\r', NULL, '2016-05-27', 2, NULL, NULL),
(76, 'BLT', 'Spread bread with mayonnaise, top with lettuce, tomato and bacon.  Serve immediately.', NULL, '2016-05-27', 2, NULL, NULL),
(77, 'Cucumber and Hummus', 'Cucumber with hummus', NULL, '2016-05-27', 3, NULL, NULL),
(78, 'Berry Snack', '1/2 Cup of Berries.', NULL, '2016-05-27', 3, NULL, NULL),
(79, 'Sweet Pepper Slices Snack', 'Slices of sweet pepper dipped in Coconut Aminos', NULL, '2016-05-27', 3, NULL, NULL),
(80, 'Peach or Apple', 'Your choice of a Peach or an Apple!', NULL, '2016-05-27', 3, NULL, NULL),
(81, 'Spicy Broiled Cauliflower', 'Heat oven to broil.  Place cauliflower on an oven proof tray and coat with olive oil, salt, pepper and spice.  Place under broiler and cook until slightly browned, 2-5 minutes depending on the strength of your broiler.\r', NULL, '2016-05-27', 3, NULL, NULL),
(82, 'Paper Baked Cod', 'Preheat oven to 400 degrees.  In a small bowl combine onion, sweet pepper, 2 teaspoons olive oil, salt and pepper.  Coat cod with remaining 1 teaspoons olive oil, salt and pepper. Place sweet pepper mixture in the center of each of the parchment and then top with fish.  Fold the long ends of the parchment paper over the fish to cover and tuck the short ends under the fish to seal.  Place on an oven proof baking tray. Bake until fish is just cooked through, about 10-15 minutes.  Serve over greens.\r', NULL, '2016-05-27', 4, NULL, NULL),
(83, 'Gluten Free Pasta Stir Fry', 'Heat a heavy bottom skillet or wok over medium heat.  Add coconut oil, onion, garlic, ginger and tempeh.  Cook stirring constantly for 3 minutes.  Add cabbage and cook for an additional 3 minutes, add mushrooms and continue cooking for 2 minutes.  Add pasta, coconut aminos, salt and pepper, combine and cook for an additional 2 minutes.  Toss in sesame seeds and serve.\r', NULL, '2016-05-27', 4, NULL, NULL),
(84, 'Salmon Salad with Avocado Dressing', 'In a medium bowl combine the avocado, lemon juice, mustard, olive oil, mustard, parsley, salt and pepper. Add cucumber and toss. Flake the salmon and add it to the avocado mixture. Place the greens on a plate and top with salmon.', NULL, '2016-05-27', 4, NULL, NULL),
(85, 'Shrimp Rice Bowl', 'In a medium sized bowl combine the rice, parsley, red pepper, onion, shrimp, lemon juice, olive oil, capers and pepper.  Mix until thoroughly combined and eat immediately or store up to 24 hours in the refrigerator in an air-tight container.', NULL, '2016-05-27', 4, NULL, NULL),
(86, 'Naked Turkey Burger', 'Thoroughly mix the turkey, onion, salt and pepper in a large bowl.  Form into a patty. Heat a large heavy bottom skillet over medium heat.  Add olive oil and place the place the patty in the pan.  Cook until browned, about 4 minutes, flip and cook until your desired doneness, about  4 minutes.  Top with mustard, tomato and onion. ', NULL, '2016-05-27', 4, NULL, NULL),
(87, 'Steak and Spinach', 'Lean eye of round steak with spinach or mixed green salad.', NULL, '2016-05-27', 4, NULL, NULL),
(88, 'Quick Summer Stew', 'Heat a heavy bottom pot over medium heat.  Add olive oil onions and garlic.  Cook stirring often until onions are translucent, about 5 minutes.  Add beans, tomatoes, eggplant, water, salt and pepper.  Bring to a simmer and cook until eggplant is tender, about 10 minutes.  Just before serving stir in basil.', NULL, '2016-05-27', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('00717d22415c6e61c759a896fee8fb68c19118a8', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicTNUWktvbXJobmRHanpDQTZPeXRrR3lPYWROaWUwRnh3SXl1VW1OUyI7czoyMjoiQVVUSE9SSVpFX1RSSUFMX01PTlRIUyI7czoxOiIxIjtzOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU1OiJodHRwOi8vbG9jYWxob3N0L3N1bW1lcmJvZHljbHViL3B1YmxpYy90cmlhbC8xNDcxNjMxNjE4Ijt9czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE2MzE2MjI7czoxOiJjIjtpOjE0NzE2MzE0NjU7czoxOiJsIjtzOjE6IjAiO319', 1471631623),
('0907f93dc0cefdc1c9da00c34db8e8f4b80f065c', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzM1ejdDYUZtY2pPc3g4SEFydktINDJBOHpjN0J2cU4xZmphTnZWdCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3ODg5NzE7czoxOiJjIjtpOjE0NzE3ODg5NzE7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471788980),
('205010efe11a3dce5499821c47eec0248b82908d', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWk5mTlNsR0JjY3NHZjBmNE1xR25VaGxzdjZlT1hPRlFmczE2ZkJzTSI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3ODg4Njc7czoxOiJjIjtpOjE0NzE3ODg4Njc7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471788877),
('23f02083b0b6db798243bc94eea77796d383fe89', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMUlBYzJ0cGJMakNBcWJ5UEJVNVZ3VlFBOE9kN0VVZjAycjYxSk1aWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VtbWVyYm9keWNsdWIvcHVibGljL2VtYWlsdGVzdC9kYWlseXRlc3QiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDcxNzg3OTk5O3M6MToiYyI7aToxNDcxNzc2MjYyO3M6MToibCI7czoxOiIwIjt9fQ==', 1471787999),
('2f8ad56f1f6c6ea4518a9e725f59caefb4802586', 34, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 'YTo3OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MzoiaHR0cDovL2xvY2FsaG9zdC9zdW1tZXJib2R5Y2x1Yi9wdWJsaWMvaG9tZSI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IlNwV0o2bFhwN2pQek1XZ290RmN0VTZERkkydUthcVQzWmc4MDFMQ0ciO3M6MTY6IlF1ZXN0aW9uX0Fuc3dlcnMiO2E6OTp7aToxO2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImEiO31pOjI7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6MzthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJhIjt9aTo0O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImEiO31pOjU7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6NjthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJiIjt9aTo3O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImIiO31pOjg7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYiI7fWk6OTthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJiIjt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM0O3M6MTA6InByb2dyYW1faWQiO2k6MTtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ2ODg3MjI4NztzOjE6ImMiO2k6MTQ2ODg3MjA3NTtzOjE6ImwiO3M6MToiMCI7fX0=', 1468872288),
('47ce604dab017fa9c31fb91f35374557c79fbdca', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVdOYUE4cWJKdGlsNmxTZDZBaDVCMll4Ulk5WVd0aTNwU3NtR2JidCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3ODc5ODc7czoxOiJjIjtpOjE0NzE3ODc5ODc7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471787987),
('4f42cf7a8a4d7a5c1e4572da5944b26870c1791d', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVZ4WDZxRVQwSk1qaVk2VEdtUVV6UFVYcXIyTmtCOUNIUGQ0bnJwZCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3ODc3NTQ7czoxOiJjIjtpOjE0NzE3ODc3NTQ7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471787764),
('51c04f58a964d189dfb5fcfa69228043b9c2fba5', 33, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWlVIN2pxWHl5bXM1VnY1TFU2RlVIbDR3TlYySHQ3TU44TG9rQ0E3TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjQ6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VtbWVyYm9keWNsdWIvcHVibGljL3JlZ2lzdHJhdGlvbi9tZWFzdXJlbWVudHMiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjI6IkFVVEhPUklaRV9UUklBTF9NT05USFMiO3M6MToiMSI7czoxNjoiUXVlc3Rpb25fQW5zd2VycyI7YTo5OntpOjE7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6MjthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJhIjt9aTozO2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImEiO31pOjQ7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6NTthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJhIjt9aTo2O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImIiO31pOjc7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYiI7fWk6ODthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJiIjt9aTo5O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImIiO319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MzM7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0Njg4NzIwNDI7czoxOiJjIjtpOjE0Njg4NzE4Mzc7czoxOiJsIjtzOjE6IjAiO319', 1468872042),
('57cc75a8c52338abf9b3ed56b7eb850ef746825d', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTlGTEhYMVROM0lYTkNDbGFRRVVub0pBdEhvVU51bzlWc0RJc2FzeCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3ODc5NTU7czoxOiJjIjtpOjE0NzE3ODc5NTU7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471787956),
('6b81f3dfc451e19f1a28a75d20807662cff4415e', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWk1TDF2ektxaERqamlNRUwwTGFjc3UzdjUwT2VBa1p3Q2RpNjNMciI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3ODc3MDE7czoxOiJjIjtpOjE0NzE3ODc3MDE7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471787702),
('6d2f4b25ee976bda9cc74895a3c2819f95fd97fa', 32, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibWhmZEtWV1d5YTBvWHNDRGZOMm95ZDFaQnpqRVRLdFAySkl6WDFiNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VtbWVyYm9keWNsdWIvcHVibGljL21lYXN1cmVtZW50Ijt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YToxOntpOjA7czo2OiJzdGF0dXMiO31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjMyO3M6MTA6InByb2dyYW1faWQiO2k6MTtzOjY6InN0YXR1cyI7czoyMToiV2VpZ2h0IGhhcyBiZWVuIHNhdmVkIjtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ2ODk0OTk1ODtzOjE6ImMiO2k6MTQ2ODk0Nzk4MjtzOjE6ImwiO3M6MToiMCI7fX0=', 1468949958),
('85380dff8b841e17ecd4109c3d6032b9fda60607', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY09Da0swQzZRQ2hmQWlNamd1OHo1VXk5TWQ4RGR0RkRhc0RnMzZlRyI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3OTMyMzY7czoxOiJjIjtpOjE0NzE3OTMyMzY7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471793241),
('8ba64fdc250135542fccc98f13097d9beee4f392', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHJUNFR6TXF4Q1BqMUJJRVlZRzhNSjlua1p2UUs0VzVtSXJZUVpueCI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3ODc5NjI7czoxOiJjIjtpOjE0NzE3ODc5NjI7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471787962),
('8ee2e7a1d3c2d8b83ce078519d0e816a99ea87e0', 32, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicVhjQnA1Wkl6RzhUQUpRU0xmNFl0UHY0VEZEUnpzbHdmRnhKWmhmRSI7czoyMjoiQVVUSE9SSVpFX1RSSUFMX01PTlRIUyI7czoxOiIxIjtzOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUzOiJodHRwOi8vbG9jYWxob3N0L3N1bW1lcmJvZHljbHViL3B1YmxpYy9wcm9ncmFtL2Zvb2QvMiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjMyO3M6MTA6InByb2dyYW1faWQiO2k6MTtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ3MzIyNzg3MjtzOjE6ImMiO2k6MTQ3MzIyNzc2NDtzOjE6ImwiO3M6MToiMCI7fX0=', 1473227872),
('a8118a79c65291c78a507e515b2120cad7f7b80f', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibXMwNncxUG1qZzdDZGxGQmNRamVWRTJpVEw1WXRsbEF5bmR0ZVRiYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VtbWVyYm9keWNsdWIvcHVibGljIjt9czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NjkwMDI1Mjc7czoxOiJjIjtpOjE0NjkwMDI1Mjc7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1469002529),
('b208cf56ed6755a84f7ac63eb1ddff7f3f59df6b', NULL, '::1', '0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFVzZWZkUjRWQk1FVU1ZcE5XMVhQT1gwR1BrOGt6NkxFTEpWc0ZTZiI7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NzE3OTI3OTk7czoxOiJjIjtpOjE0NzE3OTI3OTk7czoxOiJsIjtzOjE6IjAiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1471792803),
('c86fc0a25427061de84c20110035ebb91c2720e2', 36, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2NDoiaHR0cDovL2xvY2FsaG9zdC9zdW1tZXJib2R5Y2x1Yi9wdWJsaWMvcmVnaXN0cmF0aW9uL21lYXN1cmVtZW50cyI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IkJiNXJBZkxEU0xmSnJ1aXBWakRWd2tNcXl0akI4aVRsQjZKVXNoRmgiO3M6MTY6IlF1ZXN0aW9uX0Fuc3dlcnMiO2E6OTp7aToxO2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImEiO31pOjI7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6MzthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJhIjt9aTo0O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImEiO31pOjU7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6NjthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJiIjt9aTo3O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImIiO31pOjg7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYiI7fWk6OTthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJiIjt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM2O3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDY4OTYzMzI1O3M6MToiYyI7aToxNDY4OTYyOTYxO3M6MToibCI7czoxOiIwIjt9fQ==', 1468963325),
('c9f0f7daa453e5217513ad2aa9ed139239c2674e', 37, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoicGQwd2xmQ2dIcjFZQTFkdU5BOEVBaTZZc1VNQ0NBUDNBcU9Kd3BhYiI7czoyMjoiQVVUSE9SSVpFX1RSSUFMX01PTlRIUyI7czoxOiIxIjtzOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0L3N1bW1lcmJvZHljbHViL3B1YmxpYy9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzc7czoxNjoiUXVlc3Rpb25fQW5zd2VycyI7YTo5OntpOjE7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6MjthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJhIjt9aTozO2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImEiO31pOjQ7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYSI7fWk6NTthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJhIjt9aTo2O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImIiO31pOjc7YToyOntzOjE6ImEiO2k6MTtzOjE6ImciO3M6MToiYiI7fWk6ODthOjI6e3M6MToiYSI7aToxO3M6MToiZyI7czoxOiJiIjt9aTo5O2E6Mjp7czoxOiJhIjtpOjE7czoxOiJnIjtzOjE6ImIiO319czoxMDoicHJvZ3JhbV9pZCI7aToxO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDczMTUwMTYyO3M6MToiYyI7aToxNDczMTQ3MzUyO3M6MToibCI7czoxOiIwIjt9fQ==', 1473150162),
('d53639bc7284414e8cb338a610b90c11e6d0dbf1', 24, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieHYxaU1HcE5qODBoVHVkTTlvQVVrSlhpMGVJRVVRWDlsYXZQM3RxTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VtbWVyYm9keWNsdWIvcHVibGljL2hvbWUiO31zOjU6ImZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI0O3M6MTA6InByb2dyYW1faWQiO2k6MTtzOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ3MDM0NjEzNjtzOjE6ImMiO2k6MTQ3MDM0NjA1MTtzOjE6ImwiO3M6MToiMCI7fX0=', 1470346137),
('e40251f3fce2839611c1ba567f6a95d00f6e0af7', 32, '::1', 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZjRUYlNLbjYzVFRaNUIzUlRDN284UTlaNjhreWhjNTBhVmJqVnFOeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3Qvc3VtbWVyYm9keWNsdWIvcHVibGljL3Byb2dyYW0vcGxheWxpc3RzIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozMjtzOjEwOiJwcm9ncmFtX2lkIjtpOjE7czo5OiJfc2YyX21ldGEiO2E6Mzp7czoxOiJ1IjtpOjE0NjkwMDI3MzI7czoxOiJjIjtpOjE0NjkwMDI1Mjc7czoxOiJsIjtzOjE6IjAiO319', 1469002732);

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider_user_id` bigint(20) NOT NULL,
  `provider` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(6, 14, 280482818959221, 'facebook', '2016-06-21 01:32:05', '2016-06-21 01:32:05'),
(7, 14, 296312537376249, 'facebook', '2016-06-22 20:01:19', '2016-06-22 20:01:19'),
(8, 23, 1379695828722601, 'facebook', '2016-06-23 06:00:30', '2016-06-23 06:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `authorizenet_ref_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `authorizenet_subscription_id` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `authorizenet_subscription_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_last_four` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_payment_profile_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_profile_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit_card_type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `purchase_date` date NOT NULL,
  `renewal_date` date NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `trial_months` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `authorizenet_ref_id`, `authorizenet_subscription_id`, `authorizenet_subscription_status`, `card_last_four`, `card_exp_date`, `customer_address_id`, `customer_payment_profile_id`, `customer_profile_id`, `credit_card_type`, `active`, `purchase_date`, `renewal_date`, `price`, `trial_months`, `created_at`, `updated_at`) VALUES
(15, 14, 'ref1466537606', '4063662', 'created', '0027', '2018-02', NULL, '37361658', '41063661', 'Visa', 1, '2016-06-21', '2016-07-21', NULL, 0, '2016-06-21 01:33:30', '2016-06-21 01:33:30'),
(16, 15, 'ref1466538149', '4063671', 'created', '8888', '2017-01', NULL, '37361717', '41063731', 'Visa', 1, '2016-06-21', '2016-07-21', NULL, 0, '2016-06-21 01:42:37', '2016-06-21 01:42:37'),
(19, 18, 'ref1466540791', '4063727', 'created', '0002', '2019-01', NULL, '37362364', '41064354', 'American Express', 1, '2016-06-21', '2016-07-21', NULL, 0, '2016-06-21 02:26:36', '2016-06-21 02:26:36'),
(20, 8, 'ref1466609803', '4065499', 'created', '1111', '2019-02', NULL, '37372943', '41073670', 'Visa', 1, '2016-06-22', '2016-07-22', NULL, 0, '2016-06-21 21:36:46', '2016-06-21 21:36:46'),
(21, 22, 'ref1466722658', '4067545', 'created', '1111', '2020-06', NULL, '37395347', '41094683', 'Visa', 1, '2016-06-23', '2016-07-23', NULL, 0, '2016-06-23 04:57:41', '2016-06-23 04:57:41'),
(22, 24, 'ref1466737373', '29898974', 'created', '0002', '2019-01', NULL, '282821032', '284372140', 'American Express', 1, '2016-06-23', '2016-07-23', NULL, 0, '2016-06-23 09:03:03', '2016-06-23 09:03:03'),
(23, 25, 'ref1466737388', '29898976', 'created', '0027', '2017-02', NULL, '282821045', '284372152', 'Visa', 1, '2016-06-23', '2016-07-23', NULL, 0, '2016-06-23 09:03:10', '2016-06-23 09:03:10'),
(24, 26, 'ref1466774316', '29901479', 'created', '0002', '2017-01', NULL, '282852883', '284401512', 'American Express', 1, '2016-06-24', '2016-07-24', NULL, 0, '2016-06-23 19:18:46', '2016-06-23 19:18:46'),
(25, 28, 'ref1466881762', '29918540', 'created', '0027', '2020-04', NULL, '283075184', '284607374', 'Visa', 1, '2016-06-25', '2016-07-25', NULL, 0, '2016-06-25 01:09:24', '2016-06-25 01:09:24'),
(26, 27, 'ref1466911768', '29920972', 'created', '1111', '2016-07', NULL, '283122506', '284652339', 'Visa', 1, '2016-06-25', '2016-07-25', NULL, 0, '2016-06-25 09:29:30', '2016-06-25 09:29:30'),
(27, 29, 'ref1466913822', '29921112', 'created', '1111', '2016-07', NULL, '283124217', '284653945', 'Visa', 1, '2016-06-25', '2016-07-25', NULL, 0, '2016-06-25 10:03:44', '2016-06-25 10:03:44'),
(28, 30, 'ref1466958682', '29923156', 'created', '8888', '2016-07', NULL, '283154067', '284683041', 'Visa', 1, '2016-06-26', '2016-07-26', NULL, 0, '2016-06-25 22:31:24', '2016-06-25 22:31:24'),
(29, 31, 'ref1467004472', '29927797', 'created', '0002', '2017-01', NULL, '283232217', '284756554', 'American Express', 1, '2016-06-26', '2016-07-26', NULL, 0, '2016-06-26 11:14:43', '2016-06-26 11:14:43'),
(30, 21, 'ref1467005298', '29927820', 'created', '0027', '2017-01', NULL, '283232892', '284757295', 'Visa', 1, '2016-06-26', '2016-07-26', NULL, 0, '2016-06-26 11:28:24', '2016-06-26 11:28:24'),
(31, 32, 'ref1467092964', '29943804', 'created', '0002', '2017-01', NULL, '283432444', '284943319', 'American Express', 1, '2016-06-27', '2016-07-27', NULL, 0, '2016-06-27 11:49:38', '2016-06-27 11:49:38'),
(32, 33, 'ref1468872032', '30214339', 'created', '0027', '2018-01', NULL, '1203363756', '1203184525', 'Visa', 1, '2016-07-18', '2016-08-18', NULL, 1, '2016-07-18 02:00:38', '2016-07-18 02:00:38'),
(33, 34, 'ref1468872215', '30214388', 'created', '8888', '2026-01', NULL, '1203364291', '1203185015', 'Visa', 1, '2016-07-18', '2016-08-18', NULL, 0, '2016-07-18 02:03:41', '2016-07-18 02:03:41'),
(34, 35, 'ref1468963143', '30229493', 'created', '0002', '2022-01', NULL, '1203484713', '1203293039', 'American Express', 1, '2016-07-19', '2016-08-19', NULL, 1, '2016-07-19 03:19:07', '2016-07-19 03:19:07'),
(35, 36, 'ref1468963316', '30229553', 'created', '0027', '2017-01', NULL, '1203485078', '1203293356', 'Visa', 1, '2016-07-19', '2016-08-19', NULL, 0, '2016-07-19 03:22:02', '2016-07-19 03:22:02'),
(36, 37, 'ref1473147428', '30784538', 'created', '0027', '2017-03', NULL, '299290477', '299003845', 'Visa', 1, '2016-09-06', '2016-10-06', 26.40, 1, '2016-09-05 13:37:20', '2016-09-05 13:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('m','f') COLLATE utf8_unicode_ci NOT NULL,
  `weight` decimal(7,4) DEFAULT NULL,
  `weight_goal` decimal(7,4) DEFAULT NULL,
  `height` tinyint(3) unsigned DEFAULT NULL,
  `weight_unit` enum('lb','kg') COLLATE utf8_unicode_ci NOT NULL,
  `height_unit` enum('in','cm') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(42) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `optin` tinyint(1) DEFAULT NULL,
  `notifications` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `dob`, `gender`, `weight`, `weight_goal`, `height`, `weight_unit`, `height_unit`, `email`, `phone`, `address1`, `address2`, `city`, `state_id`, `zip`, `country_id`, `optin`, `notifications`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, '', 'Manik', 'Khanna', '1994-01-01', 'm', NULL, NULL, NULL, 'lb', 'in', 'manik@technosip.com', '111- 111-1111', 'abc', 'abc', 'abc', 'PB', '141013', 'IN', 1, NULL, '$2y$10$erRfzxlm5eC1fd7xM8xklOZhpVHbEbcjIF9AoGsV7ftUnBRmtBE0S', '3d6kIh8LqhUiJP1CJCNxGQxMiHjFweRIrg3XXwGhWuPfIgnRzRwkCtMjPwdF', '2016-06-20 20:53:52', '2016-06-25 00:22:40'),
(14, 'Mahaveer Technosip', 'Mahaveer', 'Technosip', '1987-01-01', 'm', 0.0000, 0.0000, 0, 'lb', 'in', 'mahavir@technosip.com', '111-111-1111', 'A', 'B', 'C', 'AL', '123456', 'US', 1, NULL, '', 'kbGrLWlmqSbdXwTsXpnYU5DfX0b77NihnzqyPGkl7IBox870P8TjwVUwEV3c', '2016-06-21 01:32:05', '2016-06-21 01:57:11'),
(15, '', 'Mahavir', 'N', '1967-12-01', 'm', 45.3592, 54.4311, 170, 'kg', 'in', 'sbctest6@gmail.com', '111-111-1111', 'A', 'B', 'C', 'AL', '123456', 'US', 1, 1, '$2y$10$SIyWXTcH31Ug.YDGVEqC9e7hIq3eoNU6k1UvImG2jXaOOB3lDgG4S', 'XGh87wzxWkPhWDf1hereL6zOShr7A6kZ5i7M21WrH01MAJCiGYHL6Je1yw29', '2016-06-21 01:41:55', '2016-06-21 02:18:33'),
(16, '', 'Manik', 'Khanna', '1994-01-01', 'm', NULL, NULL, NULL, 'lb', 'in', 'manik.khanna01@yahoo.com', '', '', '', '', '', '', '', NULL, NULL, '$2y$10$QLEeurQppYdmfxsE2qPR5.bntTKKHv/F3.mCucHKLuicOz.WcnutK', 'tjUV17iqGjr22BwRUtq66j7AmMFDA875TweqIMBUUvE8i9Lyu0zfT43Zw2wl', '2016-06-21 01:55:49', '2016-06-21 02:43:33'),
(17, '', 'Test', 'TS', '1976-01-01', 'm', NULL, NULL, NULL, 'lb', 'in', 'testing@technosip.com', '', '', '', '', '', '', '', NULL, NULL, '$2y$10$rAPMTBklJMlVtD63gf92w.d02ptA.neY/JAR7A14DNdy6IkcHVBDO', 'diLcqc1aNaunXzb5jUN8bZxumdCdRcIoYGG4GXLe9KHDZgjQFKchKz0I0KuB', '2016-06-21 02:14:43', '2016-06-21 02:16:28'),
(18, '', 'Kartik', 'Agarwal', '1978-01-01', 'm', 90.7185, 81.6466, 180, 'lb', 'in', 'kartikagarwal.cv@gmail.com', '201-633-4050', '222 Broadway', '', 'New York', 'NY', '07302', 'US', 1, 1, '$2y$10$cksc8aHGEZiBkSb8Sfrlh.aTlQPtsZBXjqdqOYjKmryKsiLB3Aydy', '2oug8HEdaljQJ9wuyRBxYnk5U9uA5xEXBU8Z9sNJTdhM9iXXX0Q5jWf29WLe', '2016-06-21 02:15:36', '2016-06-23 09:00:35'),
(21, '', 's', 'b', '1990-01-01', 'm', 45.3592, 54.4311, 178, 'lb', 'in', 'test11@technosip.com', '111-111-1111', 'a', 'b', 'c', 'AK', '1111', 'US', 1, NULL, '$2y$10$D2RF/uyrzSNwUZJ0F/ADyeeBr7zLBGilslX.Q/.VHoGErriV66tgu', 'TqXiBuvf5etStCVGAqcmUEvbKdQrnBbOOvVWcDIG91Mqmhg4hLOLHYjrkN1L', '2016-06-21 02:53:34', '2016-06-26 11:28:38'),
(22, '', 'Ilya I IMC', 'Startsev', '1987-05-11', 'm', 150.0000, 55.0000, 185, 'kg', 'in', 'ilya@imc-mail.com', '212-343-1578', '222 Broadway', '25 Floor', 'New York', 'NY', '10038', 'US', 1, 1, '$2y$10$Dem0mua.zodEBLGy5EIGEuLZlswcfV2j5EUrg0Gluurp42FaPJzs6', NULL, '2016-06-23 04:56:40', '2016-06-23 04:58:59'),
(23, 'Indie Startsev', 'Indie', 'Startsev', '1976-01-01', 'f', NULL, NULL, NULL, 'lb', 'in', 'indigo@imc-mail.com', '', '', '', '', '', '', '', NULL, NULL, '', NULL, '2016-06-23 06:00:30', '2016-06-23 06:00:30'),
(24, '', 'Kartik', 'Agarwal', '1978-01-01', 'm', 90.7185, 81.6466, 180, 'lb', 'in', 'sbctest4@technosip.com', '2016334050', '222 Broadway', '', 'New York City', 'NY', '07302', 'US', 1, 1, '$2y$10$G.EjnfKg9GrXhpc38zzolOEj2YCTsTfjnb7cSyishZdQKeM2B1WI.', NULL, '2016-06-23 09:01:47', '2016-06-23 09:03:23'),
(25, '', 'A', 'B', '1986-01-01', 'm', 54.4311, 90.7185, 178, 'lb', 'in', 'sbctest13@technosip.com', '111-111-1111', 'A', '', 'B', 'AK', '123456', 'US', 1, 1, '$2y$10$SOZ/sKWD8KJpu4g7TSZ3Bu8s93so7o6zajJnrc.bhiEsig77gcRea', NULL, '2016-06-23 09:01:52', '2016-06-23 09:03:50'),
(26, '', 'M', 'J', '1989-01-01', 'm', 45.3592, 54.4311, 170, 'lb', 'in', 'sbctest80@technosip.com', '111-111-1111', 'j', 'j', 'j', 'AK', '11111', 'US', 1, NULL, '$2y$10$2tbGRQEU3U68.cmxJ9/Rgu.O0SK.HsCCTNOLcccH3vuNTPFg872Hi', NULL, '2016-06-23 19:15:19', '2016-06-23 19:20:47'),
(27, '', 'manik', 'khanna', '1994-01-01', 'm', 69.0000, 70.0000, 196, 'kg', 'in', 'manikkhanna68@gmail.com', '1234567896', 'dsakjhkjfads fsbfkjasdbf', 'JHKJ', 'LUDHIANA', 'AK', '46282', 'US', 1, 1, '$2y$10$NbVu7cycekOBBlvqkCli5eMynkJLxzOfJ5cauaM7f2T.gTR4euany', 'hwW3Rnuoe2L7VUNCuNtw7NHTjbt6jGADM1cqyqMn9VrtdoNoldEd3LDoK8XZ', '2016-06-25 00:57:25', '2016-06-25 09:54:13'),
(28, '', 'Navigator Stage Server', 'Stageserver', '1996-11-07', 'f', 68.0389, 61.2350, 168, 'lb', 'in', 'sbc-navigator@imc-mail.com', '212-343-1578', '222 Broadway', '', 'New York', 'NY', '10014', 'US', 1, NULL, '$2y$10$tEFEBMuLGrktL1ZNcA5pr.xtuDXJ1coMH0y.L6UIRLfKlZDkKFF42', NULL, '2016-06-25 01:07:51', '2016-06-25 01:09:47'),
(29, '', 'manik', 'khanna', '1990-01-01', 'm', NULL, NULL, NULL, 'lb', 'in', 'boypanjabi48@gmail.com', '1234567893', 'qrgeqljr rewhrb', 'jhjkh', 'ludhiana', 'AK', '46282', 'US', 1, NULL, '$2y$10$6L7KuoOFqaNRwpLEEdridufpMbfSTTo4n2xMG8D5br4AJbM1Aqp4m', NULL, '2016-06-25 10:01:29', '2016-06-25 10:03:44'),
(30, '', 'Manik', 'Khanna', '1994-06-06', 'm', 80.0000, 43.0000, 206, 'kg', 'in', 'manik.infugin@gmail.com', '1234567893', 'asdfdasf sdaf', 'fsda', 'ludhiana', 'PB', '46282', 'IN', 1, 1, '$2y$10$fwc47YYSEWTWGCVYpqS.1u8H07JrEFJRFNd6BTN5c1AwnVPs8ACE2', 'gfXhMyHRaSUkv7lJF87XEw2oLMTXO8bKoItH2SYS9bIlPgzehOLZ0J1rPBoF', '2016-06-25 22:29:22', '2016-06-25 23:10:32'),
(31, '', 'M', 'N', '1986-01-01', 'm', 45.3592, 54.4311, 170, 'lb', 'in', 'sbctest21@technosip.com', '111-111-1111', 'A', 'B', 'ABC', 'AL', '111111', 'US', 1, 1, '$2y$10$ni3sX1Vvsx9dSYr6k7oPAOBSXkKLbNsNz/gDheQCmkhFBnpQGsz/i', 'q6bExvZpXNumGGV7URYp6mYrKPWFF6Rm8WpgWbbNIqonUHbCHNv5BY2v5VS1', '2016-06-26 11:14:08', '2016-06-26 11:15:04'),
(32, '', 'M', 'J', '1976-01-01', 'm', 4.5359, 45.3592, 170, 'lb', 'in', 'sbctest77@technosip.com', '111-111-1111', 'A', 'B', 'C', 'AK', '123456', 'US', 1, 1, '$2y$10$h/JVOhulDATkgSpCkpzluOq3P2sN0MwQ99Wb8VrdFVnBNW0lMnFg6', NULL, '2016-06-27 11:48:45', '2016-06-27 11:50:03'),
(33, '', 'SBC', 'Tst', '1974-01-01', 'm', NULL, NULL, NULL, 'lb', 'in', 'sbctest177@technosip.com', '111-111-1111', 'qwr', 'qwer', 'asd', 'AK', '12345', 'US', 1, NULL, '$2y$10$obgstLU34STu8xai2MPXW.80iZMbFwitN1XpKdDvM.49j7PLcaEn6', NULL, '2016-07-18 01:59:15', '2016-07-18 02:00:38'),
(34, '', 'SBC', 'Test 445', '1959-01-01', 'm', 18.1437, 20.4117, 178, 'lb', 'in', 'sbctest12@technosip.com', '111-111-1111', 'avc', 'nj', 'j', 'AK', '1111', 'US', 1, 1, '$2y$10$GAzHi2QWRLO8v5qPnfkvB.2TbzDSOJHUp5vAN521ArYAXTUVK6Jg6', NULL, '2016-07-18 02:03:08', '2016-07-18 02:04:45'),
(35, '', 'SBC', 'Test', '1987-01-02', 'm', 45.3592, 54.4311, 173, 'lb', 'in', 'sbctest110@technosip.com', '111-111-1111', 'a', 'b', 'c', 'AK', '123456', 'US', 1, NULL, '$2y$10$KqoufDlGal9bAZu.poFfdOSkkSW.6PAc5gyluvDnD/j9iVLbX.j6y', 'gqo3wAnnljKGp6sAsVOyI3nVjNvLRCfCpjtPLecRaUo6oaiYfiNkdRPrac7p', '2016-07-19 03:17:16', '2016-07-19 03:20:02'),
(36, '', 'SBC', 'Test', '1982-01-01', 'm', NULL, NULL, NULL, 'lb', 'in', 'sbctest108@technosip.com', '111-111-1111', 'c', 'v', 'q', 'AK', '111111', 'US', 1, NULL, '$2y$10$1M4ZGILhVYQuokoN8Wc0JOtL2PKEXNmgygcozlY5PvEZiF7qMpNYq', NULL, '2016-07-19 03:21:10', '2016-07-19 03:22:02'),
(37, '', 'test', 'signup', '1990-01-01', 'm', 45.3592, 54.4311, 178, 'lb', 'in', 'sbctest212@technosip.com', '111-111-1111', 'st road', '212', 'new york', 'NY', '111111', 'US', 1, 1, '$2y$10$f.ViFr01i51pg8pH7Q/RpuL/H3LZjQuINbi9itRrlti.fMstEqxaC', NULL, '2016-09-05 13:36:26', '2016-09-05 14:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE IF NOT EXISTS `workouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `length` time NOT NULL,
  `instructions` text COLLATE utf8_unicode_ci NOT NULL,
  `day` smallint(5) unsigned DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `workouts_category_id_index` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=125 ;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`id`, `name`, `category_id`, `video`, `length`, `instructions`, `day`, `date`, `created_at`, `updated_at`) VALUES
(1, 'C-Curve Roll Down', 1, '171511395', '00:00:00', '', NULL, NULL, NULL, NULL),
(2, 'Roll Down/V Arms', 1, '171184461', '00:00:00', '', NULL, NULL, NULL, NULL),
(3, 'Roll Down/Overhead Raise ', 1, '171185813', '00:00:00', '', NULL, NULL, NULL, NULL),
(4, 'Boat Rockers', 1, '171234537', '00:00:00', '', NULL, NULL, NULL, NULL),
(5, 'Roll Down/Knee Lifts ', 1, '171234647', '00:00:00', '', NULL, NULL, NULL, NULL),
(6, 'Roll Down/Double Knee Lift', 1, '171511455', '00:00:00', '', NULL, NULL, NULL, NULL),
(7, 'Roll Down/Double Arm Sweeps ', 1, '171511509', '00:00:00', '', NULL, NULL, NULL, NULL),
(8, 'Roll Down/Single-Arm Rows', 1, '171511554', '00:00:00', '', NULL, NULL, NULL, NULL),
(9, 'Hundreds with Chair Pose', 1, '171511593', '00:00:00', '', NULL, NULL, NULL, NULL),
(10, 'Fighter Rotation', 1, '171511630', '00:00:00', '', NULL, NULL, NULL, NULL),
(11, 'Lying Chair Twist ', 1, '171511657', '00:00:00', '', NULL, NULL, NULL, NULL),
(12, 'Chair Pose Bicycle', 1, '171511673', '00:00:00', '', NULL, NULL, NULL, NULL),
(13, 'Forearm Plank Hold', 1, '171511705', '00:00:00', '', NULL, NULL, NULL, NULL),
(14, 'Side Forearm Plank', 1, '171247403', '00:00:00', '', NULL, NULL, NULL, NULL),
(15, 'Deep Work Floor Swings ', 1, '171522318', '00:00:00', '', NULL, NULL, NULL, NULL),
(16, 'Table Top Pose', 1, '171522472', '00:00:00', '', NULL, NULL, NULL, NULL),
(17, 'Heel Touch Crunch', 1, '171522535', '00:00:00', '', NULL, NULL, NULL, NULL),
(18, 'Half Hop Jacks ', 2, '171237117', '00:00:00', '', NULL, NULL, NULL, NULL),
(19, 'Parallel Squats/Knuckles Up ', 2, '171511750', '00:00:00', '', NULL, NULL, NULL, NULL),
(20, 'Side to Side Shuffle ', 2, '171511770', '00:00:00', '', NULL, NULL, NULL, NULL),
(21, 'Reach & Pull ', 2, '171511788', '00:00:00', '', NULL, NULL, NULL, NULL),
(22, 'Speed Skater', 2, '171239310', '00:00:00', '', NULL, NULL, NULL, NULL),
(23, 'Wide Step Plank Burpee', 2, '171518829', '00:00:00', '', NULL, NULL, NULL, NULL),
(24, 'Step Forward Hip Sink ', 2, '171518851', '00:00:00', '', NULL, NULL, NULL, NULL),
(25, 'Step Back Hip Sink ', 2, '171518869', '00:00:00', '', NULL, NULL, NULL, NULL),
(26, 'Step Back Lunges', 2, '171239408', '00:00:00', '', NULL, NULL, NULL, NULL),
(27, 'Cross Country Skier', 2, '171239468', '00:00:00', '', NULL, NULL, NULL, NULL),
(28, 'Step Half Jack with Punch', 2, '171239490', '00:00:00', '', NULL, NULL, NULL, NULL),
(29, 'Side Chop', 2, '171243057', '00:00:00', '', NULL, NULL, NULL, NULL),
(30, 'Mountain Climber Slow', 2, '171519011', '00:00:00', '', NULL, NULL, NULL, NULL),
(31, 'Step Back Fighter ', 2, '171246029', '00:00:00', '', NULL, NULL, NULL, NULL),
(32, 'Wide Squats', 2, '171247263', '00:00:00', '', NULL, NULL, NULL, NULL),
(33, 'Run Front to Back', 2, '171247282', '00:00:00', '', NULL, NULL, NULL, NULL),
(34, 'Step Deep Work Pulse', 2, '171247345', '00:00:00', '', NULL, NULL, NULL, NULL),
(35, 'Double Hop Jacks ', 2, '171247353', '00:00:00', '', NULL, NULL, NULL, NULL),
(36, 'Step Spider Jumps ', 2, '171247373', '00:00:00', '', NULL, NULL, NULL, NULL),
(37, '4 Corner Speed Skater Stepping', 2, '171247383', '00:00:00', '', NULL, NULL, NULL, NULL),
(38, 'Ballet Jumps 2nd to 1st ', 2, '171249233', '00:00:00', '', NULL, NULL, NULL, NULL),
(39, 'Side to Side Squats', 2, '171249251', '00:00:00', '', NULL, NULL, NULL, NULL),
(40, 'Plie/Releve 1st', 2, '171249288', '00:00:00', '', NULL, NULL, NULL, NULL),
(41, 'Step Burpee Jacks', 2, '171249322', '00:00:00', '', NULL, NULL, NULL, NULL),
(42, 'Diagonal Mountain Climbers SloMo', 2, '171249344', '00:00:00', '', NULL, NULL, NULL, NULL),
(43, 'Quick Feet', 2, '171522439', '00:00:00', '', NULL, NULL, NULL, NULL),
(44, 'Cardio Toe Tap', 2, '171522560', '00:00:00', '', NULL, NULL, NULL, NULL),
(45, 'Plank Hold', 3, '171511722', '00:00:00', '', NULL, NULL, NULL, NULL),
(46, 'Modified Plank Step Ups', 3, '171237102', '00:00:00', '', NULL, NULL, NULL, NULL),
(47, 'Plie/Releve Slow', 3, '171518902', '00:00:00', '', NULL, NULL, NULL, NULL),
(48, 'Around The World ', 3, '171243183', '00:00:00', '', NULL, NULL, NULL, NULL),
(49, 'Bridge Press', 3, '171243216', '00:00:00', '', NULL, NULL, NULL, NULL),
(50, 'Full Body Press', 3, '171518935', '00:00:00', '', NULL, NULL, NULL, NULL),
(51, 'Hip Hinge Balance', 3, '171518956', '00:00:00', '', NULL, NULL, NULL, NULL),
(52, 'Squats ', 3, '171243298', '00:00:00', '', NULL, NULL, NULL, NULL),
(53, 'Lunge & Press', 3, '171245945', '00:00:00', '', NULL, NULL, NULL, NULL),
(54, 'Modified Plank Triceps Push Ups', 3, '171245966', '00:00:00', '', NULL, NULL, NULL, NULL),
(55, 'Step Reverse Lunge', 3, '171247300', '00:00:00', '', NULL, NULL, NULL, NULL),
(56, 'Back Attitude Balance', 3, '171519044', '00:00:00', '', NULL, NULL, NULL, NULL),
(57, 'Modified Plank to Side Plank', 3, '171519052', '00:00:00', '', NULL, NULL, NULL, NULL),
(58, 'Standing Split Squat ', 3, '171249298', '00:00:00', '', NULL, NULL, NULL, NULL),
(59, '2nd to 1st Plie Pull ', 3, '171249355', '00:00:00', '', NULL, NULL, NULL, NULL),
(60, 'Sumo Squats', 3, '171249367', '00:00:00', '', NULL, NULL, NULL, NULL),
(61, 'Super Swimmers SloMo', 3, '171250226', '00:00:00', '', NULL, NULL, NULL, NULL),
(62, 'Step Squat Lunge ', 3, '171250230', '00:00:00', '', NULL, NULL, NULL, NULL),
(63, 'Curtsy Lunges Alternating', 3, '171250294', '00:00:00', '', NULL, NULL, NULL, NULL),
(64, 'Forward Lunge Steps', 3, '171250306', '00:00:00', '', NULL, NULL, NULL, NULL),
(65, 'Step Front to Back Lunge', 3, '171522330', '00:00:00', '', NULL, NULL, NULL, NULL),
(66, 'Arabesque Plank ', 3, '171522491', '00:00:00', '', NULL, NULL, NULL, NULL),
(67, '1st Position Demi Plie', 4, '171511689', '00:00:00', '', NULL, NULL, NULL, NULL),
(68, 'Both Arms Up', 4, '171518785', '00:00:00', '', NULL, NULL, NULL, NULL),
(69, 'Ankle Rolls', 4, '171239437', '00:00:00', '', NULL, NULL, NULL, NULL),
(70, 'Warm Up Squats ', 4, '171243315', '00:00:00', '', NULL, NULL, NULL, NULL),
(71, 'Step to Down Dog', 4, '171243339', '00:00:00', '', NULL, NULL, NULL, NULL),
(72, 'Split Down Dog Press ', 4, '171518978', '00:00:00', '', NULL, NULL, NULL, NULL),
(73, 'Side to Side Warm Up Lunge ', 4, '171245856', '00:00:00', '', NULL, NULL, NULL, NULL),
(74, 'Side Lunge ', 4, '171245880', '00:00:00', '', NULL, NULL, NULL, NULL),
(75, 'Squat with V-Arms', 4, '171245902', '00:00:00', '', NULL, NULL, NULL, NULL),
(76, 'Child''s Pose to Modified Plank', 4, '171245923', '00:00:00', '', NULL, NULL, NULL, NULL),
(77, '2nd Position Plie With Ballet Arms', 4, '171518991', '00:00:00', '', NULL, NULL, NULL, NULL),
(78, 'Walk to Plank', 4, '171519027', '00:00:00', '', NULL, NULL, NULL, NULL),
(79, 'Chair Pose Squats ', 4, '171249333', '00:00:00', '', NULL, NULL, NULL, NULL),
(80, 'Side Squat Triple Pulse', 4, '171250240', '00:00:00', '', NULL, NULL, NULL, NULL),
(81, 'Down Dog Sun Salutation ', 4, '171250300', '00:00:00', '', NULL, NULL, NULL, NULL),
(82, 'Arm Crosses', 4, '171522454', '00:00:00', '', NULL, NULL, NULL, NULL),
(83, 'Side Step Chest Opener', 4, '171522585', '00:00:00', '', NULL, NULL, NULL, NULL),
(84, 'Side to Side Circle Lunges', 4, '171522655', '00:00:00', '', NULL, NULL, NULL, NULL),
(85, 'Pigeon Pose', 5, '171243284', '00:00:00', '', NULL, NULL, NULL, NULL),
(86, 'Prone Quad Stretch ', 5, '171249310', '00:00:00', '', NULL, NULL, NULL, NULL),
(87, 'Seated Crossed Leg Walk Out ', 5, '171250248', '00:00:00', '', NULL, NULL, NULL, NULL),
(88, 'Seated Forward Fold ', 5, '171250261', '00:00:00', '', NULL, NULL, NULL, NULL),
(89, 'Standing Cool Down Lunges', 5, '171250272', '00:00:00', '', NULL, NULL, NULL, NULL),
(90, 'Child''s Pose to Standing ', 5, '171519070', '00:00:00', '', NULL, NULL, NULL, NULL),
(91, 'Chair Twist ', 5, '171522347', '00:00:00', '', NULL, NULL, NULL, NULL),
(92, 'Seated Rotation', 5, '171522370', '00:00:00', '', NULL, NULL, NULL, NULL),
(93, 'Side Angle Twist', 5, '171522393', '00:00:00', '', NULL, NULL, NULL, NULL),
(94, 'Bent Knee Spine Rotation ', 5, '171522517', '00:00:00', '', NULL, NULL, NULL, NULL),
(95, 'Seated Crossed Leg Side to Side Stretch', 5, '171522630', '00:00:00', '', NULL, NULL, NULL, NULL),
(96, 'Child''s Pose to Table Top to Standing ', 5, '171522690', '00:00:00', '', NULL, NULL, NULL, NULL),
(97, 'Seated Cross Legged Rotation', 5, '171522709', '00:00:00', '', NULL, NULL, NULL, NULL),
(98, 'Lying Single Leg Rotation', 5, '171522725', '00:00:00', '', NULL, NULL, NULL, NULL),
(99, 'Jumpstart Day 1', 6, '171839991', '00:00:00', 'Welcome to Day 1 of your jumpstart workouts. You’re in good hands with Basheerah. She is going to get you up and moving and remind your body how to move. This workout is short, sweet, and everything you need to just say hello to all of your muscles again.\r', 1, NULL, NULL, NULL),
(100, 'Jumpstart Day 2', 6, '171840113', '00:00:00', 'Join Kadee for another great workout as you continue to ease into a regular movement routine. This series of exercises is just enough to challenge you without shocking your system. Kadee will coach you through this quick whole body workout.\r', 2, NULL, NULL, NULL),
(101, 'Jumpstart Day 3', 6, '171840214', '00:00:00', 'Today you might be a little sore, but the best thing for you is a little blood flow with Basheerah. She is going to keep you moving with this total body workout. It’ll be just enough to warm you up and get you sweating! You are on your way to your Summer Body!', 3, NULL, NULL, NULL),
(102, 'Jumpstart Day 4', 6, '171840324', '00:00:00', 'Kadee is back to train you today with another whole body workout that is just slightly longer than the last one.  After warming you up and getting your heart rate going, she is going to take you to the floor to do some core work and a stretch.', 4, NULL, NULL, NULL),
(103, 'Jumpstart Day 5', 6, '171845020', '00:00:00', 'Basheerah is going to give you just a little more than she did before by adding in some focused core work but also some upper body and core mixed together. As in all of the Summer Body workouts, she’s also going to give you the progressions you need to be successful. ', 5, NULL, NULL, NULL),
(104, 'Bonus Workout #1', 7, '171816037', '00:00:00', '', NULL, NULL, NULL, NULL),
(105, 'Bonus Workout #2', 7, '171816088', '00:00:00', '', NULL, NULL, NULL, NULL),
(106, 'Navigator Day 8', 8, '171680401', '00:00:00', 'Join Basheerah in your first workout!  She will wake up your body by taking you through a series of moves that will begin your Summer Body Club journey. Using all of your muscle groups and no equipment at all, you can do this workout anywhere.', 8, NULL, NULL, NULL),
(107, 'Navigator Day 9', 8, '171680440', '00:00:00', 'Today you will workout with Kadee! She is going to focus on your triceps (so you can feel confident going sleeveless!) as well as some cardio drills that can help you really burn some extra calories. ', 9, NULL, NULL, NULL),
(108, 'Navigator Day 10', 8, '171680469', '00:00:00', 'Today Basheerah is going to target your core by having you do some work in a plank position as well as some seated curl down work.  Not to worry; she is throwing in some cardiovascular training as well so that you will get a full body workout.', 10, NULL, NULL, NULL),
(109, 'Navigator Day 11', 8, '171680485', '00:00:00', 'Kadee is going to give you a run for your money today by easing you into some cardio exercises that will involve your entire body. She will have you working up, down, forward and backward to help you get the results you are looking for. ', 11, NULL, NULL, NULL),
(110, 'Navigator Day 12', 8, '171680507', '00:00:00', 'You are going to do some standing core work today with Basheerah!  In addition to showing you some amazing standing rotational work, she is going to keep your heart rate elevated and then help you use your entire upper body with some plank work. ', 12, NULL, NULL, NULL),
(111, 'Bonus Workout #3', 7, '171816164', '00:00:00', '', NULL, NULL, NULL, NULL),
(112, 'Bonus Workout #4', 7, '171816225', '00:00:00', '', NULL, NULL, NULL, NULL),
(115, 'Navigator Day 15', 8, '172019282', '00:00:00', 'Hold on to your heart for this full body workout with Kadee!  Your workout today is a cardio challenge for sure, but remember that you can work in the first level of every exercise as you build up your endurance.  She’ll end your session with some core work and a stretch.', 15, NULL, NULL, NULL),
(116, 'Navigator Day 16', 8, '172011542', '00:00:00', 'Your workout today is going to take you in lots of different directions! Basheerah is going to get your entire body involved as she takes your heart rate up for some cardiovascular training.  She will have you hitting the floor as well as pressing off the floor, so stay with her while working at a level that works for you.', 16, NULL, NULL, NULL),
(117, 'Navigator Day 17', 8, '172011684', '00:00:00', 'Get ready to get balanced!  Not only is Kadee going to revisit your triceps today, but she is going to take you through some balance exercises that will really help you find your center.  Stay focused and follow her lead.', 17, NULL, NULL, NULL),
(118, 'Navigator Day 18', 8, '172011766', '00:00:00', 'Power and grace is the theme today with Basheerah.  While she is giving you a full body cardio training workout, she will also be taking you to the floor to do some upper body/core work.  You’ve got this!', 18, NULL, NULL, NULL),
(119, 'Navigator Day 19', 8, '172011860', '00:00:00', 'Kadee is back at it with some new balance exercises!  While you continue your upper body/triceps work, you will also utilize your entire core doing some single leg balance work after, of course, you do a little cardio training.  Keep it up!', 19, NULL, NULL, NULL),
(120, 'Navigator Day 22', 8, '171871226', '00:00:00', '', 22, NULL, NULL, NULL),
(121, 'Navigator Day 23', 8, '171871239', '00:00:00', '', 23, NULL, NULL, NULL),
(122, 'Navigator Day 24', 8, '171871259', '00:00:00', '', 24, NULL, NULL, NULL),
(123, 'Navigator Day 25', 8, '171870551', '00:00:00', '', 25, NULL, NULL, NULL),
(124, 'Navigator Day 26', 8, '171870575', '00:00:00', '', 26, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_recipe`
--
ALTER TABLE `food_recipe`
  ADD CONSTRAINT `food_recipe_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `food_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `ingredients_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`);

--
-- Constraints for table `ingredient_recipe`
--
ALTER TABLE `ingredient_recipe`
  ADD CONSTRAINT `ingredient_recipe_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredient_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_recipe`
--
ALTER TABLE `program_recipe`
  ADD CONSTRAINT `program_recipe_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_recipe_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_user`
--
ALTER TABLE `program_user`
  ADD CONSTRAINT `program_user_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_user`
--
ALTER TABLE `question_user`
  ADD CONSTRAINT `question_user_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `question_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `workouts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
