# PHP
 A PHP egy szerveroldali programozási nyelv, amelyet weboldalak és webalkalmazások készítésére használnak.
 - Personal Home Page  PHP: Hypertext Preprocessor
 - Szerveren fut, dinamikos teartalmat generál (adatbázisokkal kommunikál adatokat olvas, ürlapokat kezel)
 - Leggyakrabban HTML-lel együtt használjuk
 - Wordpress Joomla

 ## PHP helló világ példa
 ```php
    <?php
        echo "Helló világ!";
    ?>
 ```

## PHP és HTML kód együtt!! 
```php
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        Ez egy HTML tartalom<br>
    </body>
    </html>
    <?php
        echo "Helló világ!";
    ?>
```
 ## Változók
 - "$" jelel kezdődík mindíg a változó neve
 - A változó nevében számít a kis és nagybetű
 - dinamikus tipusokat használ (JavaScript)

 ```php
    <?php
        $valtozo_nev = "ertek";
        echo $valtozo_nev;
        $nev = "Jani";
        echo "Szia, ". $nev."!"; // Szia Jani!
        echo "Szia, $nev!"; // Szia Jani!
         $szam = 42;
        function szam_dupla(){
            global $szam; // A globális változó elérése a függvényen belül   
            return $szam * 2;
        }
        $nev = "alma";
        $$nev = "piros"; // Ez létrehoz egy új változót $alma néven, aminek az értéke piros lesz"
        echo $alma; // Ez kiírja: piros
    ?>
 ```
 ### Szuperglobális változók
    - $_GET - URL Paraméterek
    - $_POST - Ürlapmezők
    - $_SESSION - session változók
    - $_COOKIE - sütik
    - $_SERVER - szerverrel kapcsolatos adatok
    - $_FILES - feltöltött fájlok

```php
    echo $_SERVER["REQUEST_METHOD"];
```
### Null coalescing operátor
    <p>Ha a változó, helyetesítő értéket ad. </p>
    http://localhost:5000/?nev=jozsi

```php
    $nev = $_GET["nev"] ?? "Ismeretlen";
```
### Típus ellenőrzés és típuskényszerítés 
```php
    is_int(10); //true
    is_string("Hello"); //true
    is_array($tomb);


    $szam = "42";
    $szam = (int)$szam // 42
```    
### Referencia
    <p>Két váltózó név alatt ugyanarra az értékre mutatunk/p>

```php    
    $a = 10;
    $b = &$a;

    $b= 20;
    echo $a // 20

``` 
### Tömb
```php
    $data = [];
    $data[] = 1;

    $data = [] ;
    $data["nev"] ="Józska";
    $data["kor"] = 25;
```   

### Objektum
```php
    $ember = new stdClass();
    $ember->nev = "Béla";
    $ember->kor = 30;
```
Összetett adatszerkezet kiíratása a var_dump methosdussal is lehetséges
```php
    $adat = ["nev" => "Lacika", "kor" => 25]
    var_dump($adat);
```
### Statikus változók függvényeken bellül
```php
function szamlalo() {
    static $x = 0;
    $x++;
    echo $x . "<br>";
}

szamlalo();
szamlalo();
szamlalo();

```

### típusos változók és paraméterek
```php
// declare(strict_types=1);
function osszead(int $a, int $b) : int {
    return $a + $b;
}
echo osszead(5,7)
```

### Destructing
```php
$adat = ["Pali",22,"Budapest"];
list($nev, $kor, $varos) = $adat;

[$nev, $kor, $varos] = $adat;

echo $nev; // Pali
echo $kor; // 22
echo $varos; // Budapest

$adat = ["nev"=>"Pali", kor=>22];

["nev" => $nev, "kor" => $kor] = $adat;
echo $nev; // Pali
echo $kor; // 22
```

### Spread operátor (...) tömbök esetén
```php
$a = [1,2];
$b = [3,4];

$egyben = [...$a,...$b];
print_r($egyben)

$tomb = [10,"apa",301]
function teszt($a,$b,$c) {

}

teszt(...$tomb)

```
## Feltételes utasítások
### 1. If utasítás, egyágú feltételes utasítás
```php
<?php
 
 if (feltétel) {
    //kód ha igaz a feltétel
 }

$kor = 19;
if ($kor >= 18) {
    echo "Nagykorú";
}

?>
```

### 2. If ... else, kétágú feltételes utasítás
Ha a feltétel nem igaz akkor az else ág fut le

