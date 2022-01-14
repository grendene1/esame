# Esame del 14/01/2022 di Andrea Grendene

Una volta scaricato il progetto, nella cartella del frontend lanciare i comandi:
```
npm install
npm install -g yarn
yarn add axios vue-router
```
Nella cartella del backend, invece, lanciare il comando:
```
composer update
```

## Collegare il DB al backend

Nel backend, creare il file **.env** e cercare la riga giusta in cui scrivere **DB_DATABASE=treebu**.

## Effettuare le migrazioni
Per effettuare le migrazioni **(nome del database: treebu)**, nella cartella del backend lanciare il comando:
```
php artisan migrate
```

## Tabelle createre
Ho creato una sola tabella di nome **farmlands** (nome in inglese plurale come va fatto per convenzione di Laravel) e ho creato il relativo modello **Farmland** (iniziale maiuscola perché è una classe).

Le API lato server che ho creato sono: 

```
Route::get("/farmlands", [FarmlandController::class, "list"]);
Route::get("/farmlands/{id}", [FarmlandController::class, "detail"]);
Route::post("/farmlands", [FarmlandController::class, "create"]);
Route::put("/farmlands/{id}", [FarmlandController::class, "modify"]);
Route::delete("/farmlands/{id}", [FarmlandController::class, "destroy"]);
```

Utilizzo sempre **/farmlands** come previsto per i servizi REST.
Utilizzo **{id}** quando voglio recuperare una risorsa per ID. Le parentesi graffe, infatti, mi consentono di fare in modo che quella parte dell'url sia considerata un parametro e non valutata letteralmente come stringa.

Per accedere a queste API lato client, devo ricordare che Laravel fornisce le API al client all'url **http://localhost:8000/api/farmlands**.env
