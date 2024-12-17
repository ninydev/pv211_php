create table pv211.colors
(
    id         int auto_increment
        primary key,
    name       varchar(64)                         not null,
    created_at timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP,
    updated_at timestamp default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP
);

