## 1.	TEMA
Sukurti WEB aplikaciją, kuri teiktų informaciją apie Saulės sistemą.
## 2.	PROBLEMA
Šiomis dienomis žmonės nesidomi Saulės sistema, o internete randama informacija yra labai sudėtinga ir sunkiai pasisavinama, todėl nuspręsta sukurti paprastą WEB aplikaciją kurioje, trumpai ir aiškiai, būtų pateikiama informacija apie Saulės sistemą, t.y. apie pačią Saulę, aplink ją skriejančias planetas ir jų palydovus.
## 3.	SISTEMOS ARCHITEKTŪRA
### 3.1.	Funkciniai reikalavimai
Išanalizavus temą iškelti tokie reikalavimai:
- Atvaizduoti pagrindinę sistemos žvaigždę (pavadinimą, iliustraciją ir aprašymą);
- Atvaizduoti planetas, kurios priklauso pasirinktai sistemai (šiuo atveju Saulės sistemai);
- Sukurti administratoriaus sąsają kurioje būtų galima peržiūrėti, pridėti, šalinti ir redaguoti žvaigždes, planetas, bei jų palydovus.

### 3.2.	Nefunkciniai reikalavimai
- „Symfony“ karkaso, bei „MySQL“ duomenų bazės naudojimas;
- „git“ versijavimo sistemos naudojimas, projektą laikant „github.com“ repozitorijoje;
- Darbo atlikimas virtualiame serveryje kuris sukuriamas su „VirtualBox“, bei „Vagrant“ programine įranga.

### 3.3.	Duomenų bazės diagrama

