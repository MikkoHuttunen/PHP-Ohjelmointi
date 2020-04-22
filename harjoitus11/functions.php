<?php
    //Rajapinnasta on hyötyä silloin kun johonkin asiaan on eri ratkaisuja, mutta ne toimivat samalla tavalla.
    interface OpiskelijanToiminnot {
        //suoritaKurssi metodi on järkevää toteuttaa rajapinnasta koska kurssien suorittaminen tapahtuu samalla tavalla,
        //mutta tieto joka liittyy suorittamiseen esim. opintopisteiden määrä ja arvosana voi vaihdella.
        public function suoritaKurssi();
        //haeKesaToita metodi on myös kätevää toteuttaa rajapinnasta koska henkilötietojen lähettäminen on kaikkiin työpaikkoihin sama
        public function haeKesaToita();
    }

    abstract class Henkilo {
        public $etunimi;
        public $sukunimi;
        public $henkiloTunnus;

        function __construct($etunimi, $sukunimi, $henkiloTunnus, $op){
            $this->etunimi = $etunimi;
            $this->sukunimi = $sukunimi;
            $this->henkiloTunnus = $henkiloTunnus;
            $this->op = $op;
        }

        function setEtunimi($etunimi) {
            $this->etunimi = $etunimi;
        }

        function getEtunimi() {
            return $this->etunimi;
        }

        function setSukunimi($sukunimi) {
            $this->sukunimi = $sukunimi;
        }

        function getSukunimi() {
            return $this->sukunimi;
        }

        function setHenkiloTunnus() {
            $this->henkiloTunnus = $henkiloTunnus;
        }

        function getHenkiloTunnus() {
            return $this->henkiloTunnus;
        }

        function tulosta() {
            echo $this->etunimi . ' ' . $this->sukunimi . ' ' . $this->henkiloTunnus . ' ' . $this->getOp();
        }
    }

    class Opiskelija extends Henkilo {
        public $op;

        function setOp($op) {
            $this->op = $op;
        }

        function getOp() {
            return $this->op;
        }
    }
?>