<?php

namespace kostya/phpcave;

class House {

	public $amountFloor;
	public $amountPorch;
	public $amountFlat;
	public $areaTer;
	public $feature;
	public $commissioned;
        public $infoHouse;
        public $flats = array();


        public $volumeElect;
        public $allElect;
        public $landTax;

	function __construct(){

            $featureAr = array("кирпичный", "бетонный", "деревянный");
            $featureArRes = array_rand($featureAr, 1);

      	$this->numberHouse = rand(1000,1010);
	$this->amountFloor = rand(1,9);
        $this->amountPorch = rand(2,12);
        $this->amountFlat= $this->amountFloor * $this->amountPorch;
	$this->areaTer = rand(200,1000);
	$this->feature = $featureAr[$featureArRes];
	$this->commissioned = rand(1990,2010);
        $this->createArrayFlat();
        //$this->showArrayFlat();
        }


        public function createArrayFlat() {
		//$this->amountFlat = $this->amountFloor * $this->amountPorch;
			$appartament= array();
		for($i=0; $i<$this->amountFlat; $i++){ //$this->amountFlat
			 $appartament[$i] = new Flat();
          }
			$this->flats = $appartament;
                        //return $this->amountFlat;
                        //var_dump($this->flats);
	  }
		public function showArrayFlat() {
			foreach ($this->flats as $key=>$value) {
				//var_dump($this->flats);
		}
                //var_dump($this->flats);
		}

            public function costAllPayFlats(){
             //$this->amountFlat = $this->amountFloor * $this->amountPorch;
                     $sum=0;
            for($i=0; $i<$this->amountFlat; $i++){ //$sumFlats
                 $sum += $this->flats[$i]->costAllPay();
             }
                         return ($sum);
           }

             public function showAllPayFlats() {
                  echo "<h3>Количество квартир - ".($this->amountFloor * $this->amountPorch);
                  echo"<h3>Сумма платежей по всем квартирам за все коммунальные услуги составит - ".round(($this->costAllPayFlats()),2)." грн";
             }

            function volumeElect(){ // функция рассчитывает объем потребляемого электричества для освещения подъездов в зависимости от количества подъездов и этажей;
                    $allLamp = $this->amountPorch*(1+$this->amountFloor);
                    $volumeElect = $allLamp*0.15*12*30;
                    #echo "В доме всего ".$allLamp." ламп";
                    //echo "Oбъем потребляемого электричества для освещения подъездов дома составит - ".$volumeElect." кВт за месяц.";
                    return $volumeElect;
            }

            public function AllElectFlats() {
		 $sumFlats = $this->amountFloor * $this->amountPorch;
			$AllElectFlats=0;
		for($i=0;$i<$sumFlats;$i++) {
			$AllElectFlats+=$this->flats[$i]->costElect();
		}
                        //echo "Oбъем потребляемого электричества для освещения подъездов дома составит - ".$AllElectFlats." кВт за месяц.";
			return $AllElectFlats;
	}

            public function allElect(){
                $this->allElect=($this->volumeElect())+($this->AllElectFlats());
                //echo "<h3>Oбъем потребляемого электричества для освещения подъездов дома и всех квартир составит - ".$allElect;
                return $this->allElect;
            }

            public function landTax(){

              $this->landTax = $this->areaTer*15;
              //echo "Налог на землю в зависимости от размера терртории для дома составит - ".$this->landTax." грн в месяц.";
              #$landTax = array ($this->numberHouse=>$this->areaTer);
              //echo  $this->landTax;
              return $this->landTax;
              }

                    public function infoHouse(){ // функция информацию о доме
                    return array (
                    "Количество этажей - "=>$this->amountFloor,
                    "Количество подъездов - "=>$this->amountPorch,
                    "Площадь прилегающей территории - "=>$this->areaTer,
                    "Материал здания - "=>$this->feature,
                    "Год сдачи в эксплуатацию - "=>$this->commissioned,
                    "Сумма платежей по всем квартирам за все коммунальные услуги составит - "=>round(($this->costAllPayFlats()),2),
		    "Oбъем потребляемого электричества для освещения подъездов дома составит - "=>$this->volumeElect(),
		    "Налог на землю в зависимости от размера терртории для дома составит -"=>$this->landTax()
                    );
                    }

                    public function showInfoHouse() {
				foreach ($this->infoHouse() as $key=>$value) {
					echo $key.$value."<br>";
				}
                    }
}
?>
