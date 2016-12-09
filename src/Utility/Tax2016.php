<?php
namespace Payroll;

$class = new LSt2016();

class LSt2016
{
    public $year = 2016;
    public $external = 'http://www.bmf-steuerrechner.de/interface/2016V1.jsp';

    // 3.1 Eingangsparameter

    public $AF = 1; // 1, wenn die Anwendung des Faktorverfahrens gewählt wurde (nur in Steuerklasse IV)
    public $AJAHR; // Auf die Vollendung des 64. Lebensjahres folgendes Kalenderjahr (erforderlich, wenn ALTER1=1)
    public $ALTER1; // 1, wenn das 64. Lebensjahr vor Beginn des Kalenderjahres vollendet wurde, in dem der Lohnzahlungszeitraum endet (§ 24a EStG), sonst = 0
    public $ENTSCH = 0; // In VKAPA und VMT enthaltene Entschädigungen nach § 24 Nummer 1 EStG in Cent
    public $F = 1.000; // eingetragener Faktor mit drei Nachkommastellen
    public $JFREIB; // Jahresfreibetrag für die Ermittlung der Lohnsteuer für die sonstigen Bezüge nach Maßgabe der elektronischen Lohnsteuerabzugsmerkmale nach § 39e EStG oder der Eintragung auf der Bescheinigung für den Lohnsteuerabzug 2016 in Cent (ggf. 0)
    public $JHINZU; // Jahreshinzurechnungsbetrag für die Ermittlung der Lohnsteuer für die sonstigen Bezüge nach Maßgabe der elektronischen Lohnsteuerabzugsmerkmale nach § 39e EStG oder der Eintragung auf der Bescheinigung für den Lohnsteuerabzug 2016 in Cent (ggf. 0)
    public $JRE4; // Voraussichtlicher Jahresarbeitslohn ohne sonstige Bezüge und ohne Vergütung für mehrjährige Tätigkeit in Cent. Anmerkung: Die Eingabe dieses Feldes (ggf. 0) ist erforderlich bei Eingaben zu sonstigen Bezügen (Felder SONSTB, VMT oder VKAPA). Sind in einem vorangegangenen Abrechnungszeitraum bereits sonstige Bezüge gezahlt worden, so sind sie dem voraussichtlichen Jahresarbeitslohn hinzuzurechnen. Vergütungen für mehrjährige Tätigkeit aus einem vorangegangenen Abrechnungszeitraum werden in voller Höhe hinzugerechnet.
    public $JRE4ENT; // In JRE4 enthaltene Entschädigungen nach § 24 Nummer 1 EStG in Cent
    public $JVBEZ; // In JRE4 enthaltene Versorgungsbezüge in Cent (ggf. 0)
    public $KRV; // Merker für die Vorsorgepauschale (0 = der Arbeitnehmer ist in der gesetzlichen Rentenversicherung oder einer berufsständischen Versorgungseinrichtung pflichtversichert oder, bei Befreiung von der Versicherungspflicht freiwillig versichert; es gilt die allgemeine Beitragsbemessungsgrenze (BBG West) 1 = der Arbeitnehmer ist in der gesetzlichen Rentenversicherung oder einer berufsständischen Versorgungseinrichtung pflichtversichert oder, bei Befreiung von der Versicherungspflicht freiwillig versichert; es gilt die Beitragsbemessungsgrenze Ost (BBG Ost) 2 = wenn nicht 0 oder 1)
    public $KVZ; // Kassenindividueller Zusatzbeitragssatz bei einem gesetzlich krankenversicherten Arbeitnehmer in Prozent (bspw. 1,10 für 1,10 %) mit 2 Dezimalstellen
    public $LZZ; // Lohnzahlungszeitraum: 1 = Jahr 2 = Monat 3 = Woche 4 = Tag
    public $LZZFREIB; // Der als elektronisches Lohnsteuerabzugsmerkmal für den Arbeitgeber nach § 39e EStG festgestellte oder in der Bescheinigung für den Lohnsteuerabzug 2016 eingetragene Freibetrag für den Lohnzahlungszeitraum in Cent
    public $LZZHINZU; // Der als elektronisches Lohnsteuerabzugsmerkmal für den Arbeitgeber nach § 39e EStG festgestellte oder in der Bescheinigung für den Lohnsteuerabzug 2016 eingetragene Hinzurechnungsbetrag für den Lohnzahlungszeitraum in Cent
    public $PKPV = 0; // Dem Arbeitgeber mitgeteilte Beiträge des Arbeitnehmers für eine private Basiskranken- bzw. Pflege-Pflichtversicherung im Sinne des § 10 Absatz 1 Nummer 3 EStG in Cent; der Wert ist unabhängig vom Lohnzahlungszeitraum immer als Monatsbetrag anzugeben
    public $PKV = 0; // 0 = gesetzlich krankenversicherte Arbeitnehmer 1 = ausschließlich privat krankenversicherte Arbeitnehmer ohne Arbeitgeberzuschuss 2 = ausschließlich privat krankenversicherte Arbeitnehmer mit Arbeitgeberzuschuss
    public $PVS = 0; // 1, wenn bei der sozialen Pflegeversicherung die Besonderheiten in Sachsen zu berücksichtigen sind bzw. zu berücksichtigen wären
    public $PVZ = 0; // 1, wenn der Arbeitnehmer den Zuschlag zur sozialen Pflegeversicherung zu zahlen hat
    public $R; // Religionsgemeinschaft des Arbeitnehmers lt. elektronischer Lohnsteuerabzugsmerkmale oder der Bescheinigung für den Lohnsteuerabzug 2016 (bei keiner Religionszugehörigkeit = 0)
    public $RE4; // Steuerpflichtiger Arbeitslohn vor Berücksichtigung des Versorgungsfreibetrags und des Zuschlags zum Versorgungsfreibetrag, des Altersentlastungsbetrags und des als elektronisches Lohnsteuerabzugsmerkmal festgestellten oder in der Bescheinigung für den Lohnsteuerabzug 2016 für den Lohnzahlungszeitraum eingetragenen Freibetrags bzw. Hinzurechnungsbetrags in Cent
    public $SONSTB; // Sonstige Bezüge (ohne Vergütung aus mehrjähriger Tätigkeit) einschließlich Sterbegeld bei Versorgungsbezügen sowie Kapitalauszahlungen/Abfindungen, soweit es sich nicht um Bezüge für mehrere Jahre handelt in Cent (ggf. 0)
    public $SONSTENT; // In SONSTB enthaltene Entschädigungen nach § 24 Nummer 1 EStG in Cent
    public $STERBE; // Sterbegeld bei Versorgungsbezügen sowie Kapitalauszahlungen/Abfindungen, soweit es sich nicht um Bezüge für mehrere Jahre handelt (in SONSTB enthalten) in Cent
    public $STKL; // Steuerklasse: 1 = I 2 = II 3 = III 4 = IV 5 = V 6 = VI
    public $VBEZ; // In RE4 enthaltene Versorgungsbezüge in Cent (ggf. 0) ggf. unter Berücksichtigung einer geänderten Bemessungsgrundlage nach § 19 Absatz 2 Satz 10 und 11 EStG
    public $VBEZM; // Versorgungsbezug im Januar 2005 bzw. für den ersten vollen Monat, wenn der Versorgungsbezug erstmalig nach Januar 2005 gewährt wurde in Cent
    public $VBEZS; // Voraussichtliche Sonderzahlungen von Versorgungsbezügen im Kalenderjahr des Versorgungsbeginns bei Versorgungsempfängern ohne Sterbegeld, Kapitalauszahlungen/Abfindungen in Cent
    public $VBS; // In SONSTB enthaltene Versorgungsbezüge einschließlich Sterbegeld in Cent (ggf. 0)
    public $VJAHR; // Jahr, in dem der Versorgungsbezug erstmalig gewährt wurde; werden mehrere Versorgungsbezüge gezahlt, wird aus Vereinfachungsgründen für die Berechnung das Jahr des ältesten erstmaligen Bezugs herangezogen
    public $VKAPA; // Entschädigungen / Kapitalauszahlungen / Abfindungen / Nachzahlungen bei Versorgungsbezügen für mehrere Jahre in Cent (ggf. 0)
    public $VMT; // Entschädigungen und Vergütung für mehrjährige Tätigkeit ohne Kapitalauszahlungen und ohne Abfindungen bei Versorgungsbezügen in Cent (ggf. 0)
    public $ZKF; // Zahl der Freibeträge für Kinder (eine Dezimalstelle, nur bei Steuerklassen I, II, III und IV)
    public $ZMVB; // Zahl der Monate, für die im Kalenderjahr Versorgungsbezüge gezahlt werden [nur erforderlich bei Jahresberechnung (LZZ = 1)]

