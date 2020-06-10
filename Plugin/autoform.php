<?php
class autoform{

    public function getInputText($name,$label){

        echo '<label id="clr" for="'.$name.'">'.$label.'</label><br/>';
        echo '<input type="text" id="'.$name.'" name="'.$name.'"><br/><br/>';

    }
    public function getInputPassword( $label,$name, $minlength)
    {
        echo '<label for="' . $label . '">' . $name . '</label>';
        echo '<input type="password" name="' . $name . '" minlength="' . $minlength . '" required>';

    }
    public function getInputSubmit($name,$label){
        echo '<input type="'.$label.'" value="'.$name.'"><br/>';

    }
    /*public function checkEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            echo "L'adresse email" . $email_a . "est considérée comme valide.";
        }
        else echo "L'adresse email" . $email_a . "est considérée comme invalide.";

    }*/











}