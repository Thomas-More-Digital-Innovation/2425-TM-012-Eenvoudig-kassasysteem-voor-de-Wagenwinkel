# Sprint 2: scrum meeting verslagen

## Scrum meeting (start): 02/10/2024 12:15 [Nathan & Tom]

**Op de agenda:**

- Tickets "Als verkoper/admin/begeleider kan ik een product verkopen." Deze zijn te vaag en hebben elk 5 story points, terwijl de functionaliteit hetzelfde is, alleen de authenticatie verschilt. Deze zou ik graag opgesplitst zien in meerdere tickets zoals "Als verkoper kan ik een item in mijn winkelmand plaatsen.",...
- Het starten van de sprint en het oppakken van rond de 40 story points.
- Het rangschikken naar prioriteit.
- Het toekennen van de bovenste tickets aan mensen.

Verslag:

- De backlog is geordend volgens prioriteit.
- "Als verkoper/admin/begeleider kan ik een product verkopen." is opgesplitst in "Als verkoper kan ik een item in mijn winkelmand toevoegen, verwijderen, winkelmand tonen,..." zodat als iemand bezig is met een ticket, weet wat die moet doen.
- De database moet nog opgezet worden, dus zullen er in het begin nog veel statische schermen ontwikkeld worden.

#### ! belangrijk !

Er moet een vraag gestuurd worden naar de klant over de qr-codes, moeten deze functioneel zijn? of moet de applicatie een afbeelding van een qr code tonen zodat de verkoper weet dat hij aan de begeleider moet vragen om een qr code aan kan maken.

## Scrum Meeting: 03/10/2024 09:00 [Nathan & Tom]

**Aanwezig:** Jaro, Maxim, Wout  
**Afwezig:** Yme (les), Senne (les)

### Wat hebben jullie gisteren gedaan?

- **Jaro:** Heeft het grootste deel van de database opgezet. Stuitte op een fk-error, maar verwacht dit snel op te lossen.
- **Wout:** Heeft gewerkt aan de productcategorieën. Deze zijn statisch opgezet, omdat de database nog niet klaar is. Morgen gaat hij hiermee verder.
- **Maxim:** Heeft de loginpagina voor begeleiders gemaakt, zonder database-koppeling. Dit deel is afgerond.

### Wat ga je vandaag doen?

- **Jaro:** Gaat verder met het opzetten van de database. Daarnaast zal hij werken aan de visuele bevestiging met de duim.
- **Wout:** Gaat de productcategorieën verder afronden.
- **Maxim:** Heeft morgen de hele dag les en weinig tijd, maar zal werken aan de functionaliteit waarbij een verkoper geld kan invoeren.
- **Yme:** Gaat werken aan de functionaliteit waarbij een verkoper het productoverzicht kan tonen.
- **Senne:** Zal zich bezighouden met het instellingenscherm, uitlogfunctionaliteit en het afsluiten van de kassa.

**Vraag over de QR-code:**  
Het is niet nodig om een werkende QR-code te maken, alleen een indicatieve code, zodat de verkoper weet dat hij de begeleider moet vragen om een QR-code aan te maken.

## Scrum Meeting: 04/10/2024 11:45 [Nathan & Tom]

**Aanwezig:** Iedereen

### Wat hebben jullie gisteren gedaan?
Het overzicht van de producten kan getoond worden. Het selecteren van de organisatie is gemaakt.
Database staat op, de visuele bevestiging is gecodeerd.

### Wat ga je vandaag doen?
Authenticatie wordt nu ontwikkeld. De productcategorieën, als verkoper kan ik geld ingeven, het berekenen van het wisselgeld,...

## Scrum Meeting: 07/10/2024 09:00 [Nathan & Tom]

**Aanwezig:** Iedereen behalve Maxim
**Afwezig:** Maxim (dokter)

### Wat hebben jullie vrijdag en dit weekend gedaan?
- **Yme:** Cursus database bekeken.
- **Jaro:** Het maken van de PayConiq pagina kreeg hij een error, dus die pull request is voorlopig geclosed.
- **Wout:** Het categoriescherm afgemaakt. De figma voor de demo verder gemaakt. Heeft problemen met github, dit moet verder bekeken worden.
- **Senne:** Gesukkeld met github en het project, begonnen aan het settings scherm.

  ### Wat ga je vandaag doen?
- **Yme:** Cursus database bekijken en het wisselgeld verder maken.
- **Jaro:** Verder werken aan kaartjes rond de winkelmand.
- **Wout:** Figma afmaken, werken aan het verwijderen uit de winkelmand.
- **Senne:** Afmaken van het settings scherm.

  ### Sonarcloud
  De security issues zijn er door een Vite import en het manueel aanmaken van het wisselgeld, deze zitten nog niet in de database.
  