    // 3.2 Ausgangsparameter

    // Als Ergebnis stellt das Programm folgende Ausgangsparameter zur Verfügung:

    public $BK; // Bemessungsgrundlage für die Kirchenlohnsteuer in Cent
    public $BKS; // Bemessungsgrundlage der sonstigen Bezüge (ohne Vergütung für mehrjährige Tätigkeit) für die Kirchenlohnsteuer in Cent
    public $BKV; // Bemessungsgrundlage der Vergütung für mehrjährige Tätigkeit für die Kirchenlohnsteuer in Cent
    public $LSTLZZ; // Für den Lohnzahlungszeitraum einzubehaltende Lohnsteuer in Cent
    public $SOLZLZZ; // Für den Lohnzahlungszeitraum einzubehaltender Solidaritätszuschlag in Cent
    public $SOLZS; // Solidaritätszuschlag für sonstige Bezüge (ohne Vergütung für mehrjährige Tätigkeit) in Cent
    public $SOLZV; // Solidaritätszuschlag für die Vergütung für mehrjährige Tätigkeit in Cent
    public $STS; // Lohnsteuer für sonstige Bezüge (ohne Vergütung für mehrjährige Tätigkeit) in Cent
    public $STV; // Lohnsteuer für die Vergütung für mehrjährige Tätigkeit in Cent
    public $VKVLZZ; // Für den Lohnzahlungszeitraum berücksichtigte Beiträge des Arbeitnehmers zur privaten Basis-Krankenversicherung und privaten Pflege-Pflichtversicherung (ggf. auch die Mindestvorsorgepauschale) in Cent beim laufenden Arbeitslohn. Für Zwecke der Lohnsteuerbescheinigung sind die einzelnen Ausgabewerte außerhalb des eigentlichen Lohnsteuerberechnungsprogramms zu addieren; hinzuzurechnen sind auch die Ausgabewerte VKVSONST.
    public $VKVSONST; // Für den Lohnzahlungszeitraum berücksichtigte Beiträge des Arbeitnehmers zur privaten Basis-Krankenversicherung und privaten Pflege-Pflichtversicherung (ggf. auch die Mindestvorsorgepauschale) in Cent bei sonstigen Bezügen. Der Ausgabewert kann auch negativ sein. Für tarifermäßigt zu besteuernde Vergütungen für mehrjährige Tätigkeiten enthält der PAP keinen entsprechenden Ausgabewert.

    // 3.3 Ausgangsparameter DBA
    // Zusätzlich stellt das Programm Ausgangsparameter zur Verfügung, die für die Ermittlung der Lohnsteuer unter Berücksichtigung von Doppelbesteuerungsabkommen (DBA) mittels DBAPAP benötigt werden. Soweit eine Kompatibilität des Programms mit der Lohnsteuerermittlung nach DBA nicht gegeben sein soll, sind die Parameter zumindest als interne Felder zu definieren.

    public $VFRB = 0; // Verbrauchter Freibetrag bei Berechnung des laufenden Arbeitslohns, in Cent
    public $VFRBS1 = 0; // Verbrauchter Freibetrag bei Berechnung des voraussichtlichen Jahresarbeitslohns, in Cent
    public $VFRBS2 = 0; // Verbrauchter Freibetrag bei Berechnung der sonstigen Bezüge, in Cent
    public $WVFRB = 0; // Für die weitergehende Berücksichtigung des Steuerfreibetrags nach dem DBA Türkei verfügbares ZVE über dem Grundfreibetrag bei der Berechnung des laufenden Arbeitslohns, in Cent
    public $WVFRBO = 0; // Für die weitergehende Berücksichtigung des Steuerfreibetrags nach dem DBA Türkei verfügbares ZVE über dem Grundfreibetrag bei der Berechnung des voraussichtlichen Jahresarbeitslohns, in Cent
    public $WVFRBM = 0; // Für die weitergehende Berücksichtigung des Steuerfreibetrags nach dem DBA Türkei verfügbares ZVE über dem Grundfreibetrag bei der Berechnung der sonstigen Bezüge, in Cent

    // 4. Interne Felder

    // Das Programm verwendet intern folgende Felder (wenn ggf. solche Felder im Umfeld des
    // Programms verwendet werden sollen, können sie als Ausgangsparameter behandelt
    // werden, soweit sie nicht während des Programmdurchlaufs noch verändert wurden). Die
    // internen Felder müssen vor Aufruf des Programms gelöscht werden:

