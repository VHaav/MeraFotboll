Redovisningar
=============

Kmom06: Verktyg och CI
----------------------

Detta tycker jag var ett mycket intressant kursmoment. Jag har aldrig tidigare artbetat med de verktyg som momentet behandlade, eller några direkt liknande verktyg. Jag har endast läst om denna typen av verktyg och undrat hur de fungerar.
Så det kändes mycket bra att få testa på att använda dessa verktyg och lära sig att använda dem. Det var bra nyttig läsning för momentet tycker jag, man fick ett lite nytt sätt att tänka när det kommer till testning och hur stora projekt måste underhållas. 

Jag stötte egentligen inte direkt på några större problem under momentet, det gick väldigt smidigt hela vägen. Jag fastnade endast en liten stund på att få phpunit att fungera i kommandotolken, hade ett litet problem med att den hela tiden frågade mig vilket 
externt program jag vill använda för att behandla .phar filer. Men efter att snabbt ha fått hjälp på forumet och skapat en .bat fil så att jag slipper använda .phar ändelsen, så löste det sig.

Det gick bra för mig att skapa testfall med phpunit, det var inga direkta svårgiheter. Men jag känner att det snabbt kan bli betydligt mer avancerat. Den modulen jag skapade i föregående kursmoment var mycket enkel, vilket gjorde att även testfallen inte heller behövde vara särskilt avancerade.
Med hjälp av artiklarna samt övningarna så kände jag mig ganska bekväm direkt med att utforma egna tester. Överlag känns det som ett väldigt bra verktyg, och jag tror att man kommer att ha stor nytta av det i framtiden. Men precis som man fick läsa i artiklarna så känns det som
att man enkelt hoppar över de automatiska testerna för att man tror att man sparar tid på detta. Men framförallt i större projekt så kommer det säkert löna sig i slutändan.

Det gick förvånansvärt enkelt att interagera alltihopa med både Travis och Scrutinizer, kändes som det mesta skedde automatiskt, eftersom man kunde synca allt via GitHub. Och bara genom att lägga till någon enstaka rad test i .yml filerna så fungerade allt som tänkt.
Det fanns mycket intressant data att titta på i analyserna, och jag ser framemot att testa dem på något större projekt som man själv utvecklat, och se vad man får för feedback.

I början av momentet när jag började med att läsa igenom allt snabbt, och läste artiklarna så trodde jag att allt skulle bli mycket krångligar än vad det var. Det kändes som att väldigt många komponenter skulle kommunicera och att det skulle bli struligt att få ihop allt.
Men som sagt så verkade det mesta lösa sig till synes automatiskt. Kändes som väldigt bra och smidiga verktyg att använda sig av. Det finns säkert väldigt mycke mer att lära sig om phpunit, travis och scrutinizer, men jag känner att man fick en mycket bra grundläggande förståelse för vad 
dessa verktyg erbjuder och hur de fungerar.

Känner att jag lärde mig mycket nyttigt i detta moment, och är nöjd med resultatet.

Kmom05: Bygg ut ramverket
-------------------------

Detta kursmoment kändes lite mindre omfattande än de föregående, vilket var en välkommen förändring då jag behöver komma ikapp med några uppgifter. Jag valde att göra en modul för att skapa flash-meddelanden i sessionen, vilket var ett av förslagen för uppgiften.
Jag valde detta för att det helt enkelt kändes som att de andra förslagen var mer omfattande, och skulle ta längre tid att utföra. Samtidigt känns det som att flash-meddelanden kan vara till stor nytta i flera projekt. Flera andra föslag verkade intressanta men
eftersom jag känner att jag lagt ner väldigt mycket tid på tidigare kursmoment så behöver jag komma ikapp lite, och valde därmed det som kändes enklast. Jag behövde inte utgå ifrån någon färdig kodbas utan kunde skapa allt själv från grunden, vilket kändes bra.

Det var inga svårigheter att lägga upp modulen på GitHub och Packagist. Förväntade mig att det skulle uppstå problem eftersom instruktionerna sa att det kunde vara klurigt, men så blev inte fallet som tur var. Detta var delvis tack vare att man kunde se hur andra 
studenter hade gjort, samt läraren egna exempel som man tidigare använt under kursen. Så det gick väldigt smärtfritt att integrera modulen i mitt egna ramverk.

