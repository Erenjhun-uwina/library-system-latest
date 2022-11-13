<?php

class BookView extends BookCtrl{

    public function title($id)
    {
        $book = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $book['Title'];
    }

    public function new_books()
    {
        $books = $this->select_data(' ? ORDER BY Id DESC LIMIT 7',1);
        $result = "";
        
        while ($book = $books->fetch_assoc()) {
           
            $src = "../src/assets/covers/".$book['Cover_img']."";
            
            $details = "data-details='".implode("%//%",$book)."'";
        
            $result .= '
            <div class="card" '.$details.'>
                <img src='.$src.'>
            </div>';
        }

        echo $result;
    }

    public function new_release_books(){
        $books = $this->select_data(' ? ORDER BY Date_release DESC LIMIT 7',1);

        $result = "";
        
        while ($book = $books->fetch_assoc()) {
           
            $src = "../src/assets/covers/".$book['Cover_img']."";
            
            $details = "data-details='".implode("%//%",$book)."'";
        
            $result .= '
            <div class="card" '.$details.'>
                <img src='.$src.'>
            </div>';
        }

        echo $result;
    }

    public function related_searches(){
        $books = $this->select_data(' ? ORDER BY Date_release DESC LIMIT 4',1);

        $result = "";
        
        while ($book = $books->fetch_assoc()) {
           
            $src = "../src/assets/covers/".$book['Cover_img']."";
            
            $details = "data-details='".implode("%//%",$book)."'";
        
            $result .= '
            <div class="card" '.$details.'>
                <img src='.$src.'>
            </div>';
        }

        echo $result;
    }

    public function book_search_res($row)
    {   
        echo "<p data-details='".implode("%//%",$row)."'>".$row['Title']."</p>";
    }
}                                                             