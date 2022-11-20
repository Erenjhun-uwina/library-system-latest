<?php

class BookView extends BookCtrl{

    public function title($id)
    {
        $book = $this->select_data("Id = ?",$id)->fetch_assoc();
        echo $book['Title'];
    }

    public function new_books()
    {
        $books = $this->select_data(' ? ORDER BY Id DESC LIMIT 6',1);

        $result = '<span class="card_label">New!!!</span>'.
        '<div id="new_release_container" class="card_con book_btn">';
        
        while ($book = $books->fetch_assoc()) {
           
            $src = "../src/assets/covers/".$book['Cover_img']."";
            
            $result .= '
            <div class="card" data-id="'.$book['Id'].'">
                <img src='.$src.'>
            </div>';
        }
        $result.='</div>';
        echo $result;
    }

    public function new_release_books(){
        $books = $this->select_data(' ? ORDER BY Date_release DESC LIMIT 6',1);

        $result = '<span class="card_label">New release</span>'.
        '<div id="new_container" class="card_con book_btn">';
        
        while ($book = $books->fetch_assoc()) {
           
             $src = "../src/assets/covers/".$book['Cover_img']."";
            
            $result .= '
            <div class="card" data-id="'.$book['Id'].'">
                <img src='.$src.'>
            </div>';
        }

        $result .= '</div>';

        echo $result;
    }

    public function related_searches(){
        $books = $this->select_data(' ? ORDER BY Date_release DESC LIMIT 4',1);

        

        $result = "";
        
        while ($book = $books->fetch_assoc()) {
           
            $src = "../src/assets/covers/".$book['Cover_img']."";
            
            $result .= '
            <div class="card" data-id="'.$book['Id'].'">
                <img src='.$src.'>
            </div>';
        }

        echo $result;
    }

    public function book_search_res($row)
    {   
        echo "<p data-id=".$row['Id'].">".$row['Title']."</p>";
    }
}                                                             