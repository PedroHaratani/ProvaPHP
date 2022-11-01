<?php

class HorasTrabalho {
    private $id = 0;
    private $entrada = null;
    private $saida = null;

    public function setId(int $id) :void
    {
        $this->id = $id;
    }

    public function getId() :int
    {
        return $this->id;
    }
    public function setentrada(string $entrada) :void
    {
        $this->entrada = $entrada;
    }

    public function getentrada() :string
    {
        return $this->entrada;
    }
    public function setsaida(string $saida) :void
    {
        $this->saida = $saida;
    }

    public function getsaida() :string
    {
        return $this->saida;
    }


    public function VerificaHorarios() :string
    {
        $inicio = DateTime::createFromFormat('Y-m-d H:i:s',$entrada);
        $fim = DateTime::createFromFormat('Y-m-d H:i:s',$saida);
        $inicioDiurno="05:00:00";
        $fimDiurno="22:00:00";
        $calcDiurno;
        $calcNoturno;
        $intervaloNoturno;
        $intervaloDiurno;
        

        if($entrada >= $inicioDiurno && $entrada<$fimDiurno){
            $intervalorDiurno = $inicio->diff($saida);
            $horas = ceil(($entrada->getTimeStamo() - $entrada->gettTimestamp())/24);
            $calcDiurno = "A quantidade de horas diurnas são: ".$horas;
            
        }
        if($entrada < $inicioDiurno && $entrada>$fimDiurno){
            $intervalorNoturno = $inicio->diff($saida);
            $calcNoturno = "A quantidade de horas noturnas são: ".$intervaloNoturno;
        }
        
        return "Horas diurnas e noturnas são respectivamente:" .$calcDiurno .$calcNoturno;
    }

}