```php
<?php
if (feltétel) {
    //kód ha igaz a feltétel
 }
else {


} 

$kor = 19;
if ($kor >= 18) {
     echo "Nagykorú";
 }
else {
 echo "Kiskorú";
} 
?>
```
### if ... elseif ... else, Többágú feltételes utasítás

Ha több feltéltelt szeretnénk ellenőrizni
```php
<?php
$jegy = 4;

if ($jegy == 5) {
    echo "Kiváló";
} elseif ($jegy == 4) {
    echo "jó";
} elseif ($jegy == 3) {
    echo "közepes";
} elseif ($jegy == 2) {
    echo "elégséges";
} elseif ($jegy == 1) {
    echo "elégtelen";
} else {
    echo "Hibás jegy!";
}
?>

```

### Osszehasonlító operátorok 
| Operátor | Jelentés | Példa |
|:---:|:---:|:---:|
| == | egyenlő | $a == $b | 
| === | teljesen egyenlő (típus is) | $a === $b |
| != | nem egyenlő | $a != $b |
| > | nagyobb | $a > $b |
| < | kissebb | $a < $b |
| >= | nagyobb egyenlő | $a >= $b |
| <= | kissebb egyenlő | $a <= $b |

```php
$a = 42;
$b = "42";

if ($a == $b ) {
    //true
}


if ($a === $b ) {
    //false
}


```

### Logikai operátorok

| Operátor | jelentés |
|:---:|:---:|
| && | és |
| \|\| | vagy |
| ! | nem |

```php

$kor = 19;
$jofositvsny = true
if ($kor >= 18 && $jogositvany) {
     echo "Vezethetsz!!";
 }

```

### Switch szerkezet esetválasztás

```php
$nap = 3

switch ($nap) {
    case 1 : echo "hétfő";
             break;
    case 2 : echo "kedd";
             break;            
    case 3 : echo "szerda";
             break;      
             .
             .   
             .
    default : 
            echo "Nincs ilyen sorszámú nap!"         
}

```
### Ternary operátor
```php
$kor = 18;
$uzenet = (ékor >= 18) ? "nagykorú" : "kiskorú";
echo $uzenet;

```

## Ciklusok
### 1. While (előltesztelő)
A while ciklus addig fut, amig a feltétel igaz
```php
    while (feltétel) {
        // ciklusmag
    }
```

```php
    $i = 1;
    while ($i <=10) {
        echo $i . "<br>";
        $i++
    }
```
### 2. do ... while (hátultesztelő)

A ciklusmag egyszer mindenlépp lefut
```php
do  {
    //ciklusmag
} while (feltétel)

```

```php
 $i = 1;
do  {
     echo $i . "<br>";
     $i++
} while ($i <= 10)
```

### 3. for ciklus (növekményes)
Tudjuk, hogy hányszor kell lefutnia a ciklusmagnak
```php
for (kezdőérték; feltétel; lépés) {
    //ciklusmag
}
```
```php
for ($i=1; $i<=10; $i++) {
    echo $i . "<br>";
}
```
### 4. foreach ciklus (tömbök bejárására)
```php
$gyumik = ["alma", "körte","barack"];
foreach($gyumik as $gyumi) {
    echo $gyumi."<br>";
}  
```

```php
$adatok = [
    "nev" => "Pisti",
    "kor" => 45,
    "varos" => "Fehérvár"
    ];
foreach ($adatok as $kulcs => $ertek) {
    echo $kulcs . ": ".$ertek . "<br>";
}    

```

### 5. Break és continue
break: kilép a ciklusból;
continue: kilép a ciklusmagból, de a ciklus folytatódik tovább.


## PHP osztályok és objektumok

```php

class Person {
    //property-k (tulajdonságok)
    public $name;
    public $age;

    // Konstruktor (automatikusan lefut az objektum letrehozásakor)
    public function __construct($name,$age) {
        $this->name = $name;
        $this->age = $age;
    }
    // Metódus (osztály tagfüggvényei)
    public function greet() {
        return "Szia, {$this->name}! Te {$this->age} éves vagy.";
    }
}

$person1 = new Person("Maci",12);
echo $person->greet();

```
```php
class Animal {
    public $name;

    public function speak() {
        return "Néhány állat hangot ad.";
    }
}

class Dog extends Animal {
    public function speak() {
        return "{$this->name} azt mondja: Vau!";
    }
}

$dog = new Dog();
$dog->name = "Bodri";

echo $dog->speak();
```

## Interface
Meghatározza, hogy egy osztálynak milyen methodusokat kell megvalósítania

