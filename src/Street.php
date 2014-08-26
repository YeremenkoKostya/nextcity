<?php

namespace kostya/phpcave;

class Street {

        public $amountHouse;
        public $nameStreet;
	public $lengthStreet;
	public $width;
	public $length;
        public $Houses = array();

        //public $janitors;



        public function __construct(){
        $this->amountHouse = rand(1,5);
        $nameStreetAr = array("Ленина", "Гагарина", "Московская", "Киевская", "Харьковская");
        $nameStreetArRes = array_rand($nameStreetAr, 1);
        $this->nameStreet = $nameStreetAr[$nameStreetArRes];
        $this->lengthStreet = rand(600,800);
	$this->width = rand(-90,90);
	$this->length = rand(-180,180);
        $this->createArrayHouse();
        //$this->showArrayHouse();
        }

        public function createArrayHouse() {
                $sumHouses = array();
               	for($i=0; $i<$this->amountHouse; $i++){ //this->amountHouse - 3
			 $sumHouses[$i] = new House();
          }
			$this->Houses = $sumHouses;
                        //var_dump($this->Houses);
	  }
	public function showArrayHouse() {
		foreach ($this->Houses as $key=>$value) {
		//var_dump($this->Houses);
		}
                //var_dump($this->Houses);
		}
         public function janitors () {//рассчитывает количество дворников, которое необходимо для уборки прилегающих территорий всех домов по улице в зависимости от площади этих территорий;
             $sumAreaTer=0;
             for($i=0;$i<$this->amountHouse;$i++) {
                 $sumAreaTer+=$this->Houses[$i]->landTax();
             }
             $janitors=ceil($sumAreaTer/1000);
            // echo "Для уборки территории всех домов необходимо - ".$this->janitors." дворников";
                       // echo "Oбщая площадь территорий всех домов составит - ".$sumAreaTer." м2";
			return ($janitors);
	}

        public function costAllPayFlatsHouses(){
               $sum=0;
            for($i=0; $i < $this->amountHouse; $i++){
                 $sum += $this->Houses[$i]->costAllPayFlats();
                 //echo "<h3>Сумма платежей по всем квартирам ВО ВСЕХ ДОМАХ за все коммунальные услуги составит - ".$sum." грн";
             }
               //echo "<h3>Сумма платежей по всем квартирам ВО ВСЕХ ДОМАХ за все коммунальные услуги составит - ".$sum." грн";
             return ($sum);
           }

             public function showAllPayFlatsHouses() {
             echo"<h3>Сумма платежей по всем квартирам ВО ВСЕХ ДОМАХ за все коммунальные услуги составит - ".round(($this->costAllPayFlatsHouses()),2)." грн";
             }

             public function infoStreet(){ // функция информацию о доме
                    return array (
                    "Количество домов - "=>$this->amountHouse,
                    "Наименование улицы - "=>$this->nameStreet,
                    "Длинна улицы - "=>$this->lengthStreet,
                    "Широта - "=>$this->width,
                    "Долгота - "=>$this->length,
                    "Сумма платежей по всем квартирам ВО ВСЕХ ДОМАХ за все коммунальные услуги составит - "=>round(($this->costAllPayFlatsHouses()),2),
		    "Для уборки территории всех домов необходимо дворников - "=>$this->janitors(),
		    );
                    }

                    public function showInfoStreet() {
				foreach ($this->infoStreet() as $key=>$value) {
					echo $key.$value."<br>";
				}
                    }
}

?>
