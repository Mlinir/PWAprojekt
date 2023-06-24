-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 24, 2023 at 09:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwaprojekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Donnie', 'Darko', 'DDark', '$2y$10$9/LWB7MQz.znh2p7XypCf.MXc0HbnLcLs4ATefNrFlU6XhMDgI2XO', 1),
(2, 'Pero', 'Peric', 'PPero', '$2y$10$UqqFIxpxxV6TucaJYB1vGO0WmNo1UwyGC/FfqS0KRV8iwyKfo71km', 0),
(3, 'test', 'test', 'Test', '$2y$10$Mog6C/MdlANh14wM1MnQT.Wp5ty.EMFq4MLMyCJvF6vJZB7FM9vtK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` varchar(255) NOT NULL,
  `tekst` varchar(255) NOT NULL,
  `kategorija` varchar(32) NOT NULL,
  `ime_slike` varchar(255) NOT NULL,
  `prikaz_obavijesti` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `sazetak`, `tekst`, `kategorija`, `ime_slike`, `prikaz_obavijesti`) VALUES
(20, 'The Impact of Artificial Intelligence on the Labor Market', 'Artificial Intelligence (AI) has emerged as a transformative technology with the potential to significantly impact the labor market. This article explores the implications of AI on employment trends, job displacement, and the skills required for the workf', 'The rapid advancement of AI technologies has raised concerns about the potential displacement of human workers across various industries. As AI systems become more sophisticated, they are increasingly capable of automating routine and repetitive tasks, wh', 'sport', 'Rectangle-Posts-1-1080x675.png', 'DA'),
(22, 'The Ethical Considerations of Genetic Engineering', 'Genetic engineering holds immense potential for advancements in medicine and agriculture, but it also raises important ethical concerns. This article explores the ethical implications of genetic engineering, including issues related to human enhancement, ', 'The ability to modify the genetic makeup of living organisms, including humans, raises complex ethical questions. One of the main concerns is the concept of human enhancement, where genetic engineering is used to enhance physical or cognitive traits beyon', 'sport', '1.3.3.3.3_Ethical_Concerns_Gene_Editing.jpg', 'DA'),
(23, 'The Future of Renewable Energy: Opportunities and Challenges', 'Renewable energy sources, such as solar, wind, and hydroelectric power, hold tremendous potential for a sustainable future. However, their widespread adoption faces both opportunities and challenges. This article explores the key opportunities and challen', 'One of the significant opportunities in the future of renewable energy lies in the potential for clean and abundant power generation. Renewable energy sources are naturally replenished and do not produce harmful greenhouse gas emissions, making them vital', 'sport', 'Electricity from renewable sources.png', 'DA'),
(24, 'The Impact of Social Media on Mental Health', 'The rise of social media platforms has revolutionized communication and connectivity, but it has also had a significant impact on mental health. This article explores the effects of social media on mental well-being, including issues of comparison, cyberb', 'Cyberbullying has become a distressing issue amplified by social media platforms. The anonymity and wide reach of social media enable bullies to target individuals relentlessly, leading to severe emotional distress and even suicidal ideation. The 24/7 nat', 'sport', 'social-media-and-mental-health-Main.jpg', 'DA'),
(25, 'The Pros and Cons of Remote Work', 'Remote work has become increasingly prevalent, especially in the wake of the COVID-19 pandemic. This article examines the advantages and disadvantages of remote work, including benefits such as flexibility and increased productivity, as well as challenges', 'One of the significant advantages of remote work is the flexibility it offers to employees. Remote work eliminates the need for a daily commute, allowing individuals to save time and reduce stress. It also provides the opportunity for a better work-life b', 'kultura', 'social-media-and-mental-health-Main.jpg', 'DA'),
(26, 'The Role of Artificial Intelligence in Healthcare', 'Artificial Intelligence (AI) has the potential to revolutionize the healthcare industry, impacting areas such as diagnostics, treatment, and patient care. This article explores the role of AI in healthcare, discussing its benefits in enhancing efficiency,', 'AI technologies offer significant advantages in healthcare by improving efficiency and accuracy in diagnostics. Machine learning algorithms can analyze vast amounts of medical data and assist in the interpretation of medical images, such as X-rays and MRI', 'kultura', 'artificial-intelligence-in-healthcare.png', 'DA'),
(27, 'The Implications of Blockchain Technology on Supply Chain Management', 'Blockchain technology has the potential to revolutionize supply chain management by increasing transparency, efficiency, and trust throughout the entire supply chain. This article explores the implications of blockchain in supply chain management, includi', 'One of the significant advantages of blockchain technology in supply chain management is enhanced traceability. With blockchain, every transaction and movement of goods can be recorded and verified in a decentralized and immutable ledger. This transparenc', 'kultura', 'implementation-of-blockchain-in-supply-chain-1.png', 'DA'),
(28, 'The Future of Autonomous Vehicles: Opportunities and Challenges', 'Autonomous vehicles have the potential to revolutionize transportation by offering increased safety, efficiency, and convenience. This article explores the opportunities and challenges associated with the future of autonomous vehicles, including benefits ', 'One of the significant opportunities presented by autonomous vehicles is the potential to greatly enhance road safety. Human error is a leading cause of accidents, and autonomous vehicles have the potential to minimize or eliminate such errors through adv', 'kultura', 'download.jfif', 'DA'),
(31, 'Abschied von Klinsman Junior vom Berliner Fußballverein\r\n', 'Klinsman Junior (22) verlässt den Berliner Fußballverein nach drei erfolgreichen Spielzeiten.\r\n\r\n', 'Nach drei erfolgreichen Spielzeiten verlässt der 22-jährige Fußballstar Klinsman Junior den Berliner Fußballverein. Diese Nachricht hat bei den Fans gemischte Gefühle ausgelöst, während sie auf seine bemerkenswerten Beiträge zum Team zurückblicken.\r\n\r\nWäh', 'sport', '1_1.jpg', 'NE'),
(32, 'Neuer Weltrekord im Hochsprung\r\n', 'Die deutsche Athletin Anna Müller hat einen neuen Weltrekord aufgestellt.\r\n\r\n\r\n', 'Die deutsche Athletin Anna Müller hat einen neuen Weltrekord im Hochsprung aufgestellt.\r\n\r\nMit einer beeindruckenden Leistung überwand sie eine Höhe von 2,10 Metern und brach damit den vorherigen Rekord.\r\n\r\nDieser Erfolg stellt einen Meilenstein in ihrer ', 'sport', '1_2.jpg', 'NE'),
(33, 'Tennis-Turnier in Berlin\r\n', 'Das jährliche Tennis-Turnier in Berlin findet vom 15. bis 20. Juli statt.\r\n\r\n\r\n\r\n', 'Das jährliche Tennis-Turnier in Berlin steht wieder bevor.\r\n\r\nVom 15. bis 20. Juli werden die besten Tennisspielerinnen und Tennisspieler aus aller Welt in Berlin gegeneinander antreten.\r\n\r\nDas Turnier verspricht spannende Matches, hochklassige Spiele und', 'sport', '1_3.jpg', 'NE'),
(34, 'Konzertankündigung: Weltbekannte Band in Berlin\r\n', 'Eine der bekanntesten Bands der Welt gibt ein Live-Konzert in Berlin.\r\n\r\n', 'Eine der bekanntesten Bands der Welt wird ein spektakuläres Live-Konzert in Berlin geben.\r\n\r\nFreuen Sie sich auf eine unvergessliche musikalische Erfahrung, wenn die Band mit ihren größten Hits und neuen Songs die Bühne rockt.\r\n\r\nDas Konzert verspricht ei', 'kultura', '2_1.jfif', 'NE'),
(35, 'Theateraufführung: Klassisches Drama\r\n', 'Eine beeindruckende Theateraufführung eines klassischen Dramas findet statt.\r\n\r\n', 'Erleben Sie eine beeindruckende Theateraufführung eines zeitlosen klassischen Dramas.\r\n\r\nTauchen Sie ein in die fesselnde Welt der Schauspielkunst und lassen Sie sich von den talentierten Darstellern in eine andere Zeit und einen anderen Ort entführen.\r\n\r', 'kultura', '2_2.jfif', 'NE'),
(36, 'Kunstausstellung: Moderne Kunst\r\n', 'Eine neue Kunstausstellung mit Werken zeitgenössischer Künstler eröffnet bald.\r\n\r\n', 'Freuen Sie sich auf eine neue Kunstausstellung, die bald eröffnet wird.\r\n\r\nDie Ausstellung präsentiert Werke zeitgenössischer Künstler, die die Vielfalt und Kreativität der modernen Kunstszene repräsentieren.\r\n\r\nTauchen Sie ein in eine Welt voller künstle', 'kultura', '2_3.avif', 'NE'),
(37, 'The Impact of Technology on Sports Revolutionizing the Way We Play', 'Technology has transformed the world of sports, revolutionizing the way athletes compete and fans engage with their favorite games. From advanced equipment and training tools to immersive viewing experiences, technology has significantly enhanced the over', 'The integration of technology into sports has had a profound impact on athlete performance and training. Cutting-edge equipment, such as wearable devices and smart fabrics, allow athletes to monitor their biometric data in real-time, enabling them to opti', 'sport', 'The-Impact-of-Technology_648eb2cdf0d1e.jpeg', 'DA'),
(38, 'The Rise of E-Sports: A Digital Revolution in Competitive Gaming', 'E-sports, a rapidly growing category within the sports industry, has transformed competitive gaming into a global phenomenon. With the convergence of technology and gaming, professional e-sports leagues, online tournaments, and dedicated streaming platfor', 'E-sports, or electronic sports, has revolutionized the concept of sports by bringing competitive gaming to the forefront. Professional e-sports athletes, equipped with specialized gaming hardware and sophisticated gaming rigs, compete in popular titles su', 'sport', 'ella-don-LBQdL30Ywuw-unsplash-edited-scaled.jpg', 'DA'),
(39, 'The Role of Sports in Promoting Physical and Mental Well-being\r\n', 'Sports play a crucial role in promoting both physical and mental well-being, offering a range of benefits such as improved physical fitness, stress reduction, social interaction, and enhanced cognitive function. Whether through organized team sports or in', 'Participating in sports is an excellent way to maintain and improve physical fitness. Engaging in regular physical activity through sports helps build strength, endurance, and flexibility, contributing to better cardiovascular health, weight management, a', 'sport', 'featured-image.png', 'DA'),
(42, 'Exploring the Rich Cultural Heritage of Germany: Traditions, Arts, and Historical Significance\r\n\r\n', 'German culture is a tapestry woven with a rich history, diverse traditions, and significant contributions to the arts. From its world-renowned classical music and literature to its annual festivals and culinary delights, Germanys cultural landscape showca', 'German culture is deeply rooted in its historical and artistic heritage. With a history that spans centuries, Germany has been the birthplace of influential figures in literature, philosophy, and music. From Johann Wolfgang von Goethe and Friedrich Nietzs', 'kultura', 'german-traditional-architecture.jpg', 'DA'),
(43, 'Unveiling the Cultural Kaleidoscope of Berlin: Diversity, Creativity, and Historical Significance\r\n\r\n', 'The city of Berlin embodies a vibrant cultural landscape that reflects its tumultuous history, artistic creativity, and multicultural influences. From its iconic landmarks and museums to its thriving arts scene and diverse neighborhoods, Berlins cultural ', 'Berlins cultural scene is steeped in its rich history, serving as a testament to the citys resilience and transformation. The remnants of the Berlin Wall stand as powerful reminders of the citys divided past and the unification that followed. Museums like', 'kultura', 'download (1).jfif', 'DA'),
(44, 'Oktoberfest: Celebrating Bavarian Culture, Beer, and Traditions in Munich', 'Oktoberfest, the world-renowned beer festival held annually in Munich, Germany, is a grand celebration of Bavarian culture, filled with traditional music, dance, cuisine, and, of course, beer. It attracts millions of visitors from around the globe, offeri', 'Oktoberfest is deeply rooted in Bavarian traditions and has evolved into a global phenomenon. The festival originated in 1810 as a royal wedding celebration and gradually expanded to become a showcase of Bavarian culture. Every year, the Theresienwiese fa', 'kultura', 'iStock-157505356-1024x674.jpg', 'DA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
