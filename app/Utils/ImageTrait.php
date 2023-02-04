<?php

namespace App\Utils;

trait ImageTrait
{
    /**
     * Store Image
     *
     * @param $dataImage
     * @param $dir
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function storeImage($dataImage, $dir = null)
    {
        /** Handle create folder check public_path and for folder save path in db */
        $folderResult = 'libs-image/' . (!empty($dir) ? $dir : 'image') .  '/';
        $pathFolder = public_path($folderResult);
        
        /** Check folder exists */
        if (!file_exists($pathFolder)) {
            mkdir($pathFolder);
        }

        /** Handle create file name for move folder and name file save path in db */
        $fileNameResult = time() . '_' . $dataImage->getClientOriginalName();
        $pathFile = $pathFolder . $fileNameResult;

        if (move_uploaded_file($dataImage, $pathFile)) {
            return $folderResult . $fileNameResult;
        }
        
        return null;
    }

    /**
     * Update Image
     *
     * @param $dataImage
     * @param $oldFileImage
     * @param $dir
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function updateImage($dataImage, $oldFileImage = null, $dir = null)
    {
        /** Handle create folder check public_path and for folder save path in db */
        $folderResult = 'libs-image/' . (!empty($dir) ? $dir : 'image') .  '/';
        $pathFolder = public_path($folderResult);
        
        /** Check folder exists */
        if (!file_exists($pathFolder)) {
            mkdir($pathFolder);
        }

        /** Handle create file name for move folder and name file save path in db */
        $fileNameResult = time() . '_' . $dataImage->getClientOriginalName();
        $pathFile = $pathFolder . $fileNameResult;

        if (move_uploaded_file($dataImage, $pathFile)) {
            if (file_exists($oldFileImage)) {
                unlink(public_path($oldFileImage));
            }

            return $folderResult . $fileNameResult;
        }
        
        return null;
    }
}