    private $ALTE; // Altersentlastungsbetrag in Euro, Cent (2 Dezimalstellen)
    private $ANP; // Arbeitnehmer-Pauschbetrag/Werbungskosten-Pauschbetrag in Euro
    private $ANTEIL1; // Auf den Lohnzahlungszeitraum entfallender Anteil von Jahreswerten auf ganze Cent abgerundet
    private $BMG; // Bemessungsgrundlage für Altersentlastungsbetrag in Euro, Cent (2 Dezimalstellen)
    private $BBGKVPV; // Beitragsbemessungsgrenze in der gesetzlichen Krankenversicherung und der sozialen Pflegeversicherung in Euro
    private $BBGRV; // Allgemeine Beitragsbemessungsgrenze in der allgemeinen Rentenversicherung in Euro
    private $DIFF; // Differenz zwischen ST1 und ST2 in Euro
    private $EFA; // Entlastungsbetrag für Alleinerziehende in Euro
    private $FVB; // Versorgungsfreibetrag in Euro, Cent (2 Dezimalstellen)
    private $FVBSO; // Versorgungsfreibetrag in Euro, Cent (2 Dezimalstellen) für die Berechnung der Lohnsteuer für den sonstigen Bezug
    private $FVBZ; // Zuschlag zum Versorgungsfreibetrag in Euro
    private $FVBZSO; // Zuschlag zum Versorgungsfreibetrag in Euro für die Berechnung der Lohnsteuer beim sonstigen Bezug
    private $GFB; // Grundfreibetrag in Euro
    private $HBALTE; // Maximaler Altersentlastungsbetrag in Euro
    private $HFVB; // Maßgeblicher maximaler Versorgungsfreibetrag in Euro
    private $HFVBZ; // Maßgeblicher maximaler Zuschlag zum Versorgungsfreibetrag in Euro, Cent (2 Dezimalstellen)
    private $HFVBZSO; // Maßgeblicher maximaler Zuschlag zum Versorgungsfreibetrag in Euro, Cent (2 Dezimalstellen) für die Berechnung der Lohnsteuer für den sonstigen Bezug
    private $HOCH; // Zwischenfeld zu X für die Berechnung der Steuer nach § 39b Absatz 2 Satz 7 EStG in Euro
    private $J; // Nummer der Tabellenwerte für Versorgungsparameter
    private $JBMG; // Jahressteuer nach § 51a EStG, aus der Solidaritätszuschlag und Bemessungsgrundlage für die Kirchenlohnsteuer ermittelt werden in Euro
    private $JLFREIB; // Auf einen Jahreslohn hochgerechneter LZZFREIB in Euro, Cent (2 Dezimalstellen)
    private $JLHINZU; // Auf einen Jahreslohn hochgerechnete LZZHINZU in Euro, Cent (2 Dezimalstellen)
    private $JW; // Jahreswert, dessen Anteil für einen Lohnzahlungszeitraum in UPANTEIL errechnet werden soll in Cent
    private $K; // Nummer der Tabellenwerte für Parameter bei Altersentlastungsbetrag
    private $KENNVMT; // Merker für Berechnung Lohnsteuer für mehrjährige Tätigkeit: 0 = normale Steuerberechnung 1 = Steuerberechnung für mehrjährige Tätigkeit 2 = Ermittlung der Vorsorgepauschale ohne Entschädigungen i.S.d. § 24 Nummer 1 EStG
    private $KFB; // Summe der Freibeträge für Kinder in Euro
    private $KVSATZAG; // Beitragssatz des Arbeitgebers zur Krankenversicherung (5 Dezimalstellen)
    private $KVSATZAN; // Beitragssatz des Arbeitnehmers zur Krankenversicherung (5 Dezimalstellen)
    private $KZTAB; // Kennzahl für die Einkommensteuer-Tarifarten: 1 = Grundtarif 2 = Splittingtarif
    private $LSTJAHR; // Jahreslohnsteuer in Euro
    private $LST1; // Zwischenfelder der Jahreslohnsteuer in Cent
    private $LST2;
    private $LST3;
    private $LSTOSO;
    private $LSTSO;
    private $MIST; // Mindeststeuer für die Steuerklassen V und VI in Euro
    private $PVSATZAG; // Beitragssatz des Arbeitgebers zur Pflegeversicherung (5 Dezimalstellen)
    private $PVSATZAN; // Beitragssatz des Arbeitnehmers zur Pflegeversicherung (5 Dezimalstellen)
    private $RVSATZAN; // Beitragssatz des Arbeitnehmers in der allgemeinen gesetzlichen Rentenversicherung (4 Dezimalstellen)
    private $RW; // Rechenwert in Gleitkommadarstellung
    private $SAP; // Sonderausgaben-Pauschbetrag in Euro
    private $SOLZFREI; // Freigrenze für den Solidaritätszuschlag in Euro
    private $SOLZJ; // Solidaritätszuschlag auf die Jahreslohnsteuer in Euro, Cent (2 Dezimalstellen)
    private $SOLZMIN; // Zwischenwert für den Solidaritätszuschlag auf die Jahreslohnsteuer in Euro, Cent (2 Dezimalstellen)
    private $ST; // Tarifliche Einkommensteuer in Euro
    private $ST1; // Tarifliche Einkommensteuer auf das 1,25-fache ZX in Euro
    private $ST2; // Tarifliche Einkommensteuer auf das 0,75-fache ZX in Euro
    private $STOVMT; // Zwischenfeld zur Ermittlung der Steuer auf Vergütungen für mehrjährige Tätigkeit in Euro
    private $TAB1 = [0, 0.4, 0.384, 0.368, 0.352, 0.336, 0.32, 0.304, 0.288, 0.272, 0.256, 0.24, 0.224, 0.208, 0.192, 0.176, 0.16, 0.152, 0.144, 0.136, 0.128, 0.12, 0.112, 0.104, 0.096, 0.088, 0.08, 0.072, 0.064, 0.056, 0.048, 0.04, 0.032, 0.024, 0.016, 0.008, 0]; // Tabelle für die Prozentsätze des Versorgungsfreibetrags
    private $TAB2 = [0, 3000, 2880, 2760, 2640, 2520, 2400, 2280, 2160, 2040, 1920, 1800, 1680, 1560, 1440, 1320, 1200, 1140, 1080, 1020, 960, 900, 840, 780, 720, 660, 600, 540, 480, 420, 360, 300, 240, 180, 120, 60, 0]; // Tabelle für die Höchstbeträge des Versorgungsfreibetrags
    private $TAB3 = [0, 900, 864, 828, 792, 756, 720, 684, 648, 612, 576, 540, 504, 468, 432, 396, 360, 342, 324, 306, 288, 270, 252, 234, 216, 198, 180, 162, 144, 126, 108, 90, 72, 54, 36, 18, 0]; // Tabelle für die Zuschläge zum Versorgungsfreibetrag
    private $TAB4 = [0, 0.4, 0.384, 0.368, 0.352, 0.336, 0.32, 0.304, 0.288, 0.272, 0.256, 0.24, 0.224, 0.208, 0.192, 0.176, 0.16, 0.152, 0.144, 0.136, 0.128, 0.12, 0.112, 0.104, 0.096, 0.088, 0.08, 0.072, 0.064, 0.056, 0.048, 0.04, 0.032, 0.024, 0.016, 0.008, 0]; // Tabelle für die Prozentsätze des Altersentlastungsbetrags
    private $TAB5 = [0, 1900, 1824, 1748, 1672, 1596, 1520, 1444, 1368, 1292, 1216, 1140, 1064, 988, 912, 836, 760, 722, 684, 646, 608, 570, 532, 494, 456, 418, 380, 342, 304, 266, 228, 190, 152, 114, 76, 38, 0]; // Tabelle für die Höchstbeträge des Altersentlastungsbetrags
    private $TBSVORV; // Teilbetragssatz der Vorsorgepauschale für die Rentenversicherung (2 Dezimalstellen)
    private $VBEZB; // Bemessungsgrundlage für den Versorgungsfreibetrag in Cent
    private $VBEZBSO; // Bemessungsgrundlage für den Versorgungsfreibetrag in Cent für den sonstigen Bezug
    private $VERGL; // Zwischenfeld zu X für die Berechnung der Steuer nach § 39b Absatz 2 Satz 7 EStG in Euro
    private $VHB; // Höchstbetrag der Mindestvorsorgepauschale für die Kranken- und Pflegeversicherung in Euro, Cent (2 Dezimalstellen)
    private $VKV; // Jahreswert der berücksichtigten Beiträge zur privaten BasisKrankenversicherung und privaten Pflege-Pflichtversicherung (ggf. auch die Mindestvorsorgepauschale) in Cent
    private $VSP; // Vorsorgepauschale mit Teilbeträgen für die Rentenversicherung sowie die gesetzliche Kranken- und soziale Pflegeversicherung nach fiktiven Beträgen oder ggf. für die private Basiskrankenversicherung und private Pflege-Pflichtversicherung in Euro, Cent (2 Dezimalstellen)
    private $VSPN; // Vorsorgepauschale mit Teilbeträgen für die Rentenversicherung sowie der Mindestvorsorgepauschale für die Kranken- und Pflegeversicherung in Euro, Cent (2 Dezimalstellen)
    private $VSP1; // Zwischenwert 1 bei der Berechnung der Vorsorgepauschale in Euro, Cent (2 Dezimalstellen)
    private $VSP2; // Zwischenwert 2 bei der Berechnung der Vorsorgepauschale in Euro, Cent (2 Dezimalstellen)
    private $VSP3; // Vorsorgepauschale mit Teilbeträgen für die gesetzliche Kranken- und soziale Pflegeversicherung nach fiktiven Beträgen oder ggf. für die private Basiskrankenversicherung und private PflegePflichtversicherung in Euro, Cent (2 Dezimalstellen)
    private $W1STKL5; // Erster Grenzwert in Steuerklasse V/VI in Euro
    private $W2STKL5; // Zweiter Grenzwert in Steuerklasse V/VI in Euro
    private $W3STKL5; // Dritter Grenzwert in Steuerklasse V/VI in Euro
    private $X; // Zu versteuerndes Einkommen gem. § 32a Absatz 1 und 2 EStG in Euro, Cent (2 Dezimalstellen)
    private $Y; // Gem. § 32a Absatz 1 EStG (6 Dezimalstellen)
    private $ZRE4; // Auf einen Jahreslohn hochgerechnetes RE4 in Euro, Cent (2 Dezimalstellen) nach Abzug der Freibeträge nach§ 39b Absatz 2 Satz 3 und 4 EStG
    private $ZRE4J; // Auf einen Jahreslohn hochgerechnetes RE4 in Euro, Cent (2 Dezimalstellen)
    private $ZRE4VP; // Auf einen Jahreslohn hochgerechnetes RE4, ggf. nach Abzug der Entschädigungen i.S.d. § 24 Nummer 1 EStG in Euro, Cent (2 Dezimalstellen)
    private $ZTABFB; // Feste Tabellenfreibeträge (ohne Vorsorgepauschale) in Euro, Cent (2 Dezimalstellen)
    private $ZVBEZ; // Auf einen Jahreslohn hochgerechnetes VBEZ abzüglich FVB in Euro, Cent (2 Dezimalstellen)
    private $ZVBEZJ; // Auf einen Jahreslohn hochgerechnetes VBEZ in Euro, Cent (2 Dezimalstellen)
    private $ZVE; // Zu versteuerndes Einkommen in Euro, Cent (2 Dezimalstellen)
    private $ZX; // Zwischenfeld zu X für die Berechnung der Steuer nach § 39b Absatz 2 Satz 7 EStG in Euro
    private $ZZX; // Zwischenfeld zu X für die Berechnung der Steuer nach § 39b Absatz 2 Satz 7 EStG in Euro

