CREATE TABLE prefecture (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(4) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;
CREATE TABLE users (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `phonetic` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(11) NOT NULL,
    `birthday` VARCHAR(10) NOT NULL,
    `prefecture_id` INT(11) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`prefecture_id`) REFERENCES `prefecture`(`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;
INSERT INTO prefecture (name)
VALUES ("北海道"),
    ("青森県"),
    ("岩手県"),
    ("宮城県"),
    ("秋田県"),
    ("山形県"),
    ("福島県"),
    ("茨城県"),
    ("栃木県"),
    ("群馬県"),
    ("埼玉県"),
    ("千葉県"),
    ("東京都"),
    ("神奈川県"),
    ("新潟県"),
    ("富山県"),
    ("石川県"),
    ("福井県"),
    ("山梨県"),
    ("長野県"),
    ("岐阜県"),
    ("静岡県"),
    ("愛知県"),
    ("三重県"),
    ("滋賀県"),
    ("京都府"),
    ("大阪府"),
    ("兵庫県"),
    ("奈良県"),
    ("和歌山県"),
    ("鳥取県"),
    ("島根県"),
    ("岡山県"),
    ("広島県"),
    ("山口県"),
    ("徳島県"),
    ("香川県"),
    ("愛媛県"),
    ("高知県"),
    ("福岡県"),
    ("佐賀県"),
    ("長崎県"),
    ("熊本県"),
    ("大分県"),
    ("宮崎県"),
    ("鹿児島県"),
    ("沖縄県");
