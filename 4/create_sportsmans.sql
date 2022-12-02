DROP TABLE IF EXISTS sportsmans;
CREATE TABLE sportsmans(
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    full_name varchar(255) NOT NULL,
    email varchar(255) DEFAULT NULL,
    phone_number varchar(15) DEFAULT NULL,
    birthday DATETIME NOT NULL,
    age TINYINT NOT NULL,
    created_at DATETIME NOT NULL,
    passport_id varchar(32) NOT NULL UNIQUE,
    avg_competition_place REAL DEFAULT NULL,
    biography TEXT DEFAULT NULL,
    video_presentation BLOB DEFAULT NULL
);