Det var inte särksilt mycket kod som behövde skrivas, och därmed behövdes det inte väldigt mycket dokumentation. Jag skrev lite i en README fil var syftet med paketet är, sedan skapade jag även ett exempel i en php fil som visar enkelt hur man kan göra för att använda 
FlashInfo klassen. Därmed känns det som att vem som helt bör kunna använda modulen med det material som jag gjort tillgängligt. Det var inga problem som sagt att inkludera projektet i mitt egna ramverk.

Jag hann tyvärr inte göra extrauppgiften på detta kursmoment. Men jag kommer att ta en titt på vad andra studenter valt att göra för moduler, och kanske om jag hinner kan jag inkludera dem i mitt egna ramverk vid ett senare tillfälle.

Kmom04: Databasdrivna modeller
------------------------------

Detta kursmoment kändes väldigt omfattande. Det tog väldigt lång tid att läsa allt material, samt att sedan göra övningarna och uppgifterna, det tog en hel vecka för mig att till slut bli färdig. Men samtidigt känner jag nu att en hel del lossnade för mig och jag förstår Anax-MVC ramverket mycket bättre nu.
Jag hade inte alls lika svårt för att förstå koden som behandlades under övningarna, och sedan göra egna ändringar för att lösa uppgifterna. Jag kände mig mycket bekvämare nu med ramverket. Jag tycker att övningarna var mycket bra uppbyggda, med ganska mycket hjälp, det var nog det jag behövde för att komma igång och förstå ramverkets struktur bättre.
Efter att ha gjort övningen med Användar-hantering så var inte uppgiften särskilt svår, och sedan gjorde man i princip samma sak för kommentarerna. Även om det tog sin tid och inte gick så väldigt snabbt frammåt emellanåt så fastnade jag inte lika ofta som i tidigare moment när man hade svårt att förstå vad som händer.

Sättet som man nu kan hantera formulär tcker jag känns väldigt bra och smidigt. Jag har ingen erfarenhet av att göra på något liknande sätt, men jag kommer säkert att fortsätta göra på detta sättet, jag gillade det starkt.

Även databashanteringen kändes väldigt bra. Det blev väldigt snygg kod tycker jag. Metoderna i kontrollerna blev inte särskilt långa, och mycket tydligare än vad de tidigare har varit. Det kändes bra att få bygg upp basklassen för modellerna själv från början under övningarna, detta hjälpe mig oerhört mycket att förstå flera delar av ramverket som tidigare inte varit så tydliga för mig.
Konceptet för databashantering kommer jag säkert fortsätta använda i framtiden.

Jag gjorde inga egna tillägg till basklassen för modellerna som utvecklades, jag höll mig till instruktionerna och tyckte att det var tillräckligt för tillfället.

Funktionsmässigt så fungerar kommentarerna på samma sätt som tidigare, där blev det inga nyheter. Det gick smidigt att flytta över dem till databasen i den nya strukturen och med databashanteraren. Jag gillar att det blir tydliga indelningar i ansvarsområden bland klasser, med modeller och kontroller. Har tagit lite tid att vänja sig vid det men nu känns det bättre.
För att skapa ett egent kommentarsflöde för varje sida som har kommentarer så gjorde jag så att en parameter som skickas med till den metoden i kommentar-kontrollern som hämtar kommentarerna, och för varje sida så har den ett specifikt värde, jag valde att skicka med 'routen' som parameter. Den sparas sedan med varje ny kommentar i databasen för att avgöra vilken sida varje kommentar tillhör.

Jag gjorde inte extrauppgiften på detta kursmoment, tiden räckte inte till.

Kursmomentet tog som sagt vädligt lång tid att utföra, främst pga. att det var väldigt mycket material, men jag känner mig ganska nöjd med resultatet, och jag lärde mig väldigt mycket nytt igen.

Kmom03: Bygg ett eget tema
--------------------------

Detta moment var intressant, och behandlade något som jag tidigare inte alls stött på. Det var väldigt mycket nytt igen, en hel del kod som lades till och hämtades från färdiga komponenter. Detta moment gav mig absolut ett nytt sätt att tänka när det kommer till att utforma en webbsida.
Jag har tidigare inte suttit alls mycket med design eller utformandet av GUI, men jag tycker det faktiskt är ganska roligt när man väl kommer in i det. Man märker att det krävs en hel del övning för att lyckas skapa fina designer, vilket jag ännu inte är särskilt bra på, men hoppas på att bli bättre.
Sättet som ett tema byggdes upp på kändes väldigt smidigt när det väl började fungera. Men det var en hel del förvirrande moment i början innan man förstod vad man höll på med.

