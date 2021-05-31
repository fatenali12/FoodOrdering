

<?php


     /* 
        *** V2.0
        *** Get All Function 
        *** Function To Get All Records From Any DataBase
    */


    function getAllForm($fields, $table, $where=NULL, $and=NULL, $orderfield, $ordering='DESC') {
        global $con;

        $stmt = $con->prepare("SELECT $fields FROM $table $where $and ORDER BY $orderfield $ordering");
        $stmt->execute();
        $all = $stmt->fetchAll();
        return $all;
    }

        













/* 
    *** V1.0
    *** Title Function That Echo The Page Title In Case The Page 
    Has The Variable $pageTitle And  Default Title For  Other Pages

*/

function getTitle() {
    
    global $pageTitle;

    if (isset($pageTitle)) {

        echo $pageTitle;

    } else {

        echo "Default";
    }
}

/* 

    *** V1.0
    *** Check Items Function
    *** Function To Check Items In DataBase[This function accept Parameters]

        The parameters :
    *** $select = The Item To Select [Example: user, item, category]
    *** $from = The Table To Select From [Example users ,items, Categories] 
    *** $value = The Value Of Select [Examples faten, box, electronics]

*/



function checkItem($select, $from, $value){

    global $con;

    $statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

    $statement->execute(array($value));

    $count = $statement->rowCount();

    return $count;

}






/* 

    *** V2.0
    *** Home Redirect Function [This function accept Parameters]

        The parameters :

    *** $theMsg = Echo The Error Message 
    *** $url =    The Link You Want To Redirect To 
    *** $Seconds = The Time By Seconds Before Redirection

*/



function  redirectHome($theMsg, $url=null, $seconds=3) {

    if ($url === null)  {

        $url = 'index.php';
        $link = 'Home Page';

    } else {

        if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '') {

            $url  = $_SERVER['HTTP_REFERER'];
            $link = 'Previous Page';

        } else{

            $url = 'index.php';
            $link = 'Home Page';

        }

    }

    echo $theMsg;


    echo "<div class ='the-errors msg error'>You Will Be Redirected to $link After $seconds Seconds.</div>";

    header( "refresh:$seconds;url=$url" );

    exit();



}






