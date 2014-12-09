<?php
if ( ! defined('INIT')) exit('No direct script access allowed');
class Files
{
    function Files()
    {

    }

    public static function getFtpFilesCount($folder)
    {
        global $config;
        $conFtp = ftp_connect($config->ftp_address);
        $loginFtp = ftp_login($conFtp, $config->ftp_login, $config->ftp_password);
        if (!$conFtp || !$loginFtp) return false;

        $files = ftp_rawlist($conFtp, $folder);
        if (count($files) > 0) {
            $cnt = 0;
            foreach ($files as $ftp_files) {
                $file_info = preg_split("/[\s]+/", $ftp_files, 9);
                if (!self::ftp_is_dir($file_info)) {
                    $cnt++;
                }
            }
            ftp_close($conFtp);
            return $cnt;
        }
    }

    public static function getFilesCount($folder)
    {
        return count(array_filter(glob(rtrim($folder, "/") . '/*'), 'is_file'));
    }

    public static function copyDir($dirname, $dirdestination)
    {
        // Открываем директорию
        if (is_dir($dirname)) {
            $dir = opendir($dirname);
            // В цикле выводим её содержимое
            while (($file = readdir($dir)) !== false) {
                // Вырезаем первую точку
                // Если это файл копируем его
                if (is_file($dirname . "/" . $file)) {
                    copy($dirname . "/" . $file, $dirdestination . "/" . $file);
                }
                // Если это директория - создаём её
                if (is_dir($dirname . "/" . $file) && $file != "." && $file != "..") {
                    // Создаём директорию
                    if (!mkdir($dirdestination . "/" . $file, 0777, true)) {
                        echo "Can't create " . $dirdestination . "/" . $file . "\n";
                    }
                    // Вызываем рекурсивно функцию lowering
                    Files::copyDir("$dirname/$file", "$dirdestination/$file");
                }
            }
            // Закрываем директорию
            closedir($dir);
        }
    }

    public static function copyDirToFtp($dirname, $ftp_dirdestination, $newdir, $ftp_con = false, $counter = 0)
    {
        global $config;

        if (($ftp_con && !ftp_get_option($ftp_con, FTP_TIMEOUT_SEC)) || !$ftp_con) {
            $ftp_con = ftp_connect($config->ftp_address);
            $ftp_l = ftp_login($ftp_con, $config->ftp_login, $config->ftp_password);
            if (!ftp_chdir($ftp_con, $config->objectsImagesFolder)) return;
            if (!$ftp_con || !$ftp_l) return;
        }

        if (!ftp_chdir($ftp_con, $ftp_dirdestination)) {
            if (!ftp_mkdir($ftp_con, $newdir)) {
                echo "Can't create " . $ftp_dirdestination . "\n";
            }
        }
        if (!ftp_chdir($ftp_con, $ftp_dirdestination)) return;

        // Открываем директорию
        if (is_dir($dirname)) {
            $dir = opendir($dirname);
            // В цикле выводим её содержимое
            while (($file = readdir($dir)) !== false) {
                // Вырезаем первую точку
                // Если это файл копируем его
                if (is_file($dirname . "/" . $file)) {
//                    if (!ftp_chdir($ftp_con, $ftp_dirdestination)) {
//                        ftp_mkdir($ftp_con, $newdir);
//                        if (!ftp_chdir($ftp_con, $ftp_dirdestination)) return;
//                    }
                    if (!ftp_put($ftp_con, $ftp_dirdestination . "/" . $file, $dirname . "/" . $file, FTP_BINARY)) {
                        return;
                    }
                }
                // Если это директория - создаём её
                if (is_dir($dirname . "/" . $file) && $file != "." && $file != "..") {
                    // Создаём директорию
//                    if (!ftp_chdir($ftp_con, $ftp_dirdestination)) {
//                        if (!ftp_mkdir($ftp_con, $file)){
//                            echo "Can't create " . $ftp_dirdestination . "/" . $file . "\n";
//                        }
//                        if (!ftp_chdir($ftp_con, $file)) return;
//                    }

//                    if (!ftp_mkdir($ftp_con, $ftp_dirdestination . "/" . $file)) {
//                        echo "Can't create " . $ftp_dirdestination . "/" . $file . "\n";
//                    }
                    // Вызываем рекурсивно функцию
                    Files::copyDirToFtp("$dirname/$file", "$ftp_dirdestination/$file", $file, $ftp_con, $counter + 1);
                    ftp_chdir($ftp_con, $ftp_dirdestination);
                }
            }
            // Закрываем директорию
            closedir($dir);
        }
        if ($counter == 0)
            ftp_close($ftp_con);
    }


