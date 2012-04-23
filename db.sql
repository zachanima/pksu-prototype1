drop table answers;
drop table questions;
drop table topics;



create table topics (
  id integer auto_increment primary key,
  title varchar(255) unique not null
);

create table questions (
  id integer auto_increment primary key,
  text text not null,
  information text,
  topic_id integer not null,
  foreign key (topic_id) references topics(id)
    on delete cascade on update cascade
);

create table answers (
  id integer auto_increment primary key,
  text varchar(255) not null,
  correct boolean not null,
  question_id integer not null,
  foreign key (question_id) references questions(id)
    on delete cascade on update cascade
);



insert into topics(title) values ("Internet");

insert into questions(text, topic_id) values ("Hvad st&aring;r URL for?", 1);

insert into answers(text, correct, question_id)
  values ("Uniform Resource Locator", true, 1);
insert into answers(text, correct, question_id)
  values ("Unintentional Revelation Laboratory", false, 1);
insert into answers(text, correct, question_id)
  values ("Universal Replication Language", false, 1);