Jag lärde mig mycket på att titta på andra ramverk, och att se mycket mer om hur just design delen av en webbsida kan utformas med CSS och Less. Less har jag aldrig tidigare använt, och de ramverk som detta moment behandlade var helt nya för mig, jag har endast läst och hört lite om bootstrap sedan tidigare.
Samtliga delar som användes under detta moment kändes som de samverkade på ett bra och smidigt sätt, och jag känner att man definitivt kommer att ha nytta av dem i framtiden. Men jag känner fortfarande att det var ganska mycket som jag inte ännu har full koll på, det kändes som att det var väldigt mycket nytt att få grepp om i detta moment.
Det kommer krävas en de repetition innan jag känner mig helt bekväm i att använda alla dessa ramverk. Men själva principen för hur det fungerar gillade jag, och jag känner att jag fick en bra grundläggande förståelse för hur det är tänkt att användas och fungera.

Den grid-baserade layouten som gjordes i övningen tycker jag känns mycket bra, den ger mig väldigt många alternativ. Finns många utrymmen som kan användas för innehåll, och det var väldigt smidigt att kunna skapa flera mindre vyer som i sin tur placeras i specifika "utrymmen".
Jag tycker att det såg snyggt ut, väldigt mycket snyggare än det jag tidigare använt mig av där det oftast bara ser väldigt oorganiserat ut om man har lite mer innehåll på en sida. Det gör stor skillnad att kunna organisera allt både vertikalt och horisontellt.

Ramverken Font Awesome, Bootstrap samt Normalize känns oerhört användbara. Dessa kommer man garanterat ha stor nytta av i framtiden, framför allt om man själv inte är väldigt duktig på att designa egna saker. Genom att använda dessa ramverk så blir det enkelt att lyckas skapa en mycket mer tilltalande webbsida.
Man märker stor skillnad på utseendet på webbsidor som använder sig av ikoner och designade knappar/formulär etc. jämfört med de sidor som inte gör det. Jag kommer att titta närmare på dessa ramverk och säkert använda dem mer i framtiden.

Jag gjorde inga större ändringar i mitt tema, jag kände att det var väldigt mycket ny information som man behövde få grepp om, och jag fokuserade hellre på att lära mig grunderna. Jag hann helt enkelt inte med att lägg ner mer tid på detta moment för att hinna med kursens tidsplan. Jag hann ännu inte göra extrauppgifterna heller,
men hoppas att jag kommer att hinna med dem senare om jag får tid över. Överlag känner jag att samtliga moment i denna kurs har tagit mycket längre tid än i tidigare kurser, det är svårare uppgifter och ganska mycket mer att göra.

Kmom02: Kontroller och modeller
-------------------------------

Detta var verkligen inget enkelt kursmoment anser jag. Jag stötte på väldigt mycket problem som har tagit mycket tid att lösa. Grunden till alla problem är så klart att jag är rätt obekväm med den nya MVC strukturen,
jag finner det väldigt svårt att följa flödet emellanåt, och sådant som känns som väldigt små problem eller uppgifter tar plötsligt väldigt lång tid att lösa. Men under uppgiftens gång har min förståelse förbättrats en hel del, men samtidigt känner jag att det är mycket som fortfarande måste få falla på plats.
Jag var tvungen att se efter hur andra löst några grejer emellanåt, för att själv kunna komma vidare. Till en början var det mycket förvirrande hur variabler skickades och sattes, men det klarnade under momentets gång.

Problemen började direkt med övningarna innan själva uppgiften. Jag har tidigare inte använt kommandoraden särskilt mycket, och kunde inte riktigt få rätt på PHP kommandon, och hade därmed även problem med Composer. Efter att ha försökt om och om igen fick jag lite hjälp på forumet, och testade därefter ett par gånger igen.'
Tillslut löste sig problemen, efter att jag märkt att datorn behövde startas om innan sökvägen till php.exe filen började fungera, sedan behövde kommandotolken även öppnas i "administrativt läge" för att kunna genomföra installationer. Detta gäller alltså på Windows 8.
Jag lärde mig i alla fall att använda kommandotolken, vilket är väldigt nyttigt.

Känner inte att jag har särkilt bra koll på hur Packagist fungerar ännu. Svårt att säga vad jag tycker om det i dagsläget, men i teorin låter det onekligen väldigt bra och smidigt att använda. Det lilla jag använde de det till gick bra till slut.
Hittade ännu inget nytt att lägga till i mitt ramverk, övningarna och uppgifterna tog så lång tid att utföra så det blev helt enkelt ingen tid över.

