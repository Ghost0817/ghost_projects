
/***
        |This program generates up to 16 passwords of between 3 and 16 characters in 
        |length.
        |
        |You will be prompted for the values of all parameters when the program is run 
        |- there are no command line options to memorize.
        |
        |The passwords can either be written to the console or to a file (pwds.txt), 
        |or both.
        |
        |The passwords must contain at least one each of the following character types:
        |   lower-case letters :  a -> z
        |   upper-case letters :  A -> Z
        |   digits             :  0 -> 9
        |   other characters   :  !"#$%&'()*+,-./:;<=>?@[]^_{|}~
        |
        |Optionally, a seed can be set for the random generator 
        |(any non-zero Long integer) otherwise the default seed will be used. 
        |Even if the same seed is set, the passwords won't necessarily be exactly
        |the same on each run as additional random shuffles are always performed.
        |
		|There are three options to create new passord.
		|   Exclude Ambiguous    : {} [] () /\ ' " ` ~ , ; : . < >
		|   Exclude Similar      : Il1  O0  5S  2Z
		|   Auto Select Password : Auto select new password
		|   Save Preference      : save to local storage
		|
		|
		|
		|
        |You can also copy or send email the new password.
        |
        | 
        |Finally, the only command line options permitted are -h and -help which
        |will display this page and then exit.
        |
        |Any other command line parameters will simply be ignored and the program
        |will be run normally.
        |
***/

const jsonPrefence = JSON.parse(window.localStorage.getItem('preference'));
var currentValue = false, inputValue = true;
if(jsonPrefence !== null){
	currentValue = jsonPrefence[9].value;
	inputValue = document.getElementById("opt_save").checked;
}

if(currentValue) {
	/// set values from local storage to fields
	for(var i=0; i < jsonPrefence.length;i++) {
		if(jsonPrefence[i].type == "checkbox") {
			document.getElementById(jsonPrefence[i].name).checked = jsonPrefence[i].value;
		} else {
			document.getElementById(jsonPrefence[i].name).value = jsonPrefence[i].value;
		}
	}
} else {
	savePreference();
}
document.getElementById("opt_random_min").onchange =  function() {
	if(parseInt(document.getElementById("opt_random_min").value) <= 15) {
		if(parseInt(document.getElementById("opt_random_min").value) >= parseInt(document.getElementById("opt_random_max").value)){
			document.getElementById("opt_random_max").value = parseInt(document.getElementById("opt_random_min").value) + 1;
		}
		savePreference();
	} else {
		document.getElementById("opt_random_min").value= "12";
		document.getElementById("opt_random_max").value= "16";
		return;
	}
	if(parseInt(document.getElementById("opt_random_min").value) < 3) {
		document.getElementById("opt_random_min").value= "12";
		document.getElementById("opt_random_max").value= "16";
	}
};
document.getElementById("opt_random_max").onchange =  function() {
	if(parseInt(document.getElementById("opt_random_max").value) <= 16) {
		if(parseInt(document.getElementById("opt_random_max").value) <= parseInt(document.getElementById("opt_random_min").value)){
			document.getElementById("opt_random_min").value = parseInt(document.getElementById("opt_random_max").value) - 1;
		}
	} else {
		document.getElementById("opt_random_min").value= "15";
		document.getElementById("opt_random_max").value= "16";
	}
	if(parseInt(document.getElementById("opt_random_max").value) < 4) {
		document.getElementById("opt_random_min").value= "12";
		document.getElementById("opt_random_max").value= "16";
	}
	savePreference();
};

document.getElementById("opt_uppercase").onchange =  function() { savePreference(); };
document.getElementById("opt_lowercase").onchange =  function() { savePreference(); };
document.getElementById("opt_numbers").onchange =  function() { savePreference(); };
document.getElementById("opt_symbols").onchange =  function() { savePreference(); };

