<?php

/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 08.05.2017
 * Time: 20:48
 */
class ListOfCustomers
{
    const DATA_SOURCE_FILE_NAME = 'sample-data.csv';

    /**
     * Make HTML code to show the List
     */
    public function echoList()
    {
        // Get the list from the file
        $list = $this->getList();

        if (count($list) > 0) {

            // Sort the list
            $list = $this->arraySort($list, 0);

            $char = 0;

            // Output by letter pairs
            foreach ($list as $item) {
                if ($char != $this->firstCharCode($item[0])) {
                    if ($char != 0) {
                        $this->closeDiv();
                    }
                    $char = $this->firstCharCode($item[0]);
                    $this->openDiv();
                    $this->printLetters($char);
                }

                echo '<a href="' . $item[1] . '" title="' . $item[0] . '" target="_blank"><img src="' .
                    $item[2] . '" alt="' . $item[0] . '"></a>';
            }
            $this->closeDiv();
        }
    }

    /**
     * Get the list from the file
     *
     * @return array unsorted list
     */
    private function getList()
    {
        $list = array();
        try {
            // Throw exception if file does not exist
            if (!file_exists(self::DATA_SOURCE_FILE_NAME)) {
                throw new Exception('File not found.');
            }

            // Open file
            $file = fopen(self::DATA_SOURCE_FILE_NAME, 'r');

            // Get the rows from CSV file and push them into array
            while ($item = fgetcsv($file)) {
                array_push($list, $item);
            }

            // Close file
            fclose($file);
        } catch (Exception $e) {
            echo '<h1 align="center">Sorry! Source file does not exist!</h1>';
        }
        return $list;
    }

    /**
     * Sort the array of arrays
     *
     * @param $array Array for sort
     * @param $col Number of column to sort by
     * @return array Sorted array
     */
    private function arraySort($array, $col)
    {
        $sortedArray = array();

        foreach ($array as $row) {
            $sortedArray[$row[$col]] = $row;
        }

        ksort($sortedArray);

        return $sortedArray;
    }

    /**
     * Get the code of the first letter of pair
     *
     * @param $title Title to show
     * @return int The code of the first letter
     */
    private function firstCharCode($title)
    {
        $char = ord(substr($title, 0, 1));
        $char = $char + ($char % 2) - 1;
        return $char;
    }

    /**
     * Close </div> for a letters pair
     */
    private function closeDiv()
    {
        echo '</div></div>';
    }

    /**
     * Open <div> for a letters pair
     */
    private function openDiv()
    {
        echo '<div class="set"><div class="pad">';
    }

    /**
     * Show letters pair
     *
     * @param $code code of the first letter in pair
     */
    private function printLetters($code)
    {
        echo '<h2>' . chr($code) . ' - ' . chr($code + 1) . '</h2>';
    }
}