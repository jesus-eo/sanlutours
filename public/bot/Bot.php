<?php
/**
 * Clase para crear el bot
 */
class Bot
{
    private $name = "Buenas mi nombre es tourBot, de la empresa Sanlutours encantado de atenderle.";
    private $gender = "Hombre";

    /**
     * 
     * Devuelve el nombre del robot
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * 
     * Devuelve el género del robot
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }
/* 
    public function hears($message, callable $call)
    {
        $call(new Bot);
        return $message;
    } */

    public function reply($response)
    {
        echo $response;
    }

    /**
     * @param mixed $question mensaje introducido por el usuario
     * @param array $questionDictionary array de cuestiones
     * 
     * @return string Retorna el texto asociado a la pregunta entrante.
     */
    public function ask($question, array $questionDictionary)
    {
        $question = trim($question);
        foreach ($questionDictionary as $questions => $value) {
            if ($question == $questions) {
                return $value;
            }
        }
    }
}
