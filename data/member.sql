create table app_bzhwj_comment(
  `id` int unsigned not null auto_increment,
  `user_id` int unsigned not null ,
  `cnt` text,
  `store_id` int unsigned not null,
  `follower_id` int unsigned not null default 0,
  `reply_id` int unsigned not null default 0,
  `create_at` int unsigned,
  `update_at` int unsigned,
  `status` tinyint not null default 1,
  primary key (`id`),
  key `store_follower_idx`(`store_id`,`follower_id`),
  key `user_idx`(`user_id`)
)ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_store_member(
  id int unsigned not null auto_increment,
  store_id int unsigned not null,
  user_id int unsigned not null ,
  status tinyint not null default 1,
  create_at int unsigned,
  update_at int unsigned,
  primary key (id),
  unique key store_user_idx(store_id,user_id)
) ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_index_luobo(
  id int unsigned not null auto_increment,
  title varchar(200),
  url varchar(255),
  imgurl varchar(1024),
  ctg tinyint not null default 1,
  status tinyint not null default 1,
  create_at int unsigned,
  update_at int unsigned,
  primary key (id),
  unique key ctg_title_idx(ctg,title)
) ENGINE=InnoDB CHARSET=utf8;