    public function get(array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        $this->LST2016();

        return [
            'YEAR' => $this->year,
            'BK' => $this->BK,
            'BKS' => $this->BKS,
            'BKV' => $this->BKV,
            'LSTLZZ' => $this->LSTLZZ,
            'SOLZLZZ' => $this->SOLZLZZ,
            'SOLZS' => $this->SOLZS,
            'SOLZV' => $this->SOLZV,
            'STS' => $this->STS,
            'STV' => $this->STV,
            'VKVLZZ' => $this->VKVLZZ,
            'VKVSONST' => $this->VKVSONST,
            'VFRB' => $this->VFRB,
            'VFRBS1' => $this->VFRB,
            'VFRBS2' => $this->VFRBS2,
            'WVFRB' => $this->WVFRB,
            'WVFRBO' => $this->WVFRBO,
            'WVFRBM' => $this->WVFRBM
        ];
    }

    /**
     * PAP Seite 13
     *
     * Steuerung
     */
    public function LST2016()
    {
        $this->MPARA(); // Zuweisung von Werten für bestimmte Sozialversicherungsparameter
        $this->MRE4JL(); // Ermittlung des Jahresarbeitslohns nach § 39b Absatz 2 Satz 2 EStG
        $this->VBEZBSO = 0;
        $this->KENNVMT = 0;
        $this->MRE4(); // Ermittlung der Freibeträge nach § 39b Absatz 2 Satz 3 EStG
        $this->MRE4ABZ(); // Abzug der Freibeträge nach § 39b Absatz 2 Satz 3 und 4 EStG vom Jahresarbeitslohn
        $this->MBERECH(); // Ermittlung der Jahreslohnsteuer auf laufende Bezüge
        $this->MSONST(); // Berechnung sonstiger Bezüge ohne Vergütung für mehrjährige Tätigkeit
        $this->MVMT(); // Berechnung der Vergütung für mehrjährige Tätigkeit
    }

