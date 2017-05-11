## Motivation

This is api, which parse all data from web page www.veselica.info, and saves all data in personal database, and then serve all data to api.

* Every time, when you request data from endpoint, database is refreshed, so there is no old data inside.


## Veselice API documentation

### All parties
Request list of **all** parties:
````
http://nejcribic.com/veselice_api/myApi.php?getAll/
````
Respond in JSON:
````
TODO
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
Request list of parties on specific **day** `saturday, sunday,...`:
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