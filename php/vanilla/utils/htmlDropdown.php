<?php


/**
 * Class HtmlDropdown
 * This class is used to create a dropdown from an array of data
 * @version 1.0
 */
class HtmlDropdown{
    /**
     * @param array $data
     * @param string $id
     * @param string $name
     * @param string $cssClass
     * @param string $defaultText
     * @param string|null $options
     * @param bool $createClientInstance
     * @return string
     */
    public static function fromArray(array $data, string $id, string $name, string $cssClass = '', string $defaultText = "Please select an option", string $options = null, bool $createClientInstance = true): string
    {
        $dropdown = "<select id='$id' name='$name' class='$cssClass' $options>";
        $dropdown .= "<option value='' selected hidden>$defaultText</option>";
        foreach ($data as $key => $value) {
            $dropdown .= "<option value='$key'>$value</option>";
        }
        $dropdown .= "</select>";
        $script = "";
        if ($createClientInstance) {
            $script = "<script>
                        const $id = document.querySelector('#$id');
                        </script>";
        }
        return $dropdown.$script;
    }
}