    /**
     * PAP Seite 14
     *
     * Zuweisung von Werten für bestimmte Sozialversicherungsparameter
     */
    private function MPARA()
    {
        // Parameter Rentenversicherung

        if ($this->KRV < 2) {
            if ($this->KRV == 0) {
                $this->BBGRV = 74400;
            } else {
                $this->BBGRV = 64800;
            }

            $this->RVSATZAN = 0.0935;
            $this->TBSVORV = 0.64;
        }

        // Parameter Krankenversicherung / Pflegeversicherung

        $this->BBGKVPV = 50850;
        $this->KVSATZAN = $this->KVZ / 100 + 0.07;
        $this->KVSATZAG = 0.07;

        if ($this->PVS == 1) {
            $this->PVSATZAN = 0.01675;
            $this->PVSATZAG = 0.00675;
        } else {
            $this->PVSATZAN = 0.01175;
            $this->PVSATZAG = 0.01175;
        }

        if ($this->PVZ == 1) {
            $this->PVSATZAN = $this->PVSATZAN + 0.0025;
        }

        // Grenzwerte für die Steuerklassen V / VI

        $this->W1STKL5 = 10070;
        $this->W2STKL5 = 26832;
        $this->W3STKL5 = 203557;

        // Grundfreibetrag

        $this->GFB = 8652;

        // Freigrenze SolZ

        $this->SOLZFREI = 972;
    }

    /**
     * PAP Seite 15
     *
     * Ermittlung des Jahresarbeitslohns und der Freibeträge § 39b Absatz 2 Satz 2 EStG
     */
    private function MRE4JL()
    {
        switch ($this->LZZ) {
            case 1:
                $this->ZRE4J = $this->RE4 / 100;
                $this->ZVBEZJ = $this->VBEZ / 100;
                $this->JLFREIB = $this->LZZFREIB / 100;
                $this->JLHINZU = $this->LZZHINZU / 100;
                break;
            case 2:
                $this->ZRE4J = $this->RE4 * 12 / 100;
                $this->ZVBEZJ = $this->VBEZ * 12 / 100;
                $this->JLFREIB = $this->LZZFREIB * 12 / 100;
                $this->JLHINZU = $this->LZZHINZU * 12 / 100;
                break;
            case 3:
                $this->ZRE4J = $this->RE4 * 360 / 7 / 100;
                $this->ZVBEZJ = $this->VBEZ * 360 / 7 / 100;
                $this->JLFREIB = $this->LZZFREIB * 360 / 7 / 100;
                $this->JLHINZU = $this->LZZHINZU * 360 / 7 / 100;
                break;
            case 4:
                $this->ZRE4J = $this->RE4 * 360 / 100;
                $this->ZVBEZJ = $this->VBEZ * 360 / 100;
                $this->JLFREIB = $this->LZZFREIB * 360 / 100;
                $this->JLHINZU = $this->LZZHINZU * 360 / 100;
                break;
        }

        if ($this->AF == 0) {
            $this->F = 1;
        }
    }

    /**
     * PAP Seite 16
     *
     * Freibeträge für Versorgungsbezüge, Altersentlastungsbetrag (§ 39b Absatz 2 Satz 3 EStG)
     */
    private function MRE4()
    {
        if ($this->ZVBEZJ == 0) {
            $this->FVBZ = 0;
            $this->FVB = 0;
            $this->FVBZSO = 0;
            $this->FVBSO = 0;
        } else {
            if ($this->VJAHR < 2006) {
                $j = 1;
            } elseif ($this->VJAHR < 2040) {
                $j = $this->VJAHR - 2004;
            } else {
                $j = 36;
            }

            if ($this->LZZ == 1) {
                $this->VBEZB = $this->VBEZM * $this->ZMVB + $this->VBEZS;
                $this->HFVB = $this->TAB2[$j] / 12 * $this->ZMVB;
                $this->FVBZ = ceil($this->TAB3[$j] / 12 * $this->ZMVB);
            } else {
                $this->VBEZB = $this->VBEZM * 12 + $this->VBEZS;
                $this->HFVB = $this->TAB2[$j];
                $this->FVBZ = $this->TAB3[$j];
            }

            $this->FVB = $this->VBEZB * $this->TAB1[$j] / 100;
            $this->FVB = ceil($this->FVB * 100) / 100; // auf volle Cent aufrunden

            if ($this->FVB > $this->HFVB) {
                $this->FVB = $this->HFVB;
            }

            if ($this->FVB > $this->ZVBEZJ) {
                $this->FVB = $this->ZVBEZJ;
            }

            $this->FVBSO = $this->FVB + $this->VBEZBSO * $this->TAB1[$j] / 100;
            $this->FVBSO = ceil($this->FVBSO * 100) / 100; // auf volle Cent aufrunden

            if ($this->FVBSO > $this->TAB2[$j]) {
                $this->FVBSO = $this->TAB2[$j];
            }

            $this->HFVBZSO = ($this->VBEZB + $this->VBEZBSO) / 100 - $this->FVBSO;
            $this->FVBZSO = ceil($this->FVBZ + $this->VBEZBSO / 100);

            if ($this->FVBZSO > $this->HFVBZSO) {
                $this->FVBZSO = ceil($this->HFVBZSO);
            }

            if ($this->FVBZSO > $this->TAB3[$j]) {
                $this->FVBZSO = $this->TAB3[$j];
            }

            $this->HFVBZ = ($this->VBEZB / 100) - $this->FVB;

            if ($this->FVBZ > $this->HFVBZ) {
                $this->FVBZ = ceil($this->HFVBZ);
            }
        }

        // Ermittlung des Altersentlastungsbetrags
        $this->MRE4ALTE();
    }

    /**
     * PAP Seite 17
     *
     * Ermittlung des Altersentlastungsbetrag (§ 39b Absatz 2 Satz 3 EStG)
     */
    private function MRE4ALTE()
    {
        if ($this->ALTER1 == 0) {
            $this->ALTE = 0;
        } else {
            if ($this->AJAHR < 2006) {
                $k = 1;
            } elseif ($this->AJAHR < 2040) {
                $k = $this->AJAHR - 2004;
            } else {
                $k = 36;
            }

            $this->BMG = $this->ZRE4J - $this->ZVBEZJ;
            $this->ALTE = ceil($this->BMG * $this->TAB4[$k]);
            $this->HBALTE = $this->TAB5[$k];

            if ($this->ALTE > $this->HBALTE) {
                $this->ALTE = $this->HBALTE;
            }
        }
    }

    /**
     * PAP Seite 19
     *
     * Ermittlung des Jahresarbeitslohns nach Abzug der Freibeträge nach § 39b Absatz 2 Satz 3 und 4 EStG
     */
    private function MRE4ABZ()
    {
        $this->ZRE4 = $this->ZRE4J - $this->FVB - $this->ALTE - $this->JLFREIB + $this->JLHINZU;

        if ($this->ZRE4 < 0) {
            $this->ZRE4 = 0;
        }

        $this->ZRE4VP = $this->ZRE4J;

        if ($this->KENNVMT == 2) {
            $this->ZRE4VP = $this->ZRE4VP - $this->ENTSCH / 100;
        }

        $this->ZVBEZ = $this->ZVBEZJ - $this->FVB;

        if ($this->ZVBEZ < 0) {
            $this->ZVBEZ = 0;
        }
    }