Termerna som används för det nya MVC ramverket är helt klart förvirrande nu i början. Man får en bild av vad de innebär genom litteraturen och artiklarna, men när jag väl satte igång med uppgifterna så var det fortfarande ganska oklart hur jag skulle gå tillväga, och det var inte så enkelt att följa med i flödet.
Men efter att ha kämpat ett bra tag med detta moment så blev det till slut klart. När jag studerar koden i efterhand så ser det inte så krångligt ut som det kändes emellanåt, och jag känner att strukturen kommer vara väldigt bra att använda när man väl lärt sig att använda den ordentligt.
Mycket tid gick åt att experimentera och se vad som hände med variabler fram och tillbaka, även se igenom alla klasser för att få lite överblick över vad som gjordes var. Men känner väll att jag har i all fall någorlunda koll på de delar som detta moment behandlade. Men det kommer säkert att krävas en hel del repetition.
Även om jag läste om sättet som "router" byggdes upp med controller, action och parametrar i artiklarna så tog det ett tag för mig att få rätt på det när jag själv skulle implementera det. Det var först precis i slutet när jag blev klar med uppgiften som jag kände att vissa delar klarnade mer för mig.

Jag kände att sättet som IDn på kommentarer tilldelades och användes var lite lurigt. Och det ställde till en hel del problem för mig när jag skulle implementera funktionalitet för edit/remove på enskilda kommentarer. Jag kände mig dock inte tillräckligt bekväm ännu för att börja ändra särskilt mycket saker, 
utan jag byggde på lite egna delar för att göra saker lite enklare för mig själv. Det resulterade visserligen i att vissa delar blev lite bundna tillvarandra, och onödiga beroenden skapades, vilket inte är så bra, men jag kände att det var nödvändigt nu i början när jag mest ville få allt att fungera. 
Sedan kan det förbättras i efterhand när jag känner mig mer bekväm med ramverket.

Ett knepigt moment som tog lång tid att genomföra, men känner att små bitar faller på plats hela tiden när man sitter och gör uppgifterna.

Kmom01: PHP-baserade och MVC-inspirerade ramverk
------------------------------------------------

Detta första kursmoment tycker jag var intressant, absolut lärorikt men också ganska förvirrande. Det var väldigt mycket nytt, saker görs/organiseras och struktureras på ett helt annat sätt jämfört med hur det såg ut i tidigare kurser.
Det var inte helt enkelt att förstå flödet i all kod, och var ändringar skulle göras för att uppnå önskat resultat. Men efter att ha studerat koden en hel del, och lekt runt lite, så känner jag att man ändå fick en rätt så bra överblick nu över hur det är tänkt att fungera.
Det tar säkert några uppgifter till innan man kommer in i flödet helt. Först förstod jag inte hur man skulle implementera egna klasser i flödet, då jag inte helt förstod hela flödet. Men jag tror jag förstår nu efter att ha gjort extra uppgiften med tärningsspelet.

Jag fortsätter att använda samma utvecklingsmiljö som jag använt i de två tidigare kurserna. Alltså det som först rekommenderades, Firefox webbläsare, jEdit som texteditor och FileZilla. Jag har Windows 8 installerat som OS.
Jag har lite erfarenhet av att arbeta med ramverk sedan tidigare, har suttit med bl.a .NET för några år sedan. Men ramverk och webbutveckling är en ny kompott för mig. MVC verkar onekligen mycket smidigt när det väl fungerar, och jag ser framemot att lära mig mer om det.

Flera av de "avancerade" begreppen som behandlades under detta moment är jag bekant med sedan tidigare. Men flera av begreppen är sådant som jag läst en del om, men kanske aldrig riktigt applicerat, så det var bra repetition och man lär sig alltid något nytt ändå. Jag ser framemot att
lära mig mer om designmönster och använda mig av dem i större utsträckning är jag gjort tidigare. Några grejer är dock helt nya, som t.ex. "Dependency Injection" är en ny term. Även om själva konceptet inte är helt nytt.

Jag tycker att Anax-MVC verkar spännande, och även om det för tillfället är ganska mycket som känns lite oklart, så känner jag att det helt klart kommer att vara ett mycket bra verktyg om man lär sig det ordentligt. Det kommer säkert att bli en mycket intressant kurs!
