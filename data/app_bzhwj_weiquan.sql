create table app_bzhwj_weiquan(
  id int unsigned not null auto_increment,
  user_id int unsigned not null ,
  goods_name varchar(255) not null,
  store_name varchar(255) not null,
  price double,
  reason text,
  pic varchar(255),
  actual_name varchar(255) not null,
  phone varchar(255) not null,
  email varchar(255),
  status tinyint not null default 1,
  create_at int unsigned,
  update_at int unsigned,
  primary key (id)
) ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_common_question(
  id int unsigned not null auto_increment,
  title varchar(255) not null,
  cnt text,
  create_at int unsigned,
  update_at int unsigned,
  primary key (id)
) ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_newest_notice(
  id int unsigned not null auto_increment,
  title varchar(255) not null,
  cnt text,
  create_at int unsigned,
  update_at int unsigned,
  primary key (id)
) ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_baozhang(
  id int unsigned not null auto_increment,
  title varchar(255) not null default '百真无假保障范围',
  pingzhi varchar(255),
  baozhang_cnt text,
  tui_flow text,
  action_tip text,
  create_at int unsigned,
  update_at int unsigned,
  primary key (id)
) ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_about(
  id int unsigned not null auto_increment,
  title varchar(255) not null,
  cnt text,
  create_at int unsigned,
  update_at int unsigned,
  primary key (id)
) ENGINE=InnoDB CHARSET=utf8;