<?php
namespace Models;

class Encrypt {
    public $map = array(
        'a' => 'x',
        'b' => 'V',
        'c' => 'd',
        'd' => 'O',
        'e' => 'g',
        'f' => 'I',
        'g' => 'i',
        'h' => 'A',
        'i' => 'M',
        'j' => 'D',
        'k' => 'n',
        'l' => 'c',
        'm' => 'W',
        'n' => 'P',
        'o' => 'Y',
        'p' => 'G',
        'q' => 'Z',
        'r' => 's',
        's' => 'b',
        't' => 'C',
        'u' => 'S',
        'v' => 'h',
        'w' => '#',
        'x' => 'q',
        'y' => 'J',
        'z' => 'F',
        'A' => 't',
        'B' => '!',
        'C' => 'p',
        'D' => 'l',
        'E' => 'e',
        'F' => 'R',
        'G' => 'j',
        'H' => 'm',
        'I' => '&',
        'J' => 'u',
        'K' => 'w',
        'L' => 'H',
        'M' => 'a',
        'N' => 'o',
        'O' => '!',
        'P' => 'T',
        'Q' => '@',
        'R' => 'Q',
        'S' => 'r',
        'T' => 'y',
        'U' => 'f',
        'V' => 'k',
        'W' => 'N',
        'X' => 'E',
        'Y' => 'X',
        'Z' => 'B',
        ' ' => '%'
      );

    public function encrypt($value) {
        $decrypted = [];
        $splitedValues = str_split($value);
        
        for($i = 0; $i < count($splitedValues); $i++) {
            array_push($decrypted, $this->map[$splitedValues[$i]]);
        }

        return implode('',$decrypted);
    }

    public function decrypt($value) {
        $encrypted = [];
        $dicio = $this->invertMap();
        $splitedValues = str_split($value);

        for($i = 0; $i < count($splitedValues); $i++) {
            array_push($encrypted,  $dicio[$splitedValues[$i]]);
        }
        
        return implode('',$encrypted);
    }

    public function invertMap() {
        $newDicio = array();
        $entries = array();

        $keys = array_keys($this->map);
        $values = array_values($this->map);

        for ($i = 0; $i < count($keys); $i++) {
            $entry = array($keys[$i], $values[$i]);
            $entries[] = $entry;
        }

        for($i = 0; $i < count($entries); $i++) {
            $newDicio[$entries[$i][1]] = $entries[$i][0];
        }

        return $newDicio;
    }
}