    /**
     * PAP Seite 20
     *
     * Berechnung für laufende Lohnzahlungszeiträume
     */
    private function MBERECH()
    {
        $this->MZTABFB(); // Ermittlung der festen Tabellenfreibeträge (ohne Vorsorgepauschale)

        $this->VFRB = ($this->ANP + $this->FVB + $this->FVBZ) * 100;

        $this->MLSTJAHR(); // Ermittlung der Jahreslohnsteuer für die Lohnsteuerberechnung

        $this->WVFRB = ($this->ZVE - $this->GFB) * 100;

        if ($this->WVFRB < 0) {
            $this->WVFRB = 0;
        }

        $this->LSTJAHR = $this->ST * $this->F;

        $this->UPLSTLZZ(); // Ermittlung des Anteils der Jahreslohnsteuer für den Lohnzahlungszeitraum
        $this->UPVKVLZZ(); // Ermittlung des Anteils der berücksichtigten Vorsorgeaufwendungen für den Lohnzahlungszeitraum

        if ($this->ZKF > 0) {
            $this->ZTABFB = $this->ZTABFB + $this->KFB; // Berechnung der Tabellenfreibeträge mit Freibeträgen für Kinder für die Bemessungsgrundlage KiSt und SOLZ
            $this->MRE4ABZ();
            $this->MLSTJAHR(); // Ermittlung der Jahreslohnsteuer mit Freibeträgen für Kinder als Jahresbemessungsgrundlage KiSt und SOLZ
            $this->JBMG = $this->ST * $this->F;
        } else {
            $this->JBMG = $this->LSTJAHR;
        }

        $this->MSOLZ(); // Ermittlung des Solidaritätszuschlags mit Aufteilung von SOLZJ und JBMG auf den Lohnzahlungszeitraum
    }

    /**
     * PAP Seite 21
     *
     * Ermittlung der festen Tabellenfreibeträge (ohne Vorsorgepauschale)
     */
    private function MZTABFB()
    {
        $this->ANP = 0;

        if ($this->ZVBEZ >= 0) {
            if ($this->ZVBEZ < $this->FVBZ) {
                $this->FVBZ = $this->ZVBEZ;
            }
        }

        // Mögliche Begrenzung des Zuschlags zum Versorgungsfreibetrag und Festlegung und Begrenzung Werbungskosten-Pauschbetrag für Versorgungsbezüge
        if ($this->STKL < 6) {
            if ($this->ZVBEZ > 0) {
                if ($this->ZVBEZ - $this->FVBZ < 102) {
                    $this->ANP = ceil($this->ZVBEZ - $this->FVBZ);
                } else {
                    $this->ANP = 102;
                }
            }
        } else {
            $this->FVBZ = 0;
            $this->FVBZSO = 0;
        }

        // Festlegung Arbeitnehmer-Pauschbetrag für aktiven Lohn mit möglicher Begrenzung
        if ($this->STKL < 6) {
            if ($this->ZRE4 > $this->ZVBEZ) {
                if ($this->ZRE4 - $this->ZVBEZ < 1000) {
                    $this->ANP = ceil($this->ANP + $this->ZRE4 - $this->ZVBEZ);
                } else {
                    $this->ANP = $this->ANP + 1000;
                }
            }
        }

        $this->KZTAB = 1;

        switch ($this->STKL) {
            case 1:
                $this->SAP = 36;
                $this->KFB = $this->ZKF * 7248;
                break;
            case 2:
                $this->EFA = 1908;
                $this->SAP = 36;
                $this->KFB = $this->ZKF * 7248;
                break;
            case 3:
                $this->KZTAB = 2;
                $this->SAP = 36;
                $this->KFB = $this->ZKF * 7248;
                break;
            case 4:
                $this->SAP = 36;
                $this->KFB = $this->ZKF * 3624;
                break;
            case 5:
                $this->SAP = 36;
                $this->KFB = 0;
                break;
            case 6:
                $this->KFB = 0;
                break;
        }

        // Berechnung der Tabellenfreibeträge ohne Freibeträge für Kinder für die Lohnsteuerberechnung
        $this->ZTABFB = $this->EFA + $this->ANP + $this->SAP + $this->FVBZ;
    }

    /**
     * PAP Seite 22
     *
     * Ermittlung Jahreslohnsteuer
     */
    private function MLSTJAHR()
    {
        // Ermittlung der Vorsorgepauschale
        $this->UPEVP();

        // Ermittlung der Steuer bei Vergütung für mehrjährige Tätigkeit
        if ($this->KENNVMT != 1) {
            $this->ZVE = $this->ZRE4 - $this->ZTABFB - $this->VSP;
            $this->UPMLST();
        } else {
            $this->ZVE = $this->ZRE4 - $this->ZTABFB - $this->VSP - $this->VMT / 100 - $this->VKAPA / 100;

            if ($this->ZVE < 0) {
                // Sonderfall des negativen verbleibenden zvE nach § 34 Absatz 1 Satz 3 EStG
                $this->ZVE = ($this->ZVE + $this->VMT / 100 + $this->VKAPA / 100) / 5;
                $this->UPMLST();
                $this->ST = $this->ST * 5;
            } else {
                // Steuerberechnung ohne Einkünfte nach § 34 EStG
                $this->UPMLST();
                $this->STOVMT = $this->ST;
                // Steuerberechnung mit Einkünften nach § 34 EStG
                $this->ZVE = $this->ZVE + ($this->VMT + $this->VKAPA) / 500;
                $this->UPMLST();
                $this->ST = ($this->ST - $this->STOVMT) * 5 + $this->STOVMT;
            }
        }
    }

    /**
     * PAP Seite 23
     */
    private function UPVKVLZZ()
    {
        // Ermittlung des Jahreswertes der berücksichtigten privaten Kranken- und Pflegeversicherungsbeiträge
        $this->UPVKV();
        $this->JW = $this->VKV;
        // Ermittlung des Anteils der berücksichtigten privaten Kranken- und Pflegeversicherungsbeiträge für den Lohnzahlungszeitraum
        $this->UPANTEIL();
        $this->VKVLZZ = $this->ANTEIL1;
    }

    /**
     * PAP Seite 23
     */
    private function UPVKV()
    {
        if ($this->PKV > 0) {
            if ($this->VSP2 > $this->VSP3) {
                $this->VKV = $this->VSP2 * 100;
            } else {
                $this->VKV = $this->VSP3 * 100;
            }
        } else {
            $this->VKV = 0;
        }
    }

    /**
     * PAP Seite 24
     */
    private function UPLSTLZZ()
    {
        $this->JW = $this->LSTJAHR * 100;
        // Ermittlung des Anteils der Jahreslohnsteuer für den Lohnzahlungszeitraum
        $this->UPANTEIL();
        $this->LSTLZZ = $this->ANTEIL1;
    }

