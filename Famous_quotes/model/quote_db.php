<?php
    //functions for interacting with Project Table in the Database
    function add_quote($quote, $author) {

        global $db;

        $query = 'INSERT INTO quotes
                    (Quote, Author)
                VALUES
                    (:quote, :author)';

        $statement = $db->prepare($query);
        $statement->bindValue(':quote', $quote);
        $statement->bindValue(':author', $author);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_quote($quote_id) {

        global $db;

        $query = 'DELETE FROM quotes
                WHERE QuoteID = :quote_id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_end_rec() {

        global $db;
        $ends = [];
        
        // first query gets the first record primary key value
        $query = 'SELECT Min(QuoteID) 
                    AS FirstQuote 
                    FROM Quotes';
        
        // second query gets the last record primary key value
        $query2 = 'SELECT Max(QuoteID) 
                    AS LastQuote 
                    FROM Quotes';
        
        // execute first query
        $statement = $db->prepare($query);
        $statement->execute();
        $ends[0] = $statement->fetch();
        $statement->closeCursor();

        // execute second query
        $statement2 = $db->prepare($query2);
        $statement2->execute();
        $ends[1] = $statement2->fetch();
        $statement2->closeCursor();

        return $ends;
    }
    
    function get_quote() { //$quote_id

        $ends = get_end_rec();
        $min = $ends[0]; // still an array for the min and max due to the fetch() function
        $max = $ends[1];
        // print_r($min);
        // print_r($max);
        $quote_id = rand($min[0], $max[0]);

        global $db;

        $query = 'SELECT * FROM quotes
                WHERE QuoteID = :quote_id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $quote = $statement->fetch();
        $statement->closeCursor();
        
        return $quote;
    }

    function get_quotes() {

        global $db;

        $query = 'SELECT * 
                FROM quotes';
                //WHERE QuoteID = :quote_id';
        
        $statement = $db->prepare($query);
       // $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $quotes = $statement->fetchAll();
        $statement->closeCursor();

        return $quotes;
    }
    
    function retrieve_quote($quote_id) {

        global $db;

        $query = 'SELECT * FROM quotes
                WHERE QuoteID = :quote_id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->execute();
        $quote = $statement->fetch();
        $statement->closeCursor();
        
        return $quote;
    }

    function update_quote($quote_id, $quote, $author) {

        global $db;

        $query = 'UPDATE quotes
                SET  Quote = :quote, Author = :author
                WHERE QuoteID = :quote_id';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':quote_id', $quote_id);
        $statement->bindValue(':quote', $quote);
        $statement->bindValue(':author', $author);
        $statement->execute();
        $statement->closeCursor();
    }
?>