document.getElementById("opt_no_amb").onchange =  function() { savePreference(); };
document.getElementById("opt_no_similar").onchange =  function() { savePreference(); };
document.getElementById("opt_autoselect").onchange =  function() { savePreference(); };
document.getElementById("opt_save").onchange =  function() { savePreference(); };

function savePreference() {
	if(inputValue) {
		const preference = [
		{
			"name": document.getElementById("opt_random_min").name,
			"type": document.getElementById("opt_random_min").type,
			"value": document.getElementById("opt_random_min").value,
			"disabled": document.getElementById("opt_random_min").disabled,
			"default": 12
		},
		{
			"name": document.getElementById("opt_random_max").name,
			"type": document.getElementById("opt_random_max").type,
			"value": document.getElementById("opt_random_max").value,
			"disabled": document.getElementById("opt_random_max").disabled,
			"default": 16
		},
		{
			"name": document.getElementById("opt_uppercase").name,
			"type": document.getElementById("opt_uppercase").type,
			"value": document.getElementById("opt_uppercase").checked,
			"disabled": document.getElementById("opt_uppercase").disabled,
			"default": true
		},
		{
			"name": document.getElementById("opt_lowercase").name,
			"type": document.getElementById("opt_lowercase").type,
			"value": document.getElementById("opt_lowercase").checked,
			"disabled": document.getElementById("opt_lowercase").disabled,
			"default": true
		},
		{
			"name": document.getElementById("opt_numbers").name,
			"type": document.getElementById("opt_numbers").type,
			"value": document.getElementById("opt_numbers").checked,
			"disabled": document.getElementById("opt_numbers").disabled,
			"default": true
		},
		{
			"name": document.getElementById("opt_symbols").name,
			"type": document.getElementById("opt_symbols").type,
			"value": document.getElementById("opt_symbols").checked,
			"disabled": document.getElementById("opt_symbols").disabled,
			"default": true
		},
		{
			"name": document.getElementById("opt_no_amb").name,
			"type": document.getElementById("opt_no_amb").type,
			"value": document.getElementById("opt_no_amb").checked,
			"disabled": document.getElementById("opt_no_amb").disabled,
			"default": false
		},
		{
			"name": document.getElementById("opt_no_similar").name,
			"type": document.getElementById("opt_no_similar").type,
			"value": document.getElementById("opt_no_similar").checked,
			"disabled": document.getElementById("opt_no_similar").disabled,
			"default": true
		},
		{
			"name": document.getElementById("opt_autoselect").name,
			"type": document.getElementById("opt_autoselect").type,
			"value": document.getElementById("opt_autoselect").checked,
			"disabled": document.getElementById("opt_autoselect").disabled,
			"default": false
		},
		{
			"name": document.getElementById("opt_save").name,
			"type": document.getElementById("opt_save").type,
			"value": document.getElementById("opt_save").checked,
			"disabled": document.getElementById("opt_save").disabled,
			"default": true
		}
		];
		window.localStorage.setItem('preference', JSON.stringify(preference));
	}
}

//document.getElementById("opt_save").onclick = function() { savePreference(); };
document.getElementById("btnCopy").onclick = function() {
	if(document.getElementById("password").value == ""){
		//Information
		alert('Nothing selected');	
	} else {
		document.getElementById("password").focus();
		document.getElementById("password").select();
		document.execCommand('copy');
		alert('Copied to Clipboard');
		deselectAll();
	}
};

function deselectAll() {
  var element = document.activeElement;
  
  if (element && /INPUT|TEXTAREA/i.test(element.tagName)) {
    if ('selectionStart' in element) {
      element.selectionEnd = element.selectionStart;
    }
    element.blur();
  }

  if (window.getSelection) { // All browsers, except IE <=8
    window.getSelection().removeAllRanges();
  } else if (document.selection) { // IE <=8
    document.selection.empty();
  }
};

