<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class Array2XML extends ServiceProvider
{
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public static function to_xml(\SimpleXMLElement $object, array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                // print_r($key);
                $new_object = $object->addChild(htmlspecialchars('data' . $key));
                self::to_xml($new_object, $value);
            } else {
                // if the key is an integer, it needs text with it to actually work.
                if ($key != 0 && is_numeric($key[0])) {
                    $key = htmlspecialchars("key_$key");
                }

                $object->addChild(htmlspecialchars($key), htmlspecialchars($value));
            }
        }
    }
}
