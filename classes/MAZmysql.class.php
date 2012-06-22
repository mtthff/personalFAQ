<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setfaq
 *
 * @author matthias
 */
class MAZmysql {
    //put your code here
    
    protected $hostname = '';
    protected $username = '';
    protected $password = '';
    protected $database = '';

    public $send;
    public $records;
    public $link;


//MySQL-Methoden
    public function __construct() {
    // Mit MySQL-DB verbinden, wenn Klasse instantiiert wird
        $this->link = mysql_connect($this->hostname, $this->username, $this->password);
        mysql_select_db ($this->database);
    }

    public function disconnect(){
    // Verbindung zu MySQL-DB unterbrechen
        mysql_close($this->link);
    }

    public function get_number($sql_query){
    // Anzahl der Ergebnisse eines querys ausgeben
        return mysql_num_rows(mysql_query($sql_query, $this->link));
    }

    public function send_query($sql_query){
    // sendet query an DB-Verbindung
        return mysql_query($sql_query, $this->link);
    }

    public function get_records($sql_query){
    // Mehrere Ergebnisse eines querys; callback ist ein array
        $send = mysql_query($sql_query, $this->link);
        while ($row = mysql_fetch_assoc($send))
            $records[] = $row;
        return $records;
     }

     public function get_one_record($sql_query){
    // Einzelnes Ergebniss eines query ausf�hren, callback ist eine Variable
         $send = mysql_query($sql_query, $this->link);
        return mysql_fetch_assoc($send);
     }

}
?>
