-- $Id: install.mysql.utf8.sql 24 2009-11-09 11:56:31Z chdemko $


DROP TABLE IF EXISTS `#__motorsport`;

CREATE TABLE IF NOT EXISTS `#__motorsport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calenderurl` varchar(250) NOT NULL,
  `msupdate_cachse` int(11) NOT NULL,
  `msr_eventname` int(11) NOT NULL,
  `msr_venue` int(11) NOT NULL,
  `msr_organization` int(11) NOT NULL,
  `msr_venuecity` int(11) NOT NULL,
  `msr_eventtype` int(11) NOT NULL,
  `msr_eventdate` int(11) NOT NULL,
  `msr_calendar_cache` varchar(200),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;



INSERT INTO `#__motorsport` (`id`, `calenderurl`, `msupdate_cachse`, `msr_eventname`, `msr_venue`, `msr_organization`, `msr_venuecity`, `msr_eventtype`, `msr_eventdate`, `msr_calendar_cache`) VALUES
(1, '', 24, 1, 1, 1, 1, 1, 1, 'true');
