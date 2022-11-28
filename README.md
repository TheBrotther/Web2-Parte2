# Endpoints HEROES
____________________________________
# Metodo GET
## Obten informacion de un heroe(por ID):
#### URL ------------ /api/heroes/(ID)
## Obten informacion de todos los heroes: 
#### URL ------------ /api/heroes
# Metodo POST
## Agréga heroe en formato jSON :
         { 
            "nombre":"un-heroe",
            "type_atack":"tipo-de-ataque",
            "id_atributo_fk": "id-del-atributo",
            "descripcion": "una-descripcion"
         }
# Metodo DELETE
## Elimina un heroe(por ID):
#### URL ------------ /api/heroes/(ID)
# Metodo PUT
## Modifica informacion de un heroe(por ID) en formato JSON:
#### URL ------------ /api/heroes/(ID)

         { 
            "nombre":"un-heroe",
            "type_atack":"tipo-de-ataque",
            "descripcion": "una-descripcion"
         }
____________________________________
# Endpoints ATRIBUTOS
____________________________________
# Metodo GET
## Obten informacion de un atributo(por ID):
#### URL ------------ /api/atributos/(ID)
## Obten informacion de todos los atributos: 
#### URL ------------ /api/atributos
# Metodo POST
## Agréga atributo en formato jSON :
         { 
            "nombre":"un-atributo",
         }
# Metodo DELETE
## Elimina un atributo(por ID):
#### URL ------------ /api/atributos/(ID)
# Metodo PUT
## Modifica informacion de un atributo(por ID) en formato JSON:
#### URL ------------ /api/atributos/(ID)

         { 
            "nombre":"un-atributo",
         }
         
