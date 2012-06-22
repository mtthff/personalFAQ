<?php
/**
 * Description of setfaq
 *
 * @author matthias
 */

require_once 'MAZmysql.class.php';

class setfaq extends MAZmysql {
//
    protected $sections;

    public function getSections($section_id){
    //
        $sql_query = "SELECT * FROM section WHERE senior_section_id = ".$section_id." ORDER BY position";
        $result = $this->send_query($sql_query);
        while ($sections = mysql_fetch_assoc($result)){
            if (!$callback) $callback = "<ul class='sortable'>\n";
//            $idPosition = 'position_'.$sections['senior_section_id'].$sections['position']; // eindeutige ID, um Sections sortable zu machen
            $callback .= "<li id='position_".$sections['section_id']."'>";
            $callback .= "<img src='arrow.png' alt='move' class='handle' />&nbsp;";
            $callback .= "<span class='section' name='".$sections['section_id']."'>";
            $callback .= $this->boldIt($sections['title'], $section_id);
            $callback .= "</span>";
            $callback .= "<span class='add' title='".$sections['section_id']."'>+</span>";
            $callback .= $this->getQuestionsAndAnswers ($sections['section_id']);
            $callback .= $this->getSections ($sections['section_id']);
            $callback .= "</li>\n";
            }
        if ($callback) $callback .= "</ul>\n
            ";
        return $callback;
    }

    protected function boldIt($title, $id){
        if ($id == 0) return "<b>".$title."</b>";
        else return $title;
    }

    public function getQuestionsAndAnswers($section_id){
        $sql_query = "SELECT question_id, question, answer
                        FROM questions WHERE section_id = ".$section_id." ORDER BY question";
        $result = $this->send_query($sql_query);
        $callback = '<ul>';
        while ($content = mysql_fetch_assoc($result)){
            $callback .= '<li>';
            $callback .= '<div>';
            $callback .= '<input class="question" name="'.$content['question_id'].' "type="text" value="'.stripcslashes($content['question']).'" size="'.(strlen($content['question'])+10).'" />';
            $callback .= '</div>'."\n";
            if (!empty($content['answer']))
                $callback .= '<div>'.$this->setAnswer($content['question_id'], $content['answer']).'</div>';
            $callback .= "</li>\n";
        }
        $callback .= "</ul>\n";
        return $callback;
    }

    protected function setAnswer($question_id, $answer){
    //pr�ft $answer ob <input> oder <textarea> n�tig
        if (preg_match('/\\n/', $answer)){
            $callback = '<textarea class="answer" name="'.$question_id.'" '.$this->sizeOfAnswer($answer).'>';
            $callback .= stripslashes($answer);
            $callback .= '</textarea>'."\n";
        }else{
            $callback = '<input class="answer" name="'.$question_id.'" value="'.(stripcslashes($answer)).'" size="'.strlen($answer).'" />';
            if (preg_match('/www/', $answer))
                $callback .= '<a href="http://'.$answer.'" target="_blank"><img src="link.png" /></a>';
            $callback .= "\n";
        }
    return $callback;
    }

    protected function sizeOfAnswer($answer){
    //::TODO:: zeilen aufsplitten, l�ngste Zeile ermitteln, cols-Wert setzen
        $rows = (int)substr_count($answer, "\n");
        $cols = (int)(strlen($answer));#/$rows;
        return 'rows="'.$rows.'" cols="80"';
//        return 'rows='.$rows.' cols='.$cols;
    }



// sonstige praktische Methoden
     public function print_r_and_exit($array){
     // Debug-Methode: gibt $array formatiert aus und beendet danach Programm
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        exit;
     }

     protected function array_search_in_2dim($haystack, $needle, $key){
    //durchsucht zweidimensionalen Array $haystack mit Schl�ssel $key nach $needle
        foreach ($haystack as $value){
            if($value[$key] == $needle) return TRUE;
        }
        return FALSE;
    }


    // alte Methoden - l�schen?
//        protected function getQuestions ($section_id){
//    //
//        $sql_query = "SELECT question_id, question
//                        FROM questions WHERE section_id = ".$section_id;
//        $result = $this->send_query($sql_query);
//        while ($content = mysql_fetch_assoc($result)){
//            $callback .= "<ul>\n";
//            $callback .= '<i><a href="#'.$content['question_id'].'">';
//            $callback .= $content['question']."</a></i><br />\n";
//            $callback .= "</ul>\n";
//        }
//    return $callback;
//    }

    //    protected function showSection($SeniorSectionID){
//
//        foreach ($sections as $key => $value) {
//            if ($value['senior_section_id'] != 0) $a=0;
//        }
//    }

}
?>