-- CREATE TABLE `pv211`.`cars`
-- (
--     `id` CHAR(36) NOT NULL ,
--     `name` VARCHAR(64) NOT NULL ,
--     `brand` VARCHAR(64) NOT NULL ,
--     `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  PRIMARY KEY (`id`)
-- ) ENGINE = InnoDB;

create table pv211.cars
(
    id         char(36)                            not null
        primary key,
    name       varchar(64)                         not null,
    brand      varchar(64)                         not null,
    created_at timestamp default CURRENT_TIMESTAMP not null,
    updated_at timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    color_id   int                                 null,
    constraint cars_colors_id_fk
        foreign key (color_id) references pv211.colors (id)
);

