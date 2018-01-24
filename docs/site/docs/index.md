title: Documentation — RTDS - Radio Tagging Data Schema
template: index
expanded_header: false
===

## Presentation {#presentation}

RTDS stands for "Radio Tagging Data Schema". It's a standard JSON object that have to be provided by radios stations to applications like radio players. RTDS aims to standardize the way that tags are formated while streaming softwares like Shoutcast or Icecast still expose just a string containing the artist and the title.

## Communication protocol {#communication-protocol}

### For radios {#for-radios}

Computing your RTDS object may be a long task. It is recommended to compute it asynchronously from application calls. For example, at each song change, you will have to change and compute data inside your object, then keep it in a cache for every applications that will call for it after.

### For applications {#for-applications}

You have to provide radio producers a field where they will put the URL of their RTDS object. Then, just call the URL and parse the JSON data to get all data you need in your application.

## Object description {#object-description}

### First level objects {#first-level-objects}

In order to make your RTDS object full, you need to specify many informations in it.

~~~~json
{
	"status": {…},
	"radio": {…},
	"streams": […],
	"tags": {…},
	"show": {…}
}
~~~~

### status {#object-status}

Mandatory object that describes the status of the request.

~~~~json
{
	"status": {
		"code": 200,
		"message": "Success.",
		"available_data": ["radio", "streams", "tags", "show"]
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| code | integer | Status code of the query. |
| message | string | Message associated to describe status. |
| available_data | array of strings | An array that contains every first level keys. |

The status object allows you to describe how the request were completed. This is the only mandatory field while every other ones have not to be provided. This allows you to implement only "tags" for example, and also it will make it easy for RTDS to implement new services without requiring you to update your object structure at each update.

Available codes possibles and their meanings:

| Code | Meaning |
|------|---------|
|  200 | Success. The object has been correctly retrieved. |
|  301 | Permanent redirection. |
|  302 | Temporary redirection. |
|  401 | Error. User not authenticated. |
|  403 | Error. Access not allowed. |
|  404 | Error. Data was not found. |
|  503 | Error. The server has encountered an error while retrieving data. |
|  504 | Error. The server did not respond. |

See [wikipedia](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes) for more HTTP codes.

### radio {#object-radio}

Description of your radio.

~~~~json
{
	"radio": {
		"name": "Utopic",
		"slogan": "Bonne Humeur Garantie",
		"description": "Écoute Utopic, et déguste une dose de bonheur enrobée d'énergie sur son coulis de légèreté.",
		"images": [
			{
				"type": "vectorial",
				"format": "free",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=svg"
			},
			{
				"type": "vectorial",
				"format": "square",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=svg"
			},
			{
				"type": "pixel",
				"format": "free",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=png&w=800",
				"width": 800,
				"height": 422
			},
			{
				"type": "pixel",
				"format": "square",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=png&w=800",
				"width": 800
			}
		],
		"coordinates": {
			"type": "non-profit",
			"organisation": "Spicevent Association",
			"address": "…",
			"zip": "00000",
			"city": "…",
			"country": "France",
			"phones": [
				{
					"type": "main",
					"number": "+33979980118"
				}
			]
		},
		"genres": ["Hits", "Feel good", "Top 40", "Variety"],
		"urls": {
			"web": "https://utopicradio.com/",
			"self": "https://utopicradio.com/tags",
			"social": [
				{
					"type": "facebook",
					"url": "https://facebook.com/utopicradio"
				},
				{
					"type": "twitter",
					"url": "https://twitter.com/utopicradio"
				}
			],
			"extra": […]
		},
		"extra": […]
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| name | string | Name of the radio. |
| slogan | string | Your radio slogan. |
| description | string | A long description of your radio. |
| images | array of [images](#object-image) | An array of images/logos/banners/… representing the radio. See [images](#object-image) for more details. |
| coordinates | object [coordinates](#object-coordinates) | Coordinates of the head office of your radio. See [coordinates](#object-coordinates) for more details. |
| genres | array of strings | Main genres of your radio. See the list of [genres](#list-genres) below. |
| urls | object [url](#object-url) | URLs associated to your radio. See [url](#object-url) for more details. |
| extra | array | Extra data you can provide about your radio inside the RTDS object. |

#### Non-exhaustive list of genres {#list-genres}

Choose wisely:

<div class="overflow">
	<dl>
		<dt>#</dt>
		<dd>2 tone</dd>
		<dd>2-step garage</dd>
		<dd>4-beat</dd>
		<dd>4x4 garage</dd>
		<dd>8-bit</dd>
	</dl>
	<dl>
		<dt>A</dt>
		<dd>acapella</dd>
		<dd>acid</dd>
		<dd>acid breaks</dd>
		<dd>acid house</dd>
		<dd>acid jazz</dd>
		<dd>acid rock</dd>
		<dd>acoustic music</dd>
		<dd>acousticana</dd>
		<dd>adult contemporary music</dd>
		<dd>african popular music</dd>
		<dd>african rumba</dd>
		<dd>afrobeat</dd>
		<dd>aleatoric music</dd>
		<dd>alternative country</dd>
		<dd>alternative dance</dd>
		<dd>alternative hip hop</dd>
		<dd>alternative metal</dd>
		<dd>alternative rock</dd>
		<dd>ambient</dd>
		<dd>ambient house</dd>
		<dd>ambient music</dd>
		<dd>americana</dd>
		<dd>anarcho punk</dd>
		<dd>anti-folk</dd>
		<dd>apala</dd>
		<dd>ape haters</dd>
		<dd>arab pop</dd>
		<dd>arabesque</dd>
		<dd>arabic pop</dd>
		<dd>argentine rock</dd>
		<dd>ars antiqua</dd>
		<dd>ars nova</dd>
		<dd>art punk</dd>
		<dd>art rock</dd>
		<dd>ashiq</dd>
		<dd>asian american jazz</dd>
		<dd>australian country music</dd>
		<dd>australian hip hop</dd>
		<dd>australian pub rock</dd>
		<dd>austropop</dd>
		<dd>avant-garde</dd>
		<dd>avant-garde jazz</dd>
		<dd>avant-garde metal</dd>
		<dd>avant-garde music</dd>
		<dd>axé</dd>
	</dl>
	<dl>
		<dt>B</dt>
		<dd>bac-bal</dd>
		<dd>bachata</dd>
		<dd>baggy</dd>
		<dd>baila</dd>
		<dd>baile funk</dd>
		<dd>baisha xiyue</dd>
		<dd>baithak gana</dd>
		<dd>baião</dd>
		<dd>bajourou</dd>
		<dd>bakersfield sound</dd>
		<dd>bakou</dd>
		<dd>bakshy</dd>
		<dd>bal-musette</dd>
		<dd>balakadri</dd>
		<dd>balinese gamelan</dd>
		<dd>balkan pop</dd>
		<dd>ballad</dd>
		<dd>ballata</dd>
		<dd>ballet</dd>
		<dd>bamboo band</dd>
		<dd>bambuco</dd>
		<dd>banda</dd>
		<dd>bangsawan</dd>
		<dd>bantowbol</dd>
		<dd>barbershop music</dd>
		<dd>barndance</dd>
		<dd>baroque</dd>
		<dd>baroque music</dd>
		<dd>baroque pop</dd>
		<dd>bass music</dd>
		<dd>batcave</dd>
		<dd>batucada</dd>
		<dd>batuco</dd>
		<dd>batá-rumba</dd>
		<dd>beach music</dd>
		<dd>beat</dd>
		<dd>beatboxing</dd>
		<dd>beautiful music</dd>
		<dd>bebop</dd>
		<dd>beiguan</dd>
		<dd>bel canto</dd>
		<dd>bend-skin</dd>
		<dd>benga</dd>
		<dd>berlin school of electronic music</dd>
		<dd>bhajan</dd>
		<dd>bhangra</dd>
		<dd>bhangra-wine</dd>
		<dd>bhangragga</dd>
		<dd>bhangramuffin</dd>
		<dd>big band</dd>
		<dd>big band music</dd>
		<dd>big beat</dd>
		<dd>biguine</dd>
		<dd>bihu</dd>
		<dd>bikutsi</dd>
		<dd>biomusic</dd>
		<dd>bitcore</dd>
		<dd>bitpop</dd>
		<dd>black metal</dd>
		<dd>blackened death metal</dd>
		<dd>blue-eyed soul</dd>
		<dd>bluegrass</dd>
		<dd>blues</dd>
		<dd>blues ballad</dd>
		<dd>blues-rock</dd>
		<dd>boogie</dd>
		<dd>boogie woogie</dd>
		<dd>boogie-woogie</dd>
		<dd>bossa nova</dd>
		<dd>brass band</dd>
		<dd>brazilian funk</dd>
		<dd>brazilian jazz</dd>
		<dd>breakbeat</dd>
		<dd>breakbeat hardcore</dd>
		<dd>breakcore</dd>
		<dd>breton music</dd>
		<dd>brill building pop</dd>
		<dd>britfunk</dd>
		<dd>british blues</dd>
		<dd>british invasion</dd>
		<dd>britpop</dd>
		<dd>broken beat</dd>
		<dd>brown-eyed soul</dd>
		<dd>brukdown</dd>
		<dd>brutal death metal</dd>
		<dd>bubblegum dance</dd>
		<dd>bubblegum pop</dd>
		<dd>bulerias</dd>
		<dd>bumba-meu-boi</dd>
		<dd>bunraku</dd>
		<dd>burger-highlife</dd>
		<dd>burgundian school</dd>
		<dd>byzantine chant</dd>
	</dl>
	<dl>
		<dt>C</dt>
		<dd>ca din tulnic</dd>
		<dd>ca pe lunca</dd>
		<dd>ca trù</dd>
		<dd>cabaret</dd>
		<dd>cadence</dd>
		<dd>cadence rampa</dd>
		<dd>cadence-lypso</dd>
		<dd>café-aman</dd>
		<dd>cai luong</dd>
		<dd>cajun music</dd>
		<dd>cakewalk</dd>
		<dd>calenda</dd>
		<dd>calentanos</dd>
		<dd>calgia</dd>
		<dd>calypso</dd>
		<dd>calypso jazz</dd>
		<dd>calypso-style baila</dd>
		<dd>campursari</dd>
		<dd>canatronic</dd>
		<dd>candombe</dd>
		<dd>canon</dd>
		<dd>canrock</dd>
		<dd>cantata</dd>
		<dd>cante chico</dd>
		<dd>cante jondo</dd>
		<dd>canterbury scene</dd>
		<dd>cantiga</dd>
		<dd>cantique</dd>
		<dd>cantiñas</dd>
		<dd>canto livre</dd>
		<dd>canto nuevo</dd>
		<dd>canto popular</dd>
		<dd>cantopop</dd>
		<dd>canzone napoletana</dd>
		<dd>cape jazz</dd>
		<dd>capoeira music</dd>
		<dd>caracoles</dd>
		<dd>carceleras</dd>
		<dd>cardas</dd>
		<dd>cardiowave</dd>
		<dd>carimbó</dd>
		<dd>cariso</dd>
		<dd>carnatic music</dd>
		<dd>carol</dd>
		<dd>cartageneras</dd>
		<dd>cassette culture</dd>
		<dd>casséy-co</dd>
		<dd>cavacha</dd>
		<dd>caveman</dd>
		<dd>caña</dd>
		<dd>celempungan</dd>
		<dd>cello rock</dd>
		<dd>celtic</dd>
		<dd>celtic fusion</dd>
		<dd>celtic metal</dd>
		<dd>celtic punk</dd>
		<dd>celtic reggae</dd>
		<dd>celtic rock</dd>
		<dd>cha-cha-cha</dd>
		<dd>chakacha</dd>
		<dd>chalga</dd>
		<dd>chamamé</dd>
		<dd>chamber jazz</dd>
		<dd>chamber music</dd>
		<dd>chamber pop</dd>
		<dd>champeta</dd>
		<dd>changuí</dd>
		<dd>chanson</dd>
		<dd>chant</dd>
		<dd>charanga</dd>
		<dd>charanga-vallenata</dd>
		<dd>charikawi</dd>
		<dd>chastushki</dd>
		<dd>chau van</dd>
		<dd>chemical breaks</dd>
		<dd>chicago blues</dd>
		<dd>chicago house</dd>
		<dd>chicago soul</dd>
		<dd>chicano rap</dd>
		<dd>chicha</dd>
		<dd>chicken scratch</dd>
		<dd>children's music</dd>
		<dd>chillout</dd>
		<dd>chillwave</dd>
		<dd>chimurenga</dd>
		<dd>chinese music</dd>
		<dd>chinese pop</dd>
		<dd>chinese rock</dd>
		<dd>chip music</dd>
		<dd>cho-kantrum</dd>
		<dd>chongak</dd>
		<dd>chopera</dd>
		<dd>chorinho</dd>
		<dd>choro</dd>
		<dd>chouval bwa</dd>
		<dd>chowtal</dd>
		<dd>christian alternative</dd>
		<dd>christian black metal</dd>
		<dd>christian electronic music</dd>
		<dd>christian hardcore</dd>
		<dd>christian hip hop</dd>
		<dd>christian industrial</dd>
		<dd>christian metal</dd>
		<dd>christian music</dd>
		<dd>christian punk</dd>
		<dd>christian r&b</dd>
		<dd>christian rock</dd>
		<dd>christian ska</dd>
		<dd>christmas carol</dd>
		<dd>christmas music</dd>
		<dd>chumba</dd>
		<dd>chut-kai-pang</dd>
		<dd>chutney</dd>
		<dd>chutney soca</dd>
		<dd>chutney-bhangra</dd>
		<dd>chutney-hip hop</dd>
		<dd>chutney-soca</dd>
		<dd>chylandyk</dd>
		<dd>chzalni</dd>
		<dd>chèo</dd>
		<dd>cigányzene</dd>
		<dd>classic</dd>
		<dd>classic country</dd>
		<dd>classic female blues</dd>
		<dd>classic rock</dd>
		<dd>classical</dd>
		<dd>classical music</dd>
		<dd>classical music era</dd>
		<dd>clicks n cuts</dd>
		<dd>close harmony</dd>
		<dd>club music</dd>
		<dd>cocobale</dd>
		<dd>coimbra fado</dd>
		<dd>coladeira</dd>
		<dd>colombianas</dd>
		<dd>combined rhythm</dd>
		<dd>comedy</dd>
		<dd>comedy rap</dd>
		<dd>comedy rock</dd>
		<dd>comic opera</dd>
		<dd>comparsa</dd>
		<dd>compas direct</dd>
		<dd>compas meringue</dd>
		<dd>concert overture</dd>
		<dd>concerto</dd>
		<dd>concerto grosso</dd>
		<dd>congo</dd>
		<dd>conjunto</dd>
		<dd>contemporary christian</dd>
		<dd>contemporary christian music</dd>
		<dd>contemporary classical</dd>
		<dd>contemporary r&b</dd>
		<dd>contonbley</dd>
		<dd>contradanza</dd>
		<dd>cool jazz</dd>
		<dd>corrido</dd>
		<dd>corsican polyphonic song</dd>
		<dd>cothoza mfana</dd>
		<dd>country</dd>
		<dd>country blues</dd>
		<dd>country gospel</dd>
		<dd>country music</dd>
		<dd>country pop</dd>
		<dd>country r&b</dd>
		<dd>country rock</dd>
		<dd>country-rap</dd>
		<dd>countrypolitan</dd>
		<dd>couple de sonneurs</dd>
		<dd>coupé-décalé</dd>
		<dd>cowpunk</dd>
		<dd>cretan music</dd>
		<dd>crossover jazz</dd>
		<dd>crossover music</dd>
		<dd>crossover thrash</dd>
		<dd>crossover thrash metal</dd>
		<dd>crunk</dd>
		<dd>crunk&b</dd>
		<dd>crunkcore</dd>
		<dd>crust punk</dd>
		<dd>csárdás</dd>
		<dd>cuarteto</dd>
		<dd>cuban rumba</dd>
		<dd>cuddlecore</dd>
		<dd>cueca</dd>
		<dd>cumbia</dd>
		<dd>cumbia villera</dd>
		<dd>cybergrind</dd>
	</dl>
	<dl>
		<dt>D</dt>
		<dd>dabka</dd>
		<dd>dadra</dd>
		<dd>daina</dd>
		<dd>dalauna</dd>
		<dd>dance</dd>
		<dd>dance music</dd>
		<dd>dance-pop</dd>
		<dd>dance-punk</dd>
		<dd>dance-rock</dd>
		<dd>dancehall</dd>
		<dd>dangdut</dd>
		<dd>danger music</dd>
		<dd>dansband</dd>
		<dd>danza</dd>
		<dd>danzón</dd>
		<dd>dark ambient</dd>
		<dd>dark cabaret</dd>
		<dd>dark pop</dd>
		<dd>darkcore</dd>
		<dd>darkstep</dd>
		<dd>darkwave</dd>
		<dd>de ascultat la servici</dd>
		<dd>de codru</dd>
		<dd>de dragoste</dd>
		<dd>de jale</dd>
		<dd>de pahar</dd>
		<dd>death industrial</dd>
		<dd>death metal</dd>
		<dd>death rock</dd>
		<dd>death/doom</dd>
		<dd>deathcore</dd>
		<dd>deathgrind</dd>
		<dd>deathrock</dd>
		<dd>deep funk</dd>
		<dd>deep house</dd>
		<dd>deep soul</dd>
		<dd>degung</dd>
		<dd>delta blues</dd>
		<dd>dementia</dd>
		<dd>desert rock</dd>
		<dd>desi</dd>
		<dd>detroit blues</dd>
		<dd>detroit techno</dd>
		<dd>dhamar</dd>
		<dd>dhimotiká</dd>
		<dd>dhrupad</dd>
		<dd>dhun</dd>
		<dd>digital hardcore</dd>
		<dd>dirge</dd>
		<dd>dirty dutch</dd>
		<dd>dirty rap</dd>
		<dd>dirty rap/pornocore</dd>
		<dd>dirty south</dd>
		<dd>disco</dd>
		<dd>disco house</dd>
		<dd>disco polo</dd>
		<dd>disney</dd>
		<dd>disney hardcore</dd>
		<dd>disney pop</dd>
		<dd>diva house</dd>
		<dd>divine rock</dd>
		<dd>dixieland</dd>
		<dd>dixieland jazz</dd>
		<dd>djambadon</dd>
		<dd>djent</dd>
		<dd>dodompa</dd>
		<dd>doina</dd>
		<dd>dombola</dd>
		<dd>dondang sayang</dd>
		<dd>donegal fiddle tradition</dd>
		<dd>dongjing</dd>
		<dd>doo wop</dd>
		<dd>doom metal</dd>
		<dd>doomcore</dd>
		<dd>downtempo</dd>
		<dd>drag</dd>
		<dd>dream pop</dd>
		<dd>drone doom</dd>
		<dd>drone metal</dd>
		<dd>drone music</dd>
		<dd>dronology</dd>
		<dd>drum and bass</dd>
		<dd>dub</dd>
		<dd>dub house</dd>
		<dd>dubanguthu</dd>
		<dd>dubstep</dd>
		<dd>dubtronica</dd>
		<dd>dunedin sound</dd>
		<dd>dunun</dd>
		<dd>dutch jazz</dd>
		<dd>décima</dd>
	</dl>
	<dl>
		<dt>E</dt>
		<dd>early music</dd>
		<dd>east coast blues</dd>
		<dd>east coast hip hop</dd>
		<dd>easy listening</dd>
		<dd>electric blues</dd>
		<dd>electric folk</dd>
		<dd>electro</dd>
		<dd>electro backbeat</dd>
		<dd>electro hop</dd>
		<dd>electro house</dd>
		<dd>electro punk</dd>
		<dd>electro-industrial</dd>
		<dd>electro-swing</dd>
		<dd>electroclash</dd>
		<dd>electrofunk</dd>
		<dd>electronic</dd>
		<dd>electronic art music</dd>
		<dd>electronic body music</dd>
		<dd>electronic dance</dd>
		<dd>electronic luk thung</dd>
		<dd>electronic music</dd>
		<dd>electronic rock</dd>
		<dd>electronica</dd>
		<dd>electropop</dd>
		<dd>elevator music</dd>
		<dd>emo</dd>
		<dd>emo pop</dd>
		<dd>emo rap</dd>
		<dd>emocore</dd>
		<dd>emotronic</dd>
		<dd>enka</dd>
		<dd>eremwu eu</dd>
		<dd>ethereal pop</dd>
		<dd>ethereal wave</dd>
		<dd>euro</dd>
		<dd>euro disco</dd>
		<dd>eurobeat</dd>
		<dd>eurodance</dd>
		<dd>europop</dd>
		<dd>eurotrance</dd>
		<dd>eurourban</dd>
		<dd>exotica</dd>
		<dd>experimental music</dd>
		<dd>experimental noise</dd>
		<dd>experimental pop</dd>
		<dd>experimental rock</dd>
		<dd>extreme metal</dd>
		<dd>ezengileer</dd>
	</dl>
	<dl>
		<dt>F</dt>
		<dd>fado</dd>
		<dd>falak</dd>
		<dd>fandango</dd>
		<dd>farruca</dd>
		<dd>fife and drum blues</dd>
		<dd>filk</dd>
		<dd>film score</dd>
		<dd>filmi</dd>
		<dd>filmi-ghazal</dd>
		<dd>finger-style</dd>
		<dd>fjatpangarri</dd>
		<dd>flamenco</dd>
		<dd>flamenco rumba</dd>
		<dd>flower power</dd>
		<dd>foaie verde</dd>
		<dd>fofa</dd>
		<dd>folk hop</dd>
		<dd>folk metal</dd>
		<dd>folk music</dd>
		<dd>folk pop</dd>
		<dd>folk punk</dd>
		<dd>folk rock</dd>
		<dd>folktronica</dd>
		<dd>forró</dd>
		<dd>franco-country</dd>
		<dd>freak-folk</dd>
		<dd>freakbeat</dd>
		<dd>free improvisation</dd>
		<dd>free jazz</dd>
		<dd>free music</dd>
		<dd>freestyle</dd>
		<dd>freestyle house</dd>
		<dd>freetekno</dd>
		<dd>french pop</dd>
		<dd>frenchcore</dd>
		<dd>frevo</dd>
		<dd>fricote</dd>
		<dd>fuji</dd>
		<dd>fuji music</dd>
		<dd>fulia</dd>
		<dd>full on</dd>
		<dd>funaná</dd>
		<dd>funeral doom</dd>
		<dd>funk</dd>
		<dd>funk metal</dd>
		<dd>funk rock</dd>
		<dd>funkcore</dd>
		<dd>funky house</dd>
		<dd>furniture music</dd>
		<dd>fusion jazz</dd>
	</dl>
	<dl>
		<dt>G</dt>
		<dd>g-funk</dd>
		<dd>gaana</dd>
		<dd>gabba</dd>
		<dd>gabber</dd>
		<dd>gagaku</dd>
		<dd>gaikyoku</dd>
		<dd>gaita</dd>
		<dd>galant</dd>
		<dd>gamad</dd>
		<dd>gambang kromong</dd>
		<dd>gamelan</dd>
		<dd>gamelan angklung</dd>
		<dd>gamelan bang</dd>
		<dd>gamelan bebonangan</dd>
		<dd>gamelan buh</dd>
		<dd>gamelan degung</dd>
		<dd>gamelan gede</dd>
		<dd>gamelan kebyar</dd>
		<dd>gamelan salendro</dd>
		<dd>gamelan selunding</dd>
		<dd>gamelan semar pegulingan</dd>
		<dd>gamewave</dd>
		<dd>gammeldans</dd>
		<dd>gandrung</dd>
		<dd>gangsta rap</dd>
		<dd>gar</dd>
		<dd>garage rock</dd>
		<dd>garrotin</dd>
		<dd>gavotte</dd>
		<dd>gelugpa chanting</dd>
		<dd>gender wayang</dd>
		<dd>gending</dd>
		<dd>german folk music</dd>
		<dd>gharbi</dd>
		<dd>gharnati</dd>
		<dd>ghazal</dd>
		<dd>ghazal-song</dd>
		<dd>ghetto house</dd>
		<dd>ghettotech</dd>
		<dd>girl group</dd>
		<dd>glam metal</dd>
		<dd>glam punk</dd>
		<dd>glam rock</dd>
		<dd>glitch</dd>
		<dd>gnawa</dd>
		<dd>go-go</dd>
		<dd>goa</dd>
		<dd>goa trance</dd>
		<dd>gong-chime music</dd>
		<dd>goombay</dd>
		<dd>goregrind</dd>
		<dd>goshu ondo</dd>
		<dd>gospel music</dd>
		<dd>gothic metal</dd>
		<dd>gothic rock</dd>
		<dd>granadinas</dd>
		<dd>grebo</dd>
		<dd>gregorian chant</dd>
		<dd>grime</dd>
		<dd>grindcore</dd>
		<dd>groove metal</dd>
		<dd>group sounds</dd>
		<dd>grunge</dd>
		<dd>grupera</dd>
		<dd>guaguanbo</dd>
		<dd>guajira</dd>
		<dd>guasca</dd>
		<dd>guitarra baiana</dd>
		<dd>guitarradas</dd>
		<dd>gumbe</dd>
		<dd>gunchei</dd>
		<dd>gunka</dd>
		<dd>guoyue</dd>
		<dd>gwo ka</dd>
		<dd>gwo ka moderne</dd>
		<dd>gypsy jazz</dd>
		<dd>gypsy punk</dd>
		<dd>gypsybilly</dd>
		<dd>gyu ke</dd>
	</dl>
	<dl>
		<dt>H</dt>
		<dd>habanera</dd>
		<dd>hajnali</dd>
		<dd>hakka</dd>
		<dd>halling</dd>
		<dd>hambo</dd>
		<dd>hands up</dd>
		<dd>hapa haole</dd>
		<dd>happy hardcore</dd>
		<dd>haqibah</dd>
		<dd>hard</dd>
		<dd>hard bop</dd>
		<dd>hard house</dd>
		<dd>hard rock</dd>
		<dd>hard trance</dd>
		<dd>hardcore hip hop</dd>
		<dd>hardcore metal</dd>
		<dd>hardcore punk</dd>
		<dd>hardcore techno</dd>
		<dd>hardstyle</dd>
		<dd>harepa</dd>
		<dd>harmonica blues</dd>
		<dd>hasaposérviko</dd>
		<dd>heart attack</dd>
		<dd>heartland rock</dd>
		<dd>heavy beat</dd>
		<dd>heavy metal</dd>
		<dd>hesher</dd>
		<dd>hi-nrg</dd>
		<dd>highlands</dd>
		<dd>highlife</dd>
		<dd>highlife fusion</dd>
		<dd>hillybilly music</dd>
		<dd>hindustani classical music</dd>
		<dd>hip hop</dd>
		<dd>hip hop & rap</dd>
		<dd>hip hop soul</dd>
		<dd>hip house</dd>
		<dd>hiplife</dd>
		<dd>hiragasy</dd>
		<dd>hiva usu</dd>
		<dd>hong kong and cantonese pop</dd>
		<dd>hong kong english pop</dd>
		<dd>honky tonk</dd>
		<dd>honkyoku</dd>
		<dd>hora lunga</dd>
		<dd>hornpipe</dd>
		<dd>horror punk</dd>
		<dd>horrorcore</dd>
		<dd>horrorcore rap</dd>
		<dd>house</dd>
		<dd>house music</dd>
		<dd>hua'er</dd>
		<dd>huasteco</dd>
		<dd>huayno</dd>
		<dd>hula</dd>
		<dd>humor</dd>
		<dd>humppa</dd>
		<dd>hunguhungu</dd>
		<dd>hyangak</dd>
		<dd>hymn</dd>
		<dd>hyphy</dd>
		<dd>hát chau van</dd>
		<dd>hát chèo</dd>
		<dd>hát cãi luong</dd>
		<dd>hát tuồng</dd>
	</dl>
	<dl>
		<dt>I</dt>
		<dd>ibiza music</dd>
		<dd>icaro</dd>
		<dd>idm</dd>
		<dd>igbo music</dd>
		<dd>ijexá</dd>
		<dd>ilahije</dd>
		<dd>illbient</dd>
		<dd>impressionist music</dd>
		<dd>improvisational</dd>
		<dd>incidental music</dd>
		<dd>indian pop</dd>
		<dd>indie folk</dd>
		<dd>indie music</dd>
		<dd>indie pop</dd>
		<dd>indie rock</dd>
		<dd>indietronica</dd>
		<dd>indo jazz</dd>
		<dd>indo rock</dd>
		<dd>indonesian pop</dd>
		<dd>indoyíftika</dd>
		<dd>industrial death metal</dd>
		<dd>industrial hip-hop</dd>
		<dd>industrial metal</dd>
		<dd>industrial music</dd>
		<dd>industrial musical</dd>
		<dd>industrial rock</dd>
		<dd>instrumental rock</dd>
		<dd>intelligent dance music</dd>
		<dd>international latin</dd>
		<dd>inuit music</dd>
		<dd>iranian pop</dd>
		<dd>irish folk</dd>
		<dd>irish rebel music</dd>
		<dd>iscathamiya</dd>
		<dd>isicathamiya</dd>
		<dd>isikhwela jo</dd>
		<dd>island</dd>
		<dd>isolationist</dd>
		<dd>italo dance</dd>
		<dd>italo disco</dd>
		<dd>italo house</dd>
		<dd>itsmeños</dd>
		<dd>izvorna bosanska muzika</dd>
	</dl>
	<dl>
		<dt>J</dt>
		<dd>j'ouvert</dd>
		<dd>j-fusion</dd>
		<dd>j-pop</dd>
		<dd>j-rock</dd>
		<dd>jaipongan</dd>
		<dd>jaliscienses</dd>
		<dd>jam band</dd>
		<dd>jam rock</dd>
		<dd>jamana kura</dd>
		<dd>jamrieng samai</dd>
		<dd>jangle pop</dd>
		<dd>japanese pop</dd>
		<dd>jarana</dd>
		<dd>jariang</dd>
		<dd>jarochos</dd>
		<dd>jawaiian</dd>
		<dd>jazz</dd>
		<dd>jazz blues</dd>
		<dd>jazz fusion</dd>
		<dd>jazz metal</dd>
		<dd>jazz rap</dd>
		<dd>jazz-funk</dd>
		<dd>jazz-rock</dd>
		<dd>jegog</dd>
		<dd>jenkka</dd>
		<dd>jesus music</dd>
		<dd>jibaro</dd>
		<dd>jig</dd>
		<dd>jig punk</dd>
		<dd>jing ping</dd>
		<dd>jingle</dd>
		<dd>jit</dd>
		<dd>jitterbug</dd>
		<dd>jive</dd>
		<dd>joged</dd>
		<dd>joged bumbung</dd>
		<dd>joik</dd>
		<dd>jonnycore</dd>
		<dd>joropo</dd>
		<dd>jota</dd>
		<dd>jtek</dd>
		<dd>jug band</dd>
		<dd>jujitsu</dd>
		<dd>juju</dd>
		<dd>juke joint blues</dd>
		<dd>jump blues</dd>
		<dd>jumpstyle</dd>
		<dd>jungle</dd>
		<dd>junkanoo</dd>
		<dd>juré</dd>
		<dd>jùjú</dd>
	</dl>
	<dl>
		<dt>K</dt>
		<dd>k-pop</dd>
		<dd>kaba</dd>
		<dd>kabuki</dd>
		<dd>kachāshī</dd>
		<dd>kadans</dd>
		<dd>kagok</dd>
		<dd>kagyupa chanting</dd>
		<dd>kaiso</dd>
		<dd>kalamatianó</dd>
		<dd>kalattuut</dd>
		<dd>kalinda</dd>
		<dd>kamba pop</dd>
		<dd>kan ha diskan</dd>
		<dd>kansas city blues</dd>
		<dd>kantrum</dd>
		<dd>kantádhes</dd>
		<dd>kargyraa</dd>
		<dd>karma</dd>
		<dd>kaseko</dd>
		<dd>katajjaq</dd>
		<dd>kawachi ondo</dd>
		<dd>kayōkyoku</dd>
		<dd>ke-kwe</dd>
		<dd>kebyar</dd>
		<dd>kecak</dd>
		<dd>kecapi suling</dd>
		<dd>kertok</dd>
		<dd>khaleeji</dd>
		<dd>khap</dd>
		<dd>khelimaski djili</dd>
		<dd>khene</dd>
		<dd>khoomei</dd>
		<dd>khorovodi</dd>
		<dd>khplam wai</dd>
		<dd>khrung sai</dd>
		<dd>khyal</dd>
		<dd>kilapanda</dd>
		<dd>kinko</dd>
		<dd>kirtan</dd>
		<dd>kiwi rock</dd>
		<dd>kizomba</dd>
		<dd>klape</dd>
		<dd>klasik</dd>
		<dd>klezmer</dd>
		<dd>kliningan</dd>
		<dd>kléftiko</dd>
		<dd>kochare</dd>
		<dd>kolomyjka</dd>
		<dd>komagaku</dd>
		<dd>kompa</dd>
		<dd>konpa</dd>
		<dd>korean pop</dd>
		<dd>koumpaneia</dd>
		<dd>kpanlogo</dd>
		<dd>krakowiak</dd>
		<dd>krautrock</dd>
		<dd>kriti</dd>
		<dd>kroncong</dd>
		<dd>krump</dd>
		<dd>krzesany</dd>
		<dd>kuduro</dd>
		<dd>kulintang</dd>
		<dd>kulning</dd>
		<dd>kumina</dd>
		<dd>kun-borrk</dd>
		<dd>kundere</dd>
		<dd>kundiman</dd>
		<dd>kussundé</dd>
		<dd>kutumba wake</dd>
		<dd>kveding</dd>
		<dd>kvæði</dd>
		<dd>kwaito</dd>
		<dd>kwassa kwassa</dd>
		<dd>kwela</dd>
		<dd>käng</dd>
		<dd>kélé</dd>
		<dd>kĩkũyũ pop</dd>
	</dl>
	<dl>
		<dt>L</dt>
		<dd>la la</dd>
		<dd>latin american</dd>
		<dd>latin jazz</dd>
		<dd>latin pop</dd>
		<dd>latin rap</dd>
		<dd>lavway</dd>
		<dd>laïko</dd>
		<dd>laïkó</dd>
		<dd>le leagan</dd>
		<dd>legényes</dd>
		<dd>lelio</dd>
		<dd>letkajenkka</dd>
		<dd>levenslied</dd>
		<dd>lhamo</dd>
		<dd>lieder</dd>
		<dd>light music</dd>
		<dd>light rock</dd>
		<dd>likanos</dd>
		<dd>liquid drum&bass</dd>
		<dd>liquid funk</dd>
		<dd>liquindi</dd>
		<dd>llanera</dd>
		<dd>llanto</dd>
		<dd>lo-fi</dd>
		<dd>lo-fi music</dd>
		<dd>loki djili</dd>
		<dd>long-song</dd>
		<dd>louisiana blues</dd>
		<dd>louisiana swamp pop</dd>
		<dd>lounge music</dd>
		<dd>lovers rock</dd>
		<dd>lowercase</dd>
		<dd>lubbock sound</dd>
		<dd>lucknavi thumri</dd>
		<dd>luhya omutibo</dd>
		<dd>luk grung</dd>
		<dd>lullaby</dd>
		<dd>lundu</dd>
		<dd>lundum</dd>
	</dl>
	<dl>
		<dt>M</dt>
		<dd>m-base</dd>
		<dd>madchester</dd>
		<dd>madrigal</dd>
		<dd>mafioso rap</dd>
		<dd>maglaal</dd>
		<dd>magnificat</dd>
		<dd>mahori</dd>
		<dd>mainstream jazz</dd>
		<dd>makossa</dd>
		<dd>makossa-soukous</dd>
		<dd>malagueñas</dd>
		<dd>malawian jazz</dd>
		<dd>malhun</dd>
		<dd>maloya</dd>
		<dd>maluf</dd>
		<dd>maluka</dd>
		<dd>mambo</dd>
		<dd>manaschi</dd>
		<dd>mandarin pop</dd>
		<dd>manding swing</dd>
		<dd>mango</dd>
		<dd>mangue bit</dd>
		<dd>mangulina</dd>
		<dd>manikay</dd>
		<dd>manila sound</dd>
		<dd>manouche</dd>
		<dd>manzuma</dd>
		<dd>mapouka</dd>
		<dd>mapouka-serré</dd>
		<dd>marabi</dd>
		<dd>maracatu</dd>
		<dd>marga</dd>
		<dd>mariachi</dd>
		<dd>marimba</dd>
		<dd>marinera</dd>
		<dd>marrabenta</dd>
		<dd>martial industrial</dd>
		<dd>martinetes</dd>
		<dd>maskanda</dd>
		<dd>mass</dd>
		<dd>matamuerte</dd>
		<dd>math rock</dd>
		<dd>mathcore</dd>
		<dd>matt bello</dd>
		<dd>maxixe</dd>
		<dd>mazurka</dd>
		<dd>mbalax</dd>
		<dd>mbaqanga</dd>
		<dd>mbube</dd>
		<dd>mbumba</dd>
		<dd>medh</dd>
		<dd>medieval folk rock</dd>
		<dd>medieval metal</dd>
		<dd>medieval music</dd>
		<dd>meditation</dd>
		<dd>mejorana</dd>
		<dd>melhoun</dd>
		<dd>melhûn</dd>
		<dd>melodic black metal</dd>
		<dd>melodic death metal</dd>
		<dd>melodic hardcore</dd>
		<dd>melodic metalcore</dd>
		<dd>melodic music</dd>
		<dd>melodic trance</dd>
		<dd>memphis blues</dd>
		<dd>memphis rap</dd>
		<dd>memphis soul</dd>
		<dd>mento</dd>
		<dd>merengue</dd>
		<dd>merengue típico moderno</dd>
		<dd>merengue-bomba</dd>
		<dd>meringue</dd>
		<dd>merseybeat</dd>
		<dd>metal</dd>
		<dd>metalcore</dd>
		<dd>metallic hardcore</dd>
		<dd>mexican pop</dd>
		<dd>mexican rock</dd>
		<dd>mexican son</dd>
		<dd>meykhana</dd>
		<dd>mezwed</dd>
		<dd>miami bass</dd>
		<dd>microhouse</dd>
		<dd>middle of the road</dd>
		<dd>midwest hip hop</dd>
		<dd>milonga</dd>
		<dd>min'yo</dd>
		<dd>mineras</dd>
		<dd>mini compas</dd>
		<dd>mini-jazz</dd>
		<dd>minimal techno</dd>
		<dd>minimalist music</dd>
		<dd>minimalist trance</dd>
		<dd>minneapolis sound</dd>
		<dd>minstrel show</dd>
		<dd>minuet</dd>
		<dd>mirolóyia</dd>
		<dd>modal jazz</dd>
		<dd>modern classical</dd>
		<dd>modern classical music</dd>
		<dd>modern laika</dd>
		<dd>modern rock</dd>
		<dd>modinha</dd>
		<dd>mohabelo</dd>
		<dd>montuno</dd>
		<dd>monumental dance</dd>
		<dd>mor lam</dd>
		<dd>mor lam sing</dd>
		<dd>morna</dd>
		<dd>motorpop</dd>
		<dd>motown</dd>
		<dd>mozambique</dd>
		<dd>mpb</dd>
		<dd>mugam</dd>
		<dd>multicultural</dd>
		<dd>murga</dd>
		<dd>musette</dd>
		<dd>museve</dd>
		<dd>mushroom jazz</dd>
		<dd>music drama</dd>
		<dd>music hall</dd>
		<dd>musiqi-e assil</dd>
		<dd>musique concrète</dd>
		<dd>mutuashi</dd>
		<dd>muwashshah</dd>
		<dd>muzak</dd>
		<dd>méringue</dd>
		<dd>música campesina</dd>
		<dd>música criolla</dd>
		<dd>música de la interior</dd>
		<dd>música llanera</dd>
		<dd>música nordestina</dd>
		<dd>música popular brasileira</dd>
		<dd>música tropical</dd>
	</dl>
	<dl>
		<dt>N</dt>
		<dd>nagauta</dd>
		<dd>nakasi</dd>
		<dd>nangma</dd>
		<dd>nanguan</dd>
		<dd>narcocorrido</dd>
		<dd>nardcore</dd>
		<dd>narodna muzika</dd>
		<dd>nasheed</dd>
		<dd>nashville sound</dd>
		<dd>nashville sound/countrypolitan</dd>
		<dd>national socialist black metal</dd>
		<dd>naturalismo</dd>
		<dd>nederpop</dd>
		<dd>neo soul</dd>
		<dd>neo-classical metal</dd>
		<dd>neo-medieval</dd>
		<dd>neo-prog</dd>
		<dd>neo-psychedelia</dd>
		<dd>neoclassical</dd>
		<dd>neoclassical music</dd>
		<dd>neofolk</dd>
		<dd>neotraditional country</dd>
		<dd>nerdcore</dd>
		<dd>neue deutsche härte</dd>
		<dd>neue deutsche welle</dd>
		<dd>new age music</dd>
		<dd>new beat</dd>
		<dd>new instrumental</dd>
		<dd>new jack swing</dd>
		<dd>new orleans blues</dd>
		<dd>new orleans jazz</dd>
		<dd>new pop</dd>
		<dd>new prog</dd>
		<dd>new rave</dd>
		<dd>new romantic</dd>
		<dd>new school hip hop</dd>
		<dd>new taiwanese song</dd>
		<dd>new wave</dd>
		<dd>new wave of british heavy metal</dd>
		<dd>new wave of new wave</dd>
		<dd>new weird america</dd>
		<dd>new york blues</dd>
		<dd>new york house</dd>
		<dd>newgrass</dd>
		<dd>nganja</dd>
		<dd>nightcore</dd>
		<dd>nintendocore</dd>
		<dd>nisiótika</dd>
		<dd>no wave</dd>
		<dd>noh</dd>
		<dd>noise music</dd>
		<dd>noise pop</dd>
		<dd>noise rock</dd>
		<dd>nongak</dd>
		<dd>norae undong</dd>
		<dd>nordic folk dance music</dd>
		<dd>nordic folk music</dd>
		<dd>nortec</dd>
		<dd>norteño</dd>
		<dd>northern soul</dd>
		<dd>nota</dd>
		<dd>nu breaks</dd>
		<dd>nu jazz</dd>
		<dd>nu metal</dd>
		<dd>nu soul</dd>
		<dd>nueva canción</dd>
		<dd>nyatiti</dd>
		<dd>néo kýma</dd>
	</dl>
	<dl>
		<dt>O</dt>
		<dd>obscuro</dd>
		<dd>oi!</dd>
		<dd>old school hip hop</dd>
		<dd>old-time</dd>
		<dd>oldies</dd>
		<dd>olonkho</dd>
		<dd>oltului</dd>
		<dd>ondo</dd>
		<dd>opera</dd>
		<dd>operatic pop</dd>
		<dd>oratorio</dd>
		<dd>orchestra</dd>
		<dd>orchestral</dd>
		<dd>organ trio</dd>
		<dd>organic ambient</dd>
		<dd>organum</dd>
		<dd>orgel</dd>
		<dd>oriental metal</dd>
		<dd>ottava rima</dd>
		<dd>outlaw country</dd>
		<dd>outsider music</dd>
	</dl>
	<dl>
		<dt>P</dt>
		<dd>p-funk</dd>
		<dd>pagan metal</dd>
		<dd>pagan rock</dd>
		<dd>pagode</dd>
		<dd>paisley underground</dd>
		<dd>palm wine</dd>
		<dd>palm-wine</dd>
		<dd>pambiche</dd>
		<dd>panambih</dd>
		<dd>panchai baja</dd>
		<dd>panchavadyam</dd>
		<dd>pansori</dd>
		<dd>paranda</dd>
		<dd>parang</dd>
		<dd>parody</dd>
		<dd>parranda</dd>
		<dd>partido alto</dd>
		<dd>pasillo</dd>
		<dd>patriotic</dd>
		<dd>peace punk</dd>
		<dd>pelimanni music</dd>
		<dd>petenera</dd>
		<dd>peyote song</dd>
		<dd>philadelphia soul</dd>
		<dd>piano blues</dd>
		<dd>piano rock</dd>
		<dd>piedmont blues</dd>
		<dd>pimba</dd>
		<dd>pinoy pop</dd>
		<dd>pinoy rock</dd>
		<dd>pinpeat orchestra</dd>
		<dd>piphat</dd>
		<dd>piyyutim</dd>
		<dd>plainchant</dd>
		<dd>plena</dd>
		<dd>pleng phua cheewit</dd>
		<dd>pleng thai sakorn</dd>
		<dd>political hip hop</dd>
		<dd>polka</dd>
		<dd>polo</dd>
		<dd>polonaise</dd>
		<dd>pols</dd>
		<dd>polska</dd>
		<dd>pong lang</dd>
		<dd>pop</dd>
		<dd>pop folk</dd>
		<dd>pop music</dd>
		<dd>pop punk</dd>
		<dd>pop rap</dd>
		<dd>pop rock</dd>
		<dd>pop sunda</dd>
		<dd>pornocore</dd>
		<dd>porro</dd>
		<dd>post disco</dd>
		<dd>post-britpop</dd>
		<dd>post-disco</dd>
		<dd>post-grunge</dd>
		<dd>post-hardcore</dd>
		<dd>post-industrial</dd>
		<dd>post-metal</dd>
		<dd>post-minimalism</dd>
		<dd>post-punk</dd>
		<dd>post-rock</dd>
		<dd>post-romanticism</dd>
		<dd>pow-wow</dd>
		<dd>power electronics</dd>
		<dd>power metal</dd>
		<dd>power noise</dd>
		<dd>power pop</dd>
		<dd>powerviolence</dd>
		<dd>ppongtchak</dd>
		<dd>praise song</dd>
		<dd>program symphony</dd>
		<dd>progressive bluegrass</dd>
		<dd>progressive country</dd>
		<dd>progressive death metal</dd>
		<dd>progressive electronic</dd>
		<dd>progressive electronic music</dd>
		<dd>progressive folk</dd>
		<dd>progressive folk music</dd>
		<dd>progressive house</dd>
		<dd>progressive metal</dd>
		<dd>progressive rock</dd>
		<dd>progressive trance</dd>
		<dd>protopunk</dd>
		<dd>psych folk</dd>
		<dd>psychedelic music</dd>
		<dd>psychedelic pop</dd>
		<dd>psychedelic rock</dd>
		<dd>psychedelic trance</dd>
		<dd>psychobilly</dd>
		<dd>punk blues</dd>
		<dd>punk cabaret</dd>
		<dd>punk jazz</dd>
		<dd>punk rock</dd>
		<dd>punta</dd>
		<dd>punta rock</dd>
	</dl>
	<dl>
		<dt>Q</dt>
		<dd>qasidah</dd>
		<dd>qasidah modern</dd>
		<dd>qawwali</dd>
		<dd>quadrille</dd>
		<dd>quan ho</dd>
		<dd>queercore</dd>
		<dd>quiet storm</dd>
	</dl>
	<dl>
		<dt>R</dt>
		<dd>rada</dd>
		<dd>raga</dd>
		<dd>raga rock</dd>
		<dd>ragga</dd>
		<dd>ragga jungle</dd>
		<dd>raggamuffin</dd>
		<dd>ragtime</dd>
		<dd>rai</dd>
		<dd>rake-and-scrape</dd>
		<dd>ramkbach</dd>
		<dd>ramvong</dd>
		<dd>ranchera</dd>
		<dd>rap</dd>
		<dd>rap metal</dd>
		<dd>rap rock</dd>
		<dd>rapcore</dd>
		<dd>rara</dd>
		<dd>rare groove</dd>
		<dd>rasiya</dd>
		<dd>rave</dd>
		<dd>raw rock</dd>
		<dd>raï</dd>
		<dd>rebetiko</dd>
		<dd>red dirt</dd>
		<dd>reel</dd>
		<dd>reggae</dd>
		<dd>reggae 110</dd>
		<dd>reggae bultrón</dd>
		<dd>reggae en español</dd>
		<dd>reggae fusion</dd>
		<dd>reggae highlife</dd>
		<dd>reggaefusion</dd>
		<dd>reggaeton</dd>
		<dd>rekilaulu</dd>
		<dd>relax music</dd>
		<dd>religious</dd>
		<dd>rembetiko</dd>
		<dd>renaissance music</dd>
		<dd>requiem</dd>
		<dd>rhapsody</dd>
		<dd>rhyming spiritual</dd>
		<dd>rhythm & blues</dd>
		<dd>rhythm and blues</dd>
		<dd>ricercar</dd>
		<dd>riot grrrl</dd>
		<dd>rock</dd>
		<dd>rock and roll</dd>
		<dd>rock en español</dd>
		<dd>rock opera</dd>
		<dd>rockabilly</dd>
		<dd>rocksteady</dd>
		<dd>rococo</dd>
		<dd>romantic flow</dd>
		<dd>romantic period in music</dd>
		<dd>rondeaux</dd>
		<dd>ronggeng</dd>
		<dd>roots reggae</dd>
		<dd>roots rock</dd>
		<dd>roots rock reggae</dd>
		<dd>rumba</dd>
		<dd>russian pop</dd>
		<dd>rímur</dd>
	</dl>
	<dl>
		<dt>S</dt>
		<dd>sabar</dd>
		<dd>sacred harp</dd>
		<dd>sacred music</dd>
		<dd>sadcore</dd>
		<dd>saibara</dd>
		<dd>sakara</dd>
		<dd>salegy</dd>
		<dd>salsa</dd>
		<dd>salsa erotica</dd>
		<dd>salsa romantica</dd>
		<dd>saltarello</dd>
		<dd>samba</dd>
		<dd>samba-canção</dd>
		<dd>samba-reggae</dd>
		<dd>samba-rock</dd>
		<dd>sambai</dd>
		<dd>sanjo</dd>
		<dd>sato kagura</dd>
		<dd>sawt</dd>
		<dd>saya</dd>
		<dd>scat</dd>
		<dd>schlager</dd>
		<dd>schottisch</dd>
		<dd>schranz</dd>
		<dd>scottish baroque music</dd>
		<dd>screamo</dd>
		<dd>scrumpy and western</dd>
		<dd>sea shanty</dd>
		<dd>sean nós</dd>
		<dd>second viennese school</dd>
		<dd>sega music</dd>
		<dd>seggae</dd>
		<dd>seis</dd>
		<dd>semba</dd>
		<dd>sephardic music</dd>
		<dd>serialism</dd>
		<dd>set dance</dd>
		<dd>sevdalinka</dd>
		<dd>sevillana</dd>
		<dd>shabab</dd>
		<dd>shabad</dd>
		<dd>shalako</dd>
		<dd>shan'ge</dd>
		<dd>shango</dd>
		<dd>shape note</dd>
		<dd>shibuya-kei</dd>
		<dd>shidaiqu</dd>
		<dd>shima uta</dd>
		<dd>shock rock</dd>
		<dd>shoegaze</dd>
		<dd>shoegazer</dd>
		<dd>shoka</dd>
		<dd>shomyo</dd>
		<dd>show tune</dd>
		<dd>sica</dd>
		<dd>siguiriyas</dd>
		<dd>silat</dd>
		<dd>sinawi</dd>
		<dd>situational</dd>
		<dd>ska</dd>
		<dd>ska punk</dd>
		<dd>skacore</dd>
		<dd>skald</dd>
		<dd>skate punk</dd>
		<dd>skiffle</dd>
		<dd>slack-key guitar</dd>
		<dd>slide</dd>
		<dd>slowcore</dd>
		<dd>sludge metal</dd>
		<dd>slängpolska</dd>
		<dd>smooth jazz</dd>
		<dd>soca</dd>
		<dd>soft rock</dd>
		<dd>son</dd>
		<dd>son montuno</dd>
		<dd>son-batá</dd>
		<dd>sonata</dd>
		<dd>songo</dd>
		<dd>songo-salsa</dd>
		<dd>sophisti-pop</dd>
		<dd>soukous</dd>
		<dd>soul</dd>
		<dd>soul blues</dd>
		<dd>soul jazz</dd>
		<dd>soul music</dd>
		<dd>southern gospel</dd>
		<dd>southern harmony</dd>
		<dd>southern hip hop</dd>
		<dd>southern metal</dd>
		<dd>southern rock</dd>
		<dd>southern soul</dd>
		<dd>space age pop</dd>
		<dd>space music</dd>
		<dd>space rock</dd>
		<dd>spectralism</dd>
		<dd>speed garage</dd>
		<dd>speed metal</dd>
		<dd>speedcore</dd>
		<dd>spirituals</dd>
		<dd>spouge</dd>
		<dd>sprechgesang</dd>
		<dd>square dance</dd>
		<dd>squee</dd>
		<dd>st. louis blues</dd>
		<dd>stand-up</dd>
		<dd>steelband</dd>
		<dd>stoner metal</dd>
		<dd>stoner rock</dd>
		<dd>straight edge</dd>
		<dd>strathspeys</dd>
		<dd>stride</dd>
		<dd>string</dd>
		<dd>string quartet</dd>
		<dd>sufi music</dd>
		<dd>suite</dd>
		<dd>sunshine pop</dd>
		<dd>suomirock</dd>
		<dd>super eurobeat</dd>
		<dd>surf ballad</dd>
		<dd>surf instrumental</dd>
		<dd>surf music</dd>
		<dd>surf pop</dd>
		<dd>surf rock</dd>
		<dd>swamp blues</dd>
		<dd>swamp pop</dd>
		<dd>swamp rock</dd>
		<dd>swing</dd>
		<dd>swing music</dd>
		<dd>swingbeat</dd>
		<dd>sygyt</dd>
		<dd>symphonic</dd>
		<dd>symphonic black metal</dd>
		<dd>symphonic metal</dd>
		<dd>symphonic poem</dd>
		<dd>symphonic rock</dd>
		<dd>symphony</dd>
		<dd>synthpop</dd>
		<dd>synthpunk</dd>
	</dl>
	<dl>
		<dt>T</dt>
		<dd>t'ong guitar</dd>
		<dd>taarab</dd>
		<dd>tai tu</dd>
		<dd>taiwanese pop</dd>
		<dd>tala</dd>
		<dd>talempong</dd>
		<dd>tambu</dd>
		<dd>tamburitza</dd>
		<dd>tamil christian keerthanai</dd>
		<dd>tango</dd>
		<dd>tanguk</dd>
		<dd>tappa</dd>
		<dd>tarana</dd>
		<dd>tarantella</dd>
		<dd>taranto</dd>
		<dd>tech</dd>
		<dd>tech house</dd>
		<dd>tech trance</dd>
		<dd>technical death metal</dd>
		<dd>technical metal</dd>
		<dd>techno</dd>
		<dd>technoid</dd>
		<dd>technopop</dd>
		<dd>techstep</dd>
		<dd>techtonik</dd>
		<dd>teen pop</dd>
		<dd>tejano</dd>
		<dd>tejano music</dd>
		<dd>tekno</dd>
		<dd>tembang sunda</dd>
		<dd>texas blues</dd>
		<dd>thai pop</dd>
		<dd>thillana</dd>
		<dd>thrash metal</dd>
		<dd>thrashcore</dd>
		<dd>thumri</dd>
		<dd>tibetan pop</dd>
		<dd>tiento</dd>
		<dd>timbila</dd>
		<dd>tin pan alley</dd>
		<dd>tinga</dd>
		<dd>tinku</dd>
		<dd>toeshey</dd>
		<dd>togaku</dd>
		<dd>trad jazz</dd>
		<dd>traditional bluegrass</dd>
		<dd>traditional pop music</dd>
		<dd>trallalero</dd>
		<dd>trance</dd>
		<dd>tribal house</dd>
		<dd>trikitixa</dd>
		<dd>trip hop</dd>
		<dd>trip rock</dd>
		<dd>trip-hop</dd>
		<dd>tropicalia</dd>
		<dd>tropicalismo</dd>
		<dd>tropipop</dd>
		<dd>truck-driving country</dd>
		<dd>tumba</dd>
		<dd>turbo-folk</dd>
		<dd>turkish music</dd>
		<dd>turkish pop</dd>
		<dd>turntablism</dd>
		<dd>tuvan throat-singing</dd>
		<dd>twee pop</dd>
		<dd>twist</dd>
		<dd>two tone</dd>
		<dd>táncház</dd>
	</dl>
	<dl>
		<dt>U</dt>
		<dd>uk garage</dd>
		<dd>uk pub rock</dd>
		<dd>unblack metal</dd>
		<dd>underground music</dd>
		<dd>uplifting</dd>
		<dd>uplifting trance</dd>
		<dd>urban cowboy</dd>
		<dd>urban folk</dd>
		<dd>urban jazz</dd>
	</dl>
	<dl>
		<dt>V</dt>
		<dd>vallenato</dd>
		<dd>vaudeville</dd>
		<dd>venezuela</dd>
		<dd>verbunkos</dd>
		<dd>verismo</dd>
		<dd>viking metal</dd>
		<dd>villanella</dd>
		<dd>virelai</dd>
		<dd>vispop</dd>
		<dd>visual kei</dd>
		<dd>visual music</dd>
		<dd>vocal</dd>
		<dd>vocal house</dd>
		<dd>vocal jazz</dd>
		<dd>vocal music</dd>
		<dd>volksmusik</dd>
	</dl>
	<dl>
		<dt>W</dt>
		<dd>waila</dd>
		<dd>waltz</dd>
		<dd>wangga</dd>
		<dd>warabe uta</dd>
		<dd>wassoulou</dd>
		<dd>weld</dd>
		<dd>were music</dd>
		<dd>west coast hip hop</dd>
		<dd>west coast jazz</dd>
		<dd>western</dd>
		<dd>western blues</dd>
		<dd>western swing</dd>
		<dd>witch house</dd>
		<dd>wizard rock</dd>
		<dd>women's music</dd>
		<dd>wong shadow</dd>
		<dd>wonky pop</dd>
		<dd>wood</dd>
		<dd>work song</dd>
		<dd>world fusion</dd>
		<dd>world fusion music</dd>
		<dd>world music</dd>
		<dd>worldbeat</dd>
	</dl>
	<dl>
		<dt>X</dt>
		<dd>xhosa music</dd>
		<dd>xoomii</dd>
	</dl>
	<dl>
		<dt>Y</dt>
		<dd>yo-pop</dd>
		<dd>yodeling</dd>
		<dd>yukar</dd>
		<dd>yé-yé</dd>
	</dl>
	<dl>
		<dt>Z</dt>
		<dd>zajal</dd>
		<dd>zapin</dd>
		<dd>zarzuela</dd>
		<dd>zeibekiko</dd>
		<dd>zeuhl</dd>
		<dd>ziglibithy</dd>
		<dd>zouglou</dd>
		<dd>zouk</dd>
		<dd>zouk chouv</dd>
		<dd>zouklove</dd>
		<dd>zulu music</dd>
		<dd>zydeco</dd>
	</dl>
</div>

### streams {#object-streams}

This field is an array of streams objects. A stream object provides URL to listen a radio and some informations about it.

~~~~json
{
	"streams": [
		{
			"type": "main",
			"format": "mp3",
			"quality": 128,
			"channels": 2,
			"url": "https://utopicradio.com/listen"
		},
		…
	]
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| type | string | Describes wether the stream is the main stream to use or other ones. See the list of [types](#list-stream-types) below. |
| format | string | The format of the stream. See the list of [formats](#list-formats) below. |
| quality | integer | The quality of the stream, in kbps. |
| channels | integer | The number of channels of the stream. |
| url | string | URL to the stream. |

#### List of stream types {#list-stream-types}

| Type | Meaning |
|------|---------|
| main | This is your main URL to listen to your radio |
| redirect | HTTP Redirected URL to listen to your stream |
| proxy | URL of your stream, proxified |
| other | Other URLs that point to your stream |

You need to have at least one stream with the "main" type.

#### List of formats {#list-formats}

| Format | Key |
|--------|-----|
| MPEG Layer 3 | mp3 |
| Advanced Audio Coding | aac |
| Ogg Vorbis | ogg |

### tags {#object-tags}

The tags object contains informations about the song currently played.

~~~~json
{
	"tags": {
		"artists": [
			"Madeon", "Passion Pit"
		],
		"title": "Pay No Mind",
		"album": "Adventure (Deluxe)",
		"year": 2015,
		"cover": {
			"url": "https://i.scdn.co/image/41fa5c07121f5b6cc7d0eac34933ed0722c7dc1c",
			"width": 640,
			"height": 640
		},
		"genres": ["electronic", "pop"],
		"categories": ["Musiques", "Nouveaut\u00e9s"],
		"length": 249.89565343,
		"remaining": 92.54773021,
		"urls": {
			"buy": ["…"],
			"stream": ["…"],
			"extra": […]
		},
		"extra": […],
		"previous": {
			…
		},
		"next": {
			…
		}
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| artists | array of strings | The list of all artists of the song. Better to separate artists in an array, so you can avoid separators like "ft.", "feat.", ", ", or " - " |
| title | string | The title of the song. |
| album | string | The album the song is on. Avoid compilation albums and prefer original albums. |
| year | integer | The year of release of the song. |
| cover | object | The cover art of the song. url: the cover art URL - width: the width of the picture - height: the height of the picture. |
| genres | array of strings | The main genres of the song. See the list of [genres](#list-genres) above. |
| categories | array of strings | The main categories of the song. This field is different from "genres" in that "categories" represent the categories you have affected the song in, in your song database. For example, it can be "Hits", "Golds", "Newest ones", "High rotation", etc. |
| length | float | The total length of the song. If your radio automation software have the ability to put mix points on songs, put the actual length of the song playable in your software (excluding sound before start point and sound after end point). |
| remaining | float | The time remaining before the end of the song. If your radio automation software have the ability to put mix points on songs, compute the remaining time before the end point of your song and not the end of the file. This property cannot be stored in cache, you will have to recompute it each time an app need your RTDS object (this can make its generation a heavy task). |
| urls | object [url](#object-url) | URLs associated to the song. See [url](#object-url) for more details. |
| extra | array | Extra data you can provide about the song. |
| previous | object [tags](#object-tags) | Data of the previous streamed song. Remaining time is not necessary inside this object. |
| next | object [tags](#object-tags) | Data of the next streamed song. Remaining time is not necessary inside this object. |

### show {#object-show}

This object give informations about the show streamed.

~~~~json
{
	"show": {
		"name": "L'Afterwork",
		"description": "Dure journée de boulot ? Écoutez Kris sur Utopic dans l'Afterwork, tous les jours de 17h à 19h pour retrouver le sourire !",
		"recurrences": [
			{
				"days": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
				"dates": {
					"start": "2017/08/28",
					"end": "2017/06/29"
				},
				"hours": {
					"start": "17:00",
					"end": "19:00"
				}
			}
		],
		"contributors": [
			{
				"name": "Kris",
				"role": "main",
				"images": [
					{
						"type": "pixel",
						"format": "free",
						"url": "https://…",
						"width": 800,
						"height": 600
					}
				],
				"urls": {
					"social": [
						{
							"type": "twitter",
							"url": "https://twitter.com/christophermh44"
						}
					]
				}
			}
		],
		"images": [
			{
				"type": "vectorial",
				"format": "free",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=svg"
			},
			{
				"type": "vectorial",
				"format": "square",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=svg"
			},
			{
				"type": "pixel",
				"format": "free",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=png&w=800",
				"width": 800,
				"height": 422
			},
			{
				"type": "pixel",
				"format": "square",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=png&w=800",
				"width": 800
			}
		],
		"urls": {
			"web": "https://utopicradio.com/emissions/l-afterwork",
			"social": [
				{
					"type": "twitter",
					"url": "https://twitter.com/christophermh44"
				}
			],
			"extra": […]
		},
		"phones": [
			{
				"type": "main",
				"number": "+33979980118"
			}
		]
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| name | string | Name of the show. |
| description | string | A short description of the show. |
| recurrences | array of [recurrences](#object-recurrence) | List of all dates and times the show is on air. See [recurrence](#object-reccurence) for more details. |
| contributors | array of [contributors](#object-contributor) | List of contributors who animate the show. See [contributors](#object-contributor) for more details. |
| images | array of [images](#object-image) | An array of images/logos/banners/… representing the show. See [images](#object-image) for more details. |
| urls | object [url](#object-url) | URLs associated to the show. See [url](#object-url) for more details. |
| phones | array of object [phones](#object-phone) | List of phone numbers to contact the show. See [phone](#object-phone) for more details. |
| extra | array | Extra data you can provide about the show. |

### Shared objects {#shared-objects}

#### Image {#object-image}

Image arrays represent group of images. Many informations describing the picture are provided to help applications choosing the right image by selecting them by arbitrary criteria.

~~~~json
{
	"images": [
		{
			"type": "pixel",
			"format": "free",
			"transparency": true,
			"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=png&w=800",
			"width": 800,
			"height": 422
		}
	]
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| type | string | Describes the type of the image provided. Can be "pixel" (typically PNG, JPG, …) or "vectorial" (SVG, …). |
| format | string | Describes the format of the image provided. "free" indicates that there is no dimension constraints. This value can also be a ratio ("2.39:1" or "16:9" for example). If the ratio is "1:1", the value can be "square". |
| transparency | boolean | Indicates wether the image contains an alpha layer or not. |
| url | string | URL to the actual image. |
| width | integer | Width of the image. Not required for vectorial pictures. |
| height | integer | Height of the image. Not required for vectorial pictures and square images. |

#### Coordinates {#object-coordinates}

Informations like social reason, postal address, phone numbers, …

~~~~json
{
	"coordinates": {
		"type": "non-profit",
		"organisation": "Spicevent Association",
		"address": "…",
		"zip": "00000",
		"city": "…",
		"country": "France",
		"phones": [
			{
				"type": "main",
				"number": "+33979980118"
			}
		]
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| type | string | The type of organisation. "company", "non-profit", "group", "private" are valid values. |
| organisation | string | The name of your organisation. |
| address | string | Head quarter address. |
| zip | string | Head quarter Zip code. |
| city | string | Head quarter city. |
| country | string | Head quarter country. |
| phones | array of [phones](#object-phone) | Phone numbers to join your organisation. See [phone](#object-phone) for more information. |

#### Phone {#object-phone}

Phones fields are always arrays of phone objects to allow multiple phones to be set.

~~~~json
{
	"phones": [
		{
			"type": "main",
			"number": "+33979980118"
		}
	]
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| type | string | The type of phone number. See the list of [types](#list-phone-types) below. |
| number | string | The phone number. |

##### List of phone types {#list-phone-types}

| Type | Meaning |
|------|---------|
| main | Main phone number |
| direct | Direct line |
| messaging | Voice messaging |
| assistant | Multiple-choice call |
| standard | Line to your switchboard |
| personal | Personal line |
| professionnal | Professionnal line |
| fax | Fax number |

#### URLs {#object-url}

URLs objects can describe many URLs to your website and external services related.

~~~~json
{
	"urls": {
		"web": "https://utopicradio.com/",
		"self": "https://utopicradio.com/tags",
		"social": [
			{
				"type": "facebook",
				"url": "https://facebook.com/utopicradio"
			},
			{
				"type": "twitter",
				"url": "https://twitter.com/utopicradio"
			}
		],
		"extra": [
			{
				"type": "participer",
				"description": "Participer aux émissions en direct sur Utopic",
				"url": "https://utopicradio.com/participer"
			},
			…
		]
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| self | string | Canonical URL to call your API that provides your RTDS object. |
| web | string | Canonical URL of your main website page. |
| parent | string | Canonical URL of the organization that produce the radio. |
| player | string | URL to your player |
| listen | string | URL to your listen instructions page |
| legal_notice | string | URL to your legal notice |
| contact | string | URL to your contact page |
| social | array | Many URLs to your social networks profiles. Provide for each object in this array the type (valid values are "facebook", "twitter", "google-plus", "instagram", "linkedin", "viadeo", "youtube", "reddit", "pinterest", "discord", "other") and the url. |
| buy | array | URLs to buy the music. Provide for each object in this array the type (valid values are "itunes", "amazon", "other") and the url. |
| stream | array | URLs to listen to the music online. Provide for each object in this array the type (valid values are "itunes", "spotify", "youtube", "apple-music", "rhapsody", "deezer", "google-play", "tidal", "i-heart-radio", "shazam", "groove", "pandora", "vivo") and the url. |
| extra | array | Other URLs you want to provide. Provide for each object in this array an arbitrary type, the url and a description. |

#### Recurrence {#object-recurrence}

A recurrence object describes a time slot.

~~~~json
{
	"days": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
	"dates": {
		"start": "2017/08/28",
		"end": "2017/06/29"
	},
	"hours": {
		"start": "17:00",
		"end": "19:00"
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| days | array of strings | Days of week (Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday are valid values). |
| dates | object | Describe the start date and the end date. End date is not required. If you do not provide an end date, it will implicitly be means that the end date is the same as the start date. The format of a date is yyyy/mm/dd |
| hours | object | Describe the start hour and the end hour. The format of an hour is hh:mm. You can also set an empty string for both start and end, thus it means that the recurrence last all day. |

#### Contributor {#object-contributor}

A contributor object describes people like a show presenter, a producer, etc.

~~~~json
{
	"name": "Kris",
	"roles": ["main"],
	"images": [
		{
			"type": "pixel",
			"format": "free",
			"url": "https://…",
			"width": 800,
			"height": 600
		}
	],
	"urls": {
		"social": [
			{
				"type": "twitter",
				"url": "https://twitter.com/christophermh44"
			}
		]
	}
}
~~~~

| Key | Type | Description |
|-----|------|-------------|
| name | string | Name of the contributor |
| role | array of strings | Roles of the contributor. Valid values are "main", "presenter", "director", "producer", "community-manager", "operator", "webmaster", "other". |
| images | array of [images](#object-image) | Pictures that represents the contributor. See [images](#object-image) for more details. |
| urls | object [url](#object-url) | URLs to public profiles of the contributor. See [url](#object-url) for more details. |

## Full RTDS object example {#full-rtds-object-example}

~~~~json
{
	"status": {
		"code": 200,
		"message": "Success.",
		"available_data": ["radio", "streams", "tags", "show"]
	},
	"radio": {
		"name": "Utopic",
		"slogan": "Bonne Humeur Garantie",
		"description": "Écoute Utopic, et déguste une dose de bonheur enrobée d'énergie sur son coulis de légèreté.",
		"images": [
			{
				"type": "vectorial",
				"format": "free",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=svg"
			},
			{
				"type": "vectorial",
				"format": "square",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=svg"
			},
			{
				"type": "pixel",
				"format": "free",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=png&w=800",
				"width": 800,
				"height": 422
			},
			{
				"type": "pixel",
				"format": "square",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=png&w=800",
				"width": 800
			}
		],
		"coordinates": {
			"type": "non-profit",
			"organisation": "Spicevent Association",
			"address": "51 bis Chemin de Nantes",
			"zip": "44140",
			"city": "Geneston",
			"country": "France",
			"phones": [
				{
					"type": "main",
					"number": "+33979980118"
				}
			]
		},
		"genres": ["Hits", "Feel good", "Top 40", "Variety"],
		"urls": {
			"web": "https://utopicradio.com/",
			"self": "https://utopicradio.com/tags",
			"social": [
				{
					"type": "facebook",
					"url": "https://facebook.com/utopicradio"
				},
				{
					"type": "twitter",
					"url": "https://twitter.com/utopicradio"
				}
			],
			"extra": […]
		},
		"extra": […]
	},
	"streams": [
		{
			"type": "main",
			"format": "mp3",
			"quality": 128,
			"channels": 2,
			"url": "https://str2.openstream.co/394"
		},
		{
			"type": "redirect",
			"format": "mp3",
			"quality": 128,
			"channels": 2,
			"url": "https://utopicradio.com/listen"
		},
		{
			"type": "proxy",
			"format": "mp3",
			"quality": 128,
			"channels": 2,
			"url": "https://utopicradio.com/listen-relay"
		}
	],
	"tags": {
		"artists": [
			"Madeon", "Passion Pit"
		],
		"title": "Pay No Mind",
		"album": "Adventure (Deluxe)",
		"year": 2015,
		"cover": {
			"url": "https://i.scdn.co/image/41fa5c07121f5b6cc7d0eac34933ed0722c7dc1c",
			"width": 640,
			"height": 640
		},
		"genres": ["electronic", "pop"],
		"categories": ["Musiques", "Nouveaut\u00e9s"],
		"remaining": 92.54773021,
		"length": 249.89565343,
		"urls": {
			"buy": "",
			"stream": "",
			"extra": […]
		},
		"extra": […],
		"previous": {
			"artists": [
				"Madeon", "Passion Pit"
			],
			"title": "Pay No Mind",
			"album": "Adventure (Deluxe)",
			"year": 2015,
			"cover": {
				"url": "https://i.scdn.co/image/41fa5c07121f5b6cc7d0eac34933ed0722c7dc1c",
				"width": 640,
				"height": 640
			},
			"genres": ["electronic", "pop"],
			"categories": ["Musiques", "Nouveaut\u00e9s"],
			"length": 249.89565343,
			"urls": {
				"buy": "",
				"stream": "",
				"social": […],
				"extra": […]
			},
			"extra": […]
		},
		"next": {
			"artists": [
				"Madeon", "Passion Pit"
			],
			"title": "Pay No Mind",
			"album": "Adventure (Deluxe)",
			"year": 2015,
			"cover": {
				"url": "https://i.scdn.co/image/41fa5c07121f5b6cc7d0eac34933ed0722c7dc1c",
				"width": 640,
				"height": 640
			},
			"genres": ["electronic", "pop"],
			"categories": ["Musiques", "Nouveaut\u00e9s"],
			"length": 249.89565343,
			"urls": {
				"buy": "",
				"stream": "",
				"extra": […]
			},
			"extra": […]
		}
	},
	"show": {
		"name": "L'Afterwork",
		"description": "Dure journée de boulot ? Écoutez Kris sur Utopic dans l'Afterwork, tous les jours de 17h à 19h pour retrouver le sourire !",
		"occurrences": [
			{
				"days": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
				"dates": {
					"start": "2017/08/28",
					"end": "2017/06/29"
				},
				"hours": {
					"start": "17:00",
					"end": "19:00"
				}
			},
			…
		],
		"contributors": [
			{
				"name": "Kris",
				"roles": ["main"],
				"images": [
					{
						"type": "pixel",
						"format": "free",
						"url": "https://…",
						"width": 800,
						"height": 600
					}
				],
				"urls": {
					"social": [
						{
							"type": "twitter",
							"url": "https://twitter.com/christophermh44"
						}
					]
				}
			}
		],
		"images": [
			{
				"type": "vectorial",
				"format": "free",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=svg"
			},
			{
				"type": "vectorial",
				"format": "square",
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=svg"
			},
			{
				"type": "pixel",
				"format": "free",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.maxi&t=png&w=800",
				"width": 800,
				"height": 422
			},
			{
				"type": "pixel",
				"format": "square",
				"transparency": true,
				"url": "https://dev.utopicradio.com/tools/vecto/svg-proxy.php?f=utopic.logo.mini&t=png&w=800",
				"width": 800
			}
		],
		"urls": {
			"web": "https://utopicradio.com/emissions/l-afterwork",
			"social": [
				{
					"type": "twitter",
					"url": "https://twitter.com/christophermh44"
				}
			],
			"extra": [
				{
					"type": "participer",
					"description": "Participer aux émissions en direct sur Utopic",
					"url": "https://utopicradio.com/participer"
				},
				…
			]
		},
		"phones": [
			{
				"type": "main",
				"number": "+33979980118"
			}
		]
	}
}
~~~~

## PHP Implementation

While this part is being written, take a look to the [test folder](https://github.com/christophermh44/rtds/tree/master/test) where you will find some examples easy to understand.
