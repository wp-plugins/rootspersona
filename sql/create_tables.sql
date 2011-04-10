SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP TABLE IF EXISTS rp_address;
CREATE TABLE IF NOT EXISTS rp_address (
  id int(11) NOT NULL AUTO_INCREMENT,
  line1 varchar(60) DEFAULT NULL,
  line2 varchar(60) DEFAULT NULL,
  line3 varchar(60) DEFAULT NULL,
  city varchar(60) DEFAULT NULL,
  ctry_subentity varchar(60) DEFAULT NULL,
  ctry varchar(60) DEFAULT NULL,
  postal_code varchar(10) DEFAULT NULL,
  phone1 varchar(25) DEFAULT NULL,
  phone2 varchar(25) DEFAULT NULL,
  phone3 varchar(25) DEFAULT NULL,
  email1 varchar(120) DEFAULT NULL,
  email2 varchar(120) DEFAULT NULL,
  email3 varchar(120) DEFAULT NULL,
  www1 varchar(120) DEFAULT NULL,
  www2 varchar(120) DEFAULT NULL,
  www3 varchar(120) DEFAULT NULL,
  fax1 varchar(60) DEFAULT NULL,
  fax2 varchar(60) DEFAULT NULL,
  fax3 varchar(60) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS rp_event_cite;
CREATE TABLE IF NOT EXISTS rp_event_cite (
  event_id int(11) NOT NULL,
  cite_id int(11) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (event_id,cite_id),
  KEY cite_id (cite_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_event_detail;
CREATE TABLE IF NOT EXISTS rp_event_detail (
  id int(11) NOT NULL AUTO_INCREMENT,
  event_type varchar(22) NOT NULL,
  classification varchar(90) DEFAULT NULL,
  event_date varchar(35) DEFAULT NULL,
  place varchar(120) DEFAULT NULL,
  addr_id int(11) DEFAULT NULL,
  resp_agency varchar(120) DEFAULT NULL,
  religious_aff varchar(90) DEFAULT NULL,
  cause varchar(90) DEFAULT NULL,
  restriction_notice varchar(7) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1550 ;

DROP TABLE IF EXISTS rp_event_note;
CREATE TABLE IF NOT EXISTS rp_event_note (
  id int(11) NOT NULL AUTO_INCREMENT,
  event_id int(11) NOT NULL,
  note longtext NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id),
  KEY event_id (event_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS rp_fam;
CREATE TABLE IF NOT EXISTS rp_fam (
  id varchar(22) NOT NULL DEFAULT '',
  batch_id tinyint(4) NOT NULL DEFAULT '1',
  restriction_notice varchar(7) DEFAULT NULL,
  spouse1 varchar(22) DEFAULT NULL,
  indi_batch_id_1 tinyint(4) DEFAULT NULL,
  spouse2 varchar(22) DEFAULT NULL,
  indi_batch_id_2 tinyint(4) DEFAULT NULL,
  auto_rec_id varchar(12) DEFAULT NULL,
  ged_change_date varchar(11) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id,batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_fam_child;
CREATE TABLE IF NOT EXISTS rp_fam_child (
  fam_id varchar(22) NOT NULL,
  fam_batch_id tinyint(4) NOT NULL DEFAULT '1',
  child_id varchar(22) NOT NULL,
  indi_batch_id tinyint(4) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (fam_id,fam_batch_id,child_id,indi_batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_fam_cite;
CREATE TABLE IF NOT EXISTS rp_fam_cite (
  fam_id varchar(22) NOT NULL,
  fam_batch_id tinyint(4) NOT NULL,
  cite_id int(11) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (fam_id,fam_batch_id,cite_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_fam_event;
CREATE TABLE IF NOT EXISTS rp_fam_event (
  fam_id varchar(22) NOT NULL DEFAULT '',
  fam_batch_id tinyint(4) NOT NULL DEFAULT '0',
  event_id int(11) NOT NULL DEFAULT '0',
  update_datetime datetime NOT NULL,
  PRIMARY KEY (fam_id,fam_batch_id,event_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_header;
CREATE TABLE IF NOT EXISTS rp_header (
  id int(11) NOT NULL AUTO_INCREMENT,
  batch_id tinyint(4) NOT NULL DEFAULT '1',
  src_system_id varchar(20) DEFAULT NULL,
  src_system_version varchar(15) DEFAULT NULL,
  product_name varchar(90) DEFAULT NULL,
  corp_name varchar(90) DEFAULT NULL,
  corp_addr_id int(11) DEFAULT NULL,
  src_data_name varchar(90) DEFAULT NULL,
  publication_date varchar(11) DEFAULT NULL,
  copyright_src_data varchar(90) DEFAULT NULL,
  receiving_sys_name varchar(90) DEFAULT NULL,
  transmission_date varchar(11) DEFAULT NULL,
  transmission_time varchar(12) DEFAULT NULL,
  submitter_id varchar(22) DEFAULT NULL,
  submitter_batch_id tinyint(4) DEFAULT NULL,
  submission_id varchar(22) DEFAULT NULL,
  submission_batch_id tinyint(4) DEFAULT NULL,
  file_name varchar(120) DEFAULT NULL,
  copyright_ged_file varchar(90) DEFAULT NULL,
  lang varchar(15) DEFAULT NULL,
  gedc_version varchar(15) DEFAULT NULL,
  gedc_form varchar(20) DEFAULT NULL,
  char_set varchar(8) DEFAULT NULL,
  char_set_version varchar(15) DEFAULT NULL,
  place_hierarchy varchar(120) DEFAULT NULL,
  ged_content_description longtext,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id,batch_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS rp_indi;
CREATE TABLE IF NOT EXISTS rp_indi (
  id varchar(22) NOT NULL,
  batch_id tinyint(4) NOT NULL DEFAULT '1',
  wp_page_id int(11) DEFAULT NULL,
  restriction_notice varchar(7) DEFAULT NULL,
  gender char(1) DEFAULT NULL,
  perm_rec_file_nbr varchar(90) DEFAULT NULL,
  anc_rec_file_nbr varchar(12) DEFAULT NULL,
  auto_rec_id varchar(12) DEFAULT NULL,
  ged_change_date varchar(11) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id,batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_indi_cite;
CREATE TABLE IF NOT EXISTS rp_indi_cite (
  indi_id varchar(22) NOT NULL,
  indi_batch_id tinyint(4) NOT NULL,
  cite_id int(11) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (indi_id,indi_batch_id,cite_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_indi_event;
CREATE TABLE IF NOT EXISTS rp_indi_event (
  indi_id varchar(22) NOT NULL,
  indi_batch_id tinyint(4) NOT NULL,
  event_id int(11) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (indi_id,indi_batch_id,event_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_indi_fam;
CREATE TABLE IF NOT EXISTS rp_indi_fam (
  indi_id varchar(22) NOT NULL,
  indi_batch_id tinyint(4) NOT NULL,
  fam_id varchar(22) NOT NULL,
  fam_batch_id tinyint(4) NOT NULL,
  link_type char(1) NOT NULL,
  link_status varchar(15) DEFAULT NULL,
  pedigree varchar(7) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (indi_id,indi_batch_id,fam_id,fam_batch_id,link_type),
  KEY indi_id (indi_id,indi_batch_id,link_type)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_indi_name;
CREATE TABLE IF NOT EXISTS rp_indi_name (
  indi_id varchar(22) NOT NULL,
  indi_batch_id tinyint(4) NOT NULL,
  name_id int(11) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (indi_id,indi_batch_id,name_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_indi_note;
CREATE TABLE IF NOT EXISTS rp_indi_note (
  id int(11) NOT NULL AUTO_INCREMENT,
  indi_id varchar(22) NOT NULL,
  indi_batch_id tinyint(4) NOT NULL,
  note longtext NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id),
  KEY indi_id (indi_id,indi_batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS rp_name_cite;
CREATE TABLE IF NOT EXISTS rp_name_cite (
  name_id int(11) NOT NULL,
  cite_id int(11) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (name_id,cite_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_name_name;
CREATE TABLE IF NOT EXISTS rp_name_name (
  name_id int(11) NOT NULL,
  assoc_name_id int(11) NOT NULL,
  assoc_name_type varchar(12) NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (name_id,assoc_name_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_name_note;
CREATE TABLE IF NOT EXISTS rp_name_note (
  id int(11) NOT NULL AUTO_INCREMENT,
  name_id int(11) NOT NULL,
  note longtext NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id),
  KEY name_id (name_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS rp_name_personal;
CREATE TABLE IF NOT EXISTS rp_name_personal (
  id int(11) NOT NULL AUTO_INCREMENT,
  personal_name varchar(120) DEFAULT NULL,
  name_type varchar(30) DEFAULT NULL,
  prefix varchar(30) DEFAULT NULL,
  given varchar(120) DEFAULT NULL,
  nickname varchar(30) DEFAULT NULL,
  surname_prefix varchar(30) DEFAULT NULL,
  surname varchar(120) DEFAULT NULL,
  suffix varchar(30) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=918 ;

DROP TABLE IF EXISTS rp_note;
CREATE TABLE IF NOT EXISTS rp_note (
  id int(11) NOT NULL AUTO_INCREMENT,
  cite_id int(11) DEFAULT NULL,
  auto_rec_id varchar(12) DEFAULT NULL,
  ged_change_date varchar(11) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  submitter_text longtext NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS rp_repo;
CREATE TABLE IF NOT EXISTS rp_repo (
  id varchar(22) NOT NULL,
  batch_id tinyint(4) NOT NULL DEFAULT '1',
  repo_name varchar(90) DEFAULT NULL,
  addr_id int(11) DEFAULT NULL,
  auto_rec_id varchar(12) DEFAULT NULL,
  ged_change_date varchar(11) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id,batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_repo_note;
CREATE TABLE IF NOT EXISTS rp_repo_note (
  id int(11) NOT NULL AUTO_INCREMENT,
  repo_id varchar(22) NOT NULL,
  repo_batch_id tinyint(4) NOT NULL,
  note longtext NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id),
  KEY repo_id (repo_id,repo_batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS rp_source;
CREATE TABLE IF NOT EXISTS rp_source (
  id varchar(22) NOT NULL,
  batch_id tinyint(4) NOT NULL DEFAULT '1',
  wp_page_id int(11) DEFAULT NULL,
  originator longtext,
  source_title longtext,
  abbr varchar(60) DEFAULT NULL,
  publication_facts longtext,
  `text` longtext,
  auto_rec_id varchar(12) DEFAULT NULL,
  ged_change_date varchar(11) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id,batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_source_cite;
CREATE TABLE IF NOT EXISTS rp_source_cite (
  id int(11) NOT NULL AUTO_INCREMENT,
  source_id varchar(22) NOT NULL,
  source_batch_id tinyint(4) NOT NULL,
  source_page varchar(248) NOT NULL,
  event_type varchar(15) DEFAULT NULL,
  event_role varchar(15) DEFAULT NULL,
  quay char(1) DEFAULT NULL,
  source_description longtext,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=337 ;

DROP TABLE IF EXISTS rp_source_note;
CREATE TABLE IF NOT EXISTS rp_source_note (
  id int(11) NOT NULL AUTO_INCREMENT,
  source_id varchar(22) NOT NULL,
  source_batch_id tinyint(4) NOT NULL,
  note longtext NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id),
  KEY source_id (source_id,source_batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS rp_submitter;
CREATE TABLE IF NOT EXISTS rp_submitter (
  id varchar(22) NOT NULL,
  batch_id tinyint(4) NOT NULL DEFAULT '1',
  submitter_name varchar(60) DEFAULT NULL,
  addr_id int(11) DEFAULT NULL,
  lang1 varchar(90) DEFAULT NULL,
  lang2 varchar(90) DEFAULT NULL,
  lang3 varchar(90) DEFAULT NULL,
  registered_rfn varchar(30) DEFAULT NULL,
  auto_rec_id varchar(12) DEFAULT NULL,
  ged_change_date varchar(11) DEFAULT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id,batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS rp_submitter_note;
CREATE TABLE IF NOT EXISTS rp_submitter_note (
  id int(11) NOT NULL AUTO_INCREMENT,
  submitter_id varchar(22) NOT NULL,
  submitter_batch_id tinyint(4) NOT NULL,
  note longtext NOT NULL,
  update_datetime datetime NOT NULL,
  PRIMARY KEY (id),
  KEY submitter_id (submitter_id,submitter_batch_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