    /**
     * PAP Seite 25
     * Ermittlung der Jahreslohnsteuer aus dem Einkommensteuertarif
     */
    private function UPMLST()
    {
        if ($this->ZVE < 1) {
            $this->ZVE = 0;
            $this->X = 0;
        } else {
            $this->X = floor($this->ZVE / $this->KZTAB);
        }

        if ($this->STKL < 5) {
            $this->UPTAB16();
        } else {
            $this->MST5_6();
        }
    }

    /**
     * PAP Seite 26
     * Vorsorgepauschale (§ 39b Absatz 2 Satz 5 Nummer 3 und Absatz 4 EStG)
     *
     * Achtung: Es wird davon ausgegangen, dass
     * a) Es wird davon ausgegangen, dass für die BBG (Ost) 60.000 Euro und für die BBG (West) 71.400 Euro festgelegt wird sowie
     * b) der Beitragssatz zur Rentenversicherung auf 18,9 % gesenkt wird.
     */
    private function UPEVP()
    {
        if ($this->KRV > 1) {
            $this->VSP1 = 0;
        } else {
            if ($this->ZRE4VP > $this->BBGRV) {
                $this->ZRE4VP = $this->BBGRV;
            }

            $this->VSP1 = $this->TBSVORV * $this->ZRE4VP;
            $this->VSP1 = $this->VSP1 * $this->RVSATZAN;
        }

        $this->VSP2 = 0.12 * $this->ZRE4VP;

        if ($this->STKL == 3) {
            $this->VHB = 3000;
        } else {
            $this->VHB = 1900;
        }

        if ($this->VSP2 > $this->VHB) {
            $this->VSP2 = $this->VHB;
        }

        $this->VSPN = ceil($this->VSP1 + $this->VSP2);

        $this->MVSP();

        if ($this->VSPN > $this->VSP) {
            $this->VSP = $this->VSPN;
        }
    }

    /**
     * PAP Seite 27
     * Vorsorgepauschale (§39b Abs. 2 Satz 5 Nr 3 EStG) Vergleichsberechnung fuer Guenstigerpruefung
     */
    private function MVSP()
    {
        if ($this->ZRE4VP > $this->BBGKVPV) {
            $this->ZRE4VP = $this->BBGKVPV;
        }

        if ($this->PKV > 0) {
            if ($this->STKL == 6) {
                $this->VSP3 = 0;
            } else {
                $this->VSP3 = $this->PKPV * 12 / 100;

                if ($this->PKV == 2) {
                    $this->VSP3 = $this->VSP3 - $this->ZRE4VP * ($this->KVSATZAG + $this->PVSATZAG);
                }
            }
        } else {
            $this->VSP3 = $this->ZRE4VP * ($this->KVSATZAN + $this->PVSATZAN);
        }

        $this->VSP = ceil($this->VSP3 + $this->VSP1);
    }

    /**
     * PAP Seite 28
     * Lohnsteuer für die Steuerklassen V und VI (§ 39b Absatz 2 Satz 7 EStG)
     */
    private function MST5_6()
    {
        $this->ZZX = $this->X;

        if ($this->ZZX > $this->W2STKL5) {
            $this->ZX = $this->W2STKL5;
            $this->UP5_6();

            if ($this->ZZX > $this->W3STKL5) {
                $this->ST = floor($this->ST + ($this->W3STKL5 - $this->W2STKL5) * 0.42);
                $this->ST = floor($this->ST + ($this->ZZX - $this->W3STKL5) * 0.45);
            } else {
                $this->ST = floor($this->ST + ($this->ZZX - $this->W2STKL5) * 0.42);
            }
        } else {
            $this->ZX = $this->ZZX;
            $this->UP5_6();

            if ($this->ZZX > $this->W1STKL5) {
                $this->VERGL = $this->ST;
                $this->ZX = $this->W1STKL5;
                $this->UP5_6();
                $this->HOCH = floor($this->ST + ($this->ZZX - $this->W1STKL5) * 0.42);

                if ($this->HOCH < $this->VERGL) {
                    $this->ST = $this->HOCH;
                } else {
                    $this->ST = $this->VERGL;
                }
            }
        }
    }

    /**
     * PAP Seite 29
     * Lohnsteuer für die Steuerklassen V und VI (§ 39b Absatz 2 Satz 7 EStG)
     */
    private function UP5_6()
    {
        $this->X = $this->ZX * 1.25;
        $this->UPTAB16();
        $this->ST1 = $this->ST;
        $this->X = $this->ZX * 0.75;
        $this->UPTAB16();
        $this->ST2 = $this->ST;
        $this->DIFF = ($this->ST1 - $this->ST2) * 2;
        $this->MIST = floor($this->ZX * 0.14);

        if ($this->MIST > $this->DIFF) {
            $this->ST = $this->MIST;
        } else {
            $this->ST = $this->DIFF;
        }
    }

    /**
     * PAP Seite 30
     * Solidaritätszuschlag
     */
    private function MSOLZ()
    {
        $this->SOLZFREI = $this->SOLZFREI * $this->KZTAB;

        if ($this->JBMG > $this->SOLZFREI) {
            $this->SOLZJ = $this->JBMG * 5.5 / 100;
            $this->SOLZJ = floor($this->SOLZJ * 100) / 100; // auf volle Cent abrunden

            $this->SOLZMIN = ($this->JBMG - $this->SOLZFREI) * 20 / 100;

            if ($this->SOLZMIN < $this->SOLZJ) {
                $this->SOLZJ = $this->SOLZMIN;
            }

            $this->JW = $this->SOLZJ * 100;
            $this->UPANTEIL();
            $this->SOLZLZZ = $this->ANTEIL1;
        } else {
            $this->SOLZLZZ = 0;
        }

        // Aufteilung des Betrages nach § 51a EStG auf den LZZ für die Kirchensteuer
        if ($this->R > 0) {
            $this->JW = $this->JBMG * 100;
            $this->UPANTEIL();
            $this->BK = $this->ANTEIL1;
        } else {
            $this->BK = 0;
        }
    }

    /**
     * PAP Seite 31
     * Anteil von Jahresbeträgen für einen LZZ (§ 39b Absatz 2 Satz 9 EStG)
     */
    private function UPANTEIL()
    {
        switch ($this->LZZ) {
            case 1:
                $this->ANTEIL1 = $this->JW;
                break;
            case 2:
                $this->ANTEIL1 = floor($this->JW / 12);
                break;
            case 3:
                $this->ANTEIL1 = floor($this->JW * 7 / 360);
                break;
            case 4:
                $this->ANTEIL1 = floor($this->JW / 360);
                break;
        }
    }

