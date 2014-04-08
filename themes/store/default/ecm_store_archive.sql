create table ecm_store_archive(
  `id` int unsigned not null auto_increment,
  `store_id` int unsigned not null,
  `intro` text,
  `business_info` text,
  `pics` text,
  primary key (`id`),
  unique key `store_id_uk`(`store_id`)
) ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_people(
  `id` int unsigned not null auto_increment,
  `title` varchar(255) not null,
  `store_id` int unsigned not null,
  `content` text,
  `logo` varchar(1024),
  `editor` varchar(255),
  `update_at` int unsigned,
  `create_at` int unsigned,
  primary key (`id`)
) ENGINE=InnoDB CHARSET=utf8;

create table app_bzhwj_tuijian_goods(
  `id` int unsigned not null auto_increment,
  `title` varchar(255) not null,
  `store_id` int unsigned not null,
  `content` text,
  `editor` varchar(255),
  `com_name` varchar(255),
  `com_address` varchar(255),
  `update_at` int unsigned,
  `create_at` int unsigned,
  primary key (`id`),
  INDEX `title_idx`(`title`)
) ENGINE=InnoDB CHARSET=utf8;

insert app_common_mis_page_table_fields_config set app_id=5,table_name='app_bzhwj_people',fields='a:5:{s:5:"title";a:2:{s:4:"show";s:12:"人物姓名";s:8:"required";b:1;}s:4:"logo";a:2:{s:4:"show";s:6:"头像";s:4:"type";s:5:"image";}s:8:"store_id";a:3:{s:4:"show";s:8:"store_id";s:4:"type";s:6:"hidden";s:3:"ref";s:23:"return%20window.store_id;";}s:6:"editor";a:2:{s:4:"show";s:9:"编辑者";s:8:"required";b:1;}s:7:"content";a:2:{s:4:"show";s:12:"新闻内容";s:4:"type";s:6:"editor";}}',title='百真无假风云人物'

alter table ecm_goods add column lianbao tinyint not null default 0;
alter table ecm_goods add column suit_people varchar(255) not null default '';
alter table ecm_goods add column effect varchar(255) not null default '';

create table app_bzhwj_appointment(
  `id` int unsigned not null auto_increment,
  `name` varchar(255) not null,
  `store_id` int unsigned not null,
  `user_id` int unsigned not null,
  `goods_id` int unsigned not null,
  `sex` tinyint not null default 1,
  `age` int unsigned,
  `marry` tinyint not null default 1,
  `job` varchar(255),
  `beauty_history` varchar(1024),
  `contact` varchar(255),
  `address` varchar(255),
  `reason` text,
  `projects` text,
  `years` varchar(255),
  `remarks` text,
  `update_at` int unsigned,
  `create_at` int unsigned,
  primary key (`id`),
  unique key `s_g_u_uiq`(`store_id`,`goods_id`,`user_id`)
) ENGINE=InnoDB CHARSET=utf8;

insert app_bzhwj_appointment set store_id = '8',goods_id = '9',user_id = '1',name = '夺在',sex = '1',age = ' 在',marry = '1',job = '',beauty_history = '',contact = '',address = '',reason = '',projects = '',years = '',remarks = '' on duplicate key update store_id = '8',goods_id = '9',user_id = '1',name = '夺在',sex = '1',age = ' 在',marry = '1',job = '',beauty_history = '',contact = '',address = '',reason = '',projects = '',years = '',remarks = '';