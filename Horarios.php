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
        $inicio = DateTime::createFromFormat('Y-m-d H:i:s',getentrada());
        $fim = DateTime::createFromFormat('Y-m-d H:i:s',getsaida());
        $inicioDiurno="05:00:00";
        $fimDiurno="22:00:00";
        $calcDiurno;
        $calcNoturno;
        $intervaloNoturno;
        $intervaloDiurno;

        if(getentrada() >= $inicioDiurno && getentrada()<$fimDiurno){
            $intervalorDiurno = $inicio->diff($saida);
            $calcDiurno = "A quantidade de horas diurnas são: ".$intervaloDiurno;
            
        }
        if(getentrada() < $inicioDiurno && getentrada()>$fimDiurno){
            $intervalorNoturno = $inicio->diff($saida);
            $calcNoturno = "A quantidade de horas noturnas são: ".$intervaloNoturno;
        }
        
        return "Horas diurnas e noturnas são respectivamente:" .$intervaloDiurno .$intervaloNoturno;
    }

}