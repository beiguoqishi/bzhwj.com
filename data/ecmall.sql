-- MySQL dump 10.13  Distrib 5.6.16, for osx10.7 (x86_64)
--
-- Host: localhost    Database: ecmall
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_bzhwj_appointment`
--

DROP TABLE IF EXISTS `app_bzhwj_appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_bzhwj_appointment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT '1',
  `age` int(10) unsigned DEFAULT NULL,
  `marry` tinyint(4) NOT NULL DEFAULT '1',
  `job` varchar(255) DEFAULT NULL,
  `beauty_history` varchar(1024) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reason` text,
  `projects` text,
  `years` varchar(255) DEFAULT NULL,
  `remarks` text,
  `update_at` int(10) unsigned DEFAULT NULL,
  `create_at` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_g_u_uiq` (`store_id`,`goods_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bzhwj_appointment`
--

LOCK TABLES `app_bzhwj_appointment` WRITE;
/*!40000 ALTER TABLE `app_bzhwj_appointment` DISABLE KEYS */;
INSERT INTO `app_bzhwj_appointment` VALUES (2,'刘鹏涛1',8,8,9,1,25,2,'计算机','','1232344','中国','试验下','好多项目。','3','this is a test。',1397318684,NULL,1),(5,'test',8,1,20,1,26,1,'dkfjf','dfdsfs','feeefsd','kjkfiwef','dsfjvcmdkf','ksfkecvn','ksdfj','kdfjwe',1397318684,NULL,1),(11,'dfsdvcf',8,1,18,1,25,1,'sdf','','sdfsf','hjgjrtf','fgdvbv  ggnb','dfgtbngner344','3','dfvbg fg',1397318684,1397134838,1),(12,'ddsf',9,1,16,1,27,1,'2df','','fdg','dfsdfcv f','sfb vbfg','dsfc','dsv fvcv','sfdf',1397318684,1397134922,1),(13,'china',9,1,12,1,36,1,'sfadf','sdfaewf','sfsdf','sfvcvcvx','vdfdsf','xcvxcv','xc dvxvzv','dfc w434ddv df',1397318684,1397134977,1);
/*!40000 ALTER TABLE `app_bzhwj_appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_bzhwj_comment`
--

DROP TABLE IF EXISTS `app_bzhwj_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_bzhwj_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `cnt` text,
  `store_id` int(10) unsigned NOT NULL,
  `follower_id` int(10) unsigned NOT NULL DEFAULT '0',
  `reply_id` int(10) unsigned NOT NULL DEFAULT '0',
  `create_at` int(10) unsigned DEFAULT NULL,
  `update_at` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `store_follower_idx` (`store_id`,`follower_id`),
  KEY `user_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bzhwj_comment`
--

LOCK TABLES `app_bzhwj_comment` WRITE;
/*!40000 ALTER TABLE `app_bzhwj_comment` DISABLE KEYS */;
INSERT INTO `app_bzhwj_comment` VALUES (1,21,'这是对这个店铺的第一条评论',8,0,0,1397654225,1397654225,1),(2,8,'谢谢您的支持',8,1,0,1397655020,1397655020,1),(3,8,'这是我对你的第二次评论。',8,1,0,1397655055,1397655055,1),(4,19,'我是另一个用户，我对此店进行好评。',8,0,0,1397655077,1397655077,1),(5,20,'我是第三个用户。',8,0,0,1397655119,1397655119,1),(6,8,'我作为一个院长进行的回复',8,0,0,1397657373,1397657373,1),(7,8,'谢谢您的支持。',13,5,0,1398089985,1398089985,1),(8,8,'中国',8,6,0,1398090058,1398090058,1);
/*!40000 ALTER TABLE `app_bzhwj_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_bzhwj_news`
--

DROP TABLE IF EXISTS `app_bzhwj_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_bzhwj_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `read_time` int(10) unsigned DEFAULT '1',
  `update_at` int(10) unsigned DEFAULT NULL,
  `create_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bzhwj_news`
--

LOCK TABLES `app_bzhwj_news` WRITE;
/*!40000 ALTER TABLE `app_bzhwj_news` DISABLE KEYS */;
INSERT INTO `app_bzhwj_news` VALUES (4,'<p style=\"text-align:center;margin-left:27pt;text-indent:-18pt;\">\n	<span style=\"line-height:1.5;font-size:24px;font-family:SimSun;\"><strong>我是美业之星</strong></span> \n</p>\n<p style=\"text-align:left;margin-left:27pt;text-indent:-18pt;\">\n	<strong><span style=\"font-size:18px;\">百真诚信美容院</span></strong>\n</p>\n<p>\n	<br />\n</p>\n<div class=\"Section0\">\n	<p class=\"p0\" style=\"text-align:left;\">\n		<span style=\"font-size:16px;font-family:SimSun;\">&nbsp; &nbsp; &nbsp;<span style=\"line-height:2;\">爱美，做美容就上百真网。即日起入驻百真网美容院即可放心大胆消费。牵手百真，圆我美容明星梦。</span></span> \n	</p>\n</div>\n<p>\n	<span style=\"font-family:SimSun;font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp;入驻百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>的美容院必须遵守百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>的规则。不得在百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>内发布虚假产品。在百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>保障范围内的产品和店家交易过程与其他会员发生交易纠纷时，一旦任何一方或双方共同提交百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>要求调处，则百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>作为独立第三方，有权根据单方判断做出调处决定。百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>授权的第三方有权基于店家不可撤销得授权受理店家与其他会员因交易产生的争议，并有权单方判断与该争议相关的事实及应适用的规则，进而作出处理决定，该处理决定对店家有约束力。如店家未在限期内执行处理决定的，则百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>有权利（但无义务）直接使用店家向百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>及其关联公司交纳的保证金代为支付。店家应及时补足保证金并弥补百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>及其关联公司的损失，否则百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>及其关联公司有权直接抵减您在其它合同项下的权益，并有权继续追偿。</span> \n</p>\n<p>\n	<span style=\"font-family:SimSun;font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; 过去，美容行业缺少第三方的保障，有时候买到了假商品心里非常不舒服，但是这么一点钱去打官司，真的太大动干戈了。现在有了第三方担保就可以放心大胆的去做美容了，如果在入驻百真网的美容院里消费发现虚假产品，直接就可以去百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>得到应有的赔偿。而店家也将会受到百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>的处罚。百真网圆我美容明星梦。</span> \n</p>\n<span style=\"font-size:16px;font-family:SimSun;line-height:2;\"></span> \n<p>\n	<br />\n</p>','“百真网”美业诚信之星','Sanny',97,1395711432,NULL),(5,'<p style=\"text-align:center;margin-left:27pt;text-indent:-18pt;\">\n	<strong><span style=\"font-size:24px;\">百真网打造美业信息资源平台</span></strong>\n</p>\n<p class=\"p0\">\n	&nbsp; &nbsp; &nbsp;<span style=\"font-size:16px;line-height:2;\">&nbsp;</span><span style=\"font-size:16px;line-height:2;\">千呼万唤始出来，这一天终于来了。在2012</span><span style=\"font-size:16px;line-height:2;\">年</span><span style=\"font-size:16px;line-height:2;\">初，百真还只是在一个萌芽，而现在我们真正走入了美容业了。当下美容产业里，很多环节缺少完善的机制，美容院的产品鱼龙混杂。如何做才能给客人多一点保障？闻之淘宝，若比作是淘宝，美容还不够虚拟，不够混乱。淘宝是如何做到保障客人网购的安全性，解决的办法是第三方担保，在消费者还不能确定产品的品质和服务前，所有的交易由第三方担保。淘宝能把这么虚拟，这么混乱的网购整理的井井有条，那么我们该如何让美容业也做到这样呢。美容业不同于淘宝，美容业是维护固定的群体多次消费，产品固然重要，服务定是不可缺少的一部分，脱开服务谈产品，没有任何意义，脱开产品谈服务，无据可论。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; 经过长达一年的思索，终于有了答案。百真的诞生意味着美业将会迎来新的挑战。百真提供消费者第三方线下担保，如果客人在已入驻百真的美容院消费具有担保的商品，均享受百真无假第三方担保，只需要达成初识即可轻松得到假货产品的一定额度理赔和额外的赔偿金。投机取巧者，将自食恶果。未来的客人可以放心在入驻百真无假的美容院消费。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; 2014</span><span style=\"font-size:16px;line-height:2;\">年百真正式</span><span style=\"font-size:16px;line-height:2;\">启航，在起初到今天我们预备上线这二</span><span style=\"font-size:16px;line-height:2;\">年来</span><span style=\"font-size:16px;line-height:2;\">，无数的风风雨雨，大大小小的坎坷，我们坚强的走了过来，因为这一切都是值得的。百真始终相信，今天的努力，今天的汗水，终将换来的是美业最美的春天！</span> \n</p>\n<div>\n	<br />\n</div>\n<div>\n	<span style=\"line-height:1.5;\"></span> \n</div>','百真网正式启航','Sanny',111,1395711167,1394244016),(9,'<p>\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"/static/kindeditor/attached/image/20140325/20140325095438_44662.jpg\" alt=\"\" /> \n</p>\n<p>\n	<br />\n</p>\n<p>\n	<br />\n</p>\n<p>\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\">&nbsp; &nbsp; &nbsp; &nbsp; <span style=\"line-height:2;\">近日，全国微信营销火热进行中，在不断学习利用微信推广自己的品牌，让终端客户了解品牌历史和更多人熟悉品牌。百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>微信营销相结合是美容院拓客无疑使最好的方式，百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>作为美容院信息的载体，微信作为百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>的窗口。利用微信强大的通讯宣传功能，无疑能把美容院的品牌宣传的更彻底，更具有知名度。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span><span style=\"font-size:16px;line-height:2;\">建一个属于自己的微信号和二维码是前提，要求美容院老板和员工每个人建立一个微信号，设置一个阳光的头像，要求要与美容护肤有关的头像和昵称以及个性签名。能够熟练知道发消息、添加朋友、分享链接，与朋友圈互动、点赞等等基础操作方法。</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><strong>一、“百真<span style=\"font-family:SimSun;font-size:16px;line-height:32px;\">网</span>”是什么</strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; &nbsp;百真网是一个整合美业讯息资源的平台。为美容院、代理商、消费者提供一个集生产、经营、消费为一体的ABC</span><span style=\"font-size:16px;line-height:2;\">模式的电子商务平台，</span><span style=\"font-size:16px;line-height:2;\">大家都是这个平台的主人，生产者，消费者，经营者，合作者，管理者，大家相互服务，相互支持，你中有我，我中有你，真正形成一个利益共同体，资源共享，产、消共生而达到共同幸福的良性局面。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><br />\n</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">二、关注公众平台转发美容院动态进店消费更实惠</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; &nbsp;把百真<span style=\"font-size:16px;line-height:32px;\">网</span>的体验馆项目链接直接发到自己的微信公众平台，百真<span style=\"font-size:16px;line-height:32px;\">网</span>体验馆让客人以低门槛体验项目，就像以前的团购一样，但是体验馆相当于给美容院天天做团购，但是与团购的区别在于体验有免费有收费，体验的项目隔一段时间会去更新。不仅如此，客人可以在线咨询美容院该项目相关的一切信息。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"font-size:16px;line-height:2;\">关注</span><span style=\"font-size:16px;line-height:2;\">公众平台以后再转发美容院动态，对于顾客来说是几秒钟的事，但是在客户不了解不信赖的情况下，以更低的折扣一般都是可以接受的，进而还带动了消费。当消费完成以后，如果服务到位，效果令客户满意，不用您说，大部分女人都有手机控，肯定会露露脸美美的给美容院粉饰一番。也同样达到了微信朋友圈宣传的作用。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp;</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><strong>三、广泛利用二维码，百真<span style=\"font-size:16px;line-height:32px;\">网</span>信息永久进入终端用户手机</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"font-size:16px;line-height:2;\">现在很多美容院还是采取发传单和发名片的形式，目前也有一些美容院开始在传单和名片上印上二维码，这种不增加成本又能广泛宣传的方法确实可取。我想大部分都接过某某店的宣传单，有时候接传单并不是因为自己需要，对传单的内容也不太感兴趣，而是不好意思拒绝发传单者的热情，往往下一秒会觉得碍手就扔垃圾筒了，但是我们不可否定人类都是爱美的，不论是女性还是男性，用手机扫扫一下二维码，我们经常把自己做的比较好的一些项目链接发上去，客人直接用链接点到百真网的项目展示里面，不仅可以看到项目的好处还可以浏览到店里其他任何项目，对于项目有任何想要了解的随时可以在线咨询。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp;</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><span style=\"line-height:2;\">四、</span><strong><span style=\"line-height:2;\">百真<span style=\"font-size:16px;line-height:32px;\">网</span>提供线下第三方保障。</span></strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; &nbsp;百真网站支持线下交易保障。美容院入驻百真网会有信用保障金的形式表现。此保障金用于保障对买家或其他权利人的利益，以先行赔付为买家或其他权利人最大限度获取最先保障，这种保障形式被称为第三方保障。第三方保障是先下最安全的保障制度，第三方可以很好的保障买家在交易之后的利益安全。百真网站将以美业线下交易保障的第三方为百真<span style=\"font-size:16px;line-height:32px;\">网</span>会员提供保障服务。</span> \n</p>\n<p>\n	<br />\n</p>','百真网结合微信营销','Sanny',25,1395910968,1395455258),(11,'<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong>一、美容行业的未来</strong></span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; &nbsp;美容行业在中国已有近</span><span style=\"font-size:16px;line-height:2;\">20</span><span style=\"font-size:16px;line-height:2;\">多年的脚步了，这个从第三产业分支出来的高端消费服务行业已经日趋成熟。伴随着改革开放以来，中国的消费市场已经出现了翻天覆地的变化，消费层次的社会化大环境给了美容化妆品行业无限广阔的发展机会。</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">全国的美容行业已从单一的的店面服务，发展成为以美容、美发、医疗美容、美体、美甲、纹制、形象设计、色彩店面服务，以及专业职业教育、相关专业仪器、用品、用具、研发、生产、销售为主体的综合性产业，并在每个领域中诞生了龙头品牌和龙头企业。</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">中国美容业随着经济全球化迎来了更多的发展机遇，“十二五”我国将进一步促进美容美发业规范发展，力争“十二五”期间美容行业营业收入年均增长</span><span style=\"font-size:16px;line-height:2;\">15%</span><span style=\"font-size:16px;line-height:2;\">以上，到</span><span style=\"font-size:16px;line-height:2;\">2015</span><span style=\"font-size:16px;line-height:2;\">年超过</span><span style=\"font-size:16px;line-height:2;\">7700</span><span style=\"font-size:16px;line-height:2;\">亿元。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><br />\n</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><strong>二、信息全球化</strong></span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; &nbsp; 由古至今，信息传播的手段一直在不断的发展。第三次工业革命更是影响了人类生活方式和思维方式，使人类社会生活和人的现代化向&nbsp;更高境界发展。未来的世界必定是一个文明发达信息密集的世界（信息全球化）。</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">就今而言，由于电子计算机技术的发展，为人们提供了便捷的生活服务，为诸多行业带来了良好效应市场。电子商务的出现更是打破了传统的实体店经营模式，传统销售市场由于信息全球化得到了发展扩大。</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">信息全球化伴随着信息传播手段的成熟（大众传媒为主要）不断发展，对人们的生活的各方面产生影响，并成为一个显而易见的发展趋势。</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong>三、美业信息资源平台——百真网</strong></span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:2;\">&nbsp;</span><span style=\"line-height:2;\">美业市场的未来成长离不开信息全球化的发展趋势。“百真网”致力打造一个汇集美业信息资源的平台。“百真网”结合当下的网络信息优势创建一个ABC模式的电子商务平台，服务高端消费市场。“百真网”更准确的美业资讯，更专业的美业服务，更灵活的美业市场。</span></span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\">1、“百真网”将通过现有的所有资源帮助美店拓客。（包括不限：美店营销活动策划、微信营销战略、美店网络推广等）</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\">2、“百真网”通过美业信息资源整合帮助代理商寻求新兴市场。（包括不限：市场推广策划、微信营销策划、网络信息推广等）</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\">3、“百真网”为消费者提供周边“美店服务信息”和“美店活动体验”服务，并作为第三方保障消费者“线下交易”的利益。</span>\n</p>','“百真网”服务未来 ','Sanny',3,1396236867,1396236867);
/*!40000 ALTER TABLE `app_bzhwj_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_bzhwj_people`
--

DROP TABLE IF EXISTS `app_bzhwj_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_bzhwj_people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `content` text,
  `logo` varchar(1024) DEFAULT NULL,
  `editor` varchar(255) DEFAULT NULL,
  `update_at` int(10) unsigned DEFAULT NULL,
  `create_at` int(10) unsigned DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bzhwj_people`
--

LOCK TABLES `app_bzhwj_people` WRITE;
/*!40000 ALTER TABLE `app_bzhwj_people` DISABLE KEYS */;
INSERT INTO `app_bzhwj_people` VALUES (5,'殷建',8,'<p class=\"p0\">\n	<strong>&nbsp; &nbsp; </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/static/kindeditor/attached/image/20140325/20140325135228_14858.jpg\" alt=\"\" /><span style=\"font-size:16px;\"><strong>&nbsp; <span style=\"font-size:32px;\">&nbsp;殷 &nbsp;建</span> &nbsp; &nbsp;&nbsp;</strong></span><span style=\"font-size:16px;\"><strong>“&nbsp;百&nbsp;</strong><strong>真&nbsp;</strong><strong>网&nbsp;”&nbsp;</strong></span><span style=\"font-size:16px;line-height:2;\"><strong>创始人</strong><strong>。&nbsp;</strong></span><strong>&nbsp;</strong> \n</p>\n<p class=\"p0\">\n	<strong><br />\n</strong> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">&nbsp; &nbsp; </span><span style=\"font-size:16px;\">&nbsp;<span style=\"font-size:18px;line-height:3;\">1<span style=\"line-height:2.5;\">986</span></span></span><span style=\"font-size:18px;line-height:2.5;\">年</span><span style=\"font-size:18px;line-height:2.5;\">2</span><span style=\"font-size:18px;line-height:2.5;\">月，出生于安徽庐江县。</span><span style=\"font-size:18px;line-height:2.5;\">09</span><span style=\"font-size:18px;line-height:2.5;\">年大学毕业后便踏入美容行业。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2.5;\">&nbsp; &nbsp; &nbsp;先后涉及过美容产品开发研究，美容院整体布局设计，专业线产品市场推广，</span><span style=\"font-size:18px;line-height:2.5;\">专业美业人员心里课程培训，还涉及多媒体美容平台，可以说与美业结下了不解之缘。在短短的几年时间内，便熟悉了中国美容行业的概况。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2.5;\">&nbsp; &nbsp; &nbsp;2013</span><span style=\"font-size:18px;line-height:2.5;\">年，结合第三方保障平台模式致力在美业推广线下交易保障体系，创办了美容行业移动网络信息平台。美业线下交易联合保障体系，也就是百真联保，百真网通过和美容院、产品商达成协议来保证产品和项目的质量，确保每个客人的消费环境。先行赔付也能做到最大限度的保障客人的利益。在日趋电竞化的商业模式下，保障体系已经在不断完善，并涉及各行各业。在未来实体商业和电商不断结合的市场模式中第三方保障体系就显得格外重要。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2.5;\">&nbsp; &nbsp; &nbsp;百真网正是把这种模式推广到美容行业的线下交易，结合当下网络的信息优势，推动美容院和厂商的合作。这样不仅能扩大美业市场和建立厂商品牌优势而且通过第三方协议能保障客人的线下交易利益。只有完善的保障体系才能最好的保证市场的发展。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2.5;\">&nbsp; &nbsp; 百真网是一个信息资源平台，我们作为第三方担保独立存在。我们的目标是打造一个美业资源信息和消费保障体系的网络平台。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2.5;\">&nbsp; &nbsp; 在当下高速发达的现代信息优势，已经给各行各业带来意想不到的丰厚成果。在未来更具发展的网络信息优势将会极大的带动美业的发展。百真网将会努力实现现代的信息优势结合中国美容行业来推动美业发展。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2.5;\">&nbsp; &nbsp; 百真相信，今天我们坚持的程度，就是明天我们站立的高度！</span> \n</p>','http://img.bzhwj.com/img/aed3340d514279cac763df1f9b8e5241.jpg','Sanny',1395726925,1394593809,1),(13,'夏 玲',8,'<p class=\"p0\">\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"/static/kindeditor/attached/image/20140325/20140325131931_43328.jpg\" alt=\"\" />&nbsp; &nbsp;&nbsp;<span style=\"font-size:32px;\">夏 &nbsp;玲 &nbsp;<span style=\"font-size:14px;\"><strong>中医养生调理师</strong></span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:32px;\"><br />\n</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp; <span style=\"line-height:2;\">夏玲1987</span></span><span style=\"font-size:18px;line-height:2;\">年</span><span style=\"font-size:18px;line-height:2;\">出生于安徽省丰田小镇，夏玲的父母自小就对她教育非常重视。这为今天她在美业的地位做出了有力的积淀。</span><span style=\"font-size:18px;line-height:2;\">2009</span><span style=\"font-size:18px;line-height:2;\">夏玲高校毕业</span><span style=\"font-size:18px;line-height:2;\">后便走进美容行业，机缘巧合来到了无锡泓易企业，从一名美容导师开始。在泓易企业的二年时间里夏玲致力现代中医养生调理的学习，通过自己的努力终于获得了一定的经验成果。</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp;<span style=\"line-height:2;\"> 在此之后夏玲依据自己对于养生的了解，为泓易的许多客户解决了亚健康状态的身体问题，&nbsp;</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\">不仅得到了公司认可，也得到了同行的认同。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\">&nbsp; &nbsp; &nbsp; “我所有的努力，都是为了您的健康”这便是一个专业美导老师的从业素养。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\"><br />\n</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp;<span style=\"line-height:2;\"><strong>2011</strong></span></span><span style=\"font-size:18px;line-height:2;\"><strong>年夏天，夏玲在广州偶遇马可波罗瓷砖老板，被马可波罗老板御用为私人调理师。</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\">说来也巧，夏玲在广州出差时偶遇了当时由于工作繁重、生活快节奏的原因导致失眠缠身，一直求医无解的马可波罗老总。夏玲老师根据他平时的生活规律及生活习惯制定了一个调理的方法，再配合食疗产品便大大改善了马可波罗老总的失眠之症。自那之后，夏玲便成为了马可波罗老总的私人调理师。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; <strong>&nbsp;</strong><span style=\"line-height:2;\"><strong>2011</strong></span></span><span style=\"font-size:18px;line-height:2;\"><strong>年</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>2</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>月，夏玲参加全国私人调理师培训</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>。</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>&nbsp; &nbsp; &nbsp;2012</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>年</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>6</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>月，夏玲为超研美容院诊断，客人王女士送锦旗“妙手回春”私人调理师</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>&nbsp; &nbsp; &nbsp;2012</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>年</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>9</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>月，夏玲被公司评选为最佳中医养生内聘专家</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\"><span style=\"line-height:2;\"><strong>&nbsp; &nbsp; &nbsp;</strong></span><span style=\"line-height:2;\"></span><span style=\"line-height:2;\"><strong>2013</strong></span></span><span style=\"font-size:18px;line-height:2;\"><strong>年</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>2</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>月，夏玲被公司评为最佳业绩奖</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>&nbsp; &nbsp; &nbsp;2013</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>年</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>5</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>月，夏玲参加参加江苏中医养生课程培训，并在学习中获得“优异成绩”奖</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>&nbsp; &nbsp; &nbsp;2013</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>年</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>10</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>月，泓易内部员工专业技能培训成绩第一名</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>&nbsp; &nbsp; &nbsp;2014</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>年</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>1</strong></span><span style=\"font-size:18px;line-height:2;\"><strong>月，被公司评为最佳私人调理师，养生师。</strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; 夏玲现任无锡泓易公司中医养生美容院导师总顾问，现服务美店尖端市场客户群体。</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp;&nbsp;夏玲的美容之道：“我，想为您带来美丽，更想为您带来健康”</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;“上帝赐我最好的天赋，就是中医养生的理念”</span> \n</p>','http://img.bzhwj.com/img/6d4f971fa9e104b5bb7cb1b5acb84ea0.jpg','Sanny',1395886600,1395724917,1),(14,'刘 纯 依',8,'<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp;<img src=\"/static/kindeditor/attached/image/20140325/20140325151402_96184.jpg\" alt=\"\" />&nbsp; <span style=\"font-size:32px;\"><strong>&nbsp;刘 纯 依 &nbsp;<span style=\"font-size:14px;\">中医养生、市场总监</span></strong></span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; <strong>刘</strong></span><span style=\"font-size:18px;\"><strong>纯依</strong></span><span style=\"font-size:18px;\"><strong>18</strong></span><span style=\"font-size:18px;\"><strong>年美业经验</strong>。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp;<span style=\"line-height:2;\"> 现任泓易企业江苏市场总监。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\">&nbsp; &nbsp; 刘纯依自</span><span style=\"font-size:18px;line-height:2;\">1996</span><span style=\"font-size:18px;line-height:2;\">年从事美容行业，先后涉及过，厂商产品研发，地区市场推广，全国市场营销，专项品牌策划，专业讲师培训等等。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:1.5;font-size:18px;\"><span style=\"line-height:2;\">&nbsp; &nbsp; 刘纯依早前在某广州美容化妆品厂家做产品的研发，就积极为其推展新的技术。刘纯依发现</span><span style=\"line-height:2;\">他们工厂一直用的是水蒸气蒸馏法制取精油，但是当时已经有厂家引进更为先进的香脂法萃取精油，香脂法较之前的水蒸气蒸馏制取技术有很大的提升。在刘纯依的建议下，厂商采用了新技术。之后高端精油便成为该厂家主要经营的精油产品。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2;font-size:18px;\">&nbsp; &nbsp; &nbsp;2003</span><span style=\"line-height:2;font-size:18px;\">年，刘纯依从一个生产研发的资深技术师正式走入了市场，开始了十多年的中医养生学习。&nbsp;</span><span style=\"font-size:18px;line-height:2;\">此前，由于对产品的了解，这也为刘纯依在未来的工作中起到了至关重要的做用。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2;font-size:18px;\">&nbsp; &nbsp; &nbsp;2005</span><span style=\"line-height:1.5;font-size:18px;\"><span style=\"line-height:2;\">年，刘纯依广州对盆腔调理项目产生了浓厚的兴趣</span><span style=\"line-height:2;\">，这应该是刘纯依人生的一个重要的转折点。之后刘纯依便把精力都投向了中医妇科，而当时</span><span style=\"font-size:18px;line-height:2;\">中医妇科调理在中国寥寥无几，可是</span><span style=\"line-height:2;\"></span></span><span style=\"line-height:2;font-size:18px;\">9</span><span style=\"line-height:2;font-size:18px;\">0%</span><span style=\"line-height:2;font-size:18px;\">的成年女性几乎都有着不同程度的妇科问题，这些给中国女性带来了无穷无尽的烦恼。</span> \n</p>\n<p class=\"p0\">\n	<span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2;font-size:18px;\">&nbsp; &nbsp; &nbsp;2006</span><span style=\"line-height:2;font-size:18px;\">年，在广州的一家小美容院里，刘纯依第一次收到这么激动的礼物，再次坚定了自己未来的道路。结婚</span><span style=\"line-height:2;font-size:18px;\">10</span><span style=\"line-height:2;font-size:18px;\">年的夫妻没有生育，在刘纯依的指导下怀孕了，并送刘依纯依锦旗“求佛不如求医，求医必求中医”。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2;font-size:18px;\">&nbsp; &nbsp; &nbsp;2006-2008</span><span style=\"line-height:2;font-size:18px;\">年，刘纯依在此期间参加无数的专业知识培训，为无数的女性解决了妇科问题。获得过很多的奖项和锦旗。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:1.5;font-size:18px;\"><span style=\"line-height:2;\">&nbsp; &nbsp; &nbsp;</span><span style=\"line-height:2;\">2008</span></span><span style=\"line-height:2;font-size:18px;\">年，刘纯依加入了泓易企业，在泓易企业巨大的贡献在半年的时间里就提拔为大区经理。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2;font-size:18px;\">&nbsp; &nbsp; &nbsp;2010</span><span style=\"line-height:2;font-size:18px;\">年，刘纯依再次被泓易提拔为市场总监。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:1.5;font-size:18px;\"><span style=\"line-height:2;\">&nbsp; &nbsp; &nbsp;泓易的张总在一次员工大会上曾说，如果说我们的企业有今天，你们不是要感谢我，而是要感谢的是你们的刘总监，因为没有她就没有</span><span style=\"line-height:2;\">今天的</span><span style=\"font-size:18px;line-height:2;\">泓易</span><span style=\"line-height:2;\"></span><span style=\"line-height:2;\">。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2;font-size:18px;\">&nbsp; &nbsp; &nbsp;刘纯依</span><span style=\"line-height:2;font-size:18px;\">1</span><span style=\"font-size:18px;line-height:2;\">8</span><span style=\"line-height:2;font-size:18px;\">年的含辛茹苦她觉得这一切都是值得的，在这</span><span style=\"line-height:2;font-size:18px;\">18</span><span style=\"line-height:2;font-size:18px;\">年的时间里，太多人摆脱了妇科的烦恼，太多人对刘纯依充满感激之心。也正是因为如此，刘纯依在自己的职业生涯中一刻没有松懈过。</span> \n</p>\n<p>\n	<br />\n</p>','http://img.bzhwj.com/img/eb2b3b7cd7b574f0c445562552ad3880.jpg','Sanny',1395886676,1395731746,1),(15,'彭 玉 梅',8,'<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/static/kindeditor/attached/image/20140327/20140327100920_69090.jpg\" alt=\"\" />&nbsp; &nbsp; &nbsp;<span style=\"font-size:32px;\">彭 玉 梅 <span style=\"font-size:12px;\"><span style=\"font-size:12px;\"><strong>&nbsp;</strong></span><span style=\"font-size:12px;\"><strong>中医督导</strong></span></span></span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;彭玉梅现任泓易企业资深督导，国医张震教授弟子。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:2;\">张震教授，中医卫生部中医药管局直属中医专家，中医国医大师，北京国医堂中医主任医师，北京中医药大学教授，中华中医药委员会委员。曾为众多政界官员搭脉巡诊，在行业内一直得到专家好评。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; <span style=\"line-height:2;\">张震教授擅长号脉诊断，曾经为河北省委常委省军区司令员陈玉田，解放军总参谋部保障部原政委郭春生等国家重要机关人员号脉诊断。彭玉梅接受予张震教授的教学对号脉有了深远的造诣。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><span style=\"line-height:2;\">&nbsp; &nbsp; &nbsp; 曾经在苏州坐诊客人，预知此客人为肿瘤体制，有预防肿瘤的必要。在不久之后此客人感觉身体</span><span style=\"line-height:2;\">不适，亲自去医院检查身体，医生明确告知有肿瘤，庆幸的是该肿瘤属于前期，并不会给生命带来重大创伤，但是要及时接受治疗。自此之后彭玉梅老师在整个公司内部得誉“号脉肿瘤专家”之称。在整个市场上彭玉梅也因为无数的客人准确识别肿瘤体制为得到一致好评。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;2012</span><span style=\"font-size:16px;line-height:3;\">年，彭玉梅被泓易企业提拔为公司最高级技术人员，资深督导。彭玉梅凭借自己的专业知识，赢得了在公司至高无上的认可。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;2013</span><span style=\"font-size:16px;line-height:3;\">年，彭玉梅首次为公司创造年个人业绩最高指标，在</span><span style=\"font-size:16px;line-height:3;\">2013</span><span style=\"font-size:16px;line-height:3;\">年年会上被泓易企业评选为“年终最佳业绩天使”</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;彭玉梅深厚的中医养生专业知识和张震教授真传号脉，让彭玉梅在美业的道路上如鱼得水。</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><span style=\"line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;张振教授弟子，国医，把脉非常专业，最专业是把脉，把肿瘤脉。预知体制是不是能得肿瘤的可</span>能</span> \n</p>','http://img.bzhwj.com/img/66e304d3bdfaea09795fbd7b336508c9.jpg','',1395886623,1395885770,1),(16,'任 丽 萍',8,'<p class=\"p0\">\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/static/kindeditor/attached/image/20140327/20140327101325_34879.jpg\" alt=\"\" />&nbsp; &nbsp;&nbsp;<span style=\"font-size:32px;\"><strong>任 丽 萍</strong> &nbsp;<span style=\"font-size:12px;\"><strong>中医正骨</strong></span></span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp; &nbsp; 任</span><span style=\"font-size:16px;line-height:3;\">丽萍，现任泓易企业市场部主任，2006年入公司，时至今日已经7年之久。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style=\"line-height:2;\">任丽萍在入泓易之前，一直是在广州的一家私人理疗会所跟随自己的师傅专门做正骨，自己的家师曾经接待过众多商业富豪以及政府官员，凡是家师接待的客人几乎所有都得到了明显的改善。附有潜力的任丽萍在短短</span></span><span style=\"font-size:16px;line-height:2;\">4</span><span style=\"font-size:16px;line-height:2;\">年的时间里得到了家师的真传，任丽萍在自己的家师的鼓励下自己在福建开了一家属于自己的私人理疗会所，虽然有着非常专业的手法和知识，但是由于缺少市场经验，最终在</span><span style=\"font-size:16px;line-height:2;\">1</span><span style=\"font-size:16px;line-height:2;\">年的时间里忍痛割爱的关闭了自己的会所。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp; 2<span style=\"line-height:2;\">006</span></span><span style=\"font-size:16px;line-height:2;\">年的春天，任丽萍想找一份接触市场的工作，填补自己现在的不足，偶然的一次机会在广州认识泓易企业刘总，刘总很看好任丽萍的专业，刘总后来说，当时我看到的不是一个人，而是有欲望趋势的灵魂。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; <span style=\"line-height:2;\">&nbsp;2007</span></span><span style=\"font-size:16px;line-height:2;\">年任丽萍对于市场已经有了一定的认识，在这一年的夏天，任丽萍由于长期在外地出差加上久坐空调室内诱发了类风湿性关节炎，在同年的冬天，任丽萍凭着自己的专业知识，给你自己制定了一个方案大大的改善了风湿关节炎的症状，在调理的过程中用的是刘总的产品，此后更对刘总的产品充满了信心。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;2008</span><span style=\"font-size:16px;line-height:3;\">年，任丽萍有了之前的经历，专攻治疗风湿性关节炎。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"line-height:2;\">2010</span></span><span style=\"font-size:16px;line-height:2;\">年在广州第一次收到客人的锦旗，一个历经</span><span style=\"font-size:16px;line-height:2;\">8</span><span style=\"font-size:16px;line-height:2;\">年的风湿性关节炎的折磨，在任丽萍的调理下的得到了非常好的改善，客人在送锦旗的时候说，任老师，真的不知道要怎么样答谢你。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; 2011</span><span style=\"font-size:16px;line-height:3;\">年任丽萍凭借自己的实力成为了泓易企业市场部主任，良好的沟通管理，专业的中医养生知识得到了泓易企业一致认可。</span>\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\">&nbsp; &nbsp; &nbsp; <span style=\"line-height:2;\">2014</span></span><span style=\"font-size:16px;line-height:2;\">年，任丽萍来泓易已有</span><span style=\"font-size:16px;line-height:2;\">7</span><span style=\"font-size:16px;line-height:2;\">年之久。张总在全员工动员大会上说，任老师是公司成长不可分割的一部分。</span>\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">任主任，12年经验，专业好，风湿性关节炎</span>\n</p>','http://img.bzhwj.com/img/addbdac4b7ea1d917e6abf25ea764078.jpg','',1395886584,1395886584,1);
/*!40000 ALTER TABLE `app_bzhwj_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_bzhwj_store_member`
--

DROP TABLE IF EXISTS `app_bzhwj_store_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_bzhwj_store_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `create_at` int(10) unsigned DEFAULT NULL,
  `update_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store_user_idx` (`store_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bzhwj_store_member`
--

LOCK TABLES `app_bzhwj_store_member` WRITE;
/*!40000 ALTER TABLE `app_bzhwj_store_member` DISABLE KEYS */;
INSERT INTO `app_bzhwj_store_member` VALUES (8,8,8,1,1397925803,1397925803),(9,13,8,1,1398093466,1398093466);
/*!40000 ALTER TABLE `app_bzhwj_store_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_bzhwj_tuijian_goods`
--

DROP TABLE IF EXISTS `app_bzhwj_tuijian_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_bzhwj_tuijian_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `content` text,
  `editor` varchar(255) DEFAULT NULL,
  `com_name` varchar(255) DEFAULT NULL,
  `com_address` varchar(255) DEFAULT NULL,
  `update_at` int(10) unsigned DEFAULT NULL,
  `create_at` int(10) unsigned DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title_idx` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_bzhwj_tuijian_goods`
--

LOCK TABLES `app_bzhwj_tuijian_goods` WRITE;
/*!40000 ALTER TABLE `app_bzhwj_tuijian_goods` DISABLE KEYS */;
INSERT INTO `app_bzhwj_tuijian_goods` VALUES (12,'天麻 离活素（A）',8,'<p class=\"p0\">\n	<img src=\"/static/kindeditor/attached/image/20140326/20140326155405_56610.jpg\" alt=\"\" /> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp; <span style=\"line-height:1.5;\">本产品</span></span><span style=\"font-size:18px;line-height:1.5;\"><strong>『真御太』</strong></span><span style=\"font-size:18px;line-height:1.5;\"><span style=\"line-height:1.5;\">系</span><span style=\"line-height:1.5;\">列古方之<strong>“颈方”</strong>为据，结合现代人颈肩，头部不适之根源，科学祖方，引进现代法国超临界离子萃取、透化技术，精心配制出名贵的颈肩、头部专用的离活素，以活血化瘀、祛风除湿、通络止痛，使头，颈及肩部轻松自如，如释重负之感。有效防止肩周组织劳损、颈椎病变、脑血管疾病。</span></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>主要成分</strong>：天麻，地龙骨，藿香，没药，乌梅，桂枝等。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:1.5;\"><strong>作 &nbsp; &nbsp; &nbsp;用</strong>：通过作用于肩颈、头部经络，以通畅经络，透出导致经络阻滞的风寒、湿的痹积，补充能量，已达到相关部委锐干经络循环自若，使人肩，颈舒泰，活动自如，消除紧、硬以及酸痛等症。使用数日即有通体舒适之感，能促进肩、颈以及头部机体自我修复，改善睡眠，消除疲劳，缓解头痛头昏，上肢麻木等症。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>适 &nbsp; &nbsp; &nbsp;用</strong>：颈肩部位不适及引起的头痛、头昏、上肢、、麻木者。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:1.5;\"><strong>用法用量</strong>：每日一次，每次20ml，分三个阶段按顺序分别使用“通、调、补”的离活素涂刷于肩颈、头部相应的经络穴位，并辅以对应的手法推经拿穴，每次刷液三遍，每遍间隔2-3分钟，连续使用24天为一个，疗程，一般2-3疗程即可。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:1.5;\">温馨提示：在使用本品时，应结合本人的工作、生活实际。经常活动头颈部（如“凤”“米”字点头），枕头宜平不宜高，再辅以强肝、补肾则效果更快。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><strong>注意事项</strong>：常温遮光，密闭保存，过敏者慎用。禁口服，慎入眼。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\"><br />\n</span> \n</p>','','','',1395836895,1395818220,'http://img.bzhwj.com/img/c7764b2d4f439fe9f81178d692dd7f7a.jpg'),(13,'犀角·离活素（A）',8,'<p class=\"p0\">\n	<span style=\"font-size:16px;\"><strong><img src=\"/static/kindeditor/attached/image/20140326/20140326163058_55666.jpg\" alt=\"\" /></strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp;犀角·离活素</strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\">&nbsp; &nbsp; &nbsp; <span style=\"line-height:2;\">本产品针对现代人的腰背部的常见症状及致病原因，结合“真御太”系列古方之“背”方，引进现代法国超临界离子萃取、透化技术精心配制出名贵的针对腰背部专用离活素，以祛风除湿、活血通络、止痛强腰，缓解腰背部酸痛、运动受限、下肢麻木等症，有效防止腰背部软组织劳损、腰椎病、坐骨神经病变等。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><br />\n</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong><span style=\"line-height:3;\">主要成分</span></strong><span style=\"line-height:3;\">：犀角，天兰黄。肉桂，胆南星，杜仲，羌活，皂刺，补骨脂，丁香等。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:1.5;\"><strong><span style=\"line-height:2;\">作 &nbsp; &nbsp; &nbsp; 用</span></strong><span style=\"line-height:2;\">：于腰背部相应的经络疏通经络，透出风、湿、寒等痹积，补充能量，以使相应的经络循环自如，畅通无碍，激活腰背部肌肉活力，促进机体滋生修复，则气血畅、腰肾强，令人腰部及下肢舒泰，活动自如，消除酸胀疼痛，运动首相，下肢麻木等症。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong><span style=\"line-height:3;\">适 &nbsp; &nbsp; &nbsp;用</span></strong><span style=\"line-height:3;\">：腰背部不适及引起的患部酸痛，运动受限，下肢麻木症。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong><span style=\"line-height:2;\">用法用量</span></strong><span style=\"line-height:2;\">：每日一次，每次20ml，分三个阶段按顺序分别使用“同、调、补”的离活素涂刷于腰背部相应的经络穴位，并辅以对应的手法推经拿穴，每次刷液三遍，每遍间隔2-3分钟，连续使用24天为一个，疗程，一般2-3疗程即可。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong><span style=\"line-height:2;\">温馨提示</span></strong><span style=\"line-height:2;\">：使用本产品时，须结合本人的工作，生活实际，经常活动腰部，保持正确的坐姿，睡眠以硬质床板为宜，同事辅以强肝补肾，则显效更快。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong><span style=\"line-height:3;\">注意事项</span></strong><span style=\"line-height:3;\">：常温遮光，密闭保存，过敏者慎用。禁口服，慎入眼。</span></span> \n</p>','','','',1395835655,1395822786,''),(14,'山海棠·离活素（B）',8,'<p class=\"p0\">\n	<span style=\"font-size:16px;\"><img src=\"/static/kindeditor/attached/image/20140326/20140326163848_24102.jpg\" alt=\"\" /><br />\n</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>&nbsp;</strong><strong>山海棠·离活素</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><strong><br />\n</strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\">&nbsp; &nbsp; &nbsp; <span style=\"line-height:2;\">本产品针对现代人各类关节常见病症及致病原因，以“真御太”系列古方之“关节”方为据，引进现代法国超临界萃取、透化技术，科学组方，精心配制出名贵的各关节专用离活素，清热解毒、祛风除湿、化瘀止痛。缓解关节红热肿痛，活动受限等症状，有效防治风湿性关节炎、关节骨质增生、关节内及周围软组织损伤等。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><span style=\"line-height:2;\"><br />\n</span></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong>主要成分</strong>：昆明山海棠，雪莲，木瓜，牛滕，桂枝，灵仙，一支蒿，天南星等。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong><span style=\"line-height:2;\">作 &nbsp; &nbsp; &nbsp; 用</span></strong><span style=\"line-height:2;\">：通过作用于各关节及相应的经穴，疏通经络，散透风、湿、寒等痹积，补充能量，使经络运行无阻，激活关节及其组织活力，促进自身修复，达到关节运动自若、伸屈如意，消除个关节运动受限、红肿热痛等症。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong>适 &nbsp; &nbsp; &nbsp;用</strong>：各关节不适引起的关节酸胀疼痛，运动受限者。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><strong>用法用量</strong>：每日一次，每次20ml，分三个阶段按顺序分别使用“通、调、补”的离活素涂刷刷于各关节相应的经络穴位，并辅以对应的手法推经拿穴，每次刷液三遍，每遍间隔2-3分钟，连续使用24天为一个疗程，一般2-3疗程即可。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong>温馨提示</strong>：使用本品阶段，须结合本人实际情况，适量运动，尽量避免寒冷潮湿的侵袭，并辅以养脾胃、通气血、强肝肾、壮筋骨等治疗最佳。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2.5;\"><strong>注意事项</strong>：常温避光，密封保存，过敏者慎用。禁口服，慎入眼。</span> \n</p>','','','',1395837724,1395823251,''),(15,'玄参 离活素（B）',8,'<p class=\"p0\">\n	<img src=\"/static/kindeditor/attached/image/20140326/20140326174658_69549.jpg\" alt=\"\" /> \n</p>\n<p class=\"p0\">\n	&nbsp; &nbsp; <strong>&nbsp;</strong><span style=\"font-size:18px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong><span style=\"font-size:32px;\">玄参 离活素<span style=\"font-size:10px;\"></span></span></strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;\"><strong><span style=\"font-size:32px;\"><span style=\"font-size:10px;\"><br />\n</span></span></strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2.5;font-size:16px;\"><span style=\"line-height:2;\">本品针对现代人静脉（尤以下肢静脉）的常见不适以及根本原因，以“真御太”方为据，采用法国超临界离子萃取、透化技术，科学组方，精心配制出名贵的静脉专用离活素，清热利湿、温阴散寒、活血行气、通络止痛，缓解静脉曲张所致的患肢缺血、疼痛、以及游走性血栓性静脉炎</span>。</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2.5;font-size:16px;\"><strong>主要成分</strong>：玄参，当归，黄柏，赤芍，桃仁，红花，地龙，杜仲，紫花，地丁等。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2.5;font-size:16px;\"><strong><span style=\"line-height:2;\">作 &nbsp; &nbsp; &nbsp; &nbsp;用</span></strong><span style=\"line-height:2;\">：通过作用于患部及其周围的经穴，离活素直达病灶，活血化瘀、疏坚散结、通络止痛，补充能量，促进机体自我修复能力，有效解决因此而致的环志酸痛、肿胀和色素沉淀，同时还能再建血管通道，疗效不凡。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2.5;font-size:16px;\"><strong>适 &nbsp; &nbsp; &nbsp; &nbsp;用</strong>：静脉曲张以及引起的酸痛、肿胀、色素沉淀等。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2.5;font-size:16px;\"><strong><span style=\"line-height:2;\">用法用量</span></strong><span style=\"line-height:2;\">：每日一次，每次20ml，分三个阶段按顺序分别使用“通、调、补”的离活素涂刷于患部及相应的经络穴位，并辅以对应的手法推经拿穴，每次刷液三遍，每遍间隔2-3分钟，连续使用24天为一个疗程。一般2-3疗程即可。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2.5;font-size:16px;\"><strong><span style=\"line-height:2;\">温馨提示</span></strong><span style=\"line-height:2;\">：使用本品阶段须结合本人的实际情况，适量运动，不宜常站、坐，需避潮湿寒冷，不吸烟，因此症为脾肾阳虚、复感寒湿，而致气血凝滞，故宜同时温补脾肾。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2.5;font-size:16px;\"><strong>注意事项</strong>：常温避光，密封保存，过敏者慎用。禁口服，慎入眼。</span> \n</p>','','','',1395837768,1395827441,''),(16,'鹿角 离活素（C)',8,'<p class=\"p0\">\n	<span style=\"font-size:32px;\"><strong><img src=\"/static/kindeditor/attached/image/20140326/20140326194719_75427.jpg\" alt=\"\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:32px;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 鹿角·离活素</strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\">&nbsp; &nbsp; &nbsp; &nbsp;</span><span style=\"line-height:2;font-size:16px;\">本产品针对现代女性特点，以“真御太”系列古方之“内方”为据。引进法国超临界离子萃取、透化技术，以科学组方，精心配制的名贵卵巢部专用离活素，扶正固本，活血化瘀，清热解毒，全面调节内分泌，活跃脏腑，通经络，强气血，补充能量，激发机体活力，有效延缓更年期的到来，长久保持女性健美。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"line-height:2;font-size:16px;\"><br />\n</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong>主要成分</strong>：鹿角，藏红花、高丽参、生黄芪、龟板、女贞子、肉苁蓉、红枣、杜仲等。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><strong>作 &nbsp; &nbsp; &nbsp; 用</strong>：通过作用于卵巢及相应的经络穴位，扶正固本、活血化瘀，滋阴养阳，有效延缓更年期的到来，并缓解因其功能紊乱引起的月经不调、失眠易怒、发胖、褐斑、乳房下垂等症。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong>适 &nbsp; &nbsp; &nbsp; 用</strong>：卵巢部位不适者。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong><span style=\"line-height:2;\">用法用量</span></strong><span style=\"line-height:2;\">：每日一次，每次20ml，分三个阶段按顺序分别使用“通、调、补”的离活素涂刷于卵巢及相应的经络穴位，并辅以对应的手法推经拿穴，每次刷液三遍，没变间隔2-3分钟，连续使用24天为一个疗程，一般2-3疗程即可。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong><span style=\"line-height:2;\">温馨提示</span></strong><span style=\"line-height:2;\">：使用本品须结合本人的实际情况，应畅情志、多休息、减房劳、重营养。中医认为卵巢功能与肾气渐衰、精血不足有关，故最好能同时予以心、脾、肾的调养。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong>注意事项</strong>：常温避光，密封保存，过敏者慎用。禁口服，慎入眼。</span> \n</p>','','','',1395836245,1395834606,''),(17,'黄芪 离活素（C)',8,'<p class=\"p0\">\n	&nbsp;<img src=\"/static/kindeditor/attached/image/20140326/20140326195530_11842.jpg\" alt=\"\" /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span style=\"font-size:32px;\"><strong>&nbsp;&nbsp;</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:32px;\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 黄芪·离活素</strong></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:32px;\"><strong><br />\n</strong></span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:18px;line-height:2;\">&nbsp; &nbsp; &nbsp; 本产品针对现代女性特点，以“真御太”系列古方之“内方”为据，引进法国超临界离子萃取、透化技术，科学组方。精心配制名贵的子宫专用离活素，补气摄血、活血化瘀、调经止血、调节内分泌，补充能量，激发子宫活力，增强机体功能，有效缓解月经周期紊乱、经带异常、肿块、发炎等症。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><br />\n</span> \n</p>\n<p class=\"p0\">\n	<br />\n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong>只要成分</strong>：黄芪、当归、党参、阿胶、何首、熟地、三七、海螵蛸等。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong><span style=\"line-height:2;\">作 &nbsp; &nbsp; &nbsp; &nbsp;用</span></strong><span style=\"line-height:2;\">：独特的配方针对女性子宫，通过的作用于子宫及相应的经络穴位，小分子量离活素更易透皮二达到患部，补气摄血、活血化瘀、调经止痛、调节内分泌，补充能量，有效缓解子宫不适及其相关的月经不调、肿块、妇科炎症等。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong>适 &nbsp; &nbsp; &nbsp; &nbsp;用</strong>：子宫不适者。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;\"><strong><span style=\"line-height:2;\">用法用量</span></strong><span style=\"line-height:2;\">：</span><span style=\"line-height:2;\">每日一次，每次20ml。分三个阶段按顺序分别使用“通、调、补”的离活素涂刷于子宫及相应的经络穴位，并辅以对应的手法推经拿穴，每次刷液三遍，每遍间隔2-3分钟，连续使用24天为一个疗程，一般2-3疗程即可。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong><span style=\"line-height:2;\">温馨提示</span></strong><span style=\"line-height:2;\">：使用本品须结合本人实际情况，加强营养，舒情畅志，减少房劳。此类症候主要由肾、脾、肝功能失常，不能故摄经血所致，故能辅以相应的脏腑调理为佳。</span></span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:3;\"><strong>注意事项</strong>：常温避光，密封保存，过敏者慎用。禁口服，慎入眼。</span> \n</p>','','','',1395838511,1395834983,'');
/*!40000 ALTER TABLE `app_bzhwj_tuijian_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_common_mis_page_app_config`
--

DROP TABLE IF EXISTS `app_common_mis_page_app_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_common_mis_page_app_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_key` (`app`),
  UNIQUE KEY `title_key` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_common_mis_page_app_config`
--

LOCK TABLES `app_common_mis_page_app_config` WRITE;
/*!40000 ALTER TABLE `app_common_mis_page_app_config` DISABLE KEYS */;
INSERT INTO `app_common_mis_page_app_config` VALUES (1,'bzhwj','百真无假',1388216632,1388216632,1),(2,'bzhwj_people','百真无假风云人物',1393758237,1393758237,1),(3,'bzhwj_tuijian_goods','百真无假精品栏目',1393855027,1393855027,1),(4,'bzhwj_shop_grade','show_grade',1395846620,1395846620,1);
/*!40000 ALTER TABLE `app_common_mis_page_app_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_common_mis_page_table_extra_config`
--

DROP TABLE IF EXISTS `app_common_mis_page_table_extra_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_common_mis_page_table_extra_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL,
  `seg` varchar(80) NOT NULL,
  `extra` text,
  `title` varchar(255) NOT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id_seg_key` (`app_id`,`seg`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_common_mis_page_table_extra_config`
--

LOCK TABLES `app_common_mis_page_table_extra_config` WRITE;
/*!40000 ALTER TABLE `app_common_mis_page_table_extra_config` DISABLE KEYS */;
INSERT INTO `app_common_mis_page_table_extra_config` VALUES (40,1,'hot_project','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:12:\"热门项目\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:8:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:5:\"intro\";a:2:{s:4:\"show\";s:6:\"简介\";s:4:\"type\";s:8:\"textarea\";}s:7:\"feature\";a:2:{s:4:\"show\";s:6:\"特点\";s:4:\"type\";s:8:\"textarea\";}s:6:\"effect\";a:1:{s:4:\"show\";s:6:\"效果\";}s:10:\"fit_person\";a:1:{s:4:\"show\";s:12:\"适合人群\";}s:10:\"fit_season\";a:1:{s:4:\"show\";s:12:\"适合季节\";}s:5:\"style\";a:1:{s:4:\"show\";s:6:\"样式\";}}}','热门项目',NULL,NULL,1),(41,0,'','N;','',NULL,NULL,1),(46,1,'hot_news','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:12:\"热点新闻\";s:5:\"fixed\";b:1;}s:7:\"modules\";a:2:{i:0;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"左侧\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:5:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}s:5:\"intro\";a:2:{s:4:\"show\";s:6:\"简介\";s:4:\"type\";s:8:\"textarea\";}s:5:\"style\";a:1:{s:4:\"show\";s:6:\"样式\";}}}i:1;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"右侧\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:5:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}s:5:\"intro\";a:2:{s:4:\"show\";s:6:\"简介\";s:4:\"type\";s:8:\"textarea\";}s:5:\"style\";a:1:{s:4:\"show\";s:6:\"样式\";}}}}}','热点新闻',NULL,NULL,1),(49,1,'star_meirong','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:12:\"明星美容\";s:5:\"fixed\";b:1;}s:7:\"modules\";a:2:{i:0;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"左侧\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:5:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}s:5:\"intro\";a:2:{s:4:\"show\";s:6:\"简介\";s:4:\"type\";s:8:\"textarea\";}s:5:\"style\";a:1:{s:4:\"show\";s:6:\"样式\";}}}i:1;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"右侧\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:5:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}s:5:\"intro\";a:2:{s:4:\"show\";s:6:\"简介\";s:4:\"type\";s:8:\"textarea\";}s:5:\"style\";a:1:{s:4:\"show\";s:6:\"样式\";}}}}}','明星美容',NULL,NULL,1),(54,1,'top_slider','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:15:\"顶部轮播图\";s:5:\"fixed\";b:1;}s:7:\"modules\";a:5:{i:0;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:9:\"第一张\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}i:1;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:9:\"第二张\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}i:2;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:9:\"第三张\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}i:3;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:9:\"第四张\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}i:4;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:9:\"第五张\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}}}','顶部轮播图',NULL,NULL,1),(56,1,'search_recommend','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:18:\"顶部搜索推荐\";s:5:\"fixed\";b:1;}s:7:\"modules\";a:2:{i:0;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"上面\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:5:\"style\";a:1:{s:4:\"show\";s:6:\"样式\";}}}i:1;a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"下面\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:4:\"link\";a:1:{s:4:\"show\";s:6:\"链接\";}s:5:\"style\";a:1:{s:4:\"show\";s:6:\"样式\";}}}}}','顶部搜索推荐',NULL,NULL,1),(57,3,'bzhwj_tuijian_goods_same_brand','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:21:\"同品牌其他系列\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"名称\";}s:3:\"url\";a:1:{s:4:\"show\";s:6:\"链接\";}s:3:\"img\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}','同品牌其他系列',NULL,NULL,1),(58,3,'bzhwj_tuijian_goods_other_brand','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:12:\"其他品牌\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"名称\";}s:3:\"url\";a:1:{s:4:\"show\";s:6:\"链接\";}s:3:\"img\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}','其他品牌',NULL,NULL,1),(60,3,'','N;','精品项目推荐',NULL,NULL,1),(62,1,'bzhwj_index_jing_pin_tuijian_goods','a:2:{s:5:\"title\";a:2:{s:4:\"show\";s:18:\"精品项目推荐\";s:5:\"fixed\";b:1;}s:6:\"fields\";a:3:{s:5:\"title\";a:1:{s:4:\"show\";s:6:\"标题\";}s:3:\"url\";a:1:{s:4:\"show\";s:6:\"链接\";}s:6:\"imgurl\";a:2:{s:4:\"show\";s:6:\"图片\";s:10:\"input_type\";s:4:\"file\";}}}','精品项目推荐',NULL,NULL,1);
/*!40000 ALTER TABLE `app_common_mis_page_table_extra_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_common_mis_page_table_extra_data`
--

DROP TABLE IF EXISTS `app_common_mis_page_table_extra_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_common_mis_page_table_extra_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app` varchar(80) NOT NULL,
  `record_id` int(10) unsigned NOT NULL DEFAULT '0',
  `seg` varchar(80) NOT NULL,
  `data` text,
  `preview_data` text,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `pub_st` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_record_id_seg_key` (`app`,`record_id`,`seg`)
) ENGINE=InnoDB AUTO_INCREMENT=361 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_common_mis_page_table_extra_data`
--

LOCK TABLES `app_common_mis_page_table_extra_data` WRITE;
/*!40000 ALTER TABLE `app_common_mis_page_table_extra_data` DISABLE KEYS */;
INSERT INTO `app_common_mis_page_table_extra_data` VALUES (8,'bzhwj',0,'hot_project','a:3:{i:0;a:8:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:5:\"dfsdf\";s:5:\"intro\";s:0:\"\";s:7:\"feature\";s:0:\"\";s:6:\"effect\";s:0:\"\";s:10:\"fit_person\";s:0:\"\";s:10:\"fit_season\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}','a:3:{i:0;a:8:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:5:\"dfsdf\";s:5:\"intro\";s:0:\"\";s:7:\"feature\";s:0:\"\";s:6:\"effect\";s:0:\"\";s:10:\"fit_person\";s:0:\"\";s:10:\"fit_season\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}',1388749931,1393065814,1,1),(36,'bzhwj',0,'hot_news','a:2:{i:0;a:5:{i:0;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/032b2cc936860b03048302d991c3498f.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}}i:1;a:5:{i:0;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8550e8b4203adb2bb18402f38fcaee58.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}}}','a:2:{i:0;a:5:{i:0;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/032b2cc936860b03048302d991c3498f.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:21:\"百真网正式启航\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=5\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:0:\"\";s:5:\"style\";s:0:\"\";}}i:1;a:5:{i:0;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8550e8b4203adb2bb18402f38fcaee58.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:27:\"百真网结合微信营销\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=9\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}}}',1389797020,1396237102,1,1),(37,'bzhwj',0,'star_meirong','a:2:{i:0;a:5:{i:0;a:5:{s:5:\"title\";s:33:\"“百真网”美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/b32012febce02d77d0362f1df5886557.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:39:\"“百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:39:\"”百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:39:\"”百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:39:\"”百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}}i:1;a:5:{i:0;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8550e8b4203adb2bb18402f38fcaee58.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}}}','a:2:{i:0;a:5:{i:0;a:5:{s:5:\"title\";s:33:\"“百真网”美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/b32012febce02d77d0362f1df5886557.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:39:\"“百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:39:\"”百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:39:\"”百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:39:\"”百真网“打造美业诚信之星\";s:4:\"link\";s:49:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=4\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}}i:1;a:5:{i:0;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8550e8b4203adb2bb18402f38fcaee58.jpg\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:1;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:2;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:3;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}i:4;a:5:{s:5:\"title\";s:27:\"“百真网”服务未来\";s:4:\"link\";s:50:\"http://www.bzhwj.com/index.php?app=bzhwjnews&id=11\";s:6:\"imgurl\";s:0:\"\";s:5:\"intro\";s:39:\"“百真网”美业信息资源平台\";s:5:\"style\";s:0:\"\";}}}',1389854534,1396237143,1,1),(55,'bzhwj',0,'top_slider','a:5:{i:0;a:4:{i:0;a:3:{s:5:\"title\";s:6:\"殷建\";s:4:\"link\";s:51:\"http://www.bzhwj.com/index.php?app=bzhwjpeople&id=5\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/aed3340d514279cac763df1f9b8e5241.jpg\";}i:1;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/10adf03c70fb128d546e0d40fea77047.jpg\";}i:2;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/b4e49c33a82d868b0290cbe51928cb17.jpg\";}i:3;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/00a6d44f7dd223a6a4b2ab8bc48552d0.jpg\";}}i:1;a:4:{i:0;a:3:{s:5:\"title\";s:6:\"夏玲\";s:4:\"link\";s:52:\"http://www.bzhwj.com/index.php?app=bzhwjpeople&id=13\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/2f610b983f98b5e0767471abe92ba1de.jpg\";}i:1;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/90de95970cee16ae280ef958ca9d1ca3.jpg\";}i:2;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/9e7c4039c250a5567d7eff759710f0d9.jpg\";}i:3;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/e963e4fcbd8454a5b129bf1d56271816.jpg\";}}i:2;a:4:{i:0;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/64ac4a858885861d7fce67eeb3c7056c.jpg\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:3;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}i:3;a:4:{i:0;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8845e7dc4cda3a741d59ddb3faef044a.jpg\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:3;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}i:4;a:4:{i:0;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/6d3662014800d7e3736a9c7c2ca3e49d.jpg\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:3;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}}','a:5:{i:0;a:4:{i:0;a:3:{s:5:\"title\";s:6:\"殷建\";s:4:\"link\";s:51:\"http://www.bzhwj.com/index.php?app=bzhwjpeople&id=5\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/aed3340d514279cac763df1f9b8e5241.jpg\";}i:1;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/10adf03c70fb128d546e0d40fea77047.jpg\";}i:2;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/b4e49c33a82d868b0290cbe51928cb17.jpg\";}i:3;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/00a6d44f7dd223a6a4b2ab8bc48552d0.jpg\";}}i:1;a:4:{i:0;a:3:{s:5:\"title\";s:6:\"夏玲\";s:4:\"link\";s:52:\"http://www.bzhwj.com/index.php?app=bzhwjpeople&id=13\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/2f610b983f98b5e0767471abe92ba1de.jpg\";}i:1;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/90de95970cee16ae280ef958ca9d1ca3.jpg\";}i:2;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/9e7c4039c250a5567d7eff759710f0d9.jpg\";}i:3;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/e963e4fcbd8454a5b129bf1d56271816.jpg\";}}i:2;a:4:{i:0;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/64ac4a858885861d7fce67eeb3c7056c.jpg\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:3;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}i:3;a:4:{i:0;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8845e7dc4cda3a741d59ddb3faef044a.jpg\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:3;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}i:4;a:4:{i:0;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:4:\"link\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/6d3662014800d7e3736a9c7c2ca3e49d.jpg\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:2;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:3;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}}',1389880430,1396055036,1,1),(70,'bzhwj',0,'search_recommend','a:2:{i:0;a:3:{i:0;a:3:{s:5:\"title\";s:9:\"美容院\";s:4:\"link\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:1;a:3:{s:5:\"title\";s:6:\"产品\";s:4:\"link\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:2;a:3:{s:5:\"title\";s:6:\"项目\";s:4:\"link\";s:0:\"\";s:5:\"style\";s:0:\"\";}}i:1;a:0:{}}','a:2:{i:0;a:3:{i:0;a:3:{s:5:\"title\";s:9:\"美容院\";s:4:\"link\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:1;a:3:{s:5:\"title\";s:6:\"产品\";s:4:\"link\";s:0:\"\";s:5:\"style\";s:0:\"\";}i:2;a:3:{s:5:\"title\";s:6:\"项目\";s:4:\"link\";s:0:\"\";s:5:\"style\";s:0:\"\";}}i:1;a:0:{}}',1392436358,1394604299,1,1),(117,'bzhwj_tuijian_goods',2,'bzhwj_tuijian_goods_same_brand','a:2:{i:0;a:3:{s:5:\"title\";s:6:\"sdfdsf\";s:3:\"url\";s:4:\"sfdf\";s:3:\"img\";s:58:\"http://img.bzhwj.com/img/d44e27d97b5d7f0d60b24251e1cef181.png\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}','a:2:{i:0;a:3:{s:5:\"title\";s:6:\"sdfdsf\";s:3:\"url\";s:4:\"sfdf\";s:3:\"img\";s:58:\"http://img.bzhwj.com/img/d44e27d97b5d7f0d60b24251e1cef181.png\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}',1393856469,1393856583,1,1),(119,'bzhwj_tuijian_goods',2,'bzhwj_tuijian_goods_other_brand','a:1:{i:0;a:3:{s:5:\"title\";s:12:\"在不在夺\";s:3:\"url\";s:3:\"夺\";s:3:\"img\";s:0:\"\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:12:\"在不在夺\";s:3:\"url\";s:3:\"夺\";s:3:\"img\";s:0:\"\";}}',1393856801,1393856801,1,1),(120,'bzhwj',0,'bzhwj_index_jing_pin_tuijian_goods','a:10:{i:0;a:3:{s:5:\"title\";s:16:\"天麻 离活素\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/61b5db9b5c5efdd9de341a2d25d3929a.jpg\";}i:1;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/370b3dc02f3ba8bd8b2b9fb725d253b6.jpg\";}i:2;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/f13e72dd4d5b2f302013e69f267b7c52.jpg\";}i:3;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/5e9796aa8c4c8db4f5232877899f7a0d.jpg\";}i:4;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/d180ac7272f504775f8e6b6363a7271a.jpg\";}i:5;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/ad958882580c1843ace566529d61f31e.jpg\";}i:6;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/880e9f57b2da56eb123cede992c02927.jpg\";}i:7;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/7c41c5e78160376f90c51728189a2f9d.jpg\";}i:8;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/681223b4b7ffae282b073d28eede9f7b.jpg\";}i:9;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8dc2f066c1d57a6be7dfa25b3f61ddbb.jpg\";}}','a:10:{i:0;a:3:{s:5:\"title\";s:16:\"天麻 离活素\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/61b5db9b5c5efdd9de341a2d25d3929a.jpg\";}i:1;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/370b3dc02f3ba8bd8b2b9fb725d253b6.jpg\";}i:2;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/f13e72dd4d5b2f302013e69f267b7c52.jpg\";}i:3;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/5e9796aa8c4c8db4f5232877899f7a0d.jpg\";}i:4;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/d180ac7272f504775f8e6b6363a7271a.jpg\";}i:5;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/ad958882580c1843ace566529d61f31e.jpg\";}i:6;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/880e9f57b2da56eb123cede992c02927.jpg\";}i:7;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/7c41c5e78160376f90c51728189a2f9d.jpg\";}i:8;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/681223b4b7ffae282b073d28eede9f7b.jpg\";}i:9;a:3:{s:5:\"title\";s:15:\"请输入内容\";s:3:\"url\";s:0:\"\";s:6:\"imgurl\";s:61:\"http://img.bzhwj.com/img/8dc2f066c1d57a6be7dfa25b3f61ddbb.jpg\";}}',1393931950,1395990923,1,1),(122,'bzhwj_tuijian_goods',0,'bzhwj_tuijian_goods_other_brand','a:2:{i:0;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}','a:2:{i:0;a:1:{s:5:\"title\";s:15:\"请输入内容\";}i:1;a:1:{s:5:\"title\";s:15:\"请输入内容\";}}',1394069263,1394069263,1,1),(215,'bzhwj_tuijian_goods',3,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:13:\"基因美容1\";s:3:\"url\";s:57:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=5\";s:3:\"img\";s:58:\"http://img.bzhwj.com/img/0fe54f408ca46acc098ccff5e0d0013a.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:13:\"基因美容1\";s:3:\"url\";s:57:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=5\";s:3:\"img\";s:58:\"http://img.bzhwj.com/img/0fe54f408ca46acc098ccff5e0d0013a.jpg\";}}',1394503237,1394543516,1,1),(216,'bzhwj_tuijian_goods',3,'bzhwj_tuijian_goods_other_brand','a:1:{i:0;a:3:{s:5:\"title\";s:13:\"基因美容2\";s:3:\"url\";s:37:\"/index.php?app=bzhwjtuijiangoods&id=5\";s:3:\"img\";s:58:\"http://img.bzhwj.com/img/3d2f245665e1f320e5c24a8856180782.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:13:\"基因美容2\";s:3:\"url\";s:37:\"/index.php?app=bzhwjtuijiangoods&id=5\";s:3:\"img\";s:58:\"http://img.bzhwj.com/img/3d2f245665e1f320e5c24a8856180782.jpg\";}}',1394503276,1394543772,1,1),(271,'bzhwj_tuijian_goods',5,'bzhwj_tuijian_goods_other_brand','a:1:{i:0;a:3:{s:5:\"title\";s:12:\"基因美容\";s:3:\"url\";s:37:\"/index.php?app=bzhwjtuijiangoods&id=5\";s:3:\"img\";s:0:\"\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:12:\"基因美容\";s:3:\"url\";s:37:\"/index.php?app=bzhwjtuijiangoods&id=5\";s:3:\"img\";s:0:\"\";}}',1394875627,1394875627,1,1),(272,'bzhwj_tuijian_goods',5,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:12:\"基因美容\";s:3:\"url\";s:37:\"/index.php?app=bzhwjtuijiangoods&id=3\";s:3:\"img\";s:0:\"\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:12:\"基因美容\";s:3:\"url\";s:37:\"/index.php?app=bzhwjtuijiangoods&id=3\";s:3:\"img\";s:0:\"\";}}',1394875633,1394875633,1,1),(318,'bzhwj_tuijian_goods',12,'bzhwj_tuijian_goods_other_brand','a:2:{i:0;a:3:{s:5:\"title\";s:24:\"山海棠 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:23:\"鹿角　离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:2:{i:0;a:3:{s:5:\"title\";s:24:\"山海棠 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:23:\"鹿角　离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395825978,1395836881,1,1),(319,'bzhwj_tuijian_goods',12,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"犀角 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=13\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"犀角 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=13\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395825984,1395835367,1,1),(321,'bzhwj_tuijian_goods',13,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"天麻 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"天麻 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395826272,1395835618,1,1),(322,'bzhwj_tuijian_goods',14,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:27:\"玄参　离活素（Ｂ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=15\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:27:\"玄参　离活素（Ｂ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=15\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395826364,1395837690,1,1),(326,'bzhwj_tuijian_goods',13,'bzhwj_tuijian_goods_other_brand','a:2:{i:0;a:3:{s:5:\"title\";s:21:\"山海 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:25:\"鹿角 离活素（Ｃ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:2:{i:0;a:3:{s:5:\"title\";s:21:\"山海 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:25:\"鹿角 离活素（Ｃ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395835589,1395835640,1,1),(330,'bzhwj_tuijian_goods',14,'bzhwj_tuijian_goods_other_brand','a:2:{i:0;a:3:{s:5:\"title\";s:27:\"天麻　离活素（Ａ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:27:\"鹿角　离活素（Ｃ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:2:{i:0;a:3:{s:5:\"title\";s:27:\"天麻　离活素（Ａ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:27:\"鹿角　离活素（Ｃ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395835883,1395837714,1,1),(332,'bzhwj_tuijian_goods',15,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:27:\"山海　离活素（Ｂ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:27:\"山海　离活素（Ｂ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395835957,1395835957,1,1),(333,'bzhwj_tuijian_goods',15,'bzhwj_tuijian_goods_other_brand','a:2:{i:0;a:3:{s:5:\"title\";s:21:\"天麻 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:21:\"鹿角 离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:2:{i:0;a:3:{s:5:\"title\";s:21:\"天麻 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:21:\"鹿角 离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395836048,1395836048,1,1),(334,'bzhwj_tuijian_goods',16,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"黄芪 离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=17\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"黄芪 离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=17\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395836111,1395836111,1,1),(335,'bzhwj_tuijian_goods',16,'bzhwj_tuijian_goods_other_brand','a:2:{i:0;a:3:{s:5:\"title\";s:25:\"天麻 离活素（Ａ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:21:\"山海 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:2:{i:0;a:3:{s:5:\"title\";s:25:\"天麻 离活素（Ａ）\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:21:\"山海 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395836240,1395836240,1,1),(336,'bzhwj_tuijian_goods',17,'bzhwj_tuijian_goods_same_brand','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"鹿角 离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:1:{i:0;a:3:{s:5:\"title\";s:21:\"鹿角 离活素（C)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=16\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395836292,1395838503,1,1),(337,'bzhwj_tuijian_goods',17,'bzhwj_tuijian_goods_other_brand','a:2:{i:0;a:3:{s:5:\"title\";s:21:\"天麻 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:21:\"山海 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}','a:2:{i:0;a:3:{s:5:\"title\";s:21:\"天麻 离活素（A)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=12\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}i:1;a:3:{s:5:\"title\";s:21:\"山海 离活素（B)\";s:3:\"url\";s:58:\"http://www.bzhwj.com/index.php?app=bzhwjtuijiangoods&id=14\";s:3:\"img\";s:61:\"http://img.bzhwj.com/img/0cfb00f220109a9122ec4abeddce8df9.jpg\";}}',1395836415,1395836415,1,1);
/*!40000 ALTER TABLE `app_common_mis_page_table_extra_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_common_mis_page_table_fields_config`
--

DROP TABLE IF EXISTS `app_common_mis_page_table_fields_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_common_mis_page_table_fields_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(10) unsigned NOT NULL,
  `table_name` varchar(80) NOT NULL,
  `fields` text,
  `title` varchar(255) NOT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id_table_name_key` (`app_id`,`table_name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_common_mis_page_table_fields_config`
--

LOCK TABLES `app_common_mis_page_table_fields_config` WRITE;
/*!40000 ALTER TABLE `app_common_mis_page_table_fields_config` DISABLE KEYS */;
INSERT INTO `app_common_mis_page_table_fields_config` VALUES (1,1,'app_xyx_game','a:15:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"标题\";s:8:\"required\";b:1;}s:8:\"en_title\";a:1:{s:4:\"show\";s:9:\"英文名\";}s:6:\"com_id\";a:5:{s:4:\"show\";s:6:\"厂商\";s:4:\"type\";s:13:\"single_select\";s:8:\"required\";b:1;s:11:\"data_source\";s:2:\"db\";s:5:\"model\";a:1:{s:4:\"data\";a:1:{s:11:\"query_table\";a:3:{s:4:\"name\";s:15:\"app_xyx_company\";s:6:\"fields\";a:2:{s:1:\"v\";s:2:\"id\";s:7:\"display\";s:5:\"title\";}s:5:\"conds\";a:1:{s:7:\"status=\";i:1;}}}}}s:6:\"ctg_id\";a:5:{s:4:\"show\";s:6:\"分类\";s:4:\"type\";s:13:\"single_select\";s:8:\"required\";b:1;s:11:\"data_source\";s:2:\"db\";s:5:\"model\";a:1:{s:4:\"data\";a:1:{s:11:\"query_table\";a:3:{s:4:\"name\";s:16:\"app_xyx_category\";s:6:\"fields\";a:2:{s:1:\"v\";s:2:\"id\";s:7:\"display\";s:5:\"title\";}s:5:\"conds\";a:1:{s:7:\"status=\";i:1;}}}}}s:6:\"s_logo\";a:2:{s:4:\"show\";s:9:\"小图片\";s:4:\"type\";s:5:\"image\";}s:6:\"m_logo\";a:2:{s:4:\"show\";s:9:\"中图片\";s:4:\"type\";s:5:\"image\";}s:6:\"l_logo\";a:2:{s:4:\"show\";s:9:\"大图片\";s:4:\"type\";s:5:\"image\";}s:6:\"h_logo\";a:2:{s:4:\"show\";s:9:\"热图片\";s:4:\"type\";s:5:\"image\";}s:3:\"url\";a:2:{s:4:\"show\";s:18:\"开始游戏地址\";s:8:\"required\";b:1;}s:4:\"size\";a:1:{s:4:\"show\";s:6:\"大小\";}s:7:\"subject\";a:6:{s:4:\"show\";s:6:\"专题\";s:7:\"exclude\";b:1;s:4:\"type\";s:18:\"manual_group_input\";s:8:\"required\";b:1;s:11:\"data_source\";s:2:\"db\";s:5:\"model\";a:1:{s:4:\"data\";a:3:{s:9:\"delimiter\";s:1:\",\";s:11:\"query_table\";a:2:{s:4:\"name\";s:15:\"app_xyx_subject\";s:6:\"fields\";a:2:{s:1:\"v\";s:2:\"id\";s:7:\"display\";s:5:\"title\";}}s:12:\"insert_table\";a:2:{s:4:\"name\";s:20:\"app_xyx_game_subject\";s:6:\"fields\";a:2:{s:12:\"cur_table_id\";s:4:\"g_id\";s:17:\"relation_table_id\";s:4:\"s_id\";}}}}}s:11:\"description\";a:2:{s:4:\"show\";s:6:\"描述\";s:4:\"type\";s:8:\"textarea\";}s:9:\"operation\";a:2:{s:4:\"show\";s:6:\"操作\";s:4:\"type\";s:8:\"textarea\";}s:8:\"howStart\";a:2:{s:4:\"show\";s:12:\"如何开始\";s:4:\"type\";s:8:\"textarea\";}s:6:\"status\";a:5:{s:4:\"show\";s:12:\"推荐位置\";s:4:\"type\";s:8:\"checkbox\";s:11:\"data_source\";s:5:\"local\";s:8:\"required\";b:1;s:5:\"model\";a:1:{s:4:\"data\";a:3:{i:0;a:2:{s:1:\"v\";i:1;s:1:\"k\";s:12:\"热门游戏\";}i:1;a:2:{s:1:\"v\";i:2;s:1:\"k\";s:9:\"新游戏\";}i:2;a:2:{s:1:\"v\";i:3;s:1:\"k\";s:9:\"老游戏\";}}}}}','小游戏介绍页面',NULL,NULL,1),(2,0,'','N;','',NULL,NULL,1),(12,2,'app_bzhwj_news','a:3:{s:5:\"title\";a:2:{s:4:\"show\";s:6:\"标题\";s:8:\"required\";b:1;}s:6:\"author\";a:2:{s:4:\"show\";s:6:\"编辑\";s:8:\"required\";b:1;}s:7:\"content\";a:2:{s:4:\"show\";s:12:\"新闻内容\";s:4:\"type\";s:6:\"editor\";}}','百真无假新闻中心',NULL,NULL,1),(14,2,'app_bzhwj_people','a:5:{s:5:\"title\";a:2:{s:4:\"show\";s:12:\"人物姓名\";s:8:\"required\";b:1;}s:4:\"logo\";a:2:{s:4:\"show\";s:6:\"头像\";s:4:\"type\";s:5:\"image\";}s:8:\"store_id\";a:3:{s:4:\"show\";s:8:\"store_id\";s:4:\"type\";s:6:\"hidden\";s:3:\"ref\";s:23:\"return window.store_id;\";}s:6:\"editor\";a:2:{s:4:\"show\";s:9:\"编辑者\";s:8:\"required\";b:1;}s:7:\"content\";a:2:{s:4:\"show\";s:12:\"新闻内容\";s:4:\"type\";s:6:\"editor\";}}','百真无假风云人物',NULL,NULL,1),(18,3,'app_bzhwj_tuijian_goods','a:7:{s:5:\"title\";a:2:{s:4:\"show\";s:12:\"项目名称\";s:8:\"required\";b:1;}s:8:\"store_id\";a:3:{s:4:\"show\";s:8:\"store_id\";s:4:\"type\";s:6:\"hidden\";s:3:\"ref\";s:23:\"return window.store_id;\";}s:7:\"content\";a:2:{s:4:\"show\";s:12:\"项目内容\";s:4:\"type\";s:6:\"editor\";}s:3:\"img\";a:2:{s:4:\"show\";s:12:\"项目图片\";s:4:\"type\";s:5:\"image\";}s:6:\"editor\";a:2:{s:4:\"show\";s:9:\"编辑者\";s:8:\"required\";b:1;}s:8:\"com_name\";a:2:{s:4:\"show\";s:12:\"公司名称\";s:8:\"required\";b:1;}s:11:\"com_address\";a:2:{s:4:\"show\";s:12:\"公司地址\";s:8:\"required\";b:1;}}','精品项目推荐',NULL,NULL,1),(21,4,'ecm_store','a:2:{s:6:\"sgrade\";a:2:{s:4:\"show\";s:6:\"等级\";s:8:\"required\";b:1;}s:12:\"credit_value\";a:2:{s:4:\"show\";s:9:\"信用度\";s:8:\"required\";b:1;}}','店铺等级',NULL,NULL,1);
/*!40000 ALTER TABLE `app_common_mis_page_table_fields_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_acategory`
--

DROP TABLE IF EXISTS `ecm_acategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_acategory` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_acategory`
--

LOCK TABLES `ecm_acategory` WRITE;
/*!40000 ALTER TABLE `ecm_acategory` DISABLE KEYS */;
INSERT INTO `ecm_acategory` VALUES (1,'商城帮助',0,0,'help'),(2,'商城公告',0,0,'notice'),(3,'内置文章',0,0,'system'),(4,'新手上路',1,1,NULL),(5,'购物指南',1,2,NULL);
/*!40000 ALTER TABLE `ecm_acategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_address`
--

DROP TABLE IF EXISTS `ecm_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_address` (
  `addr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `consignee` varchar(60) NOT NULL DEFAULT '',
  `region_id` int(10) unsigned DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `phone_tel` varchar(60) DEFAULT NULL,
  `phone_mob` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`addr_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_address`
--

LOCK TABLES `ecm_address` WRITE;
/*!40000 ALTER TABLE `ecm_address` DISABLE KEYS */;
INSERT INTO `ecm_address` VALUES (1,3,'超级卖家',43,'中国	上海市	徐汇区','长江路15号','200088','021-88886666','13366669999');
/*!40000 ALTER TABLE `ecm_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_article`
--

DROP TABLE IF EXISTS `ecm_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_article` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL DEFAULT '',
  `cate_id` int(10) NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `content` text,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `if_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `add_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `code` (`code`),
  KEY `cate_id` (`cate_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_article`
--

LOCK TABLES `ecm_article` WRITE;
/*!40000 ALTER TABLE `ecm_article` DISABLE KEYS */;
INSERT INTO `ecm_article` VALUES (1,'eula','用户服务协议',3,0,'','<p>特别提醒用户认真阅读本《用户服务协议》(下称《协议》) 中各条款。除非您接受本《协议》条款，否则您无权使用本网站提供的相关服务。您的使用行为将视为对本《协议》的接受，并同意接受本《协议》各项条款的约束。 <br /> <br /> <strong>一、定义</strong><br /></p>\r\n<ol>\r\n<li>\"用户\"指符合本协议所规定的条件，同意遵守本网站各种规则、条款（包括但不限于本协议），并使用本网站的个人或机构。</li>\r\n<li>\"卖家\"是指在本网站上出售物品的用户。\"买家\"是指在本网站购买物品的用户。</li>\r\n<li>\"成交\"指买家根据卖家所刊登的交易要求，在特定时间内提出最优的交易条件，因而取得依其提出的条件购买该交易物品的权利。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>二、用户资格</strong><br /> <br /> 只有符合下列条件之一的人员或实体才能申请成为本网站用户，可以使用本网站的服务。</p>\r\n<ol>\r\n<li>年满十八岁，并具有民事权利能力和民事行为能力的自然人；</li>\r\n<li>未满十八岁，但监护人（包括但不仅限于父母）予以书面同意的自然人；</li>\r\n<li>根据中国法律或设立地法律、法规和/或规章成立并合法存在的公司、企事业单位、社团组织和其他组织。</li>\r\n</ol>\r\n<p><br /> 无民事行为能力人、限制民事行为能力人以及无经营或特定经营资格的组织不当注册为本网站用户或超过其民事权利或行为能力范围从事交易的，其与本网站之间的协议自始无效，本网站一经发现，有权立即注销该用户，并追究其使用本网站\"服务\"的一切法律责任。<br /> <br /> <strong>三.用户的权利和义务</strong><br /></p>\r\n<ol>\r\n<li>用户有权根据本协议的规定及本网站发布的相关规则，利用本网站网上交易平台登录物品、发布交易信息、查询物品信息、购买物品、与其他用户订立物品买卖合同、在本网站社区发帖、参加本网站的有关活动及有权享受本网站提供的其他的有关资讯及信息服务。</li>\r\n<li>用户有权根据需要更改密码和交易密码。用户应对以该用户名进行的所有活动和事件负全部责任。</li>\r\n<li>用户有义务确保向本网站提供的任何资料、注册信息真实准确，包括但不限于真实姓名、身份证号、联系电话、地址、邮政编码等。保证本网站及其他用户可以通过上述联系方式与自己进行联系。同时，用户也有义务在相关资料实际变更时及时更新有关注册资料。</li>\r\n<li>用户不得以任何形式擅自转让或授权他人使用自己在本网站的用户帐号。</li>\r\n<li>用户有义务确保在本网站网上交易平台上登录物品、发布的交易信息真实、准确，无误导性。</li>\r\n<li>用户不得在本网站网上交易平台买卖国家禁止销售的或限制销售的物品、不得买卖侵犯他人知识产权或其他合法权益的物品，也不得买卖违背社会公共利益或公共道德的物品。</li>\r\n<li>用户不得在本网站发布各类违法或违规信息。包括但不限于物品信息、交易信息、社区帖子、物品留言，店铺留言，评价内容等。</li>\r\n<li>用户在本网站交易中应当遵守诚实信用原则，不得以干预或操纵物品价格等不正当竞争方式扰乱网上交易秩序，不得从事与网上交易无关的不当行为，不得在交易平台上发布任何违法信息。</li>\r\n<li>用户不应采取不正当手段（包括但不限于虚假交易、互换好评等方式）提高自身或他人信用度，或采用不正当手段恶意评价其他用户，降低其他用户信用度。</li>\r\n<li>用户承诺自己在使用本网站网上交易平台实施的所有行为遵守国家法律、法规和本网站的相关规定以及各种社会公共利益或公共道德。对于任何法律后果的发生，用户将以自己的名义独立承担所有相应的法律责任。</li>\r\n<li>用户在本网站网上交易过程中如与其他用户因交易产生纠纷，可以请求本网站从中予以协调。用户如发现其他用户有违法或违反本协议的行为，可以向本网站举报。如用户因网上交易与其他用户产生诉讼的，用户有权通过司法部门要求本网站提供相关资料。</li>\r\n<li>用户应自行承担因交易产生的相关费用，并依法纳税。</li>\r\n<li>未经本网站书面允许，用户不得将本网站资料以及在交易平台上所展示的任何信息以复制、修改、翻译等形式制作衍生作品、分发或公开展示。</li>\r\n<li>用户同意接收来自本网站的信息，包括但不限于活动信息、交易信息、促销信息等。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>四、 本网站的权利和义务</strong><br /></p>\r\n<ol>\r\n<li>本网站不是传统意义上的\"拍卖商\"，仅为用户提供一个信息交流、进行物品买卖的平台，充当买卖双方之间的交流媒介，而非买主或卖主的代理商、合伙  人、雇员或雇主等经营关系人。公布在本网站上的交易物品是用户自行上传进行交易的物品，并非本网站所有。对于用户刊登物品、提供的信息或参与竞标的过程，  本网站均不加以监视或控制，亦不介入物品的交易过程，包括运送、付款、退款、瑕疵担保及其它交易事项，且不承担因交易物品存在品质、权利上的瑕疵以及交易  方履行交易协议的能力而产生的任何责任，对于出现在拍卖上的物品品质、安全性或合法性，本网站均不予保证。</li>\r\n<li>本网站有义务在现有技术水平的基础上努力确保整个网上交易平台的正常运行，尽力避免服务中断或将中断时间限制在最短时间内，保证用户网上交易活动的顺利进行。</li>\r\n<li>本网站有义务对用户在注册使用本网站网上交易平台中所遇到的问题及反映的情况及时作出回复。 </li>\r\n<li>本网站有权对用户的注册资料进行查阅，对存在任何问题或怀疑的注册资料，本网站有权发出通知询问用户并要求用户做出解释、改正，或直接做出处罚、删除等处理。</li>\r\n<li>用  户因在本网站网上交易与其他用户产生纠纷的，用户通过司法部门或行政部门依照法定程序要求本网站提供相关资料，本网站将积极配合并提供有关资料；用户将纠  纷告知本网站，或本网站知悉纠纷情况的，经审核后，本网站有权通过电子邮件及电话联系向纠纷双方了解纠纷情况，并将所了解的情况通过电子邮件互相通知对  方。 </li>\r\n<li>因网上交易平台的特殊性，本网站没有义务对所有用户的注册资料、所有的交易行为以及与交易有关的其他事项进行事先审查，但如发生以下情形，本网站有权限制用户的活动、向用户核实有关资料、发出警告通知、暂时中止、无限期地中止及拒绝向该用户提供服务：         \r\n<ul>\r\n<li>用户违反本协议或因被提及而纳入本协议的文件；</li>\r\n<li>存在用户或其他第三方通知本网站，认为某个用户或具体交易事项存在违法或不当行为，并提供相关证据，而本网站无法联系到该用户核证或验证该用户向本网站提供的任何资料；</li>\r\n<li>存在用户或其他第三方通知本网站，认为某个用户或具体交易事项存在违法或不当行为，并提供相关证据。本网站以普通非专业交易者的知识水平标准对相关内容进行判别，可以明显认为这些内容或行为可能对本网站用户或本网站造成财务损失或法律责任。 </li>\r\n</ul>\r\n</li>\r\n<li>在反网络欺诈行动中，本着保护广大用户利益的原则，当用户举报自己交易可能存在欺诈而产生交易争议时，本网站有权通过表面判断暂时冻结相关用户账号，并有权核对当事人身份资料及要求提供交易相关证明材料。</li>\r\n<li>根据国家法律法规、本协议的内容和本网站所掌握的事实依据，可以认定用户存在违法或违反本协议行为以及在本网站交易平台上的其他不当行为，本网站有权在本网站交易平台及所在网站上以网络发布形式公布用户的违法行为，并有权随时作出删除相关信息，而无须征得用户的同意。</li>\r\n<li>本  网站有权在不通知用户的前提下删除或采取其他限制性措施处理下列信息：包括但不限于以规避费用为目的；以炒作信用为目的；存在欺诈等恶意或虚假内容；与网  上交易无关或不是以交易为目的；存在恶意竞价或其他试图扰乱正常交易秩序因素；该信息违反公共利益或可能严重损害本网站和其他用户合法利益的。</li>\r\n<li>用  户授予本网站独家的、全球通用的、永久的、免费的信息许可使用权利，本网站有权对该权利进行再授权，依此授权本网站有权(全部或部份地)  使用、复制、修订、改写、发布、翻译、分发、执行和展示用户公示于网站的各类信息或制作其派生作品，以现在已知或日后开发的任何形式、媒体或技术，将上述  信息纳入其他作品内。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>五、服务的中断和终止</strong><br /></p>\r\n<ol>\r\n<li>在  本网站未向用户收取相关服务费用的情况下，本网站可自行全权决定以任何理由  (包括但不限于本网站认为用户已违反本协议的字面意义和精神，或用户在超过180天内未登录本网站等)  终止对用户的服务，并不再保存用户在本网站的全部资料（包括但不限于用户信息、商品信息、交易信息等）。同时本网站可自行全权决定，在发出通知或不发出通  知的情况下，随时停止提供全部或部分服务。服务终止后，本网站没有义务为用户保留原用户资料或与之相关的任何信息，或转发任何未曾阅读或发送的信息给用户  或第三方。此外，本网站不就终止对用户的服务而对用户或任何第三方承担任何责任。 </li>\r\n<li>如用户向本网站提出注销本网站注册用户身份，需经本网站审核同意，由本网站注销该注册用户，用户即解除与本网站的协议关系，但本网站仍保留下列权利：         \r\n<ul>\r\n<li>用户注销后，本网站有权保留该用户的资料,包括但不限于以前的用户资料、店铺资料、商品资料和交易记录等。 </li>\r\n<li>用户注销后，如用户在注销前在本网站交易平台上存在违法行为或违反本协议的行为，本网站仍可行使本协议所规定的权利。 </li>\r\n</ul>\r\n</li>\r\n<li>如存在下列情况，本网站可以通过注销用户的方式终止服务：         \r\n<ul>\r\n<li>在用户违反本协议相关规定时，本网站有权终止向该用户提供服务。本网站将在中断服务时通知用户。但如该用户在被本网站终止提供服务后，再一次直接或间接或以他人名义注册为本网站用户的，本网站有权再次单方面终止为该用户提供服务；</li>\r\n<li>一旦本网站发现用户注册资料中主要内容是虚假的，本网站有权随时终止为该用户提供服务； </li>\r\n<li>本协议终止或更新时，用户未确认新的协议的。 </li>\r\n<li>其它本网站认为需终止服务的情况。 </li>\r\n</ul>\r\n</li>\r\n<li>因用户违反相关法律法规或者违反本协议规定等原因而致使本网站中断、终止对用户服务的，对于服务中断、终止之前用户交易行为依下列原则处理：         \r\n<ul>\r\n<li>本网站有权决定是否在中断、终止对用户服务前将用户被中断或终止服务的情况和原因通知用户交易关系方，包括但不限于对该交易有意向但尚未达成交易的用户,参与该交易竞价的用户，已达成交易要约用户。</li>\r\n<li>服务中断、终止之前，用户已经上传至本网站的物品尚未交易或交易尚未完成的，本网站有权在中断、终止服务的同时删除此项物品的相关信息。 </li>\r\n<li>服务中断、终止之前，用户已经就其他用户出售的具体物品作出要约，但交易尚未结束，本网站有权在中断或终止服务的同时删除该用户的相关要约和信息。</li>\r\n</ul>\r\n</li>\r\n<li>本网站若因用户的行为（包括但不限于刊登的商品、在本网站社区发帖等）侵害了第三方的权利或违反了相关规定，而受到第三方的追偿或受到主管机关的处分时，用户应赔偿本网站因此所产生的一切损失及费用。</li>\r\n<li>对违反相关法律法规或者违反本协议规定，且情节严重的用户，本网站有权终止该用户的其它服务。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>六、协议的修订</strong><br /> <br /> 本协议可由本网站随时修订，并将修订后的协议公告于本网站之上，修订后的条款内容自公告时起生效，并成为本协议的一部分。用户若在本协议修改之后，仍继续使用本网站，则视为用户接受和自愿遵守修订后的协议。本网站行使修改或中断服务时，不需对任何第三方负责。<br /> <br /> <strong>七、 本网站的责任范围 </strong><br /> <br /> 当用户接受该协议时，用户应明确了解并同意∶</p>\r\n<ol>\r\n<li>是否经由本网站下载或取得任何资料，由用户自行考虑、衡量并且自负风险，因下载任何资料而导致用户电脑系统的任何损坏或资料流失，用户应负完全责任。</li>\r\n<li>用户经由本网站取得的建议和资讯，无论其形式或表现，绝不构成本协议未明示规定的任何保证。</li>\r\n<li>基于以下原因而造成的利润、商誉、使用、资料损失或其它无形损失，本网站不承担任何直接、间接、附带、特别、衍生性或惩罚性赔偿（即使本网站已被告知前款赔偿的可能性）：         \r\n<ul>\r\n<li>本网站的使用或无法使用。</li>\r\n<li>经由或通过本网站购买或取得的任何物品，或接收之信息，或进行交易所随之产生的替代物品及服务的购买成本。</li>\r\n<li>用户的传输或资料遭到未获授权的存取或变更。</li>\r\n<li>本网站中任何第三方之声明或行为。</li>\r\n<li>本网站其它相关事宜。</li>\r\n</ul>\r\n</li>\r\n<li>本网站只是为用户提供一个交易的平台，对于用户所刊登的交易物品的合法性、真实性及其品质，以及用户履行交易的能力等，本网站一律不负任何担保责任。用户如果因使用本网站，或因购买刊登于本网站的任何物品，而受有损害时，本网站不负任何补偿或赔偿责任。</li>\r\n<li>本  网站提供与其它互联网上的网站或资源的链接，用户可能会因此连结至其它运营商经营的网站，但不表示本网站与这些运营商有任何关系。其它运营商经营的网站均  由各经营者自行负责，不属于本网站控制及负责范围之内。对于存在或来源于此类网站或资源的任何内容、广告、产品或其它资料，本网站亦不予保证或负责。因使  用或依赖任何此类网站或资源发布的或经由此类网站或资源获得的任何内容、物品或服务所产生的任何损害或损失，本网站不负任何直接或间接的责任。</li>\r\n</ol>\r\n<p><br /> <br /> <strong>八.、不可抗力</strong><br /> <br /> 因不可抗力或者其他意外事件，使得本协议的履行不可能、不必要或者无意义的，双方均不承担责任。本合同所称之不可抗力意指不能预见、不能避免并不能克服的  客观情况，包括但不限于战争、台风、水灾、火灾、雷击或地震、罢工、暴动、法定疾病、黑客攻击、网络病毒、电信部门技术管制、政府行为或任何其它自然或人  为造成的灾难等客观情况。<br /> <br /> <strong>九、争议解决方式</strong><br /></p>\r\n<ol>\r\n<li>本协议及其修订本的有效性、履行和与本协议及其修订本效力有关的所有事宜，将受中华人民共和国法律管辖，任何争议仅适用中华人民共和国法律。</li>\r\n<li>因  使用本网站服务所引起与本网站的任何争议，均应提交深圳仲裁委员会按照该会届时有效的仲裁规则进行仲裁。相关争议应单独仲裁，不得与任何其它方的争议在任  何仲裁中合并处理，该仲裁裁决是终局，对各方均有约束力。如果所涉及的争议不适于仲裁解决，用户同意一切争议由人民法院管辖。</li>\r\n</ol>',255,1,1240122848),(2,'cert_autonym','什么是实名认证',3,0,'','<p><strong>什么是实名认证？</strong></p>\r\n<p>&ldquo;认证店铺&rdquo;服务是一项对店主身份真实性识别服务。店主可以通过站内PM、电话或管理员EMail的方式 联系并申请该项认证。经过管理员审核确认了店主的真实身份，就可以开通该项认证。</p>\r\n<p>通过该认证，可以说明店主身份的真实有效性，为买家在网络交易的过程中提供一定的信心和保证。</p>\r\n<p><strong>认证申请的方式：</strong></p>\r\n<p>Email：XXXX@XX.com</p>\r\n<p>管理员：XXXXXX</p>',255,1,1240122848),(3,'cert_material','什么是实体店铺认证',3,0,'','<p><strong>什么是实体店铺认证？</strong></p>\r\n<p>&ldquo;认证店铺&rdquo;服务是一项对店主身份真实性识别服务。店主可以通过站内PM、电话或管理员EMail的方式 联系并申请该项认证。经过管理员审核确认了店主的真实身份，就可以开通该项认证。</p>\r\n<p>通过该认证，可以说明店主身份的真实有效性，为买家在网络交易的过程中提供一定的信心和保证。</p>\r\n<p><strong>认证申请的方式：</strong></p>\r\n<p>Email：XXXX@XX.com</p>\r\n<p>管理员：XXXXXX</p>',255,1,1240122848),(4,'setup_store','开店协议',3,0,'','<p>使用本公司服务所须遵守的条款和条件。<br /><br />1.用户资格<br />本公司的服务仅向适用法律下能够签订具有法律约束力的合同的个人提供并仅由其使用。在不限制前述规定的前提下，本公司的服务不向18周岁以下或被临时或无限期中止的用户提供。如您不合资格，请勿使用本公司的服务。此外，您的帐户（包括信用评价）和用户名不得向其他方转让或出售。另外，本公司保留根据其意愿中止或终止您的帐户的权利。<br /><br />2.您的资料（包括但不限于所添加的任何商品）不得：<br />*具有欺诈性、虚假、不准确或具误导性；<br />*侵犯任何第三方著作权、专利权、商标权、商业秘密或其他专有权利或发表权或隐私权；<br />*违反任何适用的法律或法规（包括但不限于有关出口管制、消费者保护、不正当竞争、刑法、反歧视或贸易惯例/公平贸易法律的法律或法规）；<br />*有侮辱或者诽谤他人，侵害他人合法权益的内容；<br />*有淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的内容；<br />*包含可能破坏、改变、删除、不利影响、秘密截取、未经授权而接触或征用任何系统、数据或个人资料的任何病毒、特洛依木马、蠕虫、定时炸弹、删除蝇、复活节彩蛋、间谍软件或其他电脑程序；<br /><br />3.违约<br />如发生以下情形，本公司可能限制您的活动、立即删除您的商品、向本公司社区发出有关您的行为的警告、发出警告通知、暂时中止、无限期地中止或终止您的用户资格及拒绝向您提供服务：<br />(a)您违反本协议或纳入本协议的文件；<br />(b)本公司无法核证或验证您向本公司提供的任何资料；<br />(c)本公司相信您的行为可能对您、本公司用户或本公司造成损失或法律责任。<br /><br />4.责任限制<br />本公司、本公司的关联公司和相关实体或本公司的供应商在任何情况下均不就因本公司的网站、本公司的服务或本协议而产生或与之有关的利润损失或任何特别、间接或后果性的损害（无论以何种方式产生，包括疏忽）承担任何责任。您同意您就您自身行为之合法性单独承担责任。您同意，本公司和本公司的所有关联公司和相关实体对本公司用户的行为的合法性及产生的任何结果不承担责任。<br /><br />5.无代理关系<br />用户和本公司是独立的合同方，本协议无意建立也没有创立任何代理、合伙、合营、雇员与雇主或特许经营关系。本公司也不对任何用户及其网上交易行为做出明示或默许的推荐、承诺或担保。<br /><br />6.一般规定<br />本协议在所有方面均受中华人民共和国法律管辖。本协议的规定是可分割的，如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。</p>',255,1,1240122848),(5,'msn_privacy','MSN在线通隐私策略',3,0,'','<p>Msn在线通隐私策略旨在说明您在本网站使用Msn在线通功能时我们如何保护您的Msn帐号信息。<br /> 我们认为隐私权非常重要。我们希望此隐私保护中心有助于您在本网站更好使用Msn在线通<br /> <strong>我们收集的信息</strong></p><blockquote>* 您在本网站激活Msn在线通时,程序将会记录您的Msn在线通帐号</blockquote><p><br /> <strong>您的选择</strong></p><blockquote>* 您可以在本网站随时注销您的Msn在线通帐号</blockquote><p><br /> <strong>其他隐私声明</strong></p><blockquote>* 如果我们需要改变本网站Msn在线通的隐私策略, 我们会把相关的改动在此页面发布.</blockquote>',255,1,1240122848),(7,'','系统升级通知（周二）！',2,0,'','<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p>尊敬的用户，您好！</p>\r\n<p>为了给广大用户提供更好的服务，拟在 2009年 6月 6日 12:30 － 14:00 做系统升级。</p>\r\n<p>届时，页面会出现暂时不能使用的情况。</p>\r\n<p>在此，衷心的感谢每位用户一贯以来对我们工作的支持和关注。</p>',255,1,1249610440),(8,'','8月8日暂停货品出库',2,0,'','<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p><span>敬爱的顾客： <br />我 们将于下2009年8月8日进行内部货品盘点和整合，当天将暂停货品的出库，但是为了广大用户能够尽量在周一收到您周六晚间和周日下午 16：00 前 生成的有效本地订单 (外环外和外地订单将在周日下午发出，具体配送时间根据订单所选的货运方式而定) ，将原有的上海外环线以内的一日二送改为一日一送的配送方式。 8月8日配送时间为上午9:00 至下午 18：00，由此为您带来的不便，还请您谅解。 届时我们将不提供上门自提，售后和送货等其他服务。 从2008年8月8日星期二起外环线以内的配送恢复为一日二送。 在此衷心的感谢各位顾客一贯以来对我们工作的支持和关注。</span></p>',255,1,1249610480),(9,'','商品评论改版升级!',2,0,'','<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p>首先，为了使得大家能更充分参与，我们将逐步放开对产品评论的资格限制， 顾客可以在购买商品后对商品进行评价，其他顾客还可以对评价进行是否好评的参与，得到较多用户好评的评论将得到更多的展示机会。</p>',255,1,1249610514),(10,'','银行系统升级通告！',2,0,'','<p><span style=\"font-size: 9pt; color: #666666; font-family: 宋体;\"><strong><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">修改本页内容，请到</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\"> </span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">管理后台</span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span> 网站<span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\"> <span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">&gt;&gt;</span>&nbsp;文章管理</span></span><span style=\"font-size: 10.5pt; color: red; font-family: \'Times New Roman\';\" lang=\"EN-US\">&nbsp;&nbsp; 找到相关文章</span><span style=\"font-size: 10.5pt; color: red; font-family: 宋体;\">进行编辑</span></strong></span></p>\r\n<p>敬的顾客：<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 由于银行系统将于12.10号进行升级，因此在此期间，网上支付业务将会暂停，本网站将会暂停网上支付方式的订单，对此进行通告，谢谢您一贯的支持。</p>',255,1,1249610535),(11,'','顾客必读',4,0,'','<h4><br /></h4>\r\n<h4>如何订购商品？</h4>\r\n<p>您可以首先浏览我们的网站了解商品。看到您满意的商品您可以直接在我们的网站上实现订购。您也可以和我们网站的客服人员联系订购。</p>\r\n<h4>我通过网站看到你们的商品后觉得不错，但是我不是经常上网，你可以寄一些商品的图片和介绍给我吗？</h4>\r\n<p>答：我们的网站会不定期地为会员发送商品信息资料的电子邮件。如果您目前还没有成为我们的会员，您可以直接在我们的网站上注册，非常方便。</p>\r\n<h4>请告诉我在这里购物的理由好吗？</h4>\r\n<ol>\r\n<li>我们是一家拥有长期经营零售业务经验的网站；</li>\r\n<li>我们将给您带来优质的商品及更优惠的价格；</li>\r\n<li>多种付款方式以及快速的全国配送；</li>\r\n<li>人性化的退换货事宜；</li>\r\n<li>体贴入微的会员积分计划；</li>\r\n<li>所有产品为原厂正规包装；</li>\r\n</ol>\r\n<h4>你们的商品我都非常喜欢，已经购买了很多，但是有些怎么一直没货？会不会订不到？</h4>\r\n<p>由于网站顾客购买量比较大，商品随时可能断货，您可以通过网站上的&ldquo;到货通知&rdquo;按钮预定商品或直接联系我们的网站客服进行预约订购。</p>\r\n<h4>所有的产品都能够在网站上购买?</h4>\r\n<p>答：目前网站查找的都是可以订购的，但是必须是仓库中有库存的产品我们才可以与您确认。部分热销产品也可以通过我们的网站做一个预约，等到货品到后，我们会立即通过电话或者电子邮件的方式通知您来订购。</p>\r\n<h4>为什么要注册会员？</h4>\r\n<ol>\r\n<li>只有注册用户才可以在网上进行订购，享受优惠的价格。</li>\r\n<li>只有注册用户才可以登录\"会员中心\"，使用更多的会员购物功能,管理自己的资料。</li>\r\n<li>只有注册用户才可以在网上给其他注册的朋友留言。</li>\r\n<li>只有注册用户才有可能获取我们赠送的礼品。</li>\r\n</ol>\r\n<h4>忘记了密码怎么办？</h4>\r\n<p>为了保护客户利益，我们无法看到您的密码。当您忘记密码时，请登录注册页面，点击\"忘记密码\"，系统会自动将您的密码通过email告诉您，您可以登录\"会员中心\"去更改密码，以确保您的利益。</p>\r\n<h4>积分是怎么回事？有什么作用？</h4>\r\n<p>积分的高低只反映您对我们的关注和支持程度。我们的积分是通过订购商品产生的。对于高积分的客户我们会有一定的奖励，如积分兑换商品、积分抵扣价格、赠送商品,更优惠的价格购买商品等，以此回馈广大顾客。</p>',255,1,1249614530),(12,'','商品退货保障',4,0,'','<h4><br /></h4>\r\n<h4>符合以下条件，可以要求换货</h4>\r\n<ol>\r\n<li>客户在收到货物时当面在送货员面前拆包检查，发现货物有质量问题的；</li>\r\n<li>实际收到货物与网站上描述的有很大的出入的。</li>\r\n</ol>\r\n<p><strong>换货流程</strong>：客户当面要求送货人员退回货物，然后与我们联系。我们会为您重新发货，货物到达时间顺延。</p>\r\n<h4>符合以下条件，可以要求退货</h4>\r\n<ol>\r\n<li>客户收到货物后两天之内，发现商品有明显的制造缺陷的；</li>\r\n<li>货物经过一次换货但仍然存在质量问题的；</li>\r\n<li>由于人为原因造成超过我们承诺到货之日5天还没收到货物的。</li>\r\n</ol>\r\n<p><strong>退货流程：</strong>客户在收到货物后两天内与我们联系，我们会在三个工作日内通过银行汇款把您的货款退回。</p>\r\n<h4>在以下情况我们有权拒绝客户的退换货要求</h4>\r\n<ol>\r\n<li>货物出现破损，但没有在收货时当场要求送货人员换货的；</li>\r\n<li>超过退换货期限的退换货要求；</li>\r\n<li>退换货物不全或者外观受损 ；</li>\r\n<li>客户发货单据丢失或者不全；</li>\r\n<li>产品并非我们提供；</li>\r\n<li>货物本身不存在质量问题的 。</li>\r\n</ol>',255,1,1249614660),(13,'','体贴的售后服务',5,0,'','<p>&nbsp;</p>\r\n<p>本网站所售产品均实行三包政策，请顾客保存好有效凭证，以确保我们为您更好服务。本公司的客户除享受国家规定&ldquo;三包&rdquo;。您可以更放心地在这里购物。<br /></p>\r\n<h3>保修细则</h3>\r\n<h4>一、在本网站购买的商品，自购买日起(以到货登记为准)7日内出现性能故障，您可以选择退货、换货或修理。</h4>\r\n<ol>\r\n<li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。 </li>\r\n</ol>\r\n<h4>二、在本公司购买的商品，自购日起(以到货登记为准)15日内出现性能故障，您可以选择换货或修理。(享受15天退换货无需理由的商品，按《15天退换货无需理由细则》办理)</h4>\r\n<ol>\r\n<li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。</li>\r\n</ol>\r\n<h4>三、在本公司购买的商品，自购日起(以到货登记为准)一年之内出现非人为损坏的质量问题，本公司承诺免费保修。</h4>\r\n<ol>\r\n<li>在接到您的产品后，我公司将问题商品送厂商特约维修中心检测； </li>\r\n<li>检测报出来后，如非人为损坏的，是产品本身质量问题，我公司会及时按您的要求予以退款、换可或维修。 </li>\r\n<li>如果检测结果是无故障或是人为因素造成的故障，我公司会及时通知您，并咨询您的处理意见。 </li>\r\n</ol>\r\n<h3>收费维修：</h3>\r\n<h4>一、对于人为造成的故障，本公司将采取收费维修，包括：</h4>\r\n<ol>\r\n<li>产品内部被私自拆开或其中任何部分被更替； </li>\r\n<li>商品里面的条码不清楚，无法成功判断； </li>\r\n<li>有入水、碎裂、损毁或有腐蚀等现象； </li>\r\n<li>过了保修期的商品。</li>\r\n</ol>\r\n<h4>二、符合以下条件，可以要求换货：</h4>\r\n<ol>\r\n<li>客户在收到货物时当面在送货员面前拆包检查，发现货物有质量问题的 </li>\r\n<li>实际收到货物与网站上描述的有很大的出入的 </li>\r\n<li>换货流程：客户当面要求送货人员退回货物，然后与我们联系。我们会在一个工作日内为您重新发货，货物到达时间顺延。</li>\r\n</ol>\r\n<h4>三、符合以下条件，可以要求退货：</h4>\r\n<p>客户收到货物后两天之内，</p>\r\n<ol>\r\n<li>发现商品有明显的制造缺陷的 </li>\r\n<li>货物经过一次换货但仍然存在质量问题的 </li>\r\n<li>由于人为原因造成超过我们承诺到货之日三天还没收到货物的</li>\r\n</ol>\r\n<p>退货流程：客户在收到货物后两天内与我们联系，我们会在两个工作日内通过银行汇款把您的货款退回。</p>\r\n<h4>在以下情况我们有权拒绝客户的退换货要求：</h4>\r\n<ol>\r\n<li>货物出现破损，但没有在收货时当场要求送货人员换货的 </li>\r\n<li>超过退换货期限的退换货要求 </li>\r\n<li>退换货物不全或者外观受损 </li>\r\n<li>客户发货单据丢失或者不全 </li>\r\n<li>产品并非我们提供 </li>\r\n<li>货物本身不存在质量问题的</li>\r\n</ol>',255,1,1249614760),(14,'','免责条款',5,0,'','<p>&nbsp;</p>\r\n<h4>免责声明</h4>\r\n<p>如因不可抗力或其他无法控制的原因造成网站销售系统崩溃或无法正常使用，从而导致网上交易无法完成或丢失有关的信息、记录等，网站将不承担责任。但是我们将会尽合理的可能协助处理善后事宜，并努力使客户减少可能遭受的经济损失。<br />本 店可以按买方的要求代办相关运输手续，但我们的责任义务仅限于按时发货，遇到物流（邮政）意外时协助买方查询，不承担任何物流（邮政）提供给顾客之外的赔 偿，一切查询索赔事宜均按照物流（邮政）的规定办理。在物流（邮政）全程查询期限未满之前，买方不得要求赔偿。提醒买方一定核实好收货详细地址和收货人电 话，以免耽误投递。凡在本店购物，均视为如同意此声明。</p>\r\n<h4>客户监督</h4>\r\n<p>我们希望通过不懈努力，为客户提供最佳服务，我们在给客户提供服务的全程中接受客户的监督。</p>\r\n<h4>争议处理</h4>\r\n<p>如果客户与网站之间发生任何争议，可依据当时双方所认定的协议或相关法律来解决。</p>',255,1,1249614798),(15,'','简单的购物流程',5,0,'','<h4><br /></h4>\r\n<h4>怎样注册？</h4>\r\n<p>答：您可以直接点击\"会员注册\"进行注册。注册很简单，您只需按注册向导的要求输入一些基本信息即可。为了准确地为您服务，请务必在注册时填写您的真实信息，我们会为您保密。输入的帐号要4-10位，仅可使用英文字母、数字\"-\"。</p>\r\n<h4>怎样成为会员?</h4>\r\n<p>答：您可以直接点击\"会员登录与注册\"进行注册。注册很简单，您只需根据系统提示输入相关资料即可，请您填写完毕时，务必核对填写内容的准确性，并谨记您的会员账号和密码，以便您查询订单或是希望网站提供予您更多的服务时用以核对您的身份。</p>\r\n<h4>如何在网上下单购买，怎么一个操作流程呢？</h4>\r\n<p>答：这种方式和您逛商场的方式十分相似，您只要按照我们的商品分类页面或进入\"钻石珠宝\"、\"个性定制\"等逐页按照连接指明的路径浏览就可以了。 一旦看中了您喜欢的商品，您可以随时点击\"放入购物篮\"按钮将它放入\"购物篮\"。随后，您可以按\"去收银台\"。我们的商品十分丰富，不过您别担心，我们在 每一页中都设立了详细明白的导航条，您是不会迷路的。</p>',255,1,1249614826);
/*!40000 ALTER TABLE `ecm_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_attribute`
--

DROP TABLE IF EXISTS `ecm_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_attribute` (
  `attr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(60) NOT NULL DEFAULT '',
  `input_mode` varchar(10) NOT NULL DEFAULT 'text',
  `def_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`attr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_attribute`
--

LOCK TABLES `ecm_attribute` WRITE;
/*!40000 ALTER TABLE `ecm_attribute` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_brand`
--

DROP TABLE IF EXISTS `ecm_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_brand` (
  `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(100) NOT NULL DEFAULT '',
  `brand_logo` varchar(255) DEFAULT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `recommended` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `if_show` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `tag` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`brand_id`),
  KEY `tag` (`tag`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_brand`
--

LOCK TABLES `ecm_brand` WRITE;
/*!40000 ALTER TABLE `ecm_brand` DISABLE KEYS */;
INSERT INTO `ecm_brand` VALUES (1,'麦包包','data/files/mall/brand/1.gif',1,1,0,1,''),(2,'ESprit','data/files/mall/brand/2.jpg',2,1,0,1,''),(8,'巨邦','data/files/mall/brand/8.jpg',7,1,0,1,''),(9,'3D冰雕','data/files/mall/brand/9.jpg',8,1,0,1,''),(10,'胸博士','data/files/mall/brand/10.jpg',9,1,0,1,''),(11,'肌肤之源','data/files/mall/brand/11.jpg',10,1,0,1,''),(12,'暨大美塑','data/files/mall/brand/12.jpg',11,0,0,1,'');
/*!40000 ALTER TABLE `ecm_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_cart`
--

DROP TABLE IF EXISTS `ecm_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_cart` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `session_id` varchar(32) NOT NULL DEFAULT '',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(255) NOT NULL DEFAULT '',
  `spec_id` int(10) unsigned NOT NULL DEFAULT '0',
  `specification` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `goods_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_cart`
--

LOCK TABLES `ecm_cart` WRITE;
/*!40000 ALTER TABLE `ecm_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_category_goods`
--

DROP TABLE IF EXISTS `ecm_category_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_category_goods` (
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`,`goods_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_category_goods`
--

LOCK TABLES `ecm_category_goods` WRITE;
/*!40000 ALTER TABLE `ecm_category_goods` DISABLE KEYS */;
INSERT INTO `ecm_category_goods` VALUES (1201,25),(1201,28),(1201,29),(1202,18),(1202,21),(1202,23),(1203,9),(1203,20),(1203,22),(1203,26),(1203,27),(1209,12),(1209,16),(1209,24);
/*!40000 ALTER TABLE `ecm_category_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_category_store`
--

DROP TABLE IF EXISTS `ecm_category_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_category_store` (
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`,`store_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_category_store`
--

LOCK TABLES `ecm_category_store` WRITE;
/*!40000 ALTER TABLE `ecm_category_store` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_category_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_collect`
--

DROP TABLE IF EXISTS `ecm_collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_collect` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'goods',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `keyword` varchar(60) DEFAULT NULL,
  `add_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`,`type`,`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_collect`
--

LOCK TABLES `ecm_collect` WRITE;
/*!40000 ALTER TABLE `ecm_collect` DISABLE KEYS */;
INSERT INTO `ecm_collect` VALUES (8,'store',8,'',1395727851),(8,'goods',9,'',1394747331);
/*!40000 ALTER TABLE `ecm_collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_coupon`
--

DROP TABLE IF EXISTS `ecm_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_coupon` (
  `coupon_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `coupon_name` varchar(100) NOT NULL DEFAULT '',
  `coupon_value` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `use_times` int(10) unsigned NOT NULL DEFAULT '0',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `min_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `if_issue` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`coupon_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_coupon`
--

LOCK TABLES `ecm_coupon` WRITE;
/*!40000 ALTER TABLE `ecm_coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_coupon_sn`
--

DROP TABLE IF EXISTS `ecm_coupon_sn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_coupon_sn` (
  `coupon_sn` varchar(20) NOT NULL,
  `coupon_id` int(10) unsigned NOT NULL DEFAULT '0',
  `remain_times` int(10) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`coupon_sn`),
  KEY `coupon_id` (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_coupon_sn`
--

LOCK TABLES `ecm_coupon_sn` WRITE;
/*!40000 ALTER TABLE `ecm_coupon_sn` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_coupon_sn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_friend`
--

DROP TABLE IF EXISTS `ecm_friend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_friend` (
  `owner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `friend_id` int(10) unsigned NOT NULL DEFAULT '0',
  `add_time` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`owner_id`,`friend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_friend`
--

LOCK TABLES `ecm_friend` WRITE;
/*!40000 ALTER TABLE `ecm_friend` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_friend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_function`
--

DROP TABLE IF EXISTS `ecm_function`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_function` (
  `func_code` varchar(20) NOT NULL DEFAULT '',
  `func_name` varchar(60) NOT NULL DEFAULT '',
  `privileges` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`func_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_function`
--

LOCK TABLES `ecm_function` WRITE;
/*!40000 ALTER TABLE `ecm_function` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_function` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_gcategory`
--

DROP TABLE IF EXISTS `ecm_gcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_gcategory` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `if_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`cate_id`),
  KEY `store_id` (`store_id`,`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_gcategory`
--

LOCK TABLES `ecm_gcategory` WRITE;
/*!40000 ALTER TABLE `ecm_gcategory` DISABLE KEYS */;
INSERT INTO `ecm_gcategory` VALUES (1,0,'面部项目',0,255,1),(2,0,'润唇',1,255,1),(3,0,'保湿补水',1,255,1),(4,0,'眼部祛皱',1,255,1),(5,0,'明眸',1,255,1),(6,0,'暗疮炎症护理',1,255,1),(7,0,'净化排毒护理',1,255,1),(8,0,'祛黑头',1,255,1),(9,0,'美白',1,255,1),(10,0,'抗衰',1,255,1),(11,0,'去红血丝',1,255,1),(12,0,'晒后修复',1,255,1),(13,0,'祛斑',1,255,1),(14,0,'退敏',1,255,1),(15,0,'身体项目',0,255,1),(16,0,'脊柱保养',15,255,1),(17,0,'肩颈理疗',15,255,1),(18,0,'卵巢保养',15,255,1),(19,0,'盆腔',15,255,1),(20,0,'脾胃',15,255,1),(21,0,'淋巴排毒',15,255,1),(23,0,'肝胆',15,255,1),(24,0,'清肠',15,255,1),(25,0,'胸',15,255,1),(26,0,'关节',15,255,1),(27,0,'清肺',15,255,1),(28,0,'头部理疗',15,255,1);
/*!40000 ALTER TABLE `ecm_gcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_goods`
--

DROP TABLE IF EXISTS `ecm_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT 'material',
  `goods_name` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `cate_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_name` varchar(255) NOT NULL DEFAULT '',
  `brand` varchar(100) NOT NULL,
  `spec_qty` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `spec_name_1` varchar(60) NOT NULL DEFAULT '',
  `spec_name_2` varchar(60) NOT NULL DEFAULT '',
  `if_show` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `closed` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `close_reason` varchar(255) DEFAULT NULL,
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0',
  `default_spec` int(11) unsigned NOT NULL DEFAULT '0',
  `default_image` varchar(255) NOT NULL DEFAULT '',
  `recommended` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `cate_id_1` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_id_2` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_id_3` int(10) unsigned NOT NULL DEFAULT '0',
  `cate_id_4` int(10) unsigned NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tags` varchar(102) NOT NULL,
  `pics` text,
  `suit_people` varchar(255) NOT NULL DEFAULT '',
  `effect` varchar(255) NOT NULL DEFAULT '',
  `experiment` tinyint(4) NOT NULL DEFAULT '0',
  `experiment_update_date` int(10) unsigned NOT NULL DEFAULT '0',
  `lianbao` tinyint(4) NOT NULL DEFAULT '0',
  `appoint_count` int(10) unsigned NOT NULL DEFAULT '0',
  `credit_count` int(10) unsigned NOT NULL DEFAULT '0',
  `off_price` double DEFAULT NULL,
  PRIMARY KEY (`goods_id`),
  KEY `store_id` (`store_id`),
  KEY `cate_id` (`cate_id`),
  KEY `cate_id_1` (`cate_id_1`),
  KEY `cate_id_2` (`cate_id_2`),
  KEY `cate_id_3` (`cate_id_3`),
  KEY `cate_id_4` (`cate_id_4`),
  KEY `brand` (`brand`(10)),
  KEY `tags` (`tags`),
  KEY `e_e_u_d` (`experiment`,`experiment_update_date`),
  KEY `app_c_idx` (`appoint_count`),
  KEY `credit_c_idx` (`credit_count`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_goods`
--

LOCK TABLES `ecm_goods` WRITE;
/*!40000 ALTER TABLE `ecm_goods` DISABLE KEYS */;
INSERT INTO `ecm_goods` VALUES (9,8,'material','3D基因','<img src=\"/static/kindeditor/attached/image/20140328/20140328091639_55884.jpg\" alt=\"\" /> \n<p class=\"p0\" style=\"margin-left:10.3500pt;\">\n	<span style=\"font-size:16px;line-height:2;\">生物活性多肽主要包括表皮生长因子</span><span style=\"font-size:16px;line-height:2;\">EGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">aFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">bFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">KGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">VEGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">NGF</span><span style=\"font-size:16px;line-height:2;\">等多种细胞生长因子。它们在人</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><img src=\"/static/kindeditor/attached/image/20140328/20140328092710_95855.jpg\" alt=\"\" /><br />\n</span> \n</p>',0,'','生化美容',0,'','',1,0,NULL,0,0,0,'http://img.bzhwj.com/img/c68f4816d98cc3bf9da78369e7669304.jpg',0,1,10,0,0,999.00,'抗衰功能','[{\"pic\":\"http://img.bzhwj.com/img/b516d0b5a011c0d44c0c3c0202e93e11.jpg\"},{\"pic\":\"http://img.bzhwj.com/img/00015fb5f9852418d5d4c860719bf2d1.jpg\"}]','b','a',1,1397386960,1,2,0,888),(20,8,'material','3D基因','<img src=\"/static/kindeditor/attached/image/20140328/20140328091639_55884.jpg\" alt=\"\" /> \n<p class=\"p0\" style=\"margin-left:10.3500pt;\">\n	<span style=\"font-size:16px;line-height:2;\">生物活性多肽主要包括表皮生长因子</span><span style=\"font-size:16px;line-height:2;\">EGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">aFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">bFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">KGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">VEGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">NGF</span><span style=\"font-size:16px;line-height:2;\">等多种细胞生长因子。它们在人</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><img src=\"/static/kindeditor/attached/image/20140328/20140328092710_95855.jpg\" alt=\"\" /><br />\n</span> \n</p>',0,'','生化美容',0,'','',0,0,NULL,0,0,0,'http://img.bzhwj.com/img/c68f4816d98cc3bf9da78369e7669304.jpg',0,1,10,0,0,999.00,'抗衰功能','[{\"pic\":\"http://img.bzhwj.com/img/b516d0b5a011c0d44c0c3c0202e93e11.jpg\"},{\"pic\":\"http://img.bzhwj.com/img/00015fb5f9852418d5d4c860719bf2d1.jpg\"}]','b','a',1,1396856800,0,0,0,NULL),(12,9,'material','美容护肤','<img src=\"/static/kindeditor/attached/image/20140328/20140328091639_55884.jpg\" alt=\"\" /> \n<p class=\"p0\" style=\"margin-left:10.3500pt;\">\n	<span style=\"font-size:16px;line-height:2;\">生物活性多肽主要包括表皮生长因子</span><span style=\"font-size:16px;line-height:2;\">EGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">aFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">bFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">KGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">VEGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">NGF</span><span style=\"font-size:16px;line-height:2;\">等多种细胞生长因子。它们在人</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><img src=\"/static/kindeditor/attached/image/20140328/20140328092710_95855.jpg\" alt=\"\" /><br />\n</span> \n</p>',0,'','生化美容',0,'','',1,0,NULL,0,0,0,'http://img.bzhwj.com/img/c68f4816d98cc3bf9da78369e7669304.jpg',0,1,10,0,0,999.00,'抗衰功能','[{\"pic\":\"http://img.bzhwj.com/img/b516d0b5a011c0d44c0c3c0202e93e11.jpg\"},{\"pic\":\"http://img.bzhwj.com/img/00015fb5f9852418d5d4c860719bf2d1.jpg\"}]','b','a',1,1396856854,0,0,0,NULL),(16,9,'material','3D基因','<img src=\"/static/kindeditor/attached/image/20140328/20140328091639_55884.jpg\" alt=\"\" /> \n<p class=\"p0\" style=\"margin-left:10.3500pt;\">\n	<span style=\"font-size:16px;line-height:2;\">生物活性多肽主要包括表皮生长因子</span><span style=\"font-size:16px;line-height:2;\">EGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">aFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">bFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">KGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">VEGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">NGF</span><span style=\"font-size:16px;line-height:2;\">等多种细胞生长因子。它们在人</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><img src=\"/static/kindeditor/attached/image/20140328/20140328092710_95855.jpg\" alt=\"\" /><br />\n</span> \n</p>',0,'','生化美容',0,'','',1,0,NULL,0,0,0,'http://img.bzhwj.com/img/c68f4816d98cc3bf9da78369e7669304.jpg',0,1,10,0,0,999.00,'抗衰功能','[{\"pic\":\"http://img.bzhwj.com/img/b516d0b5a011c0d44c0c3c0202e93e11.jpg\"},{\"pic\":\"http://img.bzhwj.com/img/00015fb5f9852418d5d4c860719bf2d1.jpg\"}]','b','a',1,1396856855,0,0,0,NULL),(18,8,'material','3D基因','<img src=\"/static/kindeditor/attached/image/20140328/20140328091639_55884.jpg\" alt=\"\" /> \n<p class=\"p0\" style=\"margin-left:10.3500pt;\">\n	<span style=\"font-size:16px;line-height:2;\">生物活性多肽主要包括表皮生长因子</span><span style=\"font-size:16px;line-height:2;\">EGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">aFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">bFGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">KGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">VEGF</span><span style=\"font-size:16px;line-height:2;\">、</span><span style=\"font-size:16px;line-height:2;\">NGF</span><span style=\"font-size:16px;line-height:2;\">等多种细胞生长因子。它们在人</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\">人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:16px;line-height:2;\"><img src=\"/static/kindeditor/attached/image/20140328/20140328092710_95855.jpg\" alt=\"\" /><br />\n</span> \n</p>',0,'','生化美容',0,'','',1,0,NULL,0,0,0,'http://img.bzhwj.com/img/c68f4816d98cc3bf9da78369e7669304.jpg',0,1,10,0,0,999.00,'抗衰功能','[{\"pic\":\"http://img.bzhwj.com/img/b516d0b5a011c0d44c0c3c0202e93e11.jpg\"},{\"pic\":\"http://img.bzhwj.com/img/00015fb5f9852418d5d4c860719bf2d1.jpg\"}]','b','a',1,1396856866,0,0,2,NULL);
/*!40000 ALTER TABLE `ecm_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_goods_attr`
--

DROP TABLE IF EXISTS `ecm_goods_attr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_goods_attr` (
  `gattr_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `attr_name` varchar(60) NOT NULL DEFAULT '',
  `attr_value` varchar(255) NOT NULL DEFAULT '',
  `attr_id` int(10) unsigned DEFAULT NULL,
  `sort_order` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`gattr_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_goods_attr`
--

LOCK TABLES `ecm_goods_attr` WRITE;
/*!40000 ALTER TABLE `ecm_goods_attr` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_goods_attr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_goods_image`
--

DROP TABLE IF EXISTS `ecm_goods_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_goods_image` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `image_url` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) NOT NULL DEFAULT '',
  `sort_order` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `file_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_goods_image`
--

LOCK TABLES `ecm_goods_image` WRITE;
/*!40000 ALTER TABLE `ecm_goods_image` DISABLE KEYS */;
INSERT INTO `ecm_goods_image` VALUES (29,9,'data/files/store_2/goods_98/200908060911381037.jpg','data/files/store_2/goods_98/small_200908060911381037.jpg',255,31),(30,9,'data/files/store_2/goods_128/200908060912082754.jpg','data/files/store_2/goods_128/small_200908060912082754.jpg',255,32),(36,12,'data/files/store_2/goods_123/200908060918436837.jpg','data/files/store_2/goods_123/small_200908060918436837.jpg',255,38),(37,12,'data/files/store_2/goods_142/200908060919027810.jpg','data/files/store_2/goods_142/small_200908060919027810.jpg',255,39),(45,16,'data/files/store_2/goods_67/200908060927474675.jpg','data/files/store_2/goods_67/small_200908060927474675.jpg',255,47),(48,18,'data/files/store_2/goods_195/200908060936352784.jpg','data/files/store_2/goods_195/small_200908060936352784.jpg',255,50),(49,18,'data/files/store_2/goods_8/200908060936481674.jpg','data/files/store_2/goods_8/small_200908060936481674.jpg',255,51),(50,18,'data/files/store_2/goods_24/200908060937048695.jpg','data/files/store_2/goods_24/small_200908060937048695.jpg',255,52),(54,20,'data/files/store_2/goods_143/200908060942233830.jpg','data/files/store_2/goods_143/small_200908060942233830.jpg',255,56),(55,20,'data/files/store_2/goods_156/200908060942363092.jpg','data/files/store_2/goods_156/small_200908060942363092.jpg',255,57),(56,20,'data/files/store_2/goods_166/200908060942462672.jpg','data/files/store_2/goods_166/small_200908060942462672.jpg',255,58),(57,21,'data/files/store_2/goods_25/200908060950258122.jpg','data/files/store_2/goods_25/small_200908060950258122.jpg',255,59),(58,21,'data/files/store_2/goods_39/200908060950399637.jpg','data/files/store_2/goods_39/small_200908060950399637.jpg',255,60),(59,21,'data/files/store_2/goods_55/200908060950555738.jpg','data/files/store_2/goods_55/small_200908060950555738.jpg',255,61),(60,21,'data/files/store_2/goods_67/200908060951072027.jpg','data/files/store_2/goods_67/small_200908060951072027.jpg',255,62),(61,22,'data/files/store_2/goods_147/200908060952274906.jpg','data/files/store_2/goods_147/small_200908060952274906.jpg',255,63),(62,22,'data/files/store_2/goods_157/200908060952376888.jpg','data/files/store_2/goods_157/small_200908060952376888.jpg',255,64),(63,23,'data/files/store_2/goods_64/200908060954245662.jpg','data/files/store_2/goods_64/small_200908060954245662.jpg',255,65),(64,23,'data/files/store_2/goods_72/200908060954323544.jpg','data/files/store_2/goods_72/small_200908060954323544.jpg',255,66),(65,23,'data/files/store_2/goods_86/200908060954465326.jpg','data/files/store_2/goods_86/small_200908060954465326.jpg',255,67),(66,24,'data/files/store_2/goods_20/200908060957002218.jpg','data/files/store_2/goods_20/small_200908060957002218.jpg',255,68),(67,25,'data/files/store_2/goods_139/200908060958592106.jpg','data/files/store_2/goods_139/small_200908060958592106.jpg',255,69),(68,25,'data/files/store_2/goods_151/200908060959114414.jpg','data/files/store_2/goods_151/small_200908060959114414.jpg',255,70),(69,25,'data/files/store_2/goods_166/200908060959265796.jpg','data/files/store_2/goods_166/small_200908060959265796.jpg',255,71),(70,26,'data/files/store_2/goods_47/200908061000474424.jpg','data/files/store_2/goods_47/small_200908061000474424.jpg',255,72),(71,26,'data/files/store_2/goods_57/200908061000576924.jpg','data/files/store_2/goods_57/small_200908061000576924.jpg',255,73),(72,26,'data/files/store_2/goods_71/200908061001114276.jpg','data/files/store_2/goods_71/small_200908061001114276.jpg',255,74),(73,26,'data/files/store_2/goods_86/200908061001263175.jpg','data/files/store_2/goods_86/small_200908061001263175.jpg',255,75),(74,27,'data/files/store_2/goods_5/200908061003253339.jpg','data/files/store_2/goods_5/small_200908061003253339.jpg',255,76),(75,27,'data/files/store_2/goods_18/200908061003382600.jpg','data/files/store_2/goods_18/small_200908061003382600.jpg',255,77),(76,27,'data/files/store_2/goods_29/200908061003494534.jpg','data/files/store_2/goods_29/small_200908061003494534.jpg',255,78),(77,28,'data/files/store_2/goods_115/200908061005154170.jpg','data/files/store_2/goods_115/small_200908061005154170.jpg',255,79),(78,28,'data/files/store_2/goods_14/200908061006541461.jpg','data/files/store_2/goods_14/small_200908061006541461.jpg',255,80),(79,28,'data/files/store_2/goods_26/200908061007068653.jpg','data/files/store_2/goods_26/small_200908061007068653.jpg',255,81),(80,29,'data/files/store_2/goods_121/200908061008412008.jpg','data/files/store_2/goods_121/small_200908061008412008.jpg',255,82),(81,29,'data/files/store_2/goods_127/200908061008473587.jpg','data/files/store_2/goods_127/small_200908061008473587.jpg',255,83);
/*!40000 ALTER TABLE `ecm_goods_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_goods_qa`
--

DROP TABLE IF EXISTS `ecm_goods_qa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_goods_qa` (
  `ques_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_content` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `email` varchar(60) NOT NULL,
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_name` varchar(255) NOT NULL DEFAULT '',
  `reply_content` varchar(255) NOT NULL,
  `time_post` int(10) unsigned NOT NULL,
  `time_reply` int(10) unsigned NOT NULL,
  `if_new` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `type` varchar(10) NOT NULL DEFAULT 'goods',
  PRIMARY KEY (`ques_id`),
  KEY `user_id` (`user_id`),
  KEY `goods_id` (`item_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_goods_qa`
--

LOCK TABLES `ecm_goods_qa` WRITE;
/*!40000 ALTER TABLE `ecm_goods_qa` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_goods_qa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_goods_spec`
--

DROP TABLE IF EXISTS `ecm_goods_spec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_goods_spec` (
  `spec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `spec_1` varchar(60) NOT NULL DEFAULT '',
  `spec_2` varchar(60) NOT NULL DEFAULT '',
  `color_rgb` varchar(7) NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `stock` int(11) NOT NULL DEFAULT '0',
  `sku` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`spec_id`),
  KEY `goods_id` (`goods_id`),
  KEY `price` (`price`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_goods_spec`
--

LOCK TABLES `ecm_goods_spec` WRITE;
/*!40000 ALTER TABLE `ecm_goods_spec` DISABLE KEYS */;
INSERT INTO `ecm_goods_spec` VALUES (25,9,'','','',168.00,29,''),(34,12,'','','',268.00,29,''),(42,16,'方格混色','37','',128.00,88,''),(43,16,'方格混色','38','',128.00,88,''),(44,16,'方格混色','39','',128.00,88,''),(47,18,'','','',170.00,27,''),(49,20,'深蓝色','M','',129.00,99,''),(50,20,'深蓝色','X','',129.00,99,''),(51,20,'白色','M','',129.00,99,''),(52,20,'白色','X','',129.00,98,''),(53,20,'粉红色','M','',129.00,99,''),(54,20,'粉红色','X','',129.00,99,''),(56,21,'','','',170.00,87,''),(57,22,'','','',111.00,33,''),(58,23,'','','',170.00,500,''),(59,24,'花色','36','',169.00,887,''),(60,24,'花色','37','',169.00,888,''),(61,24,'花色','38','',169.00,888,''),(62,24,'花色','39','',169.00,888,''),(63,25,'灰色','S','',128.00,88,''),(64,25,'灰色','M','',128.00,88,''),(65,25,'灰色','L','',128.00,88,''),(66,25,'灰色','XL','',128.00,88,''),(67,26,'','','',89.00,98,''),(68,27,'卡其色','M','',288.00,282,''),(69,27,'卡其色','X','',288.00,282,''),(70,27,'深蓝','M','',288.00,282,''),(71,27,'深蓝','X','',288.00,282,''),(73,28,'','','',188.00,2221,''),(74,29,'','','',328.00,99,'');
/*!40000 ALTER TABLE `ecm_goods_spec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_goods_statistics`
--

DROP TABLE IF EXISTS `ecm_goods_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_goods_statistics` (
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `collects` int(10) unsigned NOT NULL DEFAULT '0',
  `carts` int(10) unsigned NOT NULL DEFAULT '0',
  `orders` int(10) unsigned NOT NULL DEFAULT '0',
  `sales` int(10) unsigned NOT NULL DEFAULT '0',
  `comments` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_goods_statistics`
--

LOCK TABLES `ecm_goods_statistics` WRITE;
/*!40000 ALTER TABLE `ecm_goods_statistics` DISABLE KEYS */;
INSERT INTO `ecm_goods_statistics` VALUES (9,95,1,0,0,0,0),(12,23,0,0,0,0,0),(16,15,0,0,0,0,0),(18,41,0,1,1,0,1),(20,58,0,1,1,1,1),(21,6,0,1,1,0,1),(22,5,0,0,0,0,0),(23,7,0,0,0,0,0),(24,6,0,1,1,1,1),(25,4,0,0,0,0,0),(26,5,0,1,1,0,1),(27,7,0,0,0,0,0),(28,10,0,1,1,1,1),(29,10,0,0,0,0,0);
/*!40000 ALTER TABLE `ecm_goods_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_groupbuy`
--

DROP TABLE IF EXISTS `ecm_groupbuy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_groupbuy` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) NOT NULL DEFAULT '',
  `group_image` varchar(255) NOT NULL,
  `group_desc` varchar(255) NOT NULL DEFAULT '',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `spec_price` text NOT NULL,
  `min_quantity` smallint(5) unsigned NOT NULL DEFAULT '0',
  `max_per_user` smallint(5) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `recommended` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`),
  KEY `goods_id` (`goods_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_groupbuy`
--

LOCK TABLES `ecm_groupbuy` WRITE;
/*!40000 ALTER TABLE `ecm_groupbuy` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_groupbuy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_groupbuy_log`
--

DROP TABLE IF EXISTS `ecm_groupbuy_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_groupbuy_log` (
  `group_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `quantity` smallint(5) unsigned NOT NULL DEFAULT '0',
  `spec_quantity` text NOT NULL,
  `linkman` varchar(60) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_groupbuy_log`
--

LOCK TABLES `ecm_groupbuy_log` WRITE;
/*!40000 ALTER TABLE `ecm_groupbuy_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_groupbuy_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_mail_queue`
--

DROP TABLE IF EXISTS `ecm_mail_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_mail_queue` (
  `queue_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mail_to` varchar(150) NOT NULL DEFAULT '',
  `mail_encoding` varchar(50) NOT NULL DEFAULT '',
  `mail_subject` varchar(255) NOT NULL DEFAULT '',
  `mail_body` text NOT NULL,
  `priority` tinyint(1) unsigned NOT NULL DEFAULT '2',
  `err_num` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `lock_expiry` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`queue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_mail_queue`
--

LOCK TABLES `ecm_mail_queue` WRITE;
/*!40000 ALTER TABLE `ecm_mail_queue` DISABLE KEYS */;
INSERT INTO `ecm_mail_queue` VALUES (7,'1095468411@qq.com','utf-8','删除店铺通知','您的店铺已被删除',1,1,1396030090,1396030130),(5,'1095468411@qq.com','utf-8','删除店铺通知','您的店铺已被删除',1,1,1396030079,1396030111),(6,'1095468411@qq.com','utf-8','删除店铺通知','您的店铺已被删除',1,1,1396030085,1396030130);
/*!40000 ALTER TABLE `ecm_mail_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_member`
--

DROP TABLE IF EXISTS `ecm_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_member` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `real_name` varchar(60) DEFAULT NULL,
  `gender` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `phone_tel` varchar(60) DEFAULT NULL,
  `phone_mob` varchar(60) DEFAULT NULL,
  `im_qq` varchar(60) DEFAULT NULL,
  `im_msn` varchar(60) DEFAULT NULL,
  `im_skype` varchar(60) DEFAULT NULL,
  `im_yahoo` varchar(60) DEFAULT NULL,
  `im_aliww` varchar(60) DEFAULT NULL,
  `reg_time` int(10) unsigned DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `last_ip` varchar(15) DEFAULT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `ugrade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `portrait` varchar(255) DEFAULT NULL,
  `outer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `activation` varchar(60) DEFAULT NULL,
  `feed_config` text NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `outer_id` (`outer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_member`
--

LOCK TABLES `ecm_member` WRITE;
/*!40000 ALTER TABLE `ecm_member` DISABLE KEYS */;
INSERT INTO `ecm_member` VALUES (1,'admin','lpt2008303483@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1388908447,1397288776,'127.0.0.1',74,0,NULL,0,NULL,''),(3,'buyer','buyer@ecmall.com','e10adc3949ba59abbe56e057f20f883e','超级买家',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1389064410,1394775410,'114.252.46.214',1,0,NULL,0,NULL,''),(10,'老五','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1395335843,1395335843,'218.109.224.116',1,0,NULL,0,NULL,''),(11,'红银','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1395420920,1395594454,'218.109.226.25',2,0,NULL,0,NULL,''),(9,'殷建','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1394752341,1395632930,'218.109.226.25',11,0,NULL,0,NULL,''),(8,'李辉','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1394669140,1397652745,'127.0.0.1',38,0,NULL,0,NULL,''),(12,'泓易美容','985718063@qq.com','55587a910882016321201e6ebbc9f595',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1395600399,1396033429,'218.109.226.25',10,0,NULL,0,NULL,''),(13,'李辉1','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396027052,1396029214,'218.109.226.25',2,0,NULL,0,NULL,''),(14,'李辉2','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396027290,1396031047,'218.109.226.25',2,0,NULL,0,NULL,''),(15,'李辉4','123456789@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396027992,1396031916,'218.109.226.25',2,0,NULL,0,NULL,''),(16,'李辉5','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396028184,1396031995,'218.109.226.25',2,0,NULL,0,NULL,''),(17,'李辉6','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396028302,1396032282,'218.109.226.25',2,0,NULL,0,NULL,''),(18,'李辉7','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396028402,1396028402,'218.109.226.25',1,0,NULL,0,NULL,''),(19,'李辉8','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396028492,1396028492,'218.109.226.25',1,0,NULL,0,NULL,''),(20,'李辉9','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396028832,1396028832,'218.109.226.25',1,0,NULL,0,NULL,''),(21,'王3','1095468411@qq.com','e10adc3949ba59abbe56e057f20f883e',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1396040880,1396040880,'218.109.226.25',1,0,NULL,0,NULL,'');
/*!40000 ALTER TABLE `ecm_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_message`
--

DROP TABLE IF EXISTS `ecm_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_message` (
  `msg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(10) unsigned NOT NULL DEFAULT '0',
  `to_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0',
  `new` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_message`
--

LOCK TABLES `ecm_message` WRITE;
/*!40000 ALTER TABLE `ecm_message` DISABLE KEYS */;
INSERT INTO `ecm_message` VALUES (13,0,9,'','管理员删除了您的商品：美白基因\r\n原因是：',1395423363,1395423363,1,0,3),(14,0,9,'','管理员删除了您的商品：美白基因\r\n原因是：',1395423363,1395423363,1,0,3),(12,0,8,'','管理员删除了您的商品：3D基因\r\n原因是：',1395423363,1395423363,1,0,3),(11,0,8,'','管理员删除了您的商品：3D基因\r\n原因是：',1395423363,1395423363,1,0,3),(10,0,9,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1395007628,1395007628,1,0,3),(9,0,8,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1394670038,1394670038,1,0,3),(15,0,9,'','管理员删除了您的商品：美白基因\r\n原因是：',1395423363,1395423363,1,0,3),(16,0,9,'','管理员删除了您的商品：美白产品\r\n原因是：',1395423363,1395423363,1,0,3),(17,0,8,'','管理员删除了您的商品：3D基因\r\n原因是：',1395423363,1395423363,1,0,3),(18,0,20,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028909,1396028909,1,0,3),(19,0,19,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028918,1396028918,1,0,3),(20,0,18,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028928,1396028928,1,0,3),(21,0,17,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028933,1396028933,1,0,3),(22,0,16,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028938,1396028938,1,0,3),(23,0,15,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028942,1396028942,1,0,3),(24,0,14,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028948,1396028948,1,0,3),(25,0,14,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028953,1396028953,1,0,3),(26,0,13,'','恭喜，您的店铺已开通，赶快来用户中心发布商品吧。',1396028975,1396028975,1,0,3),(27,0,20,'','您的店铺已被删除',1396030079,1396030079,1,0,3),(28,0,19,'','您的店铺已被删除',1396030085,1396030085,1,0,3),(29,0,18,'','您的店铺已被删除',1396030090,1396030090,1,0,3);
/*!40000 ALTER TABLE `ecm_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_module`
--

DROP TABLE IF EXISTS `ecm_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_module` (
  `module_id` varchar(30) NOT NULL DEFAULT '',
  `module_name` varchar(100) NOT NULL DEFAULT '',
  `module_version` varchar(5) NOT NULL DEFAULT '',
  `module_desc` text NOT NULL,
  `module_config` text NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_module`
--

LOCK TABLES `ecm_module` WRITE;
/*!40000 ALTER TABLE `ecm_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_navigation`
--

DROP TABLE IF EXISTS `ecm_navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_navigation` (
  `nav_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(60) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `open_new` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `hot` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_navigation`
--

LOCK TABLES `ecm_navigation` WRITE;
/*!40000 ALTER TABLE `ecm_navigation` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_order`
--

DROP TABLE IF EXISTS `ecm_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT 'material',
  `extension` varchar(10) NOT NULL DEFAULT '',
  `seller_id` int(10) unsigned NOT NULL DEFAULT '0',
  `seller_name` varchar(100) DEFAULT NULL,
  `buyer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `buyer_name` varchar(100) DEFAULT NULL,
  `buyer_email` varchar(60) NOT NULL DEFAULT '',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `payment_id` int(10) unsigned DEFAULT NULL,
  `payment_name` varchar(100) DEFAULT NULL,
  `payment_code` varchar(20) NOT NULL DEFAULT '',
  `out_trade_sn` varchar(20) NOT NULL DEFAULT '',
  `pay_time` int(10) unsigned DEFAULT NULL,
  `pay_message` varchar(255) NOT NULL DEFAULT '',
  `ship_time` int(10) unsigned DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `finished_time` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `order_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `evaluation_status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `evaluation_time` int(10) unsigned NOT NULL DEFAULT '0',
  `anonymous` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `postscript` varchar(255) NOT NULL DEFAULT '',
  `pay_alter` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `order_sn` (`order_sn`,`seller_id`),
  KEY `seller_name` (`seller_name`),
  KEY `buyer_name` (`buyer_name`),
  KEY `add_time` (`add_time`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_order`
--

LOCK TABLES `ecm_order` WRITE;
/*!40000 ALTER TABLE `ecm_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_order_extm`
--

DROP TABLE IF EXISTS `ecm_order_extm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_order_extm` (
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `consignee` varchar(60) NOT NULL DEFAULT '',
  `region_id` int(10) unsigned DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `phone_tel` varchar(60) DEFAULT NULL,
  `phone_mob` varchar(60) DEFAULT NULL,
  `shipping_id` int(10) unsigned DEFAULT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `shipping_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`order_id`),
  KEY `consignee` (`consignee`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_order_extm`
--

LOCK TABLES `ecm_order_extm` WRITE;
/*!40000 ALTER TABLE `ecm_order_extm` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_order_extm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_order_goods`
--

DROP TABLE IF EXISTS `ecm_order_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_order_goods` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_name` varchar(255) NOT NULL DEFAULT '',
  `spec_id` int(10) unsigned NOT NULL DEFAULT '0',
  `specification` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `goods_image` varchar(255) DEFAULT NULL,
  `evaluation` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `credit_value` tinyint(1) NOT NULL DEFAULT '0',
  `is_valid` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`rec_id`),
  KEY `order_id` (`order_id`,`goods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_order_goods`
--

LOCK TABLES `ecm_order_goods` WRITE;
/*!40000 ALTER TABLE `ecm_order_goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_order_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_order_log`
--

DROP TABLE IF EXISTS `ecm_order_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_order_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `operator` varchar(60) NOT NULL DEFAULT '',
  `order_status` varchar(60) NOT NULL DEFAULT '',
  `changed_status` varchar(60) NOT NULL DEFAULT '',
  `remark` varchar(255) DEFAULT NULL,
  `log_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`log_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_order_log`
--

LOCK TABLES `ecm_order_log` WRITE;
/*!40000 ALTER TABLE `ecm_order_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_order_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_pageview`
--

DROP TABLE IF EXISTS `ecm_pageview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_pageview` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `view_date` date NOT NULL DEFAULT '0000-00-00',
  `view_times` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`rec_id`),
  UNIQUE KEY `storedate` (`store_id`,`view_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_pageview`
--

LOCK TABLES `ecm_pageview` WRITE;
/*!40000 ALTER TABLE `ecm_pageview` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_pageview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_partner`
--

DROP TABLE IF EXISTS `ecm_partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_partner` (
  `partner_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `logo` varchar(255) DEFAULT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`partner_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_partner`
--

LOCK TABLES `ecm_partner` WRITE;
/*!40000 ALTER TABLE `ecm_partner` DISABLE KEYS */;
INSERT INTO `ecm_partner` VALUES (4,0,'上海商派','http://www.shopex.cn','data/files/mall/partner/4.png',1),(5,0,'支付宝','http://www.alipay.com','data/files/mall/partner/5.gif',2),(6,0,'财付通','http://www.tenpay.com','data/files/mall/partner/6.PNG',3);
/*!40000 ALTER TABLE `ecm_partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_payment`
--

DROP TABLE IF EXISTS `ecm_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_payment` (
  `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `payment_code` varchar(20) NOT NULL DEFAULT '',
  `payment_name` varchar(100) NOT NULL DEFAULT '',
  `payment_desc` varchar(255) DEFAULT NULL,
  `config` text,
  `is_online` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`payment_id`),
  KEY `store_id` (`store_id`),
  KEY `payment_code` (`payment_code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_payment`
--

LOCK TABLES `ecm_payment` WRITE;
/*!40000 ALTER TABLE `ecm_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_privilege`
--

DROP TABLE IF EXISTS `ecm_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_privilege` (
  `priv_code` varchar(20) NOT NULL DEFAULT '',
  `priv_name` varchar(60) NOT NULL DEFAULT '',
  `parent_code` varchar(20) DEFAULT NULL,
  `owner` varchar(10) NOT NULL DEFAULT 'mall',
  PRIMARY KEY (`priv_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_privilege`
--

LOCK TABLES `ecm_privilege` WRITE;
/*!40000 ALTER TABLE `ecm_privilege` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_recommend`
--

DROP TABLE IF EXISTS `ecm_recommend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_recommend` (
  `recom_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recom_name` varchar(100) NOT NULL DEFAULT '',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`recom_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_recommend`
--

LOCK TABLES `ecm_recommend` WRITE;
/*!40000 ALTER TABLE `ecm_recommend` DISABLE KEYS */;
INSERT INTO `ecm_recommend` VALUES (15,'裙子2',0),(14,'裙子1',0),(13,'外套2',0),(12,'外套1',0),(11,'精品',0),(10,'特价2',0),(9,'特价1',0);
/*!40000 ALTER TABLE `ecm_recommend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_recommended_goods`
--

DROP TABLE IF EXISTS `ecm_recommended_goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_recommended_goods` (
  `recom_id` int(10) unsigned NOT NULL DEFAULT '0',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`recom_id`,`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_recommended_goods`
--

LOCK TABLES `ecm_recommended_goods` WRITE;
/*!40000 ALTER TABLE `ecm_recommended_goods` DISABLE KEYS */;
INSERT INTO `ecm_recommended_goods` VALUES (15,18,255),(15,20,255),(15,21,255),(15,22,255),(15,23,255),(15,24,255),(15,25,255),(15,26,255),(15,27,255),(14,28,255),(14,29,255),(13,9,255),(13,12,255),(12,16,255),(11,18,255),(11,20,255),(11,21,255),(11,22,255),(10,23,255),(10,24,255),(10,25,255),(10,26,255),(9,27,255),(9,28,255),(9,29,255),(11,29,255),(11,28,255),(11,27,255),(11,26,255),(11,25,255),(11,24,255),(11,23,255);
/*!40000 ALTER TABLE `ecm_recommended_goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_region`
--

DROP TABLE IF EXISTS `ecm_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_region` (
  `region_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`region_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=477 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_region`
--

LOCK TABLES `ecm_region` WRITE;
/*!40000 ALTER TABLE `ecm_region` DISABLE KEYS */;
INSERT INTO `ecm_region` VALUES (2,'中国',0,255),(3,'北京市',2,255),(4,'东城',3,255),(5,'西城',3,255),(6,'崇文',3,255),(7,'宣武',3,255),(8,'朝阳',3,255),(9,'海淀',3,255),(10,'丰台',3,255),(11,'石景山',3,255),(12,'门头沟',3,255),(13,'房山',3,255),(14,'通州',3,255),(15,'顺义',3,255),(16,'大兴',3,255),(17,'昌平',3,255),(18,'平谷',3,255),(19,'怀柔',3,255),(20,'延庆',3,255),(21,'密云',3,255),(22,'天津市',2,255),(23,'和平区',22,255),(24,'河东区',22,255),(25,'河西区',22,255),(26,'南开区',22,255),(27,'河北区',22,255),(28,'红桥区',22,255),(29,'塘沽区',22,255),(30,'汉沽区',22,255),(31,'大港区',22,255),(32,'西青区',22,255),(33,'东丽区',22,255),(34,'津南区',22,255),(35,'北辰区',22,255),(36,'武清区',22,255),(37,'宝坻区',22,255),(38,'静海县',22,255),(39,'宁河县',22,255),(40,'蓟县',22,255),(41,'上海市',2,255),(42,'浦东新区',41,255),(43,'徐汇区',41,255),(44,'长宁区',41,255),(45,'普陀区',41,255),(46,'闸北区',41,255),(47,'虹口区',41,255),(48,'杨浦区',41,255),(49,'黄浦区',41,255),(50,'卢湾区',41,255),(51,'静安区',41,255),(52,'宝山区',41,255),(53,'闵行区',41,255),(54,'嘉定区',41,255),(55,'金山区',41,255),(56,'松江区',41,255),(57,'青浦区',41,255),(58,'崇明县',41,255),(59,'奉贤区',41,255),(60,'南汇区',41,255),(61,'重庆市',2,255),(62,'渝中',61,255),(63,'大渡口',61,255),(64,'江北',61,255),(65,'沙坪坝',61,255),(66,'九龙坡',61,255),(67,'南岸',61,255),(68,'北碚',61,255),(69,'渝北',61,255),(70,'巴南',61,255),(71,'北部新区',61,255),(72,'经开区',61,255),(73,'万盛',61,255),(74,'双桥',61,255),(75,'綦江',61,255),(76,'潼南',61,255),(77,'铜梁',61,255),(78,'大足',61,255),(79,'荣昌',61,255),(80,'璧山',61,255),(81,'江津',61,255),(82,'合川',61,255),(83,'永川',61,255),(84,'南川',61,255),(85,'万州',61,255),(86,'涪陵',61,255),(87,'黔江',61,255),(88,'长寿',61,255),(89,'梁平',61,255),(90,'城口',61,255),(91,'丰都',61,255),(92,'垫江',61,255),(93,'武隆',61,255),(94,'忠县',61,255),(95,'开县',61,255),(96,'云阳',61,255),(97,'奉节',61,255),(98,'巫山',61,255),(99,'巫溪',61,255),(100,'石柱',61,255),(101,'秀山',61,255),(102,'酉阳',61,255),(103,'彭水',61,255),(104,'河北省',2,255),(105,'石家庄',104,255),(106,'衡水',104,255),(107,'唐山',104,255),(108,'秦皇岛',104,255),(109,'张家口',104,255),(110,'承德',104,255),(111,'邯郸',104,255),(112,'沧州',104,255),(113,'邢台',104,255),(114,'保定',104,255),(115,'廊坊',104,255),(116,'山西省',2,255),(117,'太原市',116,255),(118,'大同市',116,255),(119,'朔州市',116,255),(120,'忻州市',116,255),(121,'长治市',116,255),(122,'阳泉市',116,255),(123,'晋中市',116,255),(124,'吕梁市',116,255),(125,'晋城市',116,255),(126,'临汾市',116,255),(127,'运城市',116,255),(128,'辽宁省',2,255),(129,'沈阳',128,255),(130,'大连',128,255),(131,'鞍山',128,255),(132,'抚顺',128,255),(133,'本溪',128,255),(134,'丹东',128,255),(135,'锦州',128,255),(136,'营口',128,255),(137,'阜新',128,255),(138,'辽阳',128,255),(139,'铁岭',128,255),(140,'朝阳',128,255),(141,'盘锦',128,255),(142,'葫芦岛',128,255),(143,'吉林省',2,255),(144,'长春市',143,255),(145,'吉林市',143,255),(146,'四平市',143,255),(147,'辽源市',143,255),(148,'通化市',143,255),(149,'白山市',143,255),(150,'松原市',143,255),(151,'白城市',143,255),(152,'延边州',143,255),(153,'黑龙江省',2,255),(154,'哈尔滨',153,255),(155,'齐齐哈尔',153,255),(156,'牡丹江',153,255),(157,'佳木斯',153,255),(158,'大庆',153,255),(159,'鸡西',153,255),(160,'伊春',153,255),(161,'双鸭山',153,255),(162,'七台河',153,255),(163,'鹤岗',153,255),(164,'黑河',153,255),(165,'绥化',153,255),(166,'大兴安岭',153,255),(167,'内蒙古自治区',2,255),(168,'呼和浩特市',167,255),(169,'包头市',167,255),(170,'乌海市',167,255),(171,'赤峰市',167,255),(172,'通辽市',167,255),(173,'鄂尔多斯市',167,255),(174,'呼伦贝尔市',167,255),(175,'巴彦淖尔市',167,255),(176,'乌兰察布市',167,255),(177,'锡林郭勒盟',167,255),(178,'兴安盟',167,255),(179,'阿拉善盟',167,255),(180,'江苏省',2,255),(181,'南京',180,255),(182,'苏州',180,255),(183,'无锡',180,255),(184,'常州',180,255),(185,'扬州',180,255),(186,'南通',180,255),(187,'镇江',180,255),(188,'泰州',180,255),(189,'淮安',180,255),(190,'徐州',180,255),(191,'盐城',180,255),(192,'宿迁',180,255),(193,'连云港',180,255),(194,'浙江省',2,255),(195,'杭州',194,255),(196,'宁波',194,255),(197,'温州',194,255),(198,'嘉兴',194,255),(199,'湖州',194,255),(200,'绍兴',194,255),(201,'金华',194,255),(202,'衢州',194,255),(203,'舟山',194,255),(204,'台州',194,255),(205,'丽水',194,255),(206,'安徽省',2,255),(207,'淮北市',206,255),(208,'合肥市',206,255),(209,'六安市',206,255),(210,'亳州市',206,255),(211,'宿州市',206,255),(212,'阜阳市',206,255),(213,'蚌埠市',206,255),(214,'淮南市',206,255),(215,'滁州市',206,255),(216,'巢湖市',206,255),(217,'芜湖市',206,255),(218,'马鞍山',206,255),(219,'安庆市',206,255),(220,'池州市',206,255),(221,'铜陵市',206,255),(222,'宣城市',206,255),(223,'黄山市',206,255),(224,'福建省',2,255),(225,'福州市',224,255),(226,'厦门市',224,255),(227,'莆田市',224,255),(228,'三明市',224,255),(229,'泉州市',224,255),(230,'漳州市',224,255),(231,'南平市',224,255),(232,'龙岩市',224,255),(233,'宁德市',224,255),(234,'江西省',2,255),(235,'南昌市',234,255),(236,'景德镇市',234,255),(237,'萍乡市',234,255),(238,'九江市',234,255),(239,'新余市',234,255),(240,'鹰潭市',234,255),(241,'赣州市',234,255),(242,'吉安市',234,255),(243,'宜春市',234,255),(244,'抚州市',234,255),(245,'上饶市',234,255),(246,'山东省',2,255),(247,'济南',246,255),(248,'青岛',246,255),(249,'淄博',246,255),(250,'泰安',246,255),(251,'济宁',246,255),(252,'德州',246,255),(253,'日照',246,255),(254,'潍坊',246,255),(255,'枣庄',246,255),(256,'临沂',246,255),(257,'莱芜',246,255),(258,'滨州',246,255),(259,'聊城',246,255),(260,'菏泽',246,255),(261,'烟台',246,255),(262,'威海',246,255),(263,'东营',246,255),(264,'河南省',2,255),(265,'郑州市',264,255),(266,'洛阳市',264,255),(267,'开封市',264,255),(268,'平顶山市',264,255),(269,'南阳市',264,255),(270,'焦作市',264,255),(271,'信阳市',264,255),(272,'济源市',264,255),(273,'周口市',264,255),(274,'安阳市',264,255),(275,'驻马店市',264,255),(276,'新乡市',264,255),(277,'鹤壁市',264,255),(278,'商丘市',264,255),(279,'漯河市',264,255),(280,'许昌市',264,255),(281,'三门峡市',264,255),(282,'濮阳市',264,255),(283,'湖北省',2,255),(284,'武汉',283,255),(285,'宜昌',283,255),(286,'荆州',283,255),(287,'十堰',283,255),(288,'襄樊',283,255),(289,'黄石',283,255),(290,'黄冈',283,255),(291,'恩施',283,255),(292,'荆门',283,255),(293,'咸宁',283,255),(294,'孝感',283,255),(295,'鄂州',283,255),(296,'天门',283,255),(297,'仙桃',283,255),(298,'随州',283,255),(299,'潜江',283,255),(300,'神农架',283,255),(301,'湖南省',2,255),(302,'长沙市',301,255),(303,'株洲市',301,255),(304,'湘潭市',301,255),(305,'邵阳市',301,255),(306,'吉首市',301,255),(307,'岳阳市',301,255),(308,'娄底市',301,255),(309,'怀化市',301,255),(310,'永州市',301,255),(311,'郴州市',301,255),(312,'常德市',301,255),(313,'衡阳市',301,255),(314,'益阳市',301,255),(315,'张家界',301,255),(316,'湘西州',301,255),(317,'广东省',2,255),(318,'广州',317,255),(319,'深圳',317,255),(320,'珠海',317,255),(321,'汕头',317,255),(322,'佛山',317,255),(323,'东莞',317,255),(324,'中山',317,255),(325,'江门',317,255),(326,'惠州',317,255),(327,'肇庆',317,255),(328,'阳江',317,255),(329,'韶关',317,255),(330,'河源',317,255),(331,'梅州',317,255),(332,'清远',317,255),(333,'云浮',317,255),(334,'茂名',317,255),(335,'汕尾',317,255),(336,'揭阳',317,255),(337,'潮州',317,255),(338,'湛江',317,255),(339,'海南省',2,255),(340,'海口市',339,255),(341,'三亚市',339,255),(342,'广西壮族自治区',2,255),(343,'南宁',342,255),(344,'柳州',342,255),(345,'桂林',342,255),(346,'梧州',342,255),(347,'北海',342,255),(348,'防城港',342,255),(349,'钦州',342,255),(350,'贵港',342,255),(351,'玉林',342,255),(352,'百色',342,255),(353,'贺州',342,255),(354,'河池',342,255),(355,'来宾',342,255),(356,'崇左',342,255),(357,'四川省',2,255),(358,'成都',357,255),(359,'自贡',357,255),(360,'攀枝花',357,255),(361,'泸州',357,255),(362,'德阳',357,255),(363,'绵阳',357,255),(364,'广元',357,255),(365,'遂宁',357,255),(366,'内江',357,255),(367,'资阳',357,255),(368,'乐山',357,255),(369,'眉山',357,255),(370,'南充',357,255),(371,'宜宾',357,255),(372,'广安',357,255),(373,'达州',357,255),(374,'巴中',357,255),(375,'雅安',357,255),(376,'阿坝',357,255),(377,'甘孜',357,255),(378,'凉山',357,255),(379,'贵州省',2,255),(380,'贵阳市',379,255),(381,'遵义市',379,255),(382,'安顺市',379,255),(383,'六盘水市',379,255),(384,'毕节地区',379,255),(385,'铜仁地区',379,255),(386,'黔东南州',379,255),(387,'黔南州',379,255),(388,'黔西南州',379,255),(389,'云南省',2,255),(390,'昆明市',389,255),(391,'曲靖市',389,255),(392,'红河哈尼族彝族自治州',389,255),(393,'昭通市',389,255),(394,'玉溪市',389,255),(395,'德宏傣族景颇族自治州',389,255),(396,'丽江市',389,255),(397,'迪庆藏族自治州',389,255),(398,'文山壮族苗族自治州',389,255),(399,'思茅市',389,255),(400,'大理白族自治州',389,255),(401,'怒江傈僳族自治州',389,255),(402,'保山市',389,255),(403,'楚雄彝族自治州',389,255),(404,'西双版纳傣族自治州',389,255),(405,'临沧市',389,255),(406,'西藏自治区',2,255),(407,'拉萨',406,255),(408,'日喀则',406,255),(409,'林芝',406,255),(410,'山南',406,255),(411,'那曲',406,255),(412,'昌都',406,255),(413,'阿里',406,255),(414,'陕西省',2,255),(415,'西安市',414,255),(416,'铜川市',414,255),(417,'宝鸡市',414,255),(418,'咸阳市',414,255),(419,'渭南市',414,255),(420,'延安市',414,255),(421,'汉中市',414,255),(422,'榆林市',414,255),(423,'安康市',414,255),(424,'商洛市',414,255),(425,'甘肃省',2,255),(426,'兰州市',425,255),(427,'嘉峪关',425,255),(428,'金昌市',425,255),(429,'白银市',425,255),(430,'天水市',425,255),(431,'酒泉市',425,255),(432,'张掖市',425,255),(433,'武威市',425,255),(434,'定西市',425,255),(435,'陇南市',425,255),(436,'平凉市',425,255),(437,'庆阳市',425,255),(438,'临夏州',425,255),(439,'甘南州',425,255),(440,'青海省',2,255),(441,'西宁市',440,255),(442,'海东行署',440,255),(443,'海北藏族自治州',440,255),(444,'海南藏族自治州',440,255),(445,'海西州',440,255),(446,'黄南藏族自治州',440,255),(447,'玉树藏族自治州',440,255),(448,'果洛藏族自治州',440,255),(449,'宁夏回族自治区',2,255),(450,'银川市',449,255),(451,'石嘴山市',449,255),(452,'吴忠市',449,255),(453,'固原市',449,255),(454,'中卫市',449,255),(455,'新疆维吾尔自治区',2,255),(456,'伊犁哈萨克自治州',455,255),(457,'乌鲁木齐市',455,255),(458,'昌吉回族自治州',455,255),(459,'石河子市',455,255),(460,'克拉玛依市',455,255),(461,'阿勒泰地区',455,255),(462,'博尔塔拉蒙古自治州',455,255),(463,'塔城地区',455,255),(464,'和田地区',455,255),(465,'克孜勒苏克尔克孜自治州',455,255),(466,'喀什地区',455,255),(467,'阿克苏地区',455,255),(468,'巴音郭楞蒙古自治州',455,255),(469,'吐鲁番地区',455,255),(470,'哈密地区',455,255),(471,'五家渠市',455,255),(472,'阿拉尔市',455,255),(473,'图木舒克市',455,255),(474,'香港特别行政区',2,255),(475,'澳门特别行政区',2,255),(476,'台湾省',2,255);
/*!40000 ALTER TABLE `ecm_region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_scategory`
--

DROP TABLE IF EXISTS `ecm_scategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_scategory` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`cate_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_scategory`
--

LOCK TABLES `ecm_scategory` WRITE;
/*!40000 ALTER TABLE `ecm_scategory` DISABLE KEYS */;
INSERT INTO `ecm_scategory` VALUES (1,'服饰',0,255),(42,'文体/汽车',0,255);
/*!40000 ALTER TABLE `ecm_scategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_sessions`
--

DROP TABLE IF EXISTS `ecm_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_sessions` (
  `sesskey` char(32) NOT NULL DEFAULT '',
  `expiry` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `adminid` int(11) NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  `data` char(255) NOT NULL DEFAULT '',
  `is_overflow` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_sessions`
--

LOCK TABLES `ecm_sessions` WRITE;
/*!40000 ALTER TABLE `ecm_sessions` DISABLE KEYS */;
INSERT INTO `ecm_sessions` VALUES ('387f78b22dcb59d7c8d1c43c033bcb9c',1397388483,0,0,'127.0.0.1','user_info|a:6:{s:7:\"user_id\";s:1:\"8\";s:9:\"user_name\";s:6:\"李辉\";s:8:\"reg_time\";s:10:\"1394669140\";s:10:\"last_login\";s:10:\"1397354932\";s:7:\"last_ip\";s:9:\"127.0.0.1\";s:8:\"store_id\";s:1:\"8\";}',0),('20a74db778c0b964e0d84e1d9a8d5e5c',1397482329,0,0,'127.0.0.1','user_info|a:6:{s:7:\"user_id\";s:1:\"8\";s:9:\"user_name\";s:6:\"李辉\";s:8:\"reg_time\";s:10:\"1394669140\";s:10:\"last_login\";s:10:\"1397355051\";s:7:\"last_ip\";s:9:\"127.0.0.1\";s:8:\"store_id\";s:1:\"8\";}',0),('00ffa14140b33175aae70232177356f0',1398094910,0,0,'127.0.0.1','user_info|a:6:{s:7:\"user_id\";s:1:\"8\";s:9:\"user_name\";s:6:\"李辉\";s:8:\"reg_time\";s:10:\"1394669140\";s:10:\"last_login\";s:10:\"1397400059\";s:7:\"last_ip\";s:9:\"127.0.0.1\";s:8:\"store_id\";s:1:\"8\";}',0);
/*!40000 ALTER TABLE `ecm_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_sessions_data`
--

DROP TABLE IF EXISTS `ecm_sessions_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_sessions_data` (
  `sesskey` varchar(32) NOT NULL DEFAULT '',
  `expiry` int(11) NOT NULL DEFAULT '0',
  `data` longtext NOT NULL,
  PRIMARY KEY (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_sessions_data`
--

LOCK TABLES `ecm_sessions_data` WRITE;
/*!40000 ALTER TABLE `ecm_sessions_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_sessions_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_sgrade`
--

DROP TABLE IF EXISTS `ecm_sgrade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_sgrade` (
  `grade_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(60) NOT NULL DEFAULT '',
  `goods_limit` int(10) unsigned NOT NULL DEFAULT '0',
  `space_limit` int(10) unsigned NOT NULL DEFAULT '0',
  `skin_limit` int(10) unsigned NOT NULL DEFAULT '0',
  `charge` varchar(100) NOT NULL DEFAULT '',
  `need_confirm` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `functions` varchar(255) DEFAULT NULL,
  `skins` text NOT NULL,
  `sort_order` tinyint(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`grade_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_sgrade`
--

LOCK TABLES `ecm_sgrade` WRITE;
/*!40000 ALTER TABLE `ecm_sgrade` DISABLE KEYS */;
INSERT INTO `ecm_sgrade` VALUES (1,'系统默认',5,2,1,'100元/年',0,'测试用户请选择“默认等级”，可以立即开通。',NULL,'default|default',255),(2,'认证店铺',200,1000,5,'200元/年',1,'申请时需要上传身份证和营业执照复印件','editor_multimedia,coupon,groupbuy','default|default,default|style1,default|style2,default|style3,default|style4',255);
/*!40000 ALTER TABLE `ecm_sgrade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_shipping`
--

DROP TABLE IF EXISTS `ecm_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_shipping` (
  `shipping_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shipping_name` varchar(100) NOT NULL DEFAULT '',
  `shipping_desc` varchar(255) DEFAULT NULL,
  `first_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `step_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_regions` text,
  `enabled` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`shipping_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_shipping`
--

LOCK TABLES `ecm_shipping` WRITE;
/*!40000 ALTER TABLE `ecm_shipping` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_store`
--

DROP TABLE IF EXISTS `ecm_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_store` (
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_name` varchar(100) NOT NULL DEFAULT '',
  `owner_name` varchar(60) NOT NULL DEFAULT '',
  `owner_card` varchar(60) NOT NULL DEFAULT '',
  `region_id` int(10) unsigned DEFAULT NULL,
  `region_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL DEFAULT '',
  `zipcode` varchar(20) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `sgrade` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `apply_remark` varchar(255) NOT NULL DEFAULT '',
  `credit_value` int(10) NOT NULL DEFAULT '0',
  `praise_rate` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `domain` varchar(60) DEFAULT NULL,
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `close_reason` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned DEFAULT NULL,
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `certification` varchar(255) DEFAULT NULL,
  `sort_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `recommended` tinyint(4) NOT NULL DEFAULT '0',
  `theme` varchar(60) NOT NULL DEFAULT '',
  `store_banner` varchar(255) DEFAULT NULL,
  `store_logo` varchar(255) DEFAULT NULL,
  `description` text,
  `image_1` varchar(255) NOT NULL DEFAULT '',
  `image_2` varchar(255) NOT NULL DEFAULT '',
  `image_3` varchar(255) NOT NULL DEFAULT '',
  `im_qq` varchar(60) NOT NULL DEFAULT '',
  `im_ww` varchar(60) NOT NULL DEFAULT '',
  `im_msn` varchar(60) NOT NULL DEFAULT '',
  `hot_search` varchar(255) NOT NULL,
  `business_scope` varchar(50) NOT NULL,
  `online_service` varchar(255) NOT NULL,
  `hotline` varchar(255) NOT NULL,
  `pic_slides` text NOT NULL,
  `enable_groupbuy` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `enable_radar` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `update_at` int(10) unsigned NOT NULL DEFAULT '0',
  `lianbao_auth` tinyint(4) NOT NULL DEFAULT '0',
  `appointment_auth` tinyint(4) NOT NULL DEFAULT '0',
  `number` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`store_id`),
  KEY `store_name` (`store_name`),
  KEY `owner_name` (`owner_name`),
  KEY `region_id` (`region_id`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_store`
--

LOCK TABLES `ecm_store` WRITE;
/*!40000 ALTER TABLE `ecm_store` DISABLE KEYS */;
INSERT INTO `ecm_store` VALUES (8,'杭州美容','李辉','34262219900116195x',195,'中国	浙江省	杭州','杭州市萍水街昆仑橡树园7栋','123456','13221050995',1,'',3,0.00,'',1,'',1394670038,0,'autonym,material',65535,0,'','data/files/store_8/other/store_banner.jpg','data/files/store_8/other/store_logo.jpg','','','','','123456789','','','','','','','',0,0,1396079565,1,1,''),(9,'超验美容','殷建','342622199001161957',195,'中国	浙江省	杭州','杭州市萍水街昆仑橡树园7栋','123457','13221050995',8,'',0,0.00,'',1,'',1395007628,0,'',65535,0,'',NULL,NULL,NULL,'','','','','','','','','','','',0,1,1395846458,0,0,''),(13,'超好美容','李辉','34262219900116195x',195,'中国	浙江省	杭州','萍水街昆仑橡树园','123456','13221050995',2,'',0,0.00,'',1,'',1396028975,0,NULL,65535,0,'',NULL,'data/files/store_13/other/store_logo.jpg','','','','','','','','','','','','',0,0,0,0,0,''),(14,'苏州美容','李辉2','34262219900116195x',195,'中国	浙江省	杭州','萍水街昆仑橡树园','123456','13221050995',2,'',0,0.00,'',1,'',1396028953,0,NULL,65535,0,'',NULL,'data/files/store_14/other/store_logo.jpg','','','','','','','','','','','','',0,0,0,0,0,''),(15,'超超美容','李辉4','34262219900116195x',195,'中国	浙江省	杭州','杭州市萍水街昆仑橡树园7栋','123456','13221050995',2,'',0,0.00,'',1,'',1396028942,0,NULL,65535,0,'',NULL,'data/files/store_15/other/store_logo.jpg','','','','','','','','','','','','',0,0,0,0,0,''),(16,'超出欧美容','李辉5','34262219900116195x',195,'中国	浙江省	杭州','萍水街昆仑橡树园','123456','13221050995',2,'',0,0.00,'',1,'',1396028938,0,'',65535,1,'',NULL,'data/files/store_16/other/store_logo.jpg','','','','','','','','','','','','',0,0,0,1,1,''),(17,'超的美容','李辉6','34262219900116195x',195,'中国	浙江省	杭州','萍水街昆仑橡树园','123456','13221050995',2,'',0,0.00,'',1,'',1396028933,0,'',65535,0,'',NULL,'data/files/store_17/other/store_logo.jpg','','','','','','','','','','','','',0,0,0,0,0,'');
/*!40000 ALTER TABLE `ecm_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_store_archive`
--

DROP TABLE IF EXISTS `ecm_store_archive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_store_archive` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL,
  `intro` text,
  `business_info` text,
  `pics` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `store_id_uk` (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_store_archive`
--

LOCK TABLES `ecm_store_archive` WRITE;
/*!40000 ALTER TABLE `ecm_store_archive` DISABLE KEYS */;
INSERT INTO `ecm_store_archive` VALUES (2,8,'<img src=\"/static/kindeditor/attached/image/20140328/20140328103129_67351.jpg\" alt=\"\" /> \n<p class=\"p0\" style=\"margin-left:10.35pt;\">\n	<span style=\"font-size:24px;\">胞生长因子。它们在人</span> \n</p>\n<p class=\"p0\">\n	<span style=\"font-size:24px;\">人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。</span> \n</p>','<p class=\"p0\" style=\"text-align:center;margin-left:10.35pt;\">\n	<br />\n</p>\n<p class=\"p0\" style=\"margin-left:10.35pt;\">\n	胞生长因子。它们在人<br />\n人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。\n</p>\n<p>\n	<br />\n</p>','[{\"title\":\"sdfdsf\",\"pic\":\"http://img.bzhwj.com/img/f2f2d49f2882724377f0627125cd5105.jpg\"},{\"title\":\"中国\",\"pic\":\"http://img.u2l.me/img/9323febe4e92ab37001f52c47e350d77.jpg\"}]'),(3,9,'<p class=\"p0\" style=\"margin-left:10.3500pt;\">\n	生物活性多肽主要包括表皮生长因子<span>EGF</span><span>、</span><span>aFGF</span><span>、</span><span>bFGF</span><span>、</span><span>KGF</span><span>、</span><span>VEGF</span><span>、</span><span>NGF</span><span>等多种细胞生长因子。它们在人</span>\n</p>\n<p class=\"p0\">\n	人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。\n</p>','<p class=\"p0\" style=\"margin-left:10.3500pt;\">\n	生物活性多肽主要包括表皮生长因子<span>EGF</span><span>、</span><span>aFGF</span><span>、</span><span>bFGF</span><span>、</span><span>KGF</span><span>、</span><span>VEGF</span><span>、</span><span>NGF</span><span>等多种细胞生长因子。它们在人</span>\n</p>\n<p class=\"p0\">\n	人体皮肤的各种问题如衰老、粗糙、起皱纹、暗淡无光、色素沉积、弹性下降等等，归根结底都是由于细胞代谢功能紊乱、老化造成的。基因美容方法使美容功效由一般物理层面深入到细胞层面，特有的细胞生长因子作用于皮肤所需的层面，通过激活细胞，调整细胞的代谢功能，补充细胞代谢所需的精华物质，修复受损组织，来达到皮肤美容、消除皮肤问题、延缓衰老的效果。\n</p>','[{\"title\":\"\",\"pic\":\"\"}]');
/*!40000 ALTER TABLE `ecm_store_archive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_ultimate_store`
--

DROP TABLE IF EXISTS `ecm_ultimate_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_ultimate_store` (
  `ultimate_id` int(255) NOT NULL AUTO_INCREMENT,
  `brand_id` int(50) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  `cate_id` int(50) NOT NULL,
  `store_id` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ultimate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_ultimate_store`
--

LOCK TABLES `ecm_ultimate_store` WRITE;
/*!40000 ALTER TABLE `ecm_ultimate_store` DISABLE KEYS */;
INSERT INTO `ecm_ultimate_store` VALUES (6,0,'',0,14,1,''),(7,0,'',0,15,1,''),(5,0,'',0,13,1,''),(4,0,'',0,8,1,'杭州美容'),(8,0,'',0,17,1,'');
/*!40000 ALTER TABLE `ecm_ultimate_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_uploaded_file`
--

DROP TABLE IF EXISTS `ecm_uploaded_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_uploaded_file` (
  `file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `file_type` varchar(60) NOT NULL DEFAULT '',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL DEFAULT '',
  `file_path` varchar(255) NOT NULL DEFAULT '',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `belong` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_id`),
  KEY `store_id` (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_uploaded_file`
--

LOCK TABLES `ecm_uploaded_file` WRITE;
/*!40000 ALTER TABLE `ecm_uploaded_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_uploaded_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_user_coupon`
--

DROP TABLE IF EXISTS `ecm_user_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_user_coupon` (
  `user_id` int(10) unsigned NOT NULL,
  `coupon_sn` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`,`coupon_sn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_user_coupon`
--

LOCK TABLES `ecm_user_coupon` WRITE;
/*!40000 ALTER TABLE `ecm_user_coupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `ecm_user_coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ecm_user_priv`
--

DROP TABLE IF EXISTS `ecm_user_priv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ecm_user_priv` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `store_id` int(10) unsigned NOT NULL DEFAULT '0',
  `privs` text NOT NULL,
  PRIMARY KEY (`user_id`,`store_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ecm_user_priv`
--

LOCK TABLES `ecm_user_priv` WRITE;
/*!40000 ALTER TABLE `ecm_user_priv` DISABLE KEYS */;
INSERT INTO `ecm_user_priv` VALUES (1,0,'all'),(9,9,'all'),(13,13,'all'),(8,8,'all'),(14,14,'all'),(15,15,'all'),(16,16,'all'),(17,17,'all');
/*!40000 ALTER TABLE `ecm_user_priv` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-21 23:22:21