```php
interface Jarmu {
    public function indul();
    public function megall();
    class Auto implements Jarmu {

    public function indul() {
        echo "Az autó elindult";
    }

    public function megall() {
        echo "Az autó megállt";
    }
    $auto = new Auto();

    $auto->indul();
    $auto->megall();
}
}
```

## OOP példa interface-re Absztrakt osztályra, öröklődésre és a polimorfizmusra
Egy fizetési rendszer példáját használjuk

### 1. Interface létrehozása
Ez meghatározza, hogy minden fizetési módnak legyen egy fizet() metódusa.
```php
interface FizetesiMod {

    public function fizet($osszeg);

}
```
### 2. Absztrakt osztály
Az absztrakt osztály egy alap osztály, amit nem példányosítunk közvetlenül, hanem más osztályok öröklik.
```php
abstract class Fizetes implements FizetesiMod {

    protected $nev;

    public function __construct($nev) {
        $this->nev = $nev;
    }

    public function info() {
        echo "Fizetési mód: " . $this->nev . "<br>";
    }

}
```
### Konkrét osztályok létrehozása (öröklés)
```php
class Bankkartya extends Fizetes {

    public function fizet($osszeg) {
        echo "Bankkártyával fizetve: $osszeg Ft <br>";
    }

}

class Paypal extends Fizetes {

    public function fizet($osszeg) {
        echo "PayPal fizetés: $osszeg Ft <br>";
    }

}

```
### 4. objektumok használata

```php
$fizetes1 = new Bankkartya("Bankkártya");
$fizetes1->info();
$fizetes1->fizet(5000);

$fizetes2 = new Paypal("PayPal");
$fizetes2->info();
$fizetes2->fizet(3000);
```

### Polimorfizmus
A polimorfizmus azt jelenti, hogy ugyanazt a metódust többféle objektum másképp valósítja meg.

```php

$fizetesek = [
    new Bankkartya("Bankkártya"),
    new Paypal("PayPal")
];

foreach ($fizetesek as $fizetes) {
    $fizetes->fizet(2000);
}

```

### Összegzés
    - Interface

        előírja a fizet() metódust

    - Abstract class

        közös kódot tartalmaz (info())

    - Öröklődés

        Bankkartya és Paypal öröklik a Fizetes osztályt

    - Polimorfizmus

        ugyanaz a fizet() metódus másképp működik



# 1. Dependency Injection (DI)

A **Dependency Injection** azt jelenti, hogy egy osztály nem maga hozza létre a szükséges objektumokat, hanem **kívülről kapja meg őket**.

Ez:

* lazább csatolást eredményez
* könnyebb tesztelhetőséget ad
* tisztább architektúrát biztosít

---

## Rossz példa (szoros csatolás)

```php
class EmailService {

    public function send($message) {
        echo "Email küldése: " . $message;
    }

}

class UserService {

    private $emailService;

    public function __construct() {
        $this->emailService = new EmailService();
    }

    public function registerUser() {
        $this->emailService->send("Sikeres regisztráció");
    }

}
```

Itt a `UserService` **maga hozza létre** az `EmailService`-t.

Ez problémás:

* nehéz tesztelni
* nehéz cserélni az implementációt

---

## Jó példa (Dependency Injection)

```php
class EmailService {

    public function send($message) {
        echo "Email küldése: " . $message;
    }

}

class UserService {

    private $emailService;

    public function __construct(EmailService $emailService) {
        $this->emailService = $emailService;
    }

    public function registerUser() {
        $this->emailService->send("Sikeres regisztráció");
    }

}

$emailService = new EmailService();
$userService = new UserService($emailService);

$userService->registerUser();
```

Most a függőség **kívülről érkezik**.

---

# 2. Repository Pattern

A **Repository Pattern** célja, hogy elválassza:

* az **adatbázis kezelést**
* az **üzleti logikát**

Ez tisztább és tesztelhetőbb kódot eredményez.

```php

class UserRepository { 
    public function findById($id) 
    { return [ "id" => $id, "name" => "Anna" ]; } }
```

# Service Layer
Ez fogja tartalmazni az üzleti logikát

```php
class UserService { private $repo; 
    public function __construct(UserRepository $repo) {
         $this->repo = $repo; } 
    public function getUser($id) { 
        return $this->repo->findById($id); 
        }
 }
```
# Controller
A kontroller kezeli a http kéréseket
```php
class UserController { private $service;
 public function __construct(UserService $service) { 
    $this->service = $service;
    }
 public function show($id) {
     $user = $this->service->getUser($id); 
     print_r($user); 
    }
 }

```


