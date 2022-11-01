<?php
include_once "conexao.php";

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


    public function VerificaHorarios($ent,$sai) :string
    {

        $entrada;
        $saida;
        $hoje = date('d/m/Y');
        $inicioDiurno= new DateTime($hoje.' 05:00:00');
        $fimDiurno = new DateTime($hoje.'22:00:00');
        $stringDiurna="";
        $stringNoturna="";
        
            $entrada = new DateTime (date('d/m/Y H:i:s', strtotime($ent)));
            $saida = new DateTime (date('d/m/Y H:i:s', strtotime($sai)));
            /*var_dump($entrada>$inicioDiurno);
            var_dump($entrada<$inicioDiurno);
            var_dump($saida<$fimDiurno);*/



            if($entrada > $inicioDiurno)
            {
                $diff = $entrada->diff($fimDiurno);
                $stringDiurna = "Horas Diurnas ".$diff->format(' %H:%I:%S')."<br/>";
            }
            if($saida<$fimDiurno)
            {
                $diff = $fimDiurno->diff($saida);
                $stringNoturna = "Horas Noturnas ".$diff->format(' %H:%I:%S');
            }
            
            return"Horas"."<br/>". $stringDiurna . $stringNoturna;
           
            


    }

}