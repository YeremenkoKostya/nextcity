<?php

namespace kostya/phpcave;

class Flat {
        public $Gas=10.9;
        public $Heat=12.0;
        public $CoolWater=8.0;

	public $rooms;
	public $area;
	public $tenants;
	public $bal;
        public $elect;

        public $addTenan;
        public $delTenan;
	public $costHeat;
	public $areaCost;
	public $costGas;
        public $costElect;

	public $AllPayArray;
        public $costAllPay;
        public $infoFlat;
        public $showInfoFlat;




        public function __construct(){
        $balHav = array("отсутствует", "присутствует");
        $balHavRes = array_rand($balHav, 1);

        $this->rooms = rand(1,5);
	$this->area = rand(60,320);
	$this->tenants = rand(1,9);
        $this->elect =  rand(10,2000);
        $this->bal = $balHav[$balHavRes];


	$this->elect = rand(10,1500);

        }

        //-----------------------------------НОВОЕ 25.07.2014-------------------------------------------------------------------

         public function addTenan(){ // функция добавляет одного жильца и выводит на экран
            $this->tenants+=1;
           // echo "<hr>Количество жильцов = ".$this->tenants;
            return $this->tenants;
	}

         public function delTenan(){ // функция добавляет одного жильца и выводит на экран
            $this->tenants-=1;
            //echo "<hr>Удалили одного жильца. <br>Количество жильцов = ".$this->tenants;
            return $this->tenants;
	}

        public function costCoolWater(){ // функция считает стоимость холодной воды, зависит от числа жителей
		$this->costCoolWater = $this->tenants * $this->CoolWater;
		#echo "Оплата за холодную воды составит ".$coolWater." грн<br>";
                return $this->costCoolWater;
                }

                public function costHeat(){// функция считает стоимость тепла, зависит от площади
                $this->costHeat = $this->Heat*$this->area;
		#echo "Оплата за центральное тепло составит ".$costHeat." грн<br>";
                return $this->costHeat;
                }

                public function areaCost(){ // функция считает квартплату
		if ($this->area >= 200){
		$this->areaCost = $this->area*2.0;
                #echo "Кварплата составит ".$areaCost." грн<br>";
		return $this->areaCost;
		}
		else {
		$this->areaCost = $this->area*1.15;
		#echo "Кварплата составит ".$areaCost." грн<br>";
                return $this->areaCost;
		}
                }

                public function costGas(){ // функция считает стоимость газа, щзависит от количества жильцов
		$this->costGas= $this->Gas*$this->tenants;
		#echo "Оплата за газ составит ".$costGas." грн<br>";
                return $this->costGas;
                }

                public function costElect(){ // функция считает стоимость электроэнергии, зависит от расхода электричества
                if ($this->elect < 150){
                $this->costElect = $this->elect*0.3084;
               // echo "Оплата за электроэнергию составит ".$this->costElect." грн<br>";
                return $this->costElect;
                }
                elseif ($this->elect >= 150 AND $this->elect<800) {
                $this->costElect = (150 * 0.3084)+(($this->elect-150)*0.4194);
                //echo "Оплата за электроэнергию составит ".$this->costElect." грн<br>";
                return $this->costElect;
                }
                else {
                $this->costElect = (150 * 0.3084)+(550*0.4194)+(($this->elect-800)*1.3404);
                //echo "Оплата за электроэнергию составит ".$this->costElect." грн<br>";
                return $this->costElect;
                }
                }


                public function infoFlat(){ // функция создает массив квартиры
                    return array (
                      "Количество комнат - "=>$this->rooms,
                      "Площадь квартиры - "=>$this->area,
                      "Количество жильцов - "=>$this->tenants,
                      "Наличие балкона - "=>$this->bal);
                }


                public function showInfoFlat(){ // выводит на экран массив квартиры
                //$this->infoFlat();
                foreach ($this->infoFlat() as $key =>$value){
                        echo $key.$value."<br>";
                        }
                }



                public function AllPayArray(){ // функция суммирует комунальные платежи квартиры
                    return array("Кварплата составит - "=>$this->areaCost(),
				"Оплата за газ составит - "=>$this->costGas(),
				"Оплата за центральное тепло составит - "=>$this->costHeat(),
				"Оплата за холодную воды составит - "=>$this->costCoolWater(),
				"Оплата за электроэнергию составит - "=>$this->costElect());
                }

                public function costAllPay(){
                    //$this->costAllPay();
                    $sum=0;
                    foreach($this->AllPayArray() as $key => $value) {
                   // echo ($key." ".round(($value),2)." грн"."<br>");
                        $sum+=$value;
                    }
                    //echo("Сумма месячного платежа за все коммунальные услуги ".round($sum,2)." грн");
                    return $sum;
                    }




       //=================================================================================


}

?>