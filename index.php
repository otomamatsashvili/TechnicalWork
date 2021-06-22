<?php
// დავალაება 1

function fibo($n) {
    if(!$n) return [];
    else if($n==1) return [0];
    else {
        $fibo_arr = [0, 1];
        $index=1;
        while($n>2){
            $fibo_arr[] = $fibo_arr[$index] + $fibo_arr[$index - 1];
            $index++;
            $n--;
            
        }
        return $fibo_arr;
    }

}

echo "ამოცანა 1";
echo "<pre>";

print_r(fibo(7));

echo "</pre>";

// დავალება 2

function reverse_number($n){
    $reversed_n = 0;
    while($n){
        $reversed_n = $reversed_n*10 + $n%10;
        $n = ($n - $n%10)/10;
    }
    return $reversed_n;
}

echo "<br>";
echo "ამოცანა 2";
echo "<br>"."<br>";

echo reverse_number(12345);

echo "<br>";

// დავალება 3

function progression(...$args){
    $increment = $args[1] - $args[0];
    for ($i=2; $i<count($args); $i++){
        if(($args[$i] - $args[$i-1])!=$increment) return FALSE;
    }
    return TRUE;
}

echo "<br>";
echo "ამოცანა 3";
echo "<br>"."<br>";

echo progression(4, 7, 10, 13, 16, 19, 22);
echo "<br>";
echo progression(5, 3, 1, -1, -3);

echo "<br>";

// დავალება 4

function move_zeros($numbers){
    $nonzero_length = count($numbers); // ითვლის შეუმოწმებელი მნიშვნელობების რაოდენობას.
    for ($i=0; $i < $nonzero_length; $i++){
        $number = $numbers[$i];
        do{
            if ($number%10==0) { // პოულობს რიცხვებს რომლებიც შეიცავს 0-ს.
                for($j=$i; $j < count($numbers) - 1; $j++){ // ციკლს ეს ელემენტი გადააქვს მასივის ბოლოში.
                    $numbers[$j] = $numbers[$j] + $numbers[$j+1];
                    $numbers[$j+1] = $numbers[$j] - $numbers[$j+1];
                    $numbers[$j] = $numbers[$j] - $numbers[$j+1];
                }
                $nonzero_length--; // მცირდება სიგრძე, რადგან ბოლო ელემენტი უკვე აღარ უნდა შემოწმდეს.
                $i--; // მცირდება ინდექსი რათა, ციკლი ელემენს არ გადაახტეს.
                break;
            }
            $number = ($number - $number%10)/10;
        } while($number);
    }
    return $numbers;
}

$arr = [1, 0, 30, 1, 40, 9];


echo "<br>";
echo "ამოცანა 4";
echo "<pre>";

print_r(move_zeros($arr));

echo "</pre>";
echo "<br>";



// დავალება 5

function max_rate($numbers){
    $number_rates = []; // მოცემულ მასივში ფუნქციისთვის გადაცემული რიცხვების შესაბამის ინდექსებზე ითვლება ამ რიცხვების რაოდენობა.
    foreach($numbers as $number){
        if ($number_rates[$number]) $number_rates[$number]++; // თუ უკვე განსაზღვრულია number-ის შესაბამისი ინდექსი მისი მნიშვნელობა იზრდება.
        else $number_rates[$number] = 1; // თუ არ არის 1 ის ტოლი ხდება.
    }

    return array_keys($number_rates, max($number_rates)); // ფუნქცია აბრუნებს იმ რიცხვის ან რიცხვების მასივს, რომლებიც ყველაზე მეტჯერ მეორდება ფუნქციისთვის გადაცემულ მასივში.
}

$arr = [1, 0, 30, 1, 1, 17, 88, 33, 17, 99, 99, 99, 17, 100, 100, 100, 3 ];

echo "<br>";
echo "ამოცანა 5";
echo "<pre>";

print_r(max_rate($arr));

echo "</pre>";

?>