<?php
// namespace swg;

class SecretWordGame
{

    private ?array $word_array = null;

    public function getWordArray(): array
    {
        return $this->word_array;
    }

    public function __construct(string $secret)
    {
        $this->word_array = str_split(strtolower($secret));
    }

    public static function strToArray(?string $word)
    {
        return str_split($word);
    }

    public static function arrayToStr(?array $arr)
    {
        if (isset($arr) && !empty($arr)) return join("", $arr);
        else return '';
    }

    public function try(?array $word = null): array
    {
        $result = "";

        for ($i = 0; $i < count($this->word_array); $i++) {
            if (isset($word[$i])) {
                if ($this->word_array[$i] == strtolower($word[$i])) {
                    $result .= $word[$i];
                } else if ($this->word_array[$i] == " ") $result .= " ";
                else $result .= "?";
            } else {
                if ($this->word_array[$i] == " ") $result .= " ";
                else $result .= "?";
            }
        }

        $win = (self::strToArray($result) == $this->word_array);

        return array("word" => $word, "win" => $win, "result" => $result);
    }

    public function generateInput(?array $response): void
    {
?>
        <form id="main_form" class="flex" method="post" action="">
            <div id="letters_container" class="flex">
                <?php

                foreach (self::strToArray($response['result']) as $key => $char) {
                    if ($char == "?") {
                ?>
                        <input type="text" class="letter_input" name="letter[<?php echo $key; ?>]" value="">
                    <?php
                    } else if ($char == " ") {
                    ?>
                        <div class="letter_hidden">
                            <input type="hidden" name="letter[<?php echo $key; ?>]" value="">
                        </div>
                    <?php
                    } else {
                    ?>
                        <input type="text" class="letter_input" name="letter[<?php echo $key; ?>]" value="<?php echo $char; ?>" disabled>
                        <input type="hidden" class="letter_input" name="letter[<?php echo $key; ?>]" value="<?php echo $char; ?>">

                <?php
                    }
                }
                ?>
            </div>
            <button id="try_btn" type="submit">Try</button>

        </form>
    <?php
    }

    public function generateWin(): void
    {
    ?>
        <div id="win_container" class="flex">
            <p><?php echo self::arrayToStr($this->word_array); ?></p>
            <p id="win_msg">!!! YOU WIN !!!</p>
            <p id="redirection_msg"></p>

        </div>
    <?php
    }

}
?>