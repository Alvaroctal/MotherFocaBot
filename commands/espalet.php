<?php

namespace Telegram\Bot\Commands;

/**
 * Class Espalet
 *
 * @package Telegram\Bot\Commands
 */
class Espalet extends Command
{

    /**
     * @var string Command Name
     */
    protected $name = "espalet";

    /**
     * @var string Command Description
     */
    protected $description = "Que cojones esta pasando en espalet?";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $webcam = ($arguments == '' ? 1 : 2);
        $temp = 'C:\\Ovh\\webcam'.$webcam.'.jpg';
        file_put_contents($temp, file_get_contents('http://www.espalet.eu/webcam'.$webcam.'/000M.jpg'));

        $header = $this->parseHeaders($http_response_header);    
        date_default_timezone_set('Europe/Madrid');
        $fecha = date("d/m/Y h:i:s", strtotime($header['Last-Modified']));

        if(is_file($temp)) {
            $this->replyWithPhoto($temp, $fecha);
        }
    }

    private function parseHeaders( $headers ) {
        $head = array();
        foreach( $headers as $k => $v ) {
            $t = explode( ':', $v, 2 );
            if( isset( $t[1] ) ) $head[ trim($t[0]) ] = trim( $t[1] );
            else {
                $head[] = $v;
                if( preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#",$v, $out ) ) $head['reponse_code'] = intval($out[1]);
            }
        }
        return $head;
    }
}