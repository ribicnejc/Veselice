## Motivation

This is api, which parse all data from web page www.veselica.info, and saves all data in personal database, and then serve all data to api.

* Every time, when you request data from endpoint, database is refreshed, so there is no old data inside.


## Veselice API documentation

### Get all parties
Request list of **all** parties:
````
http://nejcribic.com/veselice_api/myApi.php?getAll/
````
Respond in JSON:
````
[
    {
        date: "Sobota, 13. maj 2017",
        places: [
            {
                name: "ŠKOCJAN - Ansambel Saša Avsenika",
                href: "/page/veselice-2017?SKOCJAN_-Ansambel_Sasa_Avsenika;block_id=4797;subcmd=view_event;event_id=3816"
            }
        ]
    },
    {
        date: "Petek, 19. maj 2017",
        places: [
            {
                name: "Blatna Brezovica, Vrhnika - Mambo kings",
                href: "/page/veselice-2017?Blatna_Brezovica_Vrhnika-Mambo_kings;block_id=4797;subcmd=view_event;event_id=3792"
            },
            {
                name: "Orehovlje, Miren-Kostanjevica - Klapa Šufit",
                href: "/page/veselice-2017?Orehovlje_Miren-Kostanjevica-Klapa_S;block_id=4797;subcmd=view_event;event_id=3825"
            },
            {
                name: "Orehovlje, Miren-Kostanjevica - Klapa Maslina",
                href: "/page/veselice-2017?Orehovlje_Miren-Kostanjevica-Klapa_M;block_id=4797;subcmd=view_event;event_id=3836"
            }
        ]
    }
]
````
### Specific place
Request list of parties in specific **place**:
````
http://nejcribic.com/veselice_api/myApi.php?getAll/place/{$place}
````
Respond in JSON:
````
[
    {
        date: "Nedelja, 30. april 2017",
        places: [
            {
                name: "Goričane, Medvode - Ansambel Nalet",
                href: "/page/veselice-2017?Goricane_Medvode-Ansambel_Nalet;block_id=4797;subcmd=view_event;event_id=3820"
            }
        ]
    }
]
````
### Specific day
Request list of parties on specific **day** `petek, sobota, etc..`:
````
http://nejcribic.com/veselice_api/myApi.php?getAll/day/{$day}
````
Respond in JSON:
````
[
    {
        date: "Ponedeljek, 1. maj 2017",
        places: [
            {
                name: "Sveti Jurij ob Ščavnici, Gornja Radgona - Jelena Rozga, Nina Donelli",
                href: "/page/veselice-2017?Sveti_Jurij_ob_Scavnici_Gornja_Radgo;block_id=4797;subcmd=view_event;event_id=3812"
            },
            {
                name: "Tuštanj pri Moravčah, Moravče - Živ-Žav z Alenko Kolman in Pujso Pepo, ustvarjalne delavnice, Povorka oldtimerjev, Ansambel Saša Avsenika, Ansambel Modrijani, Pihalna godba Moravče",
                href: "/page/veselice-2017?Tustanj_pri_Moravcah_Moravce-Ziv-Zav;block_id=4797;subcmd=view_event;event_id=3808"
            },
            {
                name: "Zalog pri Cerkljah, Cerklje na Gorenjskem - Mambo kings, Skupina Gadi",
                href: "/page/veselice-2017?Zalog_pri_Cerkljah_Cerklje_na_Gorenj;block_id=4797;subcmd=view_event;event_id=3790"
            }
        ]
    }
]
````
### Specific date
Request list of parties on specific **date** `2.6.2017`:
````
http://nejcribic.com/veselice_api/myApi.php?getAll/date/{$date}
````
Respond in JSON:
````
[
    {
        date: "Petek, 2. junij 2017",
        places: [
            {
                name: "Lenart v Slovenskih goricah - Ansambel Modrijani",
                href: "/page/veselice-2017?Lenart_v_Slovenskih_goricah-Ansambel;block_id=4797;subcmd=view_event;event_id=3829"
            },
            {
                name: "Šentvid pri Ljubljani - Ansambel Stil",
                href: "/page/veselice-2017?Sentvid_pri_Ljubljani-Ansambel_Stil;block_id=4797;subcmd=view_event;event_id=3842"
            }
        ]
    }
]
````