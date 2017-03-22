<?php
	 ob_start();
	 session_start();
	 $myPage = file_get_contents('../HTML/ChapterView.html');
	 include_once("database.php");
    

    $myModuleID = $_GET['moduleID'];
    $myChapterID = $_GET['chapterID'];

    if ( isset($_POST['NextButton']) ) {
    }

     if ( isset($_POST['AbgabeButton']) ) {
         
    }

	 // if session is not set this will redirect to login page
	 if( !isset($_SESSION['user']) ) {
	  header("Location: index.php");
	  exit;
	 }
    
    //

    $myModule = $ODB->getModuleFromID($myModuleID);
   
    $search = array('%ChapterHeadline%','%ChapterText%');
    $replace = array($myModule->getChapterHeadlineByIndex($myChapterID),$ODB->replaceTags($myModule->getChapterTextbyIndex($myChapterID)));
    $myPage = str_replace($search,$replace,$myPage);

   
    $toAdd = "";

    if($myModule->chapter[$myChapterID]->getbIsMandatoryHandIn()) {
        $toAdd = file_get_contents('../HTML/ChapterViewButtonAbgabe.html');
        
    }else{
        $toAdd = file_get_contents('../HTML/ChapterViewButtonNextChapter.html');  
        $search = array('%Link%');
        $iactIndex = $myModule->chapter[$myChapterID]->getiIndex()+1;
        $replace = array("/iiigel/PHP/chapterView.php?moduleID=".$myModuleID."&chapterID=".$iactIndex );
        $toAdd = str_replace($search,$replace,$toAdd); 
    }

    $search = array('%Buttons%');;
    $replace = array($toAdd);
    $myPage = str_replace($search,$replace,$myPage);

    $toAdd = ""; //Hinzugefügter HTML Code
   for ($i=0; $i< sizeof($myModule->chapter);$i++){  
            $myRow = file_get_contents('../HTML/ChapterViewListItem.html');
            $search = array('%ChapterTitle%','%Link%');
            $replace = array($myModule ->chapter[$i]->getsTitle(),"/iiigel/PHP/chapterView.php?moduleID=".$myModuleID."&chapterID=".$i );
            $myRow = str_replace($search,$replace,$myRow);
        
        $toAdd = $toAdd . $myRow;
    }
    $myPage=str_replace('%ChapterDropDownItems%',$toAdd,$myPage);
    
    echo $myPage;
?>
