<?php
function addUserToXML($korisnik) {
    $file = 'korisnik.xml';

    if (!file_exists($file)) {
        $xml = new SimpleXMLElement('<korisnik/>');
    } else {
        $xml = simplexml_load_file($file);
    }

    $korisnikNode = $xml->addChild('korisnik');
    $korisnikNode->addChild('id', $korisnik['id']);
    $korisnikNode->addChild('ime', $korisnik['ime']);
    $korisnikNode->addChild('prezime', $korisnik['prezime']);
    $korisnikNode->addChild('email', $korisnik['email']);
    $korisnikNode->addChild('role', $korisnik['role']);

    $xml->asXML($file);
}

function addTerminToXML($termin) {
    $file = 'termini.xml';

    if (!file_exists($file)) {
        $xml = new SimpleXMLElement('<termini/>');
    } else {
        $xml = simplexml_load_file($file);
    }

    $terminNode = $xml->addChild('termin');
    $terminNode->addChild('id', $termin['id']);
    $terminNode->addChild('trener_id', $termin['trener_id']);
    $terminNode->addChild('datum', $termin['datum']);
    $terminNode->addChild('vrijeme', $termin['vrijeme']);

    $xml->asXML($file);
}

function deleteTerminFromXML($terminId) {
    $file = 'termini.xml';

    if (!file_exists($file)) {
        return;
    }

    $xml = simplexml_load_file($file);

    foreach ($xml->termin as $termin) {
        if ($termin->id == $terminId) {
            $dom = dom_import_simplexml($termin);
            $dom->parentNode->removeChild($dom);
        }
    }

    $xml->asXML($file);
}
?>