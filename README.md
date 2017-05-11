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
TODO
````
### Specific day
Request list of parties on specific **day** `petek, sobota, etc..`:
````
http://nejcribic.com/veselice_api/myApi.php?getAll/day/{$day}
````
Respond in JSON:
````
TODO
````
### Specific date
Request list of parties on specific **date** `20.06.2017`:
````
http://nejcribic.com/veselice_api/myApi.php?getAll/date/{$date}
````
Respond in JSON:
````
TODO
````