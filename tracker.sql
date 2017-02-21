CREATE TABLE `entries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `food` varchar(255) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `fats` float DEFAULT NULL,
  `proteins` float DEFAULT NULL,
  `carbs` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO settings (`key`, `value`) VALUES('calorie_goal', '1600');
INSERT INTO settings (`key`, `value`) VALUES('protein_goal', '90');
INSERT INTO settings (`key`, `value`) VALUES('fat_goal', '130');
INSERT INTO settings (`key`, `value`) VALUES('carb_goal', '20');