<?php 
    if(isset($_FILES['pdf'])
    && $_POST['name']
    && $_POST['color']
    && $_POST['description']
    && $_POST['tags']
    && $_POST['author']
    ) {
        require 'Classes/Books.php';
        require 'config/Consts.php';

        $file = $_FILES['pdf'];

        $books = new Books();
        $name = $_POST['name'];
        $description = $_POST['description'];
        $tags = $_POST['tags'];
        $author = $_POST['author'];
        $color = $_POST['color'];
        $pdf_path = $books -> generatePDF($file);
        
        if($pdf_path == false) {
            header('Location: acervo.php');
        }

        $return = $books -> create($name,$color, $description, $tags, $author, $pdf_path);
        header('Location: acervo.php');
    }
    


?>