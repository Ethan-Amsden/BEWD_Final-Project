create database if not exists FamousQuotesDB;

DROP TABLE if exists Quotes;

create table FamousQuotesDB.Quotes (
    QuoteID			Integer			NOT NULL AUTO_INCREMENT,
    Quote 			Text			NOT NULL,
    Author 			varchar(255),
    Primary Key (quoteID)
);

/* Test records for Quotes table */
INSERT INTO Quotes (QuoteID, Quote, Author)
VALUES (1, 
"The laws of nature are written by the hand of God in the language of mathematics.",
 "Galileo Galilei");

INSERT INTO Quotes (QuoteID, Quote, Author)
VALUES (2, 
"All truths are easy to understand once they are discovered; the point is to discover them.",
 "Galileo Galilei");

INSERT INTO Quotes (QuoteID, Quote, Author)
VALUES (3, 
"Mathematics is the Language in which God has written the universe.",
 "Galileo Galilei");

INSERT INTO Quotes (QuoteID, Quote, Author)
VALUES (4, 
"Socialism is a philosophy of failure, the creed of ignorance, and the gospel of envy, its inherent virtue is the equal sharing of misery.",
 "Winston Churchill");

INSERT INTO Quotes (QuoteID, Quote, Author)
VALUES (5, 
"The fear of the LORD is the instruction of wisdom; and before honour is humility.", 
"Proverbs 15:33");

INSERT INTO Quotes (QuoteID, Quote, Author)
VALUES (6, 
"Before destruction the heart of man is haughty, and before honour is humility.", 
"Proverbs 18:12");
