-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "banner_slice" ---------------------------------
CREATE TABLE `banner_slice`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`firstContent` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`img_path` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`secondContent` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "booking" --------------------------------------
CREATE TABLE `booking`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`customer_name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone_number` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`arrival` DateTime NOT NULL,
	`departure` DateTime NOT NULL,
	`adult` Int( 0 ) NOT NULL,
	`children` Int( 0 ) NOT NULL,
	`room_types` Int( 0 ) NOT NULL,
	`messages` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	`created_date` Timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`checked_in` Int( 0 ) NULL,
	`checked_in_date` DateTime NULL,
	`reply_by` Int( 0 ) NULL,
	`reply_messages` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`rooms` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`beds` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`price` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "contacts" -------------------------------------
CREATE TABLE `contacts`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`phone_number` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`subject` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`messages` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	`reply_by` Int( 0 ) NULL,
	`reply_for` Int( 0 ) NULL,
	`created_at` Timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`reply_messages` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------


-- CREATE TABLE "customer_feedbacks" ---------------------------
CREATE TABLE `customer_feedbacks`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`address` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`avatar` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`content` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	`active` Int( 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- -------------------------------------------------------------


-- CREATE TABLE "news" -----------------------------------------
CREATE TABLE `news`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`feature_image` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`news_content` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`author_id` Int( 0 ) NOT NULL,
	`created_at` Timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------


-- CREATE TABLE "roles" ----------------------------------------
CREATE TABLE `roles`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 3;
-- -------------------------------------------------------------


-- CREATE TABLE "room_galleries" -------------------------------
CREATE TABLE `room_galleries`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`room_id` Int( 0 ) NOT NULL,
	`img_url` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------


-- CREATE TABLE "room_service_xref" ----------------------------
CREATE TABLE `room_service_xref`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`room_id` Int( 0 ) NOT NULL,
	`services_id` Int( 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 26;
-- -------------------------------------------------------------


-- CREATE TABLE "room_services" --------------------------------
CREATE TABLE `room_services`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	`icon` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 10;
-- -------------------------------------------------------------


-- CREATE TABLE "room_types" -----------------------------------
CREATE TABLE `room_types`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	`price` Int( 0 ) NOT NULL,
	`quantity` Int( 0 ) NOT NULL,
	`feature_image` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`short_descript` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`adult` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`children` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 10;
-- -------------------------------------------------------------


-- CREATE TABLE "services" -------------------------------------
CREATE TABLE `services`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`feature_img` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`introduce` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	`idName` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`active` Int( 0 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 8;
-- -------------------------------------------------------------


-- CREATE TABLE "showcases" ------------------------------------
CREATE TABLE `showcases`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`status` Int( 0 ) NOT NULL,
	`img_path` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------


-- CREATE TABLE "users" ----------------------------------------
CREATE TABLE `users`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`role_id` Int( 0 ) NOT NULL,
	`phone_number` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`avatar` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 9;
-- -------------------------------------------------------------


-- CREATE TABLE "web_settings" ---------------------------------
CREATE TABLE `web_settings`( 
	`id` Int( 0 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`status` Int( 0 ) NULL,
	`logo` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`phone_number` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`address` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`map_url` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`youtube_url` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`facebook_url` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
	`explore_url` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`offer` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`introduce_welcome` Text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	`instagram_url` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- Dump data of "banner_slice" -----------------------------
INSERT INTO `banner_slice`(`id`,`firstContent`,`img_path`,`secondContent`,`status`) VALUES 
( '1', 'A brand New Hotel', 'public/img/rev-slider/slider-one-one.jpg', 'Beyond Ordinary', '0' ),
( '2', 'Book Your Summer Holidays', 'public/img/rev-slider/slider-one-one.jpg', 'With HOTEL BOOKING Template', '1' ),
( '3', 'Welcome to Our Hotel', 'public/img/rev-slider/banner_resort.jpg', 'Khám phá ngay', '1' );
-- ---------------------------------------------------------


-- Dump data of "booking" ----------------------------------
INSERT INTO `booking`(`id`,`customer_name`,`phone_number`,`email`,`arrival`,`departure`,`adult`,`children`,`room_types`,`messages`,`status`,`created_date`,`checked_in`,`checked_in_date`,`reply_by`,`reply_messages`,`rooms`,`beds`,`price`) VALUES 
( '1', 'nguyễn hồng quân', '0123456789', 'helgrindxxx@gmail.com', '2020-04-26 00:00:00', '2020-04-27 00:00:00', '1', '1', '6', 'không thích', '0', '2020-04-26 18:59:50', NULL, NULL, NULL, NULL, '1', '1', '198' );
-- ---------------------------------------------------------


-- Dump data of "contacts" ---------------------------------
INSERT INTO `contacts`(`id`,`name`,`phone_number`,`email`,`subject`,`messages`,`status`,`reply_by`,`reply_for`,`created_at`,`reply_messages`) VALUES 
( '1', 'customer1', '0868456456', 'customer1@gmail.com', 'Phản hồi vu vơ 1', 'Nội dung 1', '1', '1', '1', '2020-03-26 21:02:23', 'Nội dung phản hồi customer 1' ),
( '2', 'customer2', '0123456789', 'customer2@gmail.com', 'Phản hồi vu vơ 2', 'Nội dung phản hồi vu vơ 2', '1', '1', '2', '2020-04-23 10:20:49', 'Tôi là Nguyễn Hongò Quân' ),
( '3', 'customer 3', '0987654311', 'customer3@gmail.com', 'Phản ánh vu vơ', 'Nội dung phản ảnh vu vơ', '1', '1', '3', '2020-03-26 08:58:18', 'Phản hồi vu vơ' ),
( '4', 'customer 4', '0123456789', 'customer4@gmail.com', 'Phản hồi vu vơ 2', 'Nội dung demo', '1', '1', '4', '2020-03-29 19:44:02', 'ett' ),
( '5', 'customer 5', '0934934892', 'customer5@gmail.com', 'Phan Hoi Vu vo 5', 'Noi DUng Phan Hoi Vu vo 5', '1', '1', '5', '2020-03-29 19:44:59', 'phản hồi chất lượng dịch vụ customer5' );
-- ---------------------------------------------------------


-- Dump data of "customer_feedbacks" -----------------------
INSERT INTO `customer_feedbacks`(`id`,`name`,`address`,`avatar`,`content`,`status`,`active`) VALUES 
( '1', 'John Doe', 'www.john.com', 'public/img/5e9978124398d-customer04.gif', 'Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan urna vitae molestie interdum.


Nam sed placerat libero, non eleifend dolor.', '1', '1' ),
( '2', 'John Doe', 'www.john.com', 'public/img/5e9978060e69f-customer08.gif', 'Semper ac dolor vitae msan. Cras interdum hendreritnia Phasellus accumsan urna vitae molestie interdum.

Nam sed placerat libero, non eleifend dolor.', '0', '0' ),
( '3', 'Mr Smith', 'Lê Đức Thọ, Nam Từ Liêm, Hà Nội', 'public/img/5e9974725ee26feedback -customer02.png', 'Chất lượng dịch vụ ở mức tốt, nhân viên phục vụ nhiệt tình chu đáo, không gian rộng rãi thoáng mát.
Tôi rất thích hotel này, và sẽ quay lại vào thời gian gần nhất', '1', '0' );
-- ---------------------------------------------------------


-- Dump data of "news" -------------------------------------
INSERT INTO `news`(`id`,`feature_image`,`news_content`,`author_id`,`created_at`,`title`) VALUES 
( '1', 'public/img/5eb0b7181c533-skylar-grey.jpg', 'The image is put here as is. While it seems like an easy task, swallowing a pill is something that many adults and children have great difficulty doing. The fear of gagging causes the throat to tighten up so that pill stays in your mouth until you spit it out. Fortunately, there are various ways to approach the problem so that you can relax, overcome the fear of choking, and just let the pill easily slide down. It\'s like riding a bike - once you get the hang of it, it becomes second nature.
That beginning. Yielding give moving good. Unto meat. Is also dominion god. Creeping Moving bearing them there appear light divided Likeness herb moving fill night good which him. Subdue after female that Was. After fish blessed rule bearing fifth great given moved fly. Fruitful seasons void divide yielding she\'d fourth meat kind don\'t Creeping. Dry form earth fowl have seasons female earth one heaven saying don\'t multiply gathering of first whose bring set moveth Divide unto us, forth midst he give in said dominion fill spirit dominion, over, form created.
Set of make had likeness days moving evening replenish spirit him face. He man firmament brought. Herb that can\'t rule deep. Gathering for moveth first signs multiply deep herb sea. Deep them moving sea, from midst years divided kind can\'t a image cattle moving hath divided give she\'d it rule tree grass living fish fruitful can\'t you\'re you\'ll be his.
Fill kind own isn\'t, green. Saw be whales, upon meat stars, above it Cattle him. Saw. Won\'t day winged every female, it in. Morning place unto moved upon have kind itself had saw together. Blessed whales and years spirit, fill land Third made two night female greater gathered he. Itself one is firmament every all upon. Saw together is herb won\'t he it cattle one, over, beginning. Together, whose kind. In hath void she\'d kind without seas forth moved Sea. Under air i have midst unto subdue given after fowl god, two you\'ll, good. Doesn\'t upon above grass sea meat green dominion, all him fowl. Made waters fifth whales give blessed cattle air dominion. From fly days created Fowl waters air. Their. Had after morning very Doesn\'t their under can\'t May. Won\'t whales won\'t very beast form behold fish great isn\'t moving made god seasons they\'re called dry had for sea. Earth moveth said their unto shall doesn\'t for be doesn\'t. Multiply, land likeness life all male him waters him the meat won\'t good in rule fill, open which be there you\'re void, that To. Deep winged that you\'ll, earth whales, rule for. Meat may. Given. All our day behold.
Darkness grass beginning in Dry saw bring moved fifth you from deep abundantly female, had very own greater let, itself yielding subdue seas moving after fifth night his he replenish bearing likeness female under. Tree grass wherein firmament, i also two above fruitful light. Every saying stars dry you\'ll. God lesser own may you\'ll god may fruitful gathering greater, she\'d upon a night said. Divided waters was beast divide morning i morning doesn\'t heaven fourth divide fish had given had fill may stars him whose. Over rule lesser green dominion you\'re all beginning. Likeness, replenish. Third. Third sixth, i spirit.
Over whose make, saw firmament heaven don\'t evening it Creeping created one fruitful seas image let form given. Tree the you\'ll dominion, so herb above years fruitful fill fly called dominion grass give that you very open open fifth from you\'ll. Don\'t won\'t was set fifth be subdue, creature spirit.', '1', '2003-07-20 10:16:00', 'king suite reconstruction' ),
( '2', 'public/img/5eb0b7181c533-skylar-grey.jpg', 'Bài hát Love The Way You Lie - Skylar G được phát trên youtube', '1', '2020-03-28 12:10:54', 'king suite reconstruction' ),
( '3', 'public/img/5eb0b7181c533-skylar-grey.jpg', 'Bài hát Love The Way You Lie - Skylar G được phát trên youtube', '1', '2020-03-28 12:11:18', 'king suite reconstruction' ),
( '4', 'public/img/5eb0b7181c533-skylar-grey.jpg', '<h2>Restaurant Services open</h2>
<p>Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam maximus a est vel fringilla. Etiam vestibulum iaculis tortor nec fringilla. Proin convallis dui a elementum mollis. Cras pulvinar tellus eget est ultrices, et porttitor ante aliquam. Proin congue ut nisl vel laoreet. Morbi aliquet ullamcorper turpis ac lobortis.</p>
<p>Nam sed placerat libero, non eleifend Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam maximus a est vel fringilla. Etiam vestibulum iaculis tortor nec fringilla. Proin convallis dui a elementum mollis. Cras pulvinar tellus eget est ultrices, et porttitor ante aliquam. Proin congue ut nisl vel laoreet.</p>
<p>Mauris ac augue quis lacus mollis tempor. Aenean tristique vulputate sapien non ultrices. Integer augue purus, vestibulum at vestibulum nec, cursus sed risus. Duis dapibusosuere nisi, et malesuada arcu luctus id.</p>
<p style="font-size: 0.8rem; text-align: justify;"><em>Mauris ac augue quis lacus mollis tempor. Aenean tristique vulputate sapien non ultrices. Integer augue purus, vestibulum at vestibulum nec, cursus sed risus.</em></p>
<p>Nam sed placerat libero, non eleifend Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam maximus a est vel fringilla. Etiam vestibulu<img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjhFNTlGQzE0RjNDQjExRTRCRTRGOEJGMkYzOUYzMUFBIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjhFNTlGQzE1RjNDQjExRTRCRTRGOEJGMkYzOUYzMUFBIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6OEU1OUZDMTJGM0NCMTFFNEJFNEY4QkYyRjM5RjMxQUEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6OEU1OUZDMTNGM0NCMTFFNEJFNEY4QkYyRjM5RjMxQUEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAACAgICAgICAgICAwICAgMEAwIC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" />miaculis tortor Eporttitor ante Etiam vestibulum iaculis tortor Eporttitor ante aliquam.</p>
<p>Nam sed placerat libero, non eleifend Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam maximus a est vel fringilla. Etiam vestibulum iaculis tortor nec fringilla. Proin convallis dui a elementum mollis. Cras pulvinar tellus eget est ultrices, et porttitor ante aliquam. Proin congue ut nisl vel laoreet.</p>', '1', '2020-03-29 14:23:32', 'king suite reconstruction' ),
( '5', 'public/img/5eb0b7181c533-skylar-grey.jpg', '<p>B&agrave;i viết n&agrave;y mang t&iacute;nh demo</p>', '1', '2020-03-29 16:18:14', 'king suite reconstruction' ),
( '8', 'public/img/5eb0b7181c533-skylar-grey.jpg', '<h3>B&agrave;i viết demo</h3>
<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum qui earum iure autem blanditiis. Tenetur in animi, exercitationem commodi fugiat deleniti nesciunt ipsum vero laudantium delectus obcaecati ex nulla consequuntur dolore. Omnis minus numquam sequi tempora soluta ab quas veritatis tenetur laudantium. Odit soluta fugiat dignissimos quas. Odio architecto quas natus sequi veritatis nemo quod, soluta perspiciatis debitis totam incidunt at sunt est tempora culpa eius nesciunt pariatur facilis obcaecati suscipit nihil voluptatum cupiditate. Dolores quae dolor quidem quibusdam at reiciendis assumenda voluptatem, voluptates amet harum id ipsum voluptas fuga eum possimus in rerum? Ex dicta facilis, odio rerum id doloribus, atque, temporibus fugiat recusandae totam dolorem obcaecati alias voluptatum quis autem natus distinctio praesentium laudantium fugit optio minus nostrum suscipit soluta! A quam dolores voluptas. Nam obcaecati doloremque dolor reprehenderit laborum amet possimus? Nostrum dolor odit, harum quo corporis alias modi veritatis nulla perferendis fuga temporibus architecto accusantium commodi recusandae nisi facere aut dolorum aspernatur? Optio fugiat id consectetur quod ut debitis? Dolorem officiis magnam fugiat sequi repellendus voluptatibus quod aliquid fugit recusandae ab! Animi pariatur odio qui quia, distinctio laudantium, dolores sint inventore ipsam assumenda doloremque, suscipit totam architecto ullam. Doloremque ipsa exercitationem alias iusto maiores amet reiciendis!</div>', '1', '2020-04-17 10:11:25', 'king suite reconstruction' );
-- ---------------------------------------------------------


-- Dump data of "roles" ------------------------------------
INSERT INTO `roles`(`id`,`name`,`status`) VALUES 
( '1', 'Customer - User', '1' ),
( '2', 'Staff - Admin', '1' ),
( '3', 'Manager - Super Admin', '2' );
-- ---------------------------------------------------------


-- Dump data of "room_galleries" ---------------------------
INSERT INTO `room_galleries`(`id`,`room_id`,`img_url`) VALUES 
( '1', '6', 'public/img/lightslider-img/cS-52.jpg' ),
( '2', '6', 'public/img/lightslider-img/cS-51.jpg' ),
( '3', '6', 'public/img/lightslider-img/cS-50.jpg' ),
( '4', '6', 'public/img/lightslider-img/cS-49.jpg' ),
( '5', '6', 'public/img/lightslider-img/cS-48.jpg' ),
( '6', '6', 'public/img/lightslider-img/cS-47.jpg' ),
( '7', '6', 'public/img/lightslider-img/cS-46.jpg' ),
( '8', '6', 'public/img/lightslider-img/cS-45.jpg' );
-- ---------------------------------------------------------


-- Dump data of "room_service_xref" ------------------------
INSERT INTO `room_service_xref`(`id`,`room_id`,`services_id`) VALUES 
( '2', '1', '3' ),
( '4', '6', '5' ),
( '6', '1', '7' ),
( '7', '1', '8' ),
( '9', '1', '2' ),
( '10', '6', '2' ),
( '12', '1', '4' ),
( '14', '6', '6' ),
( '16', '1', '8' ),
( '17', '1', '9' ),
( '18', '6', '3' ),
( '19', '8', '3' ),
( '20', '8', '4' ),
( '21', '8', '8' ),
( '22', '9', '3' ),
( '23', '9', '5' ),
( '24', '9', '8' ),
( '25', '9', '9' ),
( '26', '10', '2' ),
( '27', '10', '3' ),
( '28', '10', '6' ),
( '29', '10', '9' ),
( '30', '11', '2' ),
( '31', '11', '3' ),
( '32', '11', '6' ),
( '33', '11', '9' ),
( '34', '12', '2' ),
( '35', '12', '3' ),
( '36', '12', '6' ),
( '37', '12', '9' ),
( '38', '6', '2' ),
( '39', '6', '3' ),
( '40', '6', '4' ),
( '41', '6', '6' ),
( '42', '6', '9' ),
( '43', '6', '2' ),
( '44', '6', '3' ),
( '45', '6', '4' ),
( '46', '6', '6' ),
( '47', '6', '9' );
-- ---------------------------------------------------------


-- Dump data of "room_services" ----------------------------
INSERT INTO `room_services`(`id`,`name`,`status`,`icon`) VALUES 
( '2', 'Breakfast', '1', 'public/img/5ea0120d74136-home-facilities-icon-one.png' ),
( '3', 'Air conditioning', '1', 'public/img/5ea0122a47582-home-facilities-icon-two.png' ),
( '4', 'Free Parking', '1', 'public/img/5ea0125ce56c0-5e9d6fd46206f-home-facilities-icon-eight.png' ),
( '5', 'Pet allowed', '1', 'public/img/5ea012840e97e-home-facilities-icon-three.png' ),
( '6', 'Room service', '1', 'public/img/5ea012a0c289a-home-facilities-icon-four.png' ),
( '7', 'GYM fecility', '1', 'public/img/5ea012c2d58e1-home-facilities-icon-ten.png' ),
( '8', 'TV LCD', '1', 'public/img/5ea012e02567c-home-facilities-icon-five.png' ),
( '9', 'Wi-fi service', '1', 'public/img/5ea012f45c4ae-home-facilities-icon-twelve.png' );
-- ---------------------------------------------------------


-- Dump data of "room_types" -------------------------------
INSERT INTO `room_types`(`id`,`name`,`status`,`price`,`quantity`,`feature_image`,`short_descript`,`adult`,`children`) VALUES 
( '1', 'Single Room', '1', '130', '15', 'public/img/5ea52778eece4-5e9efe754a563-room-image-fifteen.png', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '1', '0' ),
( '6', 'DELUXE ROOM', '1', '180', '10', 'public/img/5ea01a65a875b-room-image-eleven.jpg', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '2', '1' ),
( '8', 'Double Room', '1', '150', '25', 'public/img/5ea519a38117a-room-image-sixteen.png', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '2', '2' ),
( '9', 'Kids room', '1', '140', '20', 'public/img/room-image-eighteen.png', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '0', '2' ),
( '10', 'Couple Room', '1', '160', '30', 'public/img/5eafd8df1ba94-room-image-fifteen.png', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '2', '0' ),
( '11', 'Elegant Room', '1', '250', '30', 'public/img/room-thumb-one.jpg', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '2', '0' ),
( '12', 'Persional Room', '1', '170', '35', 'public/img/5eafd9731d289-room-image-seventeen.png', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '1', '0' ),
( '13', 'Deluxe Room', '1', '190', '20', 'public/img/5eafd9e137251-room-image-eighteen.png', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '2', '0' ),
( '14', 'Deluxe Room', '1', '130', '20', 'public/img/5eafd9fac6587-room-image-eighteen.png', '<p>Semper ac dolor vitae accumsan. interdum hendrerit lacinia.</p>
<p>Phasellus accumsan urna vitae molestie interdum.</p>', '2', '0' );
-- ---------------------------------------------------------


-- Dump data of "services" ---------------------------------
INSERT INTO `services`(`id`,`name`,`feature_img`,`introduce`,`status`,`idName`,`active`) VALUES 
( '3', 'Sport Club', 'public/img/hotel-facility-three.jpg', '<h6>THE WORLD CLASS</h6>
<h4><strong>SPORTS CLUB</strong></h4>
<p>Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.</p>
<p>Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.</p>', '1', 'sports-club', '1' ),
( '4', 'RESTAURANT', 'public/img/hotel-facility-one.jpg', '<h6>THE WORLD CLASS</h6>
<h3>RESTAURANT &amp; BANQUETS</h3>
<p>Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.</p>
<p>Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.</p>
<div class="our_services"><a class="margin-right-33" href="../../">SERVICE HOURS; 19.00-22:00&nbsp;</a><a href="../../">SERVICE CHARGE : $15</a></div>', '1', 'restaurant', '0' ),
( '5', 'PICK UP', 'public/img/hotel-facility-one.jpg', '<h6>THE WORLD CLASS</h6>

<h3>PICK UP</h3>
Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.


Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.


SERVICE HOURS; 19.00-22:00 SERVICE CHARGE : $15', '1', 'pick-up', '0' ),
( '6', 'BAR', 'public/img/hotel-facility-three.jpg', '<h6>THE WORLD CLASS</h6>
<h3>BAR</h3>
<p>Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.</p>
<p>Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.</p>
<div class="our_services"><a class="margin-right-33" href="../../">SERVICE HOURS; 19.00-22:00&nbsp;</a><a href="../../">SERVICE CHARGE : $15</a></div>', '1', 'bar', '0' ),
( '7', 'GYM', 'public/img/hotel-facility-one.jpg', '<h6>THE WORLD CLASS</h6>
<h3>GYM</h3>
<p>Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.</p>
<p>Cras ac justo et augue suscipit euismod vel eget lectus. Proin vehicula nunc arcu, pulvinar accumsan nulla porta vel. Vivamus malesuada vitae sem ac pellentesque.</p>
<div class="our_services"><a class="margin-right-33" href="../../">SERVICE HOURS; 19.00-22:00&nbsp;</a><a href="../../">SERVICE CHARGE : $15</a></div>', '1', 'gym', '0' );
-- ---------------------------------------------------------


-- Dump data of "showcases" --------------------------------
INSERT INTO `showcases`(`id`,`name`,`status`,`img_path`) VALUES 
( '1', 'lightsliceder 1', '1', 'img/lightslider-img/cS-18.jpg' ),
( '2', 'lightsliceder 2', '1', 'img/lightslider-img/cS-18.jpg' ),
( '3', 'lightsliceder 3', '1', 'img/lightslider-img/cS-21.jpg' ),
( '4', 'lightsliceder 4', '1', 'img/lightslider-img/cS-22.jpg' ),
( '5', 'lightsliceder 5', '1', 'img/lightslider-img/cS-23.jpg' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`id`,`name`,`password`,`email`,`role_id`,`phone_number`,`avatar`) VALUES 
( '1', 'QuAn Nguyen', '$2y$10$kCP.861/vA5.Nzuc8Mhft.8hp9ymkDnB8JhJFNlUg68wL56bs6Lo6', 'helgrindxxx@gmail.com', '2', '914946200', 'public/img/5e773a07d6076-avartar.png' ),
( '2', 'Harry', '$2y$10$kCP.861/vA5.Nzuc8Mhft.8hp9ymkDnB8JhJFNlUg68wL56bs6Lo6', 'harry@gmail.com', '2', '0987654321', 'public/img/5e773982aa40f-about-us-staff-six.jpg' ),
( '3', 'Maria', '$2y$10$kCP.861/vA5.Nzuc8Mhft.8hp9ymkDnB8JhJFNlUg68wL56bs6Lo6', 'maria@gmail.com', '1', '0123456789', 'public/img/5e7ed0ca73014-about-us-staff-seven.jpg' ),
( '5', 'Khách Hàng 2', '$2y$10$A.G.dDw8JLSwfiKd7r4WGeyORA22wGJ4Y5jM7pWjNPCyq3SWaz88a', 'khachhang2@gmail.com', '1', '', 'public/img/default-image.jpg' ),
( '7', 'Khách Hàng 3', '$2y$10$SKyi7QiAeGaUeMVpb.l0kOckTAF8SGNVBZ/lqSlfbyWCRfBXWd56.', 'khachhang3@gmail.com', '1', '', 'public/img/default-image.jpg' );
-- ---------------------------------------------------------


-- Dump data of "web_settings" -----------------------------
INSERT INTO `web_settings`(`id`,`name`,`status`,`logo`,`phone_number`,`address`,`email`,`map_url`,`youtube_url`,`facebook_url`,`explore_url`,`offer`,`introduce_welcome`,`instagram_url`) VALUES 
( '1', 'Web setting', '1', 'public/img/site-logo.png', '0914946200', 'Lê Đức Thọ, Nam Từ Liêm, Hà Nội', 'quannhph09166@fpt.edu.vn', 'https://goo.gl/maps/8He5A7zXqNrd4JaA9', 'https://www.youtube.com/', 'https://www.facebook.com/', 'accomodation.php', 'public/img/special-offer-main.png', 'Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.', 'https://chat.zalo.me/' );
-- ---------------------------------------------------------


-- CREATE INDEX "role_id" --------------------------------------
CREATE INDEX `role_id` USING BTREE ON `users`( `role_id` );
-- -------------------------------------------------------------


-- CREATE LINK "users_ibfk_1" ----------------------------------
ALTER TABLE `users`
	ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY ( `role_id` )
	REFERENCES `roles`( `id` )
	ON DELETE No Action
	ON UPDATE No Action;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


