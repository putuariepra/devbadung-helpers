# Helpers Register
> Developer Diskominfo Kab. Badung

Usage
------------
- All helper's files inside directory app/Helpers/Methods will be registered automatically
- Add PHP files that contain helper's functions to directory app/Helpers/Methods


Example: app/Helpers/Methods/formatter.php
    
    <?php
    
    if (!function_exists('array_delete')) {

    /**
     * Delete from array by value.
     *
     * @param array $array
     * @param mixed $value
     */
    function array_delete(&$array, $value)
    {
        foreach ($array as $index => $item) {
            if ($value == $item) {
                unset($array[$index]);
            }
        }
    }


Installation
------------
Run composer require to install

    composer require putuariepra/devbadung-helpers