![](https://dl.dropboxusercontent.com/content_link/ntBpCPkaNaxBKsOBBITWPHr9PHYSgaXUBZZBYhj4i0cGV2IfXappQFyUzpWFjsxb)
_Pav. 1 Duomenų bazės diagrama_

Duomenų bazėje (DB), atskirose lentelėse, saugoma informacija apie sistemas, žvaigždes, planetas ir palydovus. Iš DB diagramos (Pav. 1) matyti, jog kiekvienoje iš šių lentelių yra vardas, aprašymas, bei paveikslėlio nuoroda. Žvelgiant į lentelių ryšius matyti, jog kiekviena žvaigždė gali priklausyti tam tikrai sistemai, atitinkamai ir kiekviena planeta, gali priklausyti tam tikrai sistemai, o kiekvienas palydovas, tam tikrai planetai. Vartotojų lentelė į DB įtraukta panaudojus „FOSUserBundle“.
## 4.	SISTEMOS REALIZACIJA
Ši WEB aplikacija buvo realizuota naudojant PHP programavimo kalbą, į pagalbą pasitelkiant „Composer“ su kuriuo įrašytas „Symfony“, „FOSUserBundle“ ir kiti komponentai. „Symfony“, tai PHP karkasas. „FOSUserBundle“, tai „Symfony“ komponentas, jis supaprastino vartotojų realizaciją. Grafinės sąsajos kūrimui naudojamas „Twitter Bootstrap“ karkasas, jis leido paprastai ir greitai realizuoti visą svetainės dizainą. Taipogi naudojamas „Font Awesome“ komponentas piktogramoms atvaizduoti. Šie komponentai įrašyti naudojant „Bower“ paketų menedžerį. „Gulp“ įrankis projekte naudojamas SASS failams konvertuoti į CSS ir JavaScript failų apjungimui.
### 4.1.	Vartotojo sąsajos realizacija

![](https://dl.dropboxusercontent.com/content_link/U5Mr2iixuC5ADzAtgtCmXVmExPTpv4S7yirVMqZseRlUkfbSTp4iX559alCuxAb8)
_Pav. 2 Pagrindinis puslapis_

Pagrindinio puslapio viršuje vartotojas mato sistemos žvaigždė (šiuo atveju Saulę), t.y. jos iliustraciją, pavadinimą, bei aprašymą. Taipogi pačiame puslapio viršuje matome navigacijos juostą kurioje yra nuorodos į tam tikras sistemos planetas. Paspaudus ant nuorodos vartotojas „nuslenkamas“ iki tos planetos aprašymo kurį pasirinko. Nuorodos aktyvuojamos pagal poziciją kurioje yra vartotojas.
 
![](https://dl.dropboxusercontent.com/content_link/Xh6vwpS8q7oG91Kjl6Lzh3urMd7yV69qKfFqjnDay3nMqJeWMoKY46bouX2B2FH6)
_Pav. 3 Pagrindinis puslapis (planetos)_

Kadangi tai yra vieno puslapio tinklalapis, tai vartotojas paslinkęs puslapį šiek tiek žemiau arba paspaudęs ant nuorodos navigacijos juostoje mato tai sistemai priklausančias planetas, jos aprašomos analogiškai kaip ir žvaigždė.

![](https://dl-web.dropbox.com/get/Space/3.png?_subject_uid=94994611&w=AADtTc4ZXVgx0JOwYMG8Ckte-UZkfDhHionvn2a1w2nABQ)
_Pav. 4 Pagrindinis puslapis (palydovai)_

Jei planeta turi jai priklausančių palydovų, tai po ja matoma piktograma, kurią paspaudus „išskleidžiama“ informacija apie tai planetai priklausančius palydovus.

![](https://dl-web.dropbox.com/get/Space/4.png?_subject_uid=94994611&w=AAC2-yBjsEDWECNivV7Z3T3Pv8kIaG4xah_QZxdMn3E7qw)
_Pav. 5 Pagrindinis puslapis (kontaktai)_

Puslapio apačioje yra kontaktų formą, kurią užpildžius galima išsiųsti laišką puslapio administracijai.
### 4.2.	Administratoriaus sąsajos realizacija
 
![](https://dl-web.dropbox.com/get/Space/5.png?_subject_uid=94994611&w=AABFia7V-Rv1cmxfq6KkkVdc938iRPYo6eeVljrsj-L8GQ)
_Pav. 6 Prisijungimo forma_

Norint patekti į administratoriaus sąsają, visų pirma, reikia prisijungti ir turėti 
administratoriaus statusą.

![](https://dl-web.dropbox.com/get/Space/6.png?_subject_uid=94994611&w=AACJ1zkGPSzhq-LwvlkKzM1wvFcoWiLsUfgoZ3ItdDjgTQ)
_Pav. 7 Administratoriaus valdymo skydas_

Prisijungus, administratorius mato keleta „plytelių“ su informacija apie tai, kiek ir kokių įrašų yra duomenų bazėje. Viršutinėje navigacijos juostoje matomas prisijungusio vartotojo vardas, o ant jo paspaudus išskleidžiamas meniu su profilio bei atsijungimo nuorodomis.

![](https://dl-web.dropbox.com/get/Space/7.png?_subject_uid=94994611&w=AAB333GCvYlVSp-l0ILhZuigI-pfcoyVJz5gajJWeIme8Q)
_Pav. 8 Įrašų peržiūra_

Kairėje pusėje esančiame meniu administratorius gali įsijungi tam tikrų įrašų sąrašus (šiuo atveju planetų). Ekrane administratorius mato lentelę, kurioje atvaizduojami visi tai DB lentelei priklausantys įrašai. Sąrašo apačioje yra mygtukas „Add a new Planet“, kurį paspaudęs administratorius gali pridėti naują įrašą (šiuo atveju planetą, žiūrėti Pav. 10). Prie kiekvieno įrašo, dešinėje lentelės pusėje, matomas mygtukas „Edit“, kurį paspaudęs administratorius gali redaguoti pasirinktą įrašą (žiūrėti Pav. 11). Kairėje įrašo pusėje administratoriui paspaudus ant įrašo pavadinimo, jam bus rodoma visa pasirinkto įrašo informacija (žiūrėti Pav. 9).
 
![](https://dl-web.dropbox.com/get/Space/8.png?_subject_uid=94994611&w=AACoesqEquvIr49Ikn0NVm6FttPhOCkP11qHNzZKm_zaJg)
_Pav. 9 Įrašo peržiūra_

![](https://dl-web.dropbox.com/get/Space/9.png?_subject_uid=94994611&w=AACXE6ZlHx6spISMlz2PXuDCzPKRGkTEjvOd_EilLM4kLA) 
_Pav. 10 Naujo įrašo įterpimas_

![](https://dl-web.dropbox.com/get/Space/10.png?_subject_uid=94994611&w=AACzJD5QXjbK1Vpgy4DcNVL5iODzPMc_elJNUzyI-MT6qg)
_Pav. 11 Esamo įrašo redagavimas_

## 5.	IŠVADOS
Kurdamas šią WEB aplikaciją susipažinau su profesionaliais darbo įrankiais, tokiais kaip: „Vagrant“, „PhpStorm“. Pagilinau jau turimas PHP žinias ir susipažinau, bei išmokau dirbti su „Symfony“ PHP karkasu. Kurdamas aplikacijos dizainą naudojausi „Twitter Bootstrap“ karkasu, kuriuo jau esu naudojęsis prieš tai. „FOSUserBundle“ leido greitai ir efektyviai sukurti vartotojų klasę, autentifikavimą ir prisijungimą, dėl ko buvo sutaupyta daug laiko. Taipogi įsisavinau „Twig“ šablonų variklį, „SCSS“ sintaksę ir „JavaScript“ bazines žinias.