    /**
     * PAP Seite 32
     * Berechnung sonstiger Bezüge nach § 39b Absatz 3 Satz 1 bis 8 EStG
     */
    private function MSONST()
    {
        $this->LZZ = 1;

        if ($this->ZMVB == 0) {
            $this->ZMVB = 12;
        }

        if ($this->SONSTB == 0) {
            $this->VKVSONST = 0;
            $this->LSTSO = 0;
            $this->STS = 0;
            $this->SOLZS = 0;
            $this->BKS = 0;
        } else {
            $this->MOSONST();
            $this->UPVKV();
            $this->VKVSONST = $this->VKV;
            $this->ZRE4J = ($this->JRE4 + $this->SONSTB) / 100;
            $this->ZVBEZJ = ($this->JVBEZ + $this->VBS) / 100;
            $this->VBEZBSO = $this->STERBE;
            $this->MRE4SONST();
            $this->MLSTJAHR();

            $this->WVFRBM = ($this->ZVE - $this->GFB) * 100;

            if ($this->WVFRBM < 0) {
                $this->WVFRBM = 0;
            }

            $this->UPVKV();
            $this->VKVSONST = $this->VKV - $this->VKVSONST;
            $this->LSTSO = $this->ST * 100;
            $this->STS = floor(($this->LSTSO - $this->LSTOSO) * $this->F);

            // Anmerkung: Negative Lohnsteuer auf sonstigen Bezug wird nicht zugelassen.
            if ($this->STS < 0) {
                $this->STS = 0;
            }

            $this->SOLZS = floor($this->STS * 5.5 / 100);
            $this->SOLZS = floor($this->SOLZS * 100) / 100; // auf volle Cent abrunden

            if ($this->R > 0) {
                $this->BKS = $this->STS;
            } else {
                $this->BKS = 0;
            }
        }
    }

    /**
     * PAP Seite 33
     * Berechnung der Entschädigung und Vergütung für mehrjährige Tätigkeit nach § 39b Absatz 3 Satz 9 und 10 EStG
     */
    private function MVMT()
    {
        if ($this->VKAPA < 0) {
            $this->VKAPA = 0;
        }

        if ($this->VMT + $this->VKAPA > 0) {
            // Steuerberechnung ohne Vergütung für mehrjährige Tätigkeit
            if ($this->LSTSO == 0) {
                $this->MOSONST();
                $this->LST1 = $this->LSTOSO;
            } else {
                $this->LST1 = $this->LSTSO;
            }

            // Vergleichsberechnung der Vergütung für mehrjährige Tätigkeit als sonstiger Bezug
            $this->VBEZBSO = $this->STERBE + $this->VKAPA;
            $this->ZRE4J = ($this->JRE4 + $this->SONSTB + $this->VMT + $this->VKAPA) / 100;
            $this->ZVBEZJ = ($this->JVBEZ + $this->VBS + $this->VKAPA) / 100;
            $this->KENNVMT = 2;
            $this->MRE4SONST();
            $this->MLSTJAHR();
            $this->LST3 = $this->ST * 100;

            // Steuerberechnung mit Vergütung für mehrjährige Tätigkeit
            $this->MRE4ABZ();
            $this->ZRE4VP = $this->ZRE4VP - $this->JRE4ENT / 100 - $this->SONSTENT / 100;
            $this->KENNVMT = 1;
            $this->MLSTJAHR();
            $this->LST2 = $this->ST * 100;
            $this->STV = $this->LST2 - $this->LST1;
            $this->LST3 = $this->LST3 - $this->LST1;

            if ($this->LST3 < $this->STV) {
                $this->STV = $this->LST3;
            }

            // Anmerkung: Negative Steuer auf mehrjährigen Bezug wird nicht zugelassen.
            if ($this->STV < 0) {
                $this->STV = 0;
            } else {
                $this->STV = floor($this->STV * $this->F);
            }

            //$this->SOLZV = floor($this->STV * 5.5) / 100;
            $this->SOLZV = $this->STV * 5.5 / 100;
            $this->SOLZV = floor($this->SOLZV * 100) / 100; // auf volle Cent abrunden

            if ($this->R > 0) {
                $this->BKV = $this->STV;
            } else {
                $this->BKV = 0;
            }
        } else {
            $this->STV = 0;
            $this->SOLZV = 0;
            $this->BKV = 0;
        }
    }

    /**
     * PAP Seite 34
     * Sonderberechnung ohne sonstige Bezüge für Berechnung bei sonstigen Bezügen oder Vergütung für mehrjährige Tätigkeit
     */
    private function MOSONST()
    {
        $this->ZRE4J = $this->JRE4 / 100;
        $this->ZVBEZJ = $this->JVBEZ / 100;
        $this->JLFREIB = $this->JFREIB / 100;
        $this->JLHINZU = $this->JHINZU / 100;
        $this->MRE4();
        $this->MRE4ABZ();
        $this->ZRE4VP = $this->ZRE4VP - $this->JRE4ENT / 100;
        $this->MZTABFB();
        $this->VFRBS1 = ($this->ANP + $this->FVB + $this->FVBZ) * 100;
        $this->MLSTJAHR();

        $this->WVFRBO = ($this->ZVE - $this->GFB) * 100;

        if ($this->WVFRBO < 0) {
            $this->WVFRBO = 0;
        }

        $this->LSTOSO = $this->ST * 100;
    }

    /**
     * PAP Seite 35
     * Sonderberechnung mit sonstigen Bezügen für Berechnung bei sonstigen Bezügen oder Vergütung für mehrjährige Tätigkeit
     */
    private function MRE4SONST()
    {
        $this->MRE4();
        $this->FVB = $this->FVBSO;
        $this->MRE4ABZ();
        $this->ZRE4VP = $this->ZRE4VP - $this->JRE4ENT / 100 - $this->SONSTENT / 100;
        $this->FVBZ = $this->FVBZSO;
        $this->MZTABFB();
        $this->VFRBS2 = ($this->ANP + $this->FVB + $this->FVBZ) * 100 - $this->VFRBS1;
    }

    /**
     * PAP Seite 36
     * Tarifliche Einkommensteuer (§ 32a EStG)
     */
    private function UPTAB16()
    {
        if ($this->X < $this->GFB + 1) {
            $this->ST = 0;
        } else {
            if ($this->X < 13670) {
                $this->Y = ($this->X - $this->GFB) / 10000;
                $this->RW = $this->Y * 993.62;
                $this->RW = $this->RW + 1400;
                $this->ST = floor($this->RW * $this->Y);
            } elseif ($this->X < 53666) {
                $this->Y = ($this->X - 13669) / 10000;
                $this->RW = $this->Y * 225.40;
                $this->RW = $this->RW + 2397;
                $this->RW = $this->RW * $this->Y;
                $this->ST = floor($this->RW + 952.48);
            } elseif ($this->X < 254447) {
                $this->ST = floor($this->X * 0.42 - 8394.14);
            } else {
                $this->ST = floor($this->X * 0.45 - 16027.52);
            }
        }

        $this->ST = $this->ST * $this->KZTAB;
    }
}
