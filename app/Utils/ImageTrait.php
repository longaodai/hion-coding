<?php

namespace App\Utils;
use Illuminate\Support\Facades\Log;

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
        $fileNameResult = 'hion-coding_' . time() . '_' . $dataImage->getClientOriginalName();
        $pathFile = $pathFolder . $fileNameResult;
        $result = $this->buildImageWebp($dataImage, $pathFile, $fileNameResult);

        if ($result) {
            return $folderResult . $result;
        }

        return null;
    }

    /**
     * Build image to Webp
     *
     * @param $dataImage
     * @param $pathFile
     * @param $fileNameResult
     *
     * @return array|bool|string|string[]
     *
     * @author longvc <vochilong.work@gmail.com>
     */
    private function buildImageWebp($dataImage, $pathFile, $fileNameResult)
    {
        $imageMimeType = $dataImage->getMimeType();
        try {
            switch ($imageMimeType) {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($dataImage);
                    $pathFile = str_replace('.jpeg', '.webp', $pathFile);
                    $pathFile = str_replace('.jpg', '.webp', $pathFile);
                    $fileNameResult = str_replace('.jpeg', '.webp', $fileNameResult);
                    $fileNameResult = str_replace('.jpg', '.webp', $fileNameResult);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($dataImage);
                    $pathFile = str_replace('.png', '.webp', $pathFile);
                    $fileNameResult = str_replace('.png', '.webp', $fileNameResult);
                    break;
                default:
                    move_uploaded_file($dataImage, $pathFile);
                    return true;
            }

            imagewebp($image, $pathFile, 80);
            imagedestroy($image);

            return $fileNameResult;
        } catch (\Exception $exception) {
            Log::debug('ERROR BUILD IMAGE: ' . $exception->getMessage());

            return false;
        }
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
        $fileNameResult = 'hion-coding_' . time() . '_' . $dataImage->getClientOriginalName();
        $pathFile = $pathFolder . $fileNameResult;
        $result = $this->buildImageWebp($dataImage, $pathFile, $fileNameResult);

        if ($result) {
            if (file_exists($oldFileImage)) {
                unlink(public_path($oldFileImage));
            }

            return $folderResult . $result;
        }

        return null;
    }
}
