<?php

namespace App\Libraries;

class ProjectSize
{

    private function calculate($path)
    {

        $totalSize = 0;

        // Create an iterator for folders
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        // Iterasi semua file dalam folder
        foreach ($iterator as $file) {
            if ($file->isFile()) {
                $totalSize += $file->getSize(); // Tambahkan ukuran file
            }
        }

        return $totalSize;
    }

    private function formatSize($size)
    {

        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $i = 0;

        while ($size >= 1024 && $i < count($units) - 1) {
            $size /= 1024;
            $i++;
        }

        return round($size, 2) . ' ' . $units[$i];
    }

    /**
     * Function which functions to calculate the byte size in a directory or file
     * @param string $path Directory or file path
     * @param bool $format Format to Byte, Kb, Mb, Gb, or Tb
     * @return string|int
     */
    public function getSize(string $path, bool $format = false)
    {

        $size = $this->calculate($path);

        // Format size
        if ($format) $size = $this->formatSize($size);

        return $size;
    }
}
