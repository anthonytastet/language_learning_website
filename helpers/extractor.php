<?php //Extractor model

class extractor{

    public function extract($archive, $destination){

        $ext = pathinfo($archive, PATHINFO_EXTENSION);

        switch($ext){

            case "zip":

                $res = self::extractZipArchive($archive, $destination);

                break;

            // case "gz":

            //     $res = $this->extractGzipFile($archive, $destination);

            //     break;

            // case "rar":

            //     $res = $this->extractRarArchive($archive, $destination);

            // break;
        }

        return $res;
    }

    public function extractZipArchive($archive, $destination){

        if(!class_exists('ZipArchive')){
            $GLOBALS["status"] = array('error' => 'Your PHP version does not support unzip functionnality');
            return false;
        }

        $zip = new ZipArchive();

        if($zip->open($archive) === true){
            
            if(is_writeable($destination)){

                $zip->extractTo($destination);
                $zip->close();

                $GLOBALS["status"] = array('success' => 'file unzipped successfully');
                return true;
            }else{
                $GLOBALS["status"] = array('error' => 'Directory not writeable by webserver');
                return false;
            }
        }else{
            $GLOBALS["status"] = array('error' => 'Cannot read .zip archive');
            return false;
        }
    }
}