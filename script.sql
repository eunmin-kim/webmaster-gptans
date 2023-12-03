create table users
(
    user_id        bigint auto_increment
        primary key,
    kakao_nickname varchar(200) null,
    kakao_user_id  varchar(200) not null,
    kakao_email    varchar(200) null
);

create table questions
(
    q_id    bigint auto_increment
        primary key,
    q_title varchar(200) not null,
    q_story varchar(250) not null,
    user_id bigint       null,
    constraint questions_users_user_id_fk
        foreign key (user_id) references users (user_id)
);

create table answers
(
    a_id    bigint auto_increment
        primary key,
    a_story varchar(200) not null,
    q_id    bigint       null,
    user_id bigint       null,
    constraint answers___fk
        foreign key (q_id) references questions (q_id),
    constraint answers_users_user_id_fk
        foreign key (user_id) references users (user_id)
);


