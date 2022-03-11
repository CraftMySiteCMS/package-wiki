CREATE TABLE `cms_wiki_articles`(
    `id`          int(10) UNSIGNED NOT NULL,
    `category_id` int(10) UNSIGNED NOT NULL,
    `position`    int(10) UNSIGNED NOT NULL DEFAULT '0',
    `is_define`    int(1) UNSIGNED NOT NULL DEFAULT '1',
    `title`       varchar(255) NOT NULL,
    `content`     longtext         NOT NULL,
    `slug`        varchar(255) NOT NULL,
    `icon`        varchar(35)           DEFAULT NULL,
    `date_create` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `author`      varchar(255) NOT NULL,
    `last_editor` varchar(255)          DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cms_wiki_categories`(
    `id`          int(11) UNSIGNED NOT NULL,
    `name`        varchar(255) NOT NULL,
    `description`        varchar(255) NOT NULL,
    `slug`        varchar(255) NOT NULL,
    `icon`        varchar(35)           DEFAULT NULL,
    `date_create` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `date_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `position`    int(11) UNSIGNED NOT NULL DEFAULT '0',
    `is_define`    int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `cms_wiki_categories`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cms_wiki_categories_slug_unique` (`slug`);


ALTER TABLE `cms_wiki_articles`
    ADD PRIMARY KEY (`id`),
  ADD KEY `cms_wiki_category_id_fk` (`category_id`);


ALTER TABLE `cms_wiki_articles`
    MODIFY `id` int (10) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `cms_wiki_categories`
    MODIFY `id` int (11) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `cms_wiki_articles`
    ADD CONSTRAINT `cms_wiki_categories_id_fk` FOREIGN KEY (`category_id`) REFERENCES `cms_wiki_categories` (`id`) ON DELETE CASCADE;
COMMIT;