document.getElementById("btnSend").onclick = function() {
	if(document.getElementById("password").value == ""){
		//Information
		alert('Nothing selected');	
	} else {
		var link = "mailto:me@example.com;"
			+ "?subject=" + escape("Here is your new password")
			+ "&body=" + encodeURIComponent(
			"\r\n"+ 
			"----------\r\n")+ 
			escape(document.getElementById('password').value) +
			encodeURIComponent("\r\n----------\r\n"+ 
			"Generated By Random Password Generator - https://localhost:8080.org/")
		;

		window.location.href = link;
	}
}

	var Password = {
 
  _pattern : /[a-zA-Z0-9]/,
  _length: 13,
  _similar : /[Il1O05S2Z]/,
  _opt_no_amb: false,
  _opt_no_similar: true,
  _init: function(){
	document.getElementById("password").value = this.generate();
	if(document.getElementById("opt_autoselect").checked) {
		document.getElementById("password").focus();
		document.getElementById("password").select();
	}
  },
  _getRandomByte : function()
  {
    // http://caniuse.com/#feat=getrandomvalues
    if(window.crypto && window.crypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.crypto.getRandomValues(result);
      return result[0];
    }
    else if(window.msCrypto && window.msCrypto.getRandomValues) 
    {
      var result = new Uint8Array(1);
      window.msCrypto.getRandomValues(result);
      return result[0];
    }
    else
    {
      return Math.floor(Math.random() * 256);
    }
  },
  
  generate : function()
  {
	// getting random length
	this._length = this._getRand(document.getElementById("opt_random_min").value, document.getElementById("opt_random_max").value);
	
	var passregex = "";
	
	if(document.getElementById("opt_uppercase").checked) {
		passregex = passregex + "A-Z";
	}
	
	if(document.getElementById("opt_lowercase").checked) {
		passregex = passregex + "a-z";
	}
	
	if(document.getElementById("opt_numbers").checked) {
		passregex = passregex + "0-9";
	}
	// ! @ # $ % ^ & * _ - + = | ?
	// {} [] () /\ ' " ` ~ , ; : . < >
	if(document.getElementById("opt_symbols").checked) {
		passregex = passregex + "!@#$%^&*_\\-\\+=|?{}\\[\\]/\\\\\\'\"`~,;:\\.<>";
	}
	if(document.getElementById("opt_no_amb").checked) {
		this._opt_no_amb = true;
	} else {
		this._opt_no_amb = false;
	}
	if(document.getElementById("opt_no_similar").checked) {
		this._opt_no_similar = true;
	} else {
		this._opt_no_similar = false;
	}
	
	
	this._pattern = new RegExp('[' + passregex + ']');
	var _pattern_of_amb = new RegExp('[' + "{}\\[\\]/\\\\\\'\"`~,;:\\.<>" + ']');
    return Array.apply(null, {'length': this._length})
      .map(function()
      {
        var result;
        while(true) 
        {
          result = String.fromCharCode(this._getRandomByte());
		  console.log(this._opt_no_similar);
		  if(this._opt_no_similar == true && this._opt_no_amb == false) {
			  if(!this._similar.test(result) && this._pattern.test( result))
			  {
				return result;
			  }
		  } 
		  if(this._opt_no_similar == true && this._opt_no_amb == true) {
			  if(!_pattern_of_amb.test(result) && !this._similar.test(result) && this._pattern.test( result))
			  {
				return result;
			  }
		  } 
		  if(this._opt_no_similar == false && this._opt_no_amb == true) {
			  if(!_pattern_of_amb.test(result) && this._pattern.test( result))
			  {
				return result;
			  }
		  } 
		  if(this._opt_no_similar == false && this._opt_no_amb == false){
			  if(this._pattern.test( result))
			  {
				return result;
			  }
		  }
        }        
      }, this)
      .join('');  
  },
  _getRand : function(min, max){
	var number = Math.floor(Math.random() * (+max - +min)) + +min;
    return number;
  }
    
};