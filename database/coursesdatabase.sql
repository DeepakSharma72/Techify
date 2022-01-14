-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 01:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursesdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `course` int(11) NOT NULL,
  primary key(`category_id`)
);

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `course`) VALUES
(1, 'Machine Learning', 0),
(2, 'Web Development', 0),
(3, 'App development', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itcourses`
--

CREATE TABLE itcourses (
  Course_id int auto_increment ,
  Course_Name varchar(100) NOT NULL,
  Description varchar(2000) NOT NULL,
  Time int(11) NOT NULL,
  Duration int(11) NOT NULL,
  Modules int(11) NOT NULL,
  Price int(11) NOT NULL,
  Category int(5) NOT NULL,
  Complexity varchar(20) NOT NULL,
  course_img varchar(50) NOT NULL,
  Medium varchar(50) NOT NULL,
  Learning varchar(1500) NOT NULL,
  Requirement varchar(500) NOT NULL,
  ins_id int not null,
  primary key(`Course_id`)
);
INSERT INTO itcourses (Course_Name, Description, Time, Duration, Modules, Price, Category, Complexity, course_img, Medium,Learning,Requirement,ins_id) VALUES
('The Web Developer Bootcamp 2021', 'The only course you need to learn web development - HTML, CSS, JS, Node, and More!', 3, 6, 15, 499, 2, 'Medium', 'course1.png', 'English', ' •	Skills that will allow you to apply for jobs like: Web Developer, Software Developer, Front End Developer, Javascript Developer, and Full Stack Developer\n•	Learn modern technologies that are ACTUALLY being used behind tech companies in 2022\n•	Build 10+ real world Web Development projects you can show off\n•	Build a professional Portfolio Website\n•	Learn best practices to write clean, performant, and bug free code\n•	Master modern Web Development fundamentals as well as advanced topics\n•	Work as a freelance Web Developer\n•	Master beginner and advanced JavaScript topics\n•	Learn React + Redux to build rich front end applications\n•	Build your own full stack websites and applications\n•	Build a complex image recognition app using everything we learn in the course\n•	Become a professional Web Developer and get hired\n•	Use NodeJS to write server-side JavaScript\n•	Learn to implement user authentication\n•	Use Express, SQL and PostgreSQL to create fullstack applications that scale\n•	Master fundamental concepts in Web Development\n', '•	No programming experience needed - I\'ll teach you everything you need to know •	A computer with access to the internet •	No paid software required •	I\'ll walk you through, step-by-step how to get all the software installed and set up',1),
('Angular - The Complete Guide (2021 Edition)', 'Master Angular 13 (formerly \"Angular 2\") and build awesome, reactive web apps with the successor of Angular.js', 3, 6, 16, 3000, 2, 'High', 'course2.png', 'English', '•	Become an advanced, confident, and modern JavaScript developer from scratch\n•	Build 6 beautiful real-world projects for your portfolio (not boring toy apps)\n•	Become job-ready by understanding how JavaScript really works behind the scenes\n•	How to think and work like a developer: problem-solving, researching, workflows\n•	JavaScript fundamentals: variables, if/else, operators, boolean logic, functions, arrays, objects, loops, strings, etc.\n•	Modern ES6+ from the beginning: arrow functions, destructuring, spread operator, optional chaining (ES2020), etc.\n•	Modern OOP: Classes, constructors, prototypal inheritance, encapsulation, etc.\n•	Complex concepts like the \'this\' keyword, higher-order functions, closures, etc.\n', '•	No programming experience needed - I\'ll teach you everything you need to know •	A computer with access to the internet •	No paid software required •	I\'ll walk you through, step-by-step how to get all the software installed and set up',2),
('The Complete JavaScript Course 2021: From Zero to Expert!', 'The modern JavaScript course for everyone! Master JavaScript with projects, challenges and theory. Many courses in one!', 4, 5, 14, 999, 2, 'Low', 'course3.png', 'Hindi', '•	Develop modern, complex, responsive and scalable web applications with Angular 13\n•	Fully understand the architecture behind an Angular application and how to use it\n•	Use the gained, deep understanding of the Angular fundamentals to quickly establish yourself as a frontend developer\n•	Create single-page applications with one of the most modern JavaScript frameworks out there\n', '•	No programming experience needed - I\'ll teach you everything you need to know •	A computer with access to the internet •	No paid software required •	I\'ll walk you through, step-by-step how to get all the software installed and set up',3),
('Python and Django Full Stack Web Developer Bootcamp', 'Learn to build websites with HTML , CSS , Bootstrap , Javascript , jQuery , Python 3 , and Django!', 3, 6, 17, 3000, 2, 'Medium', 'course4.png', 'French', '•	Asynchronous JavaScript: Event loop, promises, async/await, AJAX calls and APIs •	How to architect your code using flowcharts and common patterns •	Modern tools for 2021 and beyond: NPM, Parcel, Babel and ES6 modules •	Practice your skills with 50+ challenges and assignments (solutions included) •	Get friendly support in the Q&A area •	Design your unique learning path according to your goals: course pathways', 'A computer (Windows/Mac/Linux). That\'s it! No previous coding experience is needed All tools and software used in this course will be free Prepare to learn real life skills and build real web apps that will get you hired!',4),
('Modern JavaScript From The Beginning', 'Modular learning sections & 10 real world projects with pure JavaScript\r\nMaster the DOM (document object model) WITHOUT jQuery\r\nAsynchronous programming with Ajax, Fetch API, Promises & Async / Await', 2, 6, 15, 1999, 2, 'High', 'course5.png', 'English', '•	Build websites and webapps •	Build HTML-based mobile apps •	Get a job as a junior web developer •	Bid for projects on freelance websites •	Start their own online business •	Be a comfortable front-end developer •	Be proficient with databases and server-side languages', 'A computer (Windows/Mac/Linux). That\'s it! No previous coding experience is needed All tools and software used in this course will be free Prepare to learn real life skills and build real web apps that will get you hired!',1),
('Full-Stack Web Development with React', 'The first two courses in this Specialization cover front-end frameworks: Bootstrap 4 and React. On the server side, you’ll learn to implement NoSQL databases using MongoDB, work within a Node.js environment and Express framework, and communicate to the client side through a RESTful API. Learners enrolling in this Specialization are expected to have prior working knowledge of HTML, CSS and JavaScript.', 2, 7, 18, 1990, 2, 'High', 'course6.png', 'English', '•	Become a modern and confident HTML and CSS developer, no prior knowledge needed! •	Design and build a stunning real-world project for your portfolio from scratch •	Modern, semantic and accessible HTML5 •	Modern CSS (previous CSS3), including flexbox and CSS Grid for layout •	Important CSS concepts such as the box model, positioning schemes, inheritance, solving selector conflicts, etc. •	A web design framework with easy-to-use rules and guidelines to design eye-catching websites', 'A computer (Windows/Mac/Linux). That\'s it! No previous coding experience is needed All tools and software used in this course will be free Prepare to learn real life skills and build real web apps that will get you hired!',2),
('Full Stack Web Development with Angular', 'The first two courses in this Specialization cover front-end frameworks: Bootstrap 4 and Angular. On the server side, you’ll learn to implement NoSQL databases using MongoDB, work within a Node.js environment and Express framework, and communicate to the client side through a RESTful API. Learners enrolling in this Specialization are expected to have prior working knowledge of HTML, CSS and JavaScript.', 3, 8, 19, 2000, 2, 'Low', 'course7.png', 'French', '•	How to plan, sketch, design, build, test, and optimize a professional website •	How to make websites work on every possible mobile device (responsive design) •	How to use common components and layout patterns for professional website design and development •	Developer skills such as reading documentation, debugging, and using professional tools •	How to find and use free design assets such as images, fonts, and icons •	Practice your skills with 10+ challenges (solutions included)', 'Some programming experience # Admin permissions to download files',3),
('Use WordPress to Create a Blog for your Business', 'By the end of this project, you will create a blog site with a home page and initial blog post using a free content management system, WordPress. You will be able to create a business blog with the look and feel of a website complete with options for e-commerce plugins.  You’ll have a virtual space to showcase your business with customers who want to stay connected.', 2, 5, 14, 999, 2, 'Medium', 'course8.png', 'English', '•	How the web works and how to get started as a web developer •	Learn web development in 100 days (optional - you can also pick a different pace) •	Build websites, web apps and web services (and understand what these \"things\" are) •	Build frontend user interfaces with HTML, CSS & JavaScript •	Build backend processes with NodeJS, Express & SQL + NoSQL databases •	Add advanced features like user authentication, file upload or database queries to websites', '•	No programming experience needed - I\'ll teach you everything you need to know •	A computer with access to the internet •	No paid software required •	I\'ll walk you through, step-by-step how to get all the software installed and set up',4),
('HTML and CSS for Beginners - Build a Website & Launch ONLINE', 'HTML and CSS for Beginners course will give your all the knowledge you need to master HTML and CSS easily and quickly.', 3, 4, 12, 888, 2, 'Low', 'course9.png', 'Hindi', '•	Build amazing single page applications with React JS and Redux •	Master fundamental concepts behind structuring Redux applications •	Realize the power of building composable components •	Be the engineer who explains how Redux works to everyone else, because you know the fundamentals so well •	Become fluent in the toolchain supporting React, including NPM, Webpack, Babel, and ES6/ES2015 Javascript syntax', 'A computer (Windows/Mac/Linux). That\'s it! No previous coding experience is needed All tools and software used in this course will be free Prepare to learn real life skills and build real web apps that will get you hired!',1),
('100 Days Of Code: The Complete Web Development Bootcamp 2022', 'Learn web development from A to Z in 100 days (or at your own pace) - from \"basic\" to \"advanced\", it\'s all included!', 5, 8, 20, 4999, 2, 'High', 'course10.png', 'French', '•	Build websites and webapps •	Build HTML-based mobile apps •	Get a job as a junior web developer •	Bid for projects on freelance websites •	Start their own online business •	Be a comfortable front-end developer •	Be proficient with databases and server-side language', '•	No programming experience needed - I\'ll teach you everything you need to know •	A computer with access to the internet •	No paid software required •	I\'ll walk you through, step-by-step how to get all the software installed and set up',2),
('2021 Python for Machine Learning & Data Science Masterclass', 'Learn about Data Science and Machine Learning with Python! Including Numpy, Pandas, Matplotlib, Scikit-Learn and more!', 3, 7, 16, 999, 1, 'Medium', 'courseML.jpg', 'Hindi', '•	Master Machine Learning on Python & R •	Have a great intuition of many Machine Learning models •	Make accurate predictions •	Make powerful analysis •	Make robust Machine Learning models •	Create strong added value to your business •	Use Machine Learning for personal purpose •	Handle specific topics like Reinforcement Learning, NLP and Deep Learning', 'Just some high school mathematics level.',3),
('Learn Machine Learning & Data Science With Python Bootcamp', 'Learn Machine learning and data science with python and solve real world machine learning problems', 4, 7, 18, 1600, 1, 'High', 'download.jpg', 'English', '•	Handle advanced techniques like Dimensionality Reduction •	Know which Machine Learning model to choose for each type of problem •	Build an army of powerful Machine Learning models and know how to combine them to solve any problem', 'A computer (Windows/Mac/Linux). That\'s it! No previous coding experience is needed All tools and software used in this course will be free Prepare to learn real life skills and build real web apps that will get you hired!',4),
('Android App Development', 'This Specialization enables learners to successfully apply core Java programming languages features & software patterns needed to develop maintainable mobile apps comprised of core Android components, as well as fundamental Java I/O & persistence mechanisms. ', 3, 6, 15, 1400, 3, 'Medium', 'app.png', 'English', '•	You’re taught step by step HOW to build Android 7 apps for Google’s Nougat platform that will work on older Android versions. •	With each comprehensive step, the WHY you’re doing it is explained. •	You’ll have EXPERT LEVEL knowledge of the Java programming language and know exactly how each process of Android Nougat development works. •	The course is continually UPDATED, so you’ll learn the very latest as Android Nougat evolves.', '•	You’re taught step by step HOW to build Android 7 apps for Google’s Nougat platform that will work on older Android versions. •	With each comprehensive step, the WHY you’re doing it is explained. •	You’ll have EXPERT LEVEL knowledge of the Java programming language and know exactly how each process of Android Nougat development works. •	The course is continually UPDATED, so you’ll learn the very latest as Android Nougat evolves.',1),
('iOS App Development with Swift\r\n', 'This Specialization covers the fundamentals of iOS application development in the Swift programming language. You’ll learn to use development tools such as XCode, design interfaces and interactions and evaluate their usability, and integrate camera, photo, and location information to enhance your app', 2, 5, 10, 999, 3, 'Low', 'app1.jpg', 'English', '•	NEW CONTENT is always being added, and you\'re covered with full lifetime access to the course. •	SUPPORT is mind blowing – questions you have are answered that day. •	The EXPERTISE to be an Android Nougat app developer as taught by the best. •	The skills you’ll learn are in HIGH DEMAND. You’ve learned to program like an expert. Go get that job!', '•	You’re taught step by step HOW to build Android 7 apps for Google’s Nougat platform that will work on older Android versions. •	With each comprehensive step, the WHY you’re doing it is explained. •	',2),
('Getting Started With Application Development', 'In this course, application developers learn how to design and develop cloud-native applications that seamlessly integrate managed services from Google Cloud. Participants learn how to apply best practices for application development and use the appropriate Google Cloud storage services for object storage, relational data, caching, and analytics.', 5, 7, 18, 1500, 3, 'High', 'app2.jpg', 'English', '•	You’re taught step by step HOW to build Android 7 apps for Google’s Nougat platform that will work on older Android versions. •	With each comprehensive step, the WHY you’re doing it is explained. •	You’ll have EXPERT LEVEL knowledge of the Java programming language and know exactly how each process of Android Nougat development works. •	The course is continually UPDATED, so you’ll learn the very latest as Android Nougat evolves.', 'A computer (Windows/Mac/Linux). That\'s it! No previous coding experience is needed All tools and software used in this course will be free Prepare to learn real life skills and build real web apps that will get you hired!',3);


create table crspurchased(
sid int not null,
crsid int not null,
ttime datetime not null,
transid varchar(20) not null,
feedback varchar(200),
rating int default(5) 
);


--
-- Dumping data for table `itcourses`
--

-- INSERT INTO `itcourses` (`Course_id`, `Course_Name`, `Description`, `Time`, `Duration`, `Modules`, `Price`, `Category`, `Complexity`, `course_img`, `Medium`, `Learning`, `Requirement`) VALUES
-- ('101', 'The Web Developer Bootcamp 2021', 'The only course you need to learn web development - HTML, CSS, JS, Node, and More!', 3, 6, 15, 499, 7, 'Medium', 'course1.png', 'English,French', '•	Learn modern technologies that are ACTUALLY being used behind tech companies in 2022 •	Build 10+ real world Web Development projects you can show off •	Build a professional Portfolio Website •	Learn best practices to write clean, performant, and bug free code •	Master modern Web Development fundamentals as well as advanced topics •	Work as a freelance Web Developer •	Master beginner and advanced JavaScript topics •	Learn React + Redux to build rich front end applications •	Build your own full stack websites and applications', ''),
-- ('102', 'Angular - The Complete Guide (2021 Edition)', 'Master Angular 13 (formerly \"Angular 2\") and build awesome, reactive web apps with the successor of Angular.js', 3, 6, 16, 3000, 7, 'High', 'course2.png', 'German,English', '', '');
-- ('103', 'The Complete JavaScript Course 2021: From Zero to Expert!', 'The modern JavaScript course for everyone! Master JavaScript with projects, challenges and theory. Many courses in one!', 4, 5, 14, 999, 7, 'Beginner', 'course3.png', 'English,Hindi', '', ''),
-- ('104', 'Python and Django Full Stack Web Developer Bootcamp', 'Learn to build websites with HTML , CSS , Bootstrap , Javascript , jQuery , Python 3 , and Django!', 3, 6, 17, 3000, 7, 'Medium', 'course4.png', 'French,Spanish,English', '', ''),
-- ('105', 'Modern JavaScript From The Beginning', 'Modular learning sections & 10 real world projects with pure JavaScript\r\nMaster the DOM (document object model) WITHOUT jQuery\r\nAsynchronous programming with Ajax, Fetch API, Promises & Async / Await', 2, 6, 15, 1999, 7, 'High', 'course5.png', 'English', '', ''),
-- ('106', 'Full-Stack Web Development with React', 'The first two courses in this Specialization cover front-end frameworks: Bootstrap 4 and React. On the server side, you’ll learn to implement NoSQL databases using MongoDB, work within a Node.js environment and Express framework, and communicate to the client side through a RESTful API. Learners enrolling in this Specialization are expected to have prior working knowledge of HTML, CSS and JavaScript.', 2, 7, 18, 1990, 7, 'High', 'course6.png', 'Spanish,English', '', ''),
-- ('107', 'Full Stack Web Development with Angular', 'The first two courses in this Specialization cover front-end frameworks: Bootstrap 4 and Angular. On the server side, you’ll learn to implement NoSQL databases using MongoDB, work within a Node.js environment and Express framework, and communicate to the client side through a RESTful API. Learners enrolling in this Specialization are expected to have prior working knowledge of HTML, CSS and JavaScript.', 3, 8, 19, 2000, 7, 'Beginner', 'course7.png', 'French,Spanish', '', ''),
-- ('108', 'Use WordPress to Create a Blog for your Business', 'By the end of this project, you will create a blog site with a home page and initial blog post using a free content management system, WordPress. You will be able to create a business blog with the look and feel of a website complete with options for e-commerce plugins.  You’ll have a virtual space to showcase your business with customers who want to stay connected.', 2, 5, 14, 999, 7, 'Medium', 'course8.png', 'English', '', ''),
-- ('109', 'HTML and CSS for Beginners - Build a Website & Launch ONLINE', 'HTML and CSS for Beginners course will give your all the knowledge you need to master HTML and CSS easily and quickly.', 3, 4, 12, 888, 7, 'Beginner', 'course9.png', 'English,Hindi', '', ''),
-- ('110', '100 Days Of Code: The Complete Web Development Bootcamp 2022', 'Learn web development from A to Z in 100 days (or at your own pace) - from \"basic\" to \"advanced\", it\'s all included!', 5, 8, 20, 4999, 7, 'High', 'course10.png', 'French,Spanish', '', ''),
-- ('111', '2021 Python for Machine Learning & Data Science Masterclass', 'Learn about Data Science and Machine Learning with Python! Including Numpy, Pandas, Matplotlib, Scikit-Learn and more!', 3, 7, 16, 999, 6, 'Medium', 'courseML.jpg', 'Hindi', '', ''),
-- ('112', 'Learn Machine Learning & Data Science With Python Bootcamp', 'Learn Machine learning and data science with python and solve real world machine learning problems', 4, 7, 18, 1600, 6, 'High', 'download.jpg', 'German', '', ''),
-- ('113', 'Android App Development', 'This Specialization enables learners to successfully apply core Java programming languages features & software patterns needed to develop maintainable mobile apps comprised of core Android components, as well as fundamental Java I/O & persistence mechanisms. ', 3, 6, 15, 1400, 8, 'Medium', 'app.png', 'Korean,English', '', ''),
-- ('114', 'iOS App Development with Swift\r\n', 'This Specialization covers the fundamentals of iOS application development in the Swift programming language. You’ll learn to use development tools such as XCode, design interfaces and interactions and evaluate their usability, and integrate camera, photo, and location information to enhance your app', 2, 5, 10, 999, 8, 'Low', 'app1.jpg', 'Spanish,English', '', ''),
-- ('115', 'Getting Started With Application Development', 'In this course, application developers learn how to design and develop cloud-native applications that seamlessly integrate managed services from Google Cloud. Participants learn how to apply best practices for application development and use the appropriate Google Cloud storage services for object storage, relational data, caching, and analytics.', 5, 7, 18, 1500, 8, 'High', 'app2.jpg', 'English', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `itcourses`
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
