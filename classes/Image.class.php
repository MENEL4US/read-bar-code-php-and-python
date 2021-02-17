<?PHP
    class Image {
        public static function upload()
        {
            // Location to save files
            $file_path = "";

            if (empty($_FILES["file"])) return false;
            
            // Random name creation
            $name = explode(".", $_FILES['file']["name"]);
            $name = end($name);
            $name = strtoupper(md5(rand(10,90).time())).".".$name;

            if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path.$name)) return $name;
            return false;
        }
    }
?>