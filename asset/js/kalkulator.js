function KalkulatorKalori(type){
	this.type = type;
	this.umur = null;
	this.jenkel = null;
	this.bb = null;
	this.tb = null;
	this.aktifitas = null;
	this.tanggal = null;

	this.BMR = null;
	this.BMI = null;
	this.kalori = null;

}
	
	this.setUmur = function(inputUmur){
		this.umur = parseFloat(inputUmur);
	}

	this.setJenkel = function(inputJenkel){
		this.jenkel = parseFloat(inputJenkel);
	}
	this.setBb = function(inputBb){
		this.bb = parseFloat(inputBb);
	}
	this.setTb = function(inputTb){
		this.tb = parseFloat(inputTb);
	}
	this.setAktifitas = function(inputAktifitas){
		this.aktifitas = parseFloat(inputAktifitas);
	}
	//diitung ning kene 
	this.CalculateInfo = function(){
		
		if(this.jenkel == 1){
			this.BMR = 66.4730 + (13.7516 * this.bb) + (5.0033 * this.tb) - (6.7550 * this.umur);
		}else if (this,jenkel == 2){
			this.BMR = 655.0955 + (9.5634 * this.bb) + (1.8496 * this.tb) - (4.6756 * this.umur);
		}

		var aktifitas;
		if(this.aktifitas == 1){
			this.kalori = this.BMR * 1.2;
		}else if (this.aktifitas == 2){
			this.kalori = this.BMR * 1.375;
		}else if (this.aktifitas == 3){
			this.kalori = this.BMR * 1.55;
		}else if (this.aktifitas == 4){
			this.kalori = this.BMR * 1.725;
		}else if(this.aktifitas == 5){
			this.kalori = this.BMR * 1.9;
		}

		this.BMI = (this.bb)/((this.tb/100)*(this.tb/100));
	}

	//ditoke ning fungsu kalori string
	this.bmiString = function(){
		var returnStr = "<b>BMI: " + Math.round(this.BMI*10)/10 +"</b>";
		return returnStr;
	}
	this.bmikategoristring= function(){
		var returnStr = "<b>";
		if (umur >= 17) {
			if (this.BMI < 16.5) returnStr += " Kategori Berat Badan Kamu <br>(Berat Badan Sangat Kurang)";
			else if (this.BMI < 18.5) returnStr += " Kategori Berat Badan Kamu <br>(Berat Badan Kurang)";
			else if (this.BMI < 25) returnStr += " Kategori Berat Badan Kamu <br>(Normal)";
			else if (this.BMI < 30) returnStr += " Kategori Berat Badan Kamu <br>(Berat Badan Berlebih)";
			else returnStr += " Kategori Berat Badan Kamu <br>(Obesitas)";
		}
		returnStr += "</b>";
		return returnStr;

	}
	this.bmrString = function(){
		return "<b>"+ Math.round(this.BMR) + "</b><br/> Kalori/Hari";
	}
	this.kaloriString = function(){
		return "<b>"+Math.round(this.kalori) + "</b><br/> Kalori/Hari";
	}
	this.umurString = function(){
		return "<b>" + this.umur + "</b>";
	}
	this.jenkelString = function(){
		if(this.jenkel==1){
			return "<b>" + "Pria" + "</b>";	
		}else if(this.jenkel==2){
			return "<b>" + "Wanita" + "</b>";
		}else{
			return "unknown"
		}
		
	}
	this.tbString = function(){
		return "<b>" + this.tb + "</b>";
	}
	this.bbString = function(){
		return "<b>" + this.bb + "</b>";
	}
	this.aktifitasString = function(){
		if(this.aktifitas==1){
			return "<b>" + "Tidak Aktif" + "</b>";	
		}else if(this.aktifitas==2){
			return "<b>" + "Aktifitas Ringan" + "</b>";	
		}else if(this.aktifitas==3){
			return "<b>" + "Aktifitas Sedang" + "</b>";	
		}else if(this.aktifitas==4){
			return "<b>" + "Aktifitas Berat" + "</b>";	
		}else if(this.aktifitas==5){
			return "<b>" + "Aktifitas Sangat Berat" + "</b>";	
		}
	}

function isNull(a){
	if (a == null || a == ""){
		return true;
	}
	return false;
}

function calculate(){
	var calculator = new KalkulatorKalori("KalkulatorKalori");

	//get valure from form
	setUmur(document.getElementById("umur").value);

	setJenkel(document.getElementById("jenkel").value);	

	setBb(document.getElementById("bb").value);

	setTb(document.getElementById("tb").value);

	setAktifitas(document.getElementById("aktifitas").value);

	CalculateInfo();

	document.getElementById("kalori").innerHTML = kaloriString();
	document.getElementById("BMR").innerHTML = bmrString();
	document.getElementById("BMI").innerHTML = bmiString();
	document.getElementById("BMIkategori").innerHTML = bmikategoristring();
	document.getElementById("umurstr").innerHTML = umurString();
	document.getElementById("jenkelstr").innerHTML = jenkelString();
	document.getElementById("bbstr").innerHTML = bbString();
	document.getElementById("tbstr").innerHTML = tbString();
	document.getElementById("aktifitasstr").innerHTML = aktifitasString();

	clicky.log('#calculate');
}