<?php

class File
{
    public static function upload($file, string $path): string
    {
        $name = time() . '-' . $file['name'];
        $destination = 'uploads/' . $path . $name;
        move_uploaded_file($file['tmp_name'], $destination);
        return $destination;
    }

    public static function isImage($file): bool
    {
        $allowed = ['image/jpeg', 'image/png', 'image/gif'];
        return in_array($file['type'], $allowed);
    }

    public static function isDocument($file): bool
    {
        $allowed = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        return in_array($file['type'], $allowed);
    }
}
