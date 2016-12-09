<?php
namespace Payroll;

class Soz2016
{
    public $year = 2016;

    public $BBGRVWEST = 74400;
    public $BBGRVOST = 64800;
    public $RVSATZAN = 0.0935;
    public $BBGKVPV = 50850;

    private function __SOZ() {
        $this->KV_AN = 0;
        $this->PV_AN = 0;
        $this->RV_AN = 0;
        $this->AV_AN = 0;
        $this->KV_AG = 0;
        $this->PV_AG = 0;
        $this->RV_AG = 0;
        $this->AV_AG = 0;

        $this->RVSATZAG = $this->RVSATZAN;

        if (empty($this->PKV)) {
            if ($this->LZZSOZ == 2) {
                $bbg = $this->BBGKVPV / 12;
            } else {
                $bbg = $this->BBGKVPV;
            }

            $this->BRUTTOKV = min($this->RE4SOZ / 100,$bbg);

            $this->KV_AN = round($this->BRUTTOKV * ($this->KVSATZ / 2 + $this->KVZ) / 100,2);
            $this->PV_AN = round($this->BRUTTOKV * $this->PVSATZAN,2);
            $this->KV_AG = round($this->BRUTTOKV * ($this->KVSATZ / 2 / 100),2);
            $this->PV_AG = round($this->BRUTTOKV * $this->PVSATZAG,2);
        }

        if (!empty($this->RV)) {
            if ($this->LZZSOZ == 2) {
                $bbg = $this->BBGRV / 12;
            } else {
                $bbg = $this->BBGRV;
            }

            $this->BRUTTORV = min($this->RE4SOZ / 100,$bbg);

            $this->RV_AN = round($this->BRUTTORV * $this->RVSATZAN,2);
            $this->AV_AN = round($this->BRUTTORV * $this->AVSATZ / 2 / 100,2);
            $this->RV_AG = round($this->BRUTTORV * $this->RVSATZAG,2);
            $this->AV_AG = round($this->BRUTTORV * $this->AVSATZ / 2 / 100,2);
        }
   }

    // Arbeitslosengeld
    public function ALG() {
        $brutto = min($this->BRUTTO,$this->BBGRV / 12);

        $F_KINDER = (empty($this->KINDER)) ? 60 : 67;

        $bemessungsentgelt  = $brutto * 12 / 365;

        $steuer = $this->STEUER * 12 / 365;
        $soli = $this->SOLI * 12 / 365;
        $soz = ($bemessungsentgelt / 100 * 21);

        $leistungsentgelt = $bemessungsentgelt - $soz - $steuer - $soli;
        $leistungssatz = $leistungsentgelt / 100 * $F_KINDER;
        $zahlbetrag = $leistungssatz * 30;

        return round($zahlbetrag,2);
    }

    // Krankentagegeld berechnen
    public function KTG() {
        // Falls privatversichert, kein Krankentagegeld
        if (!empty($this->PKV)) {
            return 0;
        }

        $brutto_70 = $this->BRUTTO / 100 * 70;
        $netto_90 = $this->NETTO / 100 * 90;
        $bbg = $this->BBGKVPV / 12;

        $ktg  = min($brutto_70,$netto_90,$bbg);
        $ktg  -= $ktg / 100 * 12.58;

        return round($ktg,2);
    }

    public function RENTE() {
        $brutto = min($this->BRUTTO,$this->BBGRV / 12);

        // Neue Bundesländer
        if ($this->Ost_AG) {
            $entgeltpunkte = $brutto * 12 / 29359 * $this->JRENTE;
            $rentenwert = 25.74;
        // Alte Bundesländer
        } else {
            $entgeltpunkte = $brutto * 12 / 34857 * $this->JRENTE;
            $rentenwert = 28.18;
        }

        $zugangsfaktor = 1;
        $rentenfaktor = 1;

        $rente = $entgeltpunkte * $zugangsfaktor * $rentenwert * $rentenfaktor;

        return $rente;
    }
}
