<?php

$plugin_info = array(
    'pi_name' => 'Thotbox: Leading Zeros',
    'pi_author' =>'Shane Woodward',
    'pi_description' => 'Convert number to fixed digits with leading zeros',
    'pi_version' =>'1.0',
    'pi_usage' => leading_zeros::usage()
);

class leading_zeros {

    public function __construct() {
        $this->return_data = $this->output();
    }

    public function output() {
        $this->EE =& get_instance();
        $number = $this->EE->TMPL->fetch_param('number');
        $digits = $this->EE->TMPL->fetch_param('digits');
        $result = str_pad($number, $digits, '0', STR_PAD_LEFT);

        return $result;
    }

    public function usage() {
        ob_start();
    ?>
        Use {exp:leading_zeros number="" digits=""} to output fixed digit number
    <?php
        $text = ob_get_contents();
        ob_end_clean();
        return $text;
    }

}

?>