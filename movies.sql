-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 04:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--
CREATE DATABASE IF NOT EXISTS `movies` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `movies`;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `first_name`, `last_name`, `gender`, `nationality`, `birth_date`) VALUES
(1, 'Tony', 'Scott', 'male', 'English', '1944-06-21'),
(2, 'Ridley', 'Scott', 'male', 'English', '1937-11-30'),
(3, 'Zhao', 'Ting', 'female', 'Chinese', '1982-03-31'),
(4, 'Ava', 'DuVernay', 'female', 'American', '2972-08-24'),
(5, 'Diandrea', 'Rees', 'female', 'American', '1977-07-02'),
(6, 'Steven', 'Spielberg', 'male', 'American', '1946-12-18'),
(7, 'Francis Ford', 'Coppola', 'male', 'American', '1939-04-07'),
(9, 'Martin', 'Scorsese', 'male', 'American', '1942-11-17'),
(10, 'Spike', 'Lee', 'male', 'American', '1957-03-20'),
(11, 'Quentin', 'Tarantino', 'male', 'American', '1963-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `poster` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `description`, `poster`, `release_date`, `director_id`) VALUES
(6, 'Man on Fire', 'Former CIA SAD/SOG officer John W. Creasy visits his old friend Paul Rayburn in Mexico. Rayburn convinces him to take a bodyguard position with Samuel Ramos, a Mexico City automaker whose young daughter Lupita \"Pita\" requires a bodyguard for her kidnapping insurance policy to take effect. Struggling with alcoholism, burnout, and guilt over his actions with the CIA, Creasy tries to commit suicide but the bullet in his gun misfires. While coaching Pita to become a more confident swimmer, he bonds with her.\r\n\r\nWaiting outside Pita’s piano lesson, Creasy recognizes a car that followed them earlier, as two Federal Police officers block the street. Realizing that Pita is about to be abducted, Creasy kills four of the attackers including the officers, but is critically wounded and Pita is taken. Recovering from his injuries, Creasy is declared a suspect, but reporter Mariana Garcia Guerrero questions the story. AFI agent Miguel Manzano relocates Creasy to a veterinary clinic to protect him from corrupt police.\r\n\r\n\"The Voice,\" leader of the kidnapping ring, demands a $10 million ransom and Samuel complies, with the help of police Lt. Victor Fuentes. However, the kidnappers are ambushed at the ransom drop and the Voice’s nephew is killed. Holding the Ramoses responsible, the Voice informs them that Pita will be lost to them forever as retribution. Guerrero warns Creasy that the kidnappers belong to a powerful “brotherhood” called La Hermandad that consists of corrupt officials, police, and criminals, but Creasy promises Pita’s mother, Lisa, that he will kill everyone responsible for Pita\'s death.\r\n\r\nWith Rayburn’s help, Creasy obtains a small arsenal of weapons and equipment. He brutally interrogates and kills the getaway driver, who points him to a club where he confronts three of the kidnappers. Killing middle man \"Jersey Boy\" and another criminal, Creasy recovers an incriminating ATM card and another kidnapped girl. He turns both over to Guerrero, who reveals that Fuentes is part of the brotherhood. Manzano interviews Rayburn, who describes Creasy as an “artist of death.”\r\n\r\nGuerrero convinces Manzano to help Creasy wage war against the kidnappers. Waylaying Fuentes’ motorcade with a rocket-propelled grenade, Creasy abducts the officer, who admits that he had his officers ambush the ransom drop, but discovered afterwards most of the ransom money had already been stolen by Jordan Kalfus, Samuel\'s lawyer. After killing Fuentes with a bomb in his rectum, Creasy searches Kalfus’ home and finds his decapitated body and a fax with bank account information leading to Samuel.\r\n\r\nCreasy confronts the Ramoses, and Samuel confesses that Kalfus suggested they arrange Pita’s kidnapping to claim the insurance payout to pay his father\'s debts, though they were promised Pita would be unharmed. When Fuentes interfered with the drop, Samuel blamed Kalfus for Pita\'s death and killed him. Lisa, unaware of Samuel\'s involvement, angrily tells Creasy to kill her husband or she’ll do it herself; he leaves Samuel a gun and the bullet he attempted suicide with, and a remorseful Samuel shoots himself.\r\n\r\nGuerrero and Manzano trace the ATM card to the Voice’s wife and find her address, allowing Manzano\'s officers to infiltrate her home and obtain a photo of the Voice. Despite the brotherhood’s threats, Guerrero publishes the photo, and passes the address on to Creasy. Taking the Voice’s wife and his brother Aurelio prisoner, Creasy is shot in the chest but learns the ringleader’s real name is Daniel Sanchez. He calls Daniel and threatens his family, but Daniel reveals that Pita is alive, offering to trade her for his brother and for Creasy, which Creasy accepts.\r\n\r\nInstructing Lisa to join him at the exchange, Creasy reunites with Pita in the middle of an overpass, assuring her that he loves her before sending her to her mother. He and Aurelio are taken by Daniel’s men, but Creasy succumbs to his wounds. Manzano tracks Daniel down later that day and shoots him dead “during the course of arrest.”', 'https://cdn.chili.com/images/public/cms/46/c1/26/45/46c12645-da7d-4f6a-992b-82ff49db9e00.jpg?width=422', '2004-04-23', 1),
(8, 'American Gangster', 'In 1968, Frank Lucas is the right-hand man of Harlem mob boss Ellsworth \"Bumpy\" Johnson. When Johnson dies of a heart attack, Frank enters the heroin trade, buying directly from producers in Thailand and smuggling it into the U.S. through returning Vietnam War servicemen. Frank sells his heroin under the brand \"Blue Magic\", whose affordability and purity make it incredibly popular, eliminating much of his competition.\r\nNewark detective and aspiring lawyer Richie Roberts is ostracized in his precinct after handing in almost $1 million that he found in a mobster\'s car. After his outcasted and addicted partner overdoses on Blue Magic, Captain Lou Toback puts Roberts in charge of a special task force that targets major local drug suppliers. Roberts is also depicted having a bitter divorce battle with his ex-wife over his infidelity.\r\nFrank\'s heroin racket prospers; he eventually sells Blue Magic wholesale to many dealers in the New York Tri-State Area and expands his distribution through other criminal organisations. With this monopoly, Frank becomes Harlem\'s top crime lord, opening legitimate business fronts and maintaining a low profile, while befriending politicians and famous celebrities (such as Joe Louis). He buys a mansion for his mother and recruits his five brothers as his lieutenants. Frank eventually falls in love with and marries Eva, a Puerto Rican beauty queen. He attends the Fight of the Century with her, where Roberts spots Frank, notices he has better seats than the Italian mobsters, and begins investigating him. Frank also comes to odds with competing local gangster Nicky Barnes; corrupt NYPD detective Nick Trupo, who is among many people Frank is forced to bribe; and the Corsican mafia, who unsuccessfully attempt to assassinate Frank and his wife for putting them out of business.\r\nOne night, Roberts\' detectives witness one of Frank\'s cousins, Jimmy Zee, shoot his girlfriend; he becomes their informant in lieu of being convicted. They make Jimmy wear a wire, through which they learn that Frank has negotiated one final shipment of heroin after the fall of Saigon. They identify and search one of the last planes carrying Lucas\' stock, discovering that it is being smuggled through the coffins of dead servicemen. They follow the drugs into Newark\'s projects and obtain a warrant to raid Frank\'s heroin processing facility, which results in the arrest of Frank\'s brother Huey. They then arrest the other four brothers, and finally Frank himself.\r\nDuring a trial against Frank, Roberts offers him a chance at leniency if he will help him expose corrupt police officers, to which Frank agrees. Following Frank\'s cooperation, three-quarters of the New York DEA and many NYPD officers are arrested and convicted, while Trupo commits suicide. Roberts becomes a defense attorney and has Frank as his first client. Frank is sentenced to 70 years in prison, of which he serves 15 years and is released in 1991.', 'https://m.media-amazon.com/images/M/MV5BMjFmZGI2YTEtYmJhMS00YTE5LWJjNjAtNDI5OGY5ZDhmNTRlXkEyXkFqcGdeQXVyODAwMTU1MTE@._V1_.jpg', '2007-10-14', 2),
(9, 'The Rider', 'All of the characters are Lakota Sioux of the Pine Ridge Reservation in South Dakota.[5] Brady lives in poverty with his father Wayne and his autistic teenaged sister, Lilly. Once a rising rodeo star, Brady suffered brain damage from a rodeo accident, weakening his right hand and leaving him prone to seizures. Doctors have told him that riding will make them worse.\r\nBrady regularly visits his friend, Lane, who lives in a care facility after suffering brain damage from a similar accident. Brady\'s father does little for the family, spending their income on drinking and gambling. Once, to fund their trailer, he sells their horse, Gus, infuriating Brady.\r\nBrady takes a job in a local convenience store to raise money for the family. He also makes some money breaking in horses. With his savings, he intends to buy another horse, specifically a temperamental horse named Apollo, but his father actually buys it for him and Brady bonds with it, as he had with Gus. However, his riding and refusal to rest cause him to have a near-fatal seizure. Doctors warn him that more riding could be fatal. Upon returning home, Brady finds that his horse has had an accident, permanently injuring a leg. Knowing that the horse will never be able to be ridden ever again, and not being able to bring himself to put his own horse down, he must have his father to do it for him.\r\nAfter an argument with his father, Brady decides to take part in a rodeo competition, despite the doctors\' warnings. At the competition, just before he competes, he sees his family watching him. He finally decides to walk away from the competition and life as a rodeo rider.', 'https://fr.web.img6.acsta.net/pictures/18/02/20/14/22/3144541.jpg', '2017-03-20', 3),
(10, 'A Wrinkle in Time', 'Thirteen-year-old Meg Murry struggles to adjust at school due to bullying and depression, four years after the disappearance of her father Alex, a renowned astrophysicist. Meg and her gifted younger brother Charles Wallace are sent to the principal after Charles scolds a pair of gossiping teachers, and Meg retaliates against Veronica, Meg\'s neighbor and longtime bully. Meg and her mother Kate discover Charles with an unusual visitor, Mrs. Whatsit, who claims that the tesseract – a method of space travel Alex was studying – is real.\r\nMeg and Charles meet her classmate Calvin O\'Keefe, who joins them at the house of Mrs. Who, another strange friend of Charles who speaks only in quotations. Calvin has dinner with the Murrys, and Kate remembers Alex\'s commitment to their research despite public ridicule. In the backyard, Mrs. Whatsit and Mrs. Who appear with Mrs. Which, revealing themselves as astral travelers. Explaining that they have come to help find Alex, who has transported himself across the universe, the Misses lead Meg, Calvin, and Charles through a tesseract to the distant planet Uriel.\r\nThe planet\'s sentient flowers confirm that Alex visited Uriel, and Mrs. Whatsit transforms into a flying creature, carrying the children into the sky. Calvin nearly falls to his death after noticing a dark planet that Mrs. Which identifies as Camazotz, home to an evil energy known as \"the IT\". They tesser to the planet Orion to seek the help of a seer named Happy Medium. Mrs. Which reveals that the IT spreads negativity throughout the universe, including on Earth: Charles\' gossiping teachers were jealous of the principal\'s promotion; Veronica judges herself for her weight; the Murrys\' kindly neighbor is mugged by severely insecure teens; and Calvin\'s father is an abusive perfectionist.\r\nHappy Medium helps Meg overcome her self-doubt, and they learn that her father tessered to Uriel, then Ixchel, but was trapped on Camazotz. The Misses insist they regroup on Earth, but Meg\'s determination to save her father overrides the tesseract, unintentionally redirecting them to Camazotz. Unable to stay, as Camazotz\'s evil is stronger than their light, the Misses bestow gifts before departing: Mrs. Who gives Meg her glasses to see what is really there, Mrs. Whatsit gives Meg the knowledge of her faults, and Mrs. Which gives the children the command to never separate.\r\nA forest appears, separating Meg and Calvin from Charles, and they are pursued by a tornado-like storm. Meg uses the storm\'s own force to slingshot her and Calvin atop a cliff wall, where they reunite with Charles. They find themselves in a neighborhood of look-alike homes, children, and mothers; one woman invites them inside but Meg declines, reminding Calvin and Charles not to trust anyone. Their surroundings transform into a crowded beach, where a man introduces himself as Red, assuring them Alex is safe, and offers them food. When Charles says it tastes like sand, Red possesses him through the IT, which Red is actually a puppet of.\r\nMeg and Calvin chase after Red and Charles through the crowd, but are trapped in a seemingly empty, spherical room. Red deactivates while Charles taunts Meg and Calvin. Using Mrs. Who\'s glasses, Meg finds an invisible staircase to another room where her father is imprisoned. After a tearful reunion, they are dragged by Charles to meet his master. As Calvin and Meg fall under the IT\'s power, Alex opens a tesseract to escape with the two of them. Refusing to abandon Charles, Meg projects back to Camazotz and confronts the IT in its malevolent, neuron-like form.\r\nCharles and the IT try to force Meg to give in to darkness, menacing her with an idealized version of herself, but Meg embraces her own imperfections and uses her love for her brother to free him. The IT dissipates as the Misses reappear, congratulating Meg and Charles on becoming \"warriors of light\", and Meg tessers them home. Alex is reunited with his family, and Calvin leaves to confront his father, as Meg looks to the sky, thanking the Misses.', 'https://m.media-amazon.com/images/M/MV5BMjMxNjQ5MTI3MV5BMl5BanBnXkFtZTgwMjQ2MTAyNDM@._V1_.jpg', '2018-02-26', 4),
(11, 'The Last Thing He Wanted', 'In 1982, fiercely dedicated journalist with the Atlantic Post Elena McMahon barely escaped El Salvador with photojournalist and colleague Alma Guerrero.\r\nTwo years later, she pushes her editors to focus back on Central America, but there is no budget, the U.S. government denies involvement and the 1984 U.S. Presidential election race is heating up. Having survived breast cancer, fire fights in Central America, a bad divorce, and constant verbal sparring with U.S. government officials, Elena is passionate but ignored by her WASP editors.\r\nElena becomes increasingly divided when her absentee father reappears. Dick is stylishly dressed, foul-mouthed, and secretive (she suspects he sells contraband)- until he needs her help. She stops covering the election to care for him, as he\'s increasingly ill, showing early signs of dementia. Dick asks a favor: meet a guy in Florida to talk about the “merchandise,” drop it off and collect payment. It pays $1 million, and Dick owes half that.\r\nWith that agreement, Elena becomes an arms dealer in Dick\'s place for Central America, pulled into an increasingly escalating situation she is thoroughly unprepared for. Despite all her years reporting in Latin America and her knowledge of the shifting political dynamics of the region, and knowing her father is into some shady stuff, Elena struggles to find her way out of his mess.\r\nElena arrives in Costa Rica, where she runs into an array of characters whom she doesn\'t know who to trust. The buyer happily takes the arms, not offering the traveler’s checks she was expecting but cocaine. The pilot, insisting he knows nothing, gives her two minutes to reboard.\r\nThe plane leaves without her, Elena is driven by Jones, a sarcastic, surly person who avoids questions. On the way, as he is subtly threatening, getting his gun she forces him out. On her own, she gets to San José, buys clothes, calls Alma and gets a room.\r\nIn the U.S., Alma interviews ambassador Treat Morrison, asking what he knows of weapon supplies for the Contras. Meanwhile, at the airport to board her flight, Elena sees that the flight and her passport read Elise Meyer. Her taxi driver runs up to her with a bag, full of cocaine, but luckily it’s marked with her dad’s name, so she makes it through the control point.\r\nIn Florida, Alma can’t find Elena’s dad, and the hospital won’t give her the info. Meanwhile, Elena has flown to Antigua, and she reads an article that her dad died. Soon after, she goes to the embassy, hoping to get a new passport, but being July 4 it’s closed.\r\nDejected, Elena has a big meal in the hotel and Morrison, who she has clashed with before, mysteriously appears. Jokingly asking if it’s her last meal, then he tells how he’s been keeping tabs on her since Costa Rica. Afterwards on a walk, inexplicably she tells Morrison her whole story, then sleeps with him. In bed, Morrison seemingly confides in Elena, talking of his deceased wife’s mastectomy scars. She tells him she thought he had been sent to kill her. He says they’ll leave together the next day.\r\nA gun fight erupts the next morning, and Jones appears out of nowhere to whisk her away. She phones Alma, who tells her about Dick disappearing and later dying, then her daughter, telling her to move with her dad to Florida when he comes. Feeling there is something fishy with Jones, she lets Morrison hide her until he can get them safe passage.\r\nPaul, a wealthy American, provides cover for Elena, taking her in as a type of housekeeper, but also clearly has an ulterior motive. Bob Weir, who Dick called Epperson (his partner), shows up. The realization makes her run and find Morrison. He tells her to meet him at six so she can give him her intel before her flight home.\r\nBack to Paul’s, the house has been ransacked, he shot in the head. Again there is a shoot out, again Jones is part of it. Once the shooting stops, Elena walks away. We next see her turn to Morrison’s voice, and he guns her down. In a press conference, Morrison claims he shot her in self-defense after she shot him first in the shoulder.\r\nJones debriefs in French, speaking of the various times French intelligence had tried to keep her safe, but she wasn’t sure who to trust. Alma breaks the story of the U.S. involvement in arming the contras, as promised to Elena, the Iran–Contra affair.', 'https://i.ytimg.com/vi/oHG9NsjrAZA/maxresdefault.jpg', '2020-01-27', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`movie_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
