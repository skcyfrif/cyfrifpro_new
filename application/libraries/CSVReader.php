<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CSV Reader for CodeIgniter 3.x
 *
 * Library to read the CSV file. It helps to import a CSV file
 * and convert CSV data into an associative array.
 *
 * This library treats the first row of a CSV file
 * as a column header row.
 *
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      CodexWorld
 * @license     http://www.codexworld.com/license/
 * @link        http://www.codexworld.com
 * @version     3.0
 */
class CSVReader {
    
    // Columns names after parsing
    private $fields;
    // Separator used to explode each line
    private $separator = ';';
    // Enclosure used to decorate each field
    private $enclosure = '"';
    // Maximum row size to be used for decoding
    private $max_row_size = 4096;
    
    /**
     * Parse a CSV file and returns as an array.
     *
     * @access    public
     * @param    filepath    string    Location of the CSV file
     *
     * @return mixed|boolean
     */
    /*function parse_csv($filepath){	
       $filepath= "http://localhost/cyfrit/".$filepath;
	  
        return $csvData;
    }
*/
    function escape_string($data){
        $result = array();
        foreach($data as $row){
            $result[] = str_replace('"', '', $row);
        }
        return $result;
    }  
	
	function parse_csv($filename)
	{
		$row = 0;
		$col = 0;
	 	$filename= "http://www.cyfrif.com/".$filename;
		$handle = @fopen($filename, "r");
		$fields="";
		if ($handle) 
		{
			while (($row = fgetcsv($handle)) !== false){
				 
				if(empty($fields)) 
				{
					$fields = $row;
					continue;
				}
				
				foreach ($row as $k=>$value) 
				{
					$results[$col][$fields[$k]] = $value;
				}
				
				$col++;
				unset($row);
			}
			if (!feof($handle)) 
			{
				echo "Error: unexpected fgets() failn";
			}
			fclose($handle);
		}
	 
		return $results;
	} 
}