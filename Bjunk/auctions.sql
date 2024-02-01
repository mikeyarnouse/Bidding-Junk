-- auto-generated definition
create table auctions
(
    item_id           int auto_increment
        primary key,
    item_name     varchar(50) null,
    item_category varchar(32) null,
    item_name    varchar(50) null,
    item_id      int         not null,
    winning_bid  double      null,
    starting_bid double      null,
    start_time   datetime    not null,
    end_time     datetime    null,
    constraint id
        unique (id)
);

