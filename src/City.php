<?php

namespace kostya/phpcave;

class City {

        public $nameCity;
        public $amountStreet;
        public $year;
	public $width;
	public $length;
        public $Streets = array();
        //public $population;
        //public $cityLandTax;




        public function __construct(){
        $nameCityAr = array("Харьков", "Киев", "Москва", "Лондон", "Рим");
        $nameCityArRes = array_rand($nameCityAr, 1);
        $this->nameCity = $nameCityAr[$nameCityArRes];
        $this->amountStreet = rand(1,5);
        $this->year = rand(1600,2000);
	$this->width = rand(-90,90);
	$this->length = rand(-180,180);
        }


        public function createArrayStreet() {
                $sumStreets = array();
               	for($i=0; $i<$this->amountStreet; $i++){ //this->amountHouse - 3
			 $sumStreets[$i] = new Street();
          }
			$this->Streets = $sumStreets;
                        //var_dump($this->Streets);
	  }
	public function showArrayStreet() {
		foreach ($this->Streets as $key=>$value) {
		}
                echo "<pre>";
                print_r ($this->Streets);
                echo "</pre>";
		}

        public function population() {
                $sum=0;
		foreach ($this->Streets as $value) {
                    foreach ($value->Houses as $value2){
                        foreach ($value2->flats as $value3){
                                 $sum+=$value3->tenants;

                    }
                }
             }
                //echo "<pre>";
                //print_r ($this->Streets);
                //echo "</pre>";
                //var_dump($this->Streets);
        //echo "Население города - ".$sum." человек";
        return $sum;
        }

        public function cityLandTax() {
                $sum=0;
		foreach ($this->Streets as $value) {
                    foreach ($value->Houses as $value2){
                        $sum+=$value2->landTax();
                    }
                }
                //echo "Бюджет населенного пункта в зависимости от размера налога на землю- ".$sum." грн";
                return $sum;
             }

             public function infoCity(){ // функция информацию о доме
                    return array (
                    "Название города - "=>$this->nameCity,
                    "Количество улиц - "=>$this->amountStreet,
                    "Год основания города - "=>$this->year,
                    "Широта - "=>$this->width,
                    "Долготаю - "=>$this->length,
                    "Население города  - "=>$this->population(),
		    "Бюджет населенного пункта в зависимости от размера налога на землю - "=>$this->cityLandTax()
                    );
                    }

             public function showInfoCity() {
			foreach ($this->infoCity() as $key=>$value) {
			echo $key.$value."<br>";
				}
                    }
}
?>