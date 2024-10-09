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

# Retrospective (9/10) [Nathan & Tom]

## Wat ging minder goed? (Slecht)

1. **Beschrijving van taken:** Sommige taken waren niet duidelijk genoeg omschreven, waardoor twee personen aan hetzelfde onderdeel hebben gewerkt. Dit leidde tot dubbel werk. In de toekomst is het belangrijk om de beschrijvingen van de Jira-kaarten duidelijker en specifieker te maken, zodat taken niet onbedoeld dubbel worden uitgevoerd.
   
2. **Github-problemen:** Er waren veel problemen met Github, waardoor de scrum masters vaak moesten helpen. Het is misschien handig om een tech talk of uitleg te organiseren voor de tweedejaars studenten, zodat ze beter begrijpen hoe Github werkt.

3. **Onduidelijke database:** Niet iedereen weet precies hoe de database in elkaar zit. Het is belangrijk dat het hele team begrijpt hoe de database werkt. Dit punt vereist extra aandacht.

4. **Niet overal uniform design:** Het volgen van het design vanuit Figma naar de code was niet altijd consistent. Bijvoorbeeld, pijlen werden soms als tekst ingevoerd en dit was niet uniform doorgevoerd in het hele project.

5. **Figma-problemen vlak voor de demo:** Figma werkte net voor de demo even niet mee, wat voor wat vertraging zorgde. Dit werd echter snel opgelost en had geen langdurige impact.

6. **Last-minute database fix:** Er was een last-minute fix voor de database. Dit moet in de toekomst vermeden worden door eerder met de database te beginnen.

7. **Wachten op elkaar:** Soms moest het team wachten op elkaar voor kleine taken. Hoewel dit geen groot probleem was, zorgde het wel voor wat vertraging.

8. **Winkelmand implementatie:** De implementatie van de winkelmand met sessies was niet heel duidelijk, maar uiteindelijk is het wel gelukt. Deze moet nog wel gerefactored worden.

9. **Betere planning en communicatie:** Er moet beter gecommuniceerd en gepland worden tussen teamleden. Mogelijk kan Discord gebruikt worden om te communiceren welke schermen gemaakt worden, of om meer duidelijkheid te geven in de Jira-borden met benamingen van kaarten en een duidelijke 'definition of done'.

---

## Wat ging goed? (Goed)

1. **Communicatie tijdens meetings:** De communicatie in de meetings verliep soepel, wat de samenwerking verbeterde.

2. **Hulp binnen het team:** Teamleden hielpen elkaar veel en dit werd gewaardeerd. Er waren veel 'stickertjes' voor hulp.

3. **Video's van Vince:** De video's van Vince bleken handiger te zijn dan de officiële schoolcursus. Dit was een waardevolle bron van informatie voor het team.

4. **Goede inzichten:** Teamleden brachten goede inzichten naar voren en durfden hun mening te geven, wat de kwaliteit van het werk verbeterde.

5. **Elkaars werk controleren:** Het team bekeek elkaars code en pagina’s grondig, wat de kwaliteit ten goede kwam.

6. **Snelle oplevering van schermen:** De schermen werden snel afgerond en visueel goed uitgewerkt, wat zorgde voor een vlotte voortgang.

7. **Voorzichtig communiceren naar klant:** In plaats van meteen tegen de klant te zeggen dat iets toegevoegd kan worden, werd er goed gehandeld door te zeggen dat het bekeken zou worden. Dit helpt om geen onrealistische verwachtingen te scheppen.

---

## Focus voor de komende week

1. **Focus op verkoop:** De focus ligt op de verkoopfunctionaliteiten en dan de beheer en admin.

2. **Database afronden:** Twee teamleden gaan zich richten op het afronden van de database, en zorgen dat iedereen op de hoogte is van de video's van Vince.

3. **Betere planning en communicatie:** Verbeter de onderlinge communicatie en planning, eventueel via Discord, om duidelijk te maken wie waar aan werkt en om het Jira-bord beter te beheren met duidelijke benamingen en definities van klaar-criteria.

## Demo met karl:
- We vroegen: "verkoop ons een appel", Karl drukte eerst op het winkelmandje, niet op 'food'. Na een woordje uitleg maakte hij deze fout niet meer.
- Voor 3 appels toe te voegen aan het winkelmandje, drukte hij meteen op de groene pijl, niet 3 keer op de appel.
- Het verwijderen van een kaartje was niet meteen duidelijk, maar hij had het snel zelf door dat hij 2 keer op een item moest drukken.
- Het ingeven van het wisselgeld ging moeizaam. Ik hield het 5 euro briefje naast de tablet en dan snapte hij dat hij op de 5 euro moest duwen.

  Voor de rest ging alles vlot.
