<?php

class BookView extends BookCtrl
{

    public function title($id)
    {
        $book = $this->select_data("Id = ?", $id)->fetch_assoc();
        echo $book['Title'];
    }

    public function new_release_books()
    {
        $query = ' ? ORDER BY Id DESC  LIMIT 6';

        $this->view_book_con_temp($query, "new_release_books", "new release", 1);
    }

    public function recomended()
    {
        // todo display recomended
        $query = ' ? ORDER BY Date_release DESC LIMIT 6';
        $this->view_book_con_temp($query, "recomended_books", "recomended", 1);
    }

    public function related_searches()
    {
        $query = ' ? ORDER BY Date_release DESC LIMIT 4';
        $this->view_book_con_temp($query, "releated_books", "related books", 1);
    }

    public function book_search_res($row)
    {
        echo "<p data-id=" . $row['Id'] . ">" . $row['Title'] . "</p>";
    }

    public function borrowed_books(array $book_ids)
    {
        $query = "Id in (" . implode(",", $book_ids) . ")";

        $this->view_book_con_temp($query, "borrowed_con", "borrowed books");
    }

    private function view_book_con_temp(string $query, string $con_id, string $con_label, $vals = null)
    {

        $books = $this->select_data($query, $vals);

        get_temp(
            "book/book_con",
            [
                "con_id" => $con_id,
                "label" => $con_label,
                "books" => $books
            ]
        );
    }
}
