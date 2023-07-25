CREATE DATABASE IF NOT EXISTS project;
USE project;

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book_description_entity
-- ----------------------------
DROP TABLE IF EXISTS `book_description_entity`;
CREATE TABLE `book_description_entity`  (
                                            `id` int NOT NULL AUTO_INCREMENT,
                                            `book_id` int NULL DEFAULT NULL,
                                            `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
                                            `created_at` datetime NOT NULL,
                                            `updated_at` datetime NOT NULL,
                                            PRIMARY KEY (`id`) USING BTREE,
                                            UNIQUE INDEX `UNIQ_EE0A26216A2B381`(`book_id` ASC) USING BTREE,
                                            CONSTRAINT `FK_EE0A26216A2B381` FOREIGN KEY (`book_id`) REFERENCES `book_entity` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_description_entity
-- ----------------------------
INSERT INTO `book_description_entity` VALUES (1, 1, 'Another detail that a lot of fans wondered about was the placement of the lightning bolt scar. Although the books never specify exactly where on the forehead Harry’s is – we all surely pictured it being in the centre – Daniel Radcliffe’s scar was placed to the side. But don’t worry, this was all J.K. Rowling’s decision, who told director Christopher Columbus to make it ‘razor sharp, just off centre’.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `book_description_entity` VALUES (2, 2, 'Harry had a thin face, knobbly knees, black hair and bright-green eyes. He wore round glasses held together with a lot of Sellotape because of all the times Dudley had punched him on the nose. The only thing Harry liked about his own appearance was a very thin scar on his forehead which was shaped like a bolt of lightning. He had had it as long as he could remember and the first question he could ever remember asking his Aunt Petunia was how he had got it.', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for book_entity
-- ----------------------------
DROP TABLE IF EXISTS `book_entity`;
CREATE TABLE `book_entity`  (
                                `id` int NOT NULL AUTO_INCREMENT,
                                `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
                                `price` decimal(10, 0) NOT NULL,
                                `created_at` datetime NOT NULL,
                                `updated_at` datetime NOT NULL,
                                PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_entity
-- ----------------------------
INSERT INTO `book_entity` VALUES (1, 'HP', 33, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `book_entity` VALUES (2, 'HP2', 22, '2023-07-25 00:50:33', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for doctrine_migration_versions
-- ----------------------------
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions`  (
                                                `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
                                                `executed_at` datetime NULL DEFAULT NULL,
                                                `execution_time` int NULL DEFAULT NULL,
                                                PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctrine_migration_versions
-- ----------------------------
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230724204728', '2023-07-24 20:51:56', 252);

SET FOREIGN_KEY_CHECKS = 1;
