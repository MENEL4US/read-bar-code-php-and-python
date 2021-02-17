<?PHP
    class Bar_code {
        // Execute python script
        public static function info($file_name, $type)
        {
            $command = "python python/read.py ".$file_name." ".$type;
            $response = exec($command);
            $response = (array)json_decode($response);

            if ($response['STATUS'] == 'success') {
                return Bar_code::process($response['DATA'], $type);
            } else {
                return $response['MSG'];
            }
        }

        // Implement logic according to need
        public static function process($data, $type) {
            return $data;
        }
    }
?>