    public static function removeClearFtpDir($path, $conFtp = false, $level = 0)
    {
        global $config;

        if (($conFtp && !ftp_get_option($conFtp, FTP_TIMEOUT_SEC)) || !$conFtp) {
            $conFtp = ftp_connect($config->ftp_address);
            $loginFtp = ftp_login($conFtp, $config->ftp_login, $config->ftp_password);
            if (!$conFtp || !$loginFtp) return false;
        }

        if (!ftp_chdir($conFtp, $path)) {
            ftp_close($conFtp);
            return;
        }

        $files = ftp_rawlist($conFtp, $path);
        if (count($files) > 0) {
            foreach ($files as $ftp_files) {
                $file_info = preg_split("/[\s]+/", $ftp_files, 9);
                if (self::ftp_is_dir($file_info)) {
                    self::removeClearFtpDir($path . '/' . $file_info[8], $conFtp, $level + 1);
                }
            }
        } else {
            ftp_chdir($conFtp, '..');
            ftp_rmdir($conFtp, $path);
        }
        if ($level == 0) {
            $files = ftp_rawlist($conFtp, $path);
            if (count($files) == 0) {
                ftp_chdir($conFtp, '..');
                ftp_rmdir($conFtp, $path);
            }
        }
    }

    public static function removeDir($path)
    {
        if (file_exists($path) && is_dir($path)) {
            $dirHandle = opendir($path);
            while (false !== ($file = readdir($dirHandle))) {
                if ($file != '.' && $file != '..') {
                    $tmpPath = $path . '/' . $file;
                    chmod($tmpPath, 0777);
                    if (is_dir($tmpPath)) {
                        Files::removeDir($tmpPath);
                    } else {
                        if (file_exists($tmpPath)) {
                            unlink($tmpPath);
                        }
                    }
                }
            }
            closedir($dirHandle);
            if (file_exists($path)) {
                rmdir($path);
            }
        }
    }

    public static function ftp_is_dir($dir)
    {
        if ($dir[0][0] == 'd') {
            return true;
        }
        return false;
    }

    public static function removeFtpDir($path, $conFtp = false)
    {
        global $config;

        if (($conFtp && !ftp_get_option($conFtp, FTP_TIMEOUT_SEC)) || !$conFtp) {
            $conFtp = ftp_connect($config->ftp_address);
            $loginFtp = ftp_login($conFtp, $config->ftp_login, $config->ftp_password);
            if (!$conFtp || !$loginFtp) return false;
        }

        if (!ftp_chdir($conFtp, $path)) {
            ftp_close($conFtp);
            return;
        }

        $files = ftp_rawlist($conFtp, $path);
        foreach ($files as $ftp_files) {
            $file_info = preg_split("/[\s]+/", $ftp_files, 9);
            if (self::ftp_is_dir($file_info)) {
                self::removeFtpDir($path . '/' . $file_info[8], $conFtp);
            } else {
                ftp_delete($conFtp, $file_info[8]);
            }
        }
        $files = ftp_rawlist($conFtp, $path);
        if (count($files) == 0) {
            ftp_chdir($conFtp, '..');
            ftp_rmdir($conFtp, $path);
        }
    }
}
