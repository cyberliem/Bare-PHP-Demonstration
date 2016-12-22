--
-- Creating the table structure for table `te_category`
--

DROP TABLE IF EXISTS `te_category`;
CREATE TABLE IF NOT EXISTS `te_category` (
  `catID` varchar(6) NOT NULL default '',
  `catDesc` varchar(30) default NULL,
  PRIMARY KEY  (`catID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Insert data for table `te_category`
--

INSERT INTO `te_category` (`catID`, `catDesc`) VALUES
('c1', 'Carnival'),
('c2', 'Theatre'),
('c3', 'Comedy'),
('c4', 'Exhibition'),
('c5', 'Festival'),
('c6', 'Family'),
('c7', 'Music'),
('c8', 'Sport'),
('c9', 'Dance');

--
-- Creating the table structure for table `te_events_special_offers`
--

DROP TABLE IF EXISTS `te_events_special_offers`;
CREATE TABLE IF NOT EXISTS `te_events_special_offers` (
  `eventID` int(10) NOT NULL auto_increment,
  `eventTitle` varchar(256) NOT NULL,
  `eventDescription` varchar(256) default NULL,
  `venueID` varchar(6) default NULL,
  `catID` varchar(6) default NULL,
  `eventStartDate` date default NULL,
  `eventEndDate` date default NULL,
  `eventPrice` decimal(4,2) default NULL,
  PRIMARY KEY  (`eventID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9;

--
-- Insert data for table `te_events_special_offers`
--

INSERT INTO `te_events_special_offers` (`eventID`, `eventTitle`, `eventDescription`, `venueID`, `catID`, `eventStartDate`, `eventEndDate`, `eventPrice`) VALUES
(1, 'A Christmas Carol', 'Visit the three ghosts of Christmas this November as the PLAYHOUSE Whitley Bay kicks off the festive season with a fantastic Disney-esque musical production of A Christmas Carol.', 'v9', 'c6', '2016-11-25', '2016-11-26', '10.50'),
(2, 'The Newcastle Triathlon 2017', 'VO2 Max Racing Events, supported by Triathlon England and Newcastle City Council, are delighted to announce a spectacular new event. The Newcastle Triathlon is a genuinely unique and exciting event held at the vibrant heart of the City, the Quayside.', 'v6', 'c8', '2017-07-19', '2017-07-19', '30.00'),
(3, 'CBeebies Live!', 'CBEEBIES LIVE! THE BIG BAND.\r\nShow starring Mr Tumble, Mister Maker and Mr Bloom.\r\nThe Big Band brings together some of your best loved CBeebies characters in a music - themed spectacle, which is sure to have pre-schoolers rocking in the aisle.', 'v7', 'c6', '2017-04-10', '2017-04-10', '9.00'),
(4, 'Little Black Rose Musical Variety Show', 'The PLAYHOUSE Whitley Bay is delighted to announce that Little Black Rose Productions will be presenting Little Black Rose Musical Variety Show this December.', 'v9', 'c7', '2016-12-03', '2016-12-03', '8.00'),
(5, 'Laurel & Hardy', 'Laurel & Hardy invented the modern comedy double-act and are still as influential today as ever they were. Affectionately regarded by millions, they made over 100 films together and the iconic moments they created still live long in the memory.', 'v9', 'c3', '2017-02-21', '2017-02-21', '10.50'),
(6, 'Peter Pan - Never Ending Story', 'See the boy who never grows up in a live adventure you will never forget. Starring Stacey Solomon (X Factor and winner of I''m a Celebrity Get Me Out of Here).', 'v7', 'c6', '2017-01-15', '2017-01-16', '12.50'),
(7, 'Mamma Mia!','Set on a Greek island paradise, a story of love, friendship and identity is cleverly told through the timeless songs of Abba.', 'v1', 'c7','2017-03-28','2017-04-05','15.00'),
(8, 'Pride and Prejudice', '''It is a truth universally acknowledged, that a single man in possession of a good fortune, must be in want of a wife''. As the Bennet sisters haplessly search for love in Jane Austen''s ultimate romantic comedy, it is Mr Darcy who unwittingly finds his match.', 'v1', 'c2', '2017-02-14', '2017-02-18', '8.50');

--
-- Creating the table structure for table `te_venue`
--

DROP TABLE IF EXISTS `te_venue`;
CREATE TABLE IF NOT EXISTS `te_venue` (
  `venueID` varchar(6) NOT NULL default '',
  `venueName` varchar(40) default NULL,
  `location` varchar(30) default NULL,
  PRIMARY KEY (`venueID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Insert data for table `te_venue`
--

INSERT INTO `te_venue` (`venueID`, `venueName`, `location`) VALUES
('v1', 'Theatre Royal', 'Newcastle upon Tyne'),
('v2', 'BALTIC Centre for Contemporary Art', 'Gateshead'),
('v3', 'Laing Art Gallery', 'Newcastle Upon Tyne'),
('v4', 'The Biscuit Factory', 'Newcastle upon Tyne'),
('v5', 'Discovery Museum', 'Newcastle upon Tyne'),
('v6', 'HMS Calliope', 'Gateshead'),
('v7', 'Metro Radio Arena', 'Newcastle upon Tyne'),
('v8', 'Mill Volvo Tyne Theatre', 'Newcastle upon Tyne'),
('v9', 'PLAYHOUSE Whitley Bay', 'Whitley Bay'),
('v10', 'Shipley Art Gallery', 'Gateshead'),
('v11', 'Seven Stories', 'Newcastle upon Tyne');










