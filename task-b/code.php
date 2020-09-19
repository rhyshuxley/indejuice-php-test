<?php

    /* 
     *  Function    : generateSentence()
     * 
     *  Description : Generate a sentence listing out all items provided in an array.
     *  
     *  Parameters  : (string)               start         - The start of the sentence
     *                (array[string])        items         - The list of items
     *                (string/array[string]) append        - (optional) item types to be appended to each item
     * 
     *  Return      : string
     * 
     *  Example     : See run.php for input/output examples
     *  
     *  Test        : Execute run.php to test your implementation.
     *                (In console, simply run the command 'php run.php')
     * 
     */

    
    function generateSentence($start, $items, $append = NULL){
        // create start of sentence
        $sentence = $start.': ';

        // if we have item types to append
        if($append != NULL){
            // if append is an array
            if(is_array($append)){
                // create new array for items
                $newItems = [];
                // combine items and append
                $combinedItems = array_combine($items, $append);
                // foreach combined item
                foreach($combinedItems as $key => $value){
                    // concatenate append and item
                    $newItems[] = $key.' '.$value;
                }
                // set items to newItems
                $items = $newItems;
            }else{
                // foreach item
                foreach($items as &$item){
                    // concatenate append
                    $item = $item.' '.$append;
                }
            }
        }

        // grab last item from array
        $lastItem  = array_slice($items, -1);
        // grab and implode first items
        $firstItems = implode(', ', array_slice($items, 0, -1));
        // merge items back together
        $allItems  = array_filter(array_merge(array($firstItems), $lastItem), 'strlen');

        // add and before last item
        $sentence .= implode(' and ', $allItems);
        
        // add full stop
        $sentence .= '.';

        // return sentence
        return $sentence;
    }