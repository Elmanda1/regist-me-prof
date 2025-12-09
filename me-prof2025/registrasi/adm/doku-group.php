
<?php
$useJS=2;
$useCSS=0;
include_once "conf.php";

//$BASKET=$transbasket;
$TRANSIDMERCHANT=$transid;
$jam=date('yMdhms');

//tambahan biaya Administration fee,5880000,1,5880000.00 
$transamount=$transamount*100/96.5;
$admfee=$transamount*3.5/100;
$xadmfee=number_format(round($admfee,0),2,".","");
$transbasket.=";Administration Fee,$xadmfee,1,$xadmfee";
$BASKET=$transbasket;
$AMOUNT=$totalamount=number_format(round($transamount,0),2,".","");

if ($AMOUNT==0) {
	echo "<BR>$transbasket<br>Error Amount $AMOUNT";
	exit;
	} 
elseif ($negara=='') {
	echo "<BR>Error Negara ";
	exit;
	} 
elseif ($alamat=='') {
	echo "<BR>Error Address";
	exit;
	} 
	
 
$sql = "select id  ,transidmerchant,totalamount from doku where transidmerchant='".$TRANSIDMERCHANT."' and totalamount='".$totalamount."' and trxstatus='Requested'";
$ada=cariField($sql);
if ($ada=='') {
	$sql1 = "insert into doku (transidmerchant,totalamount, trxstatus,idreg,jenis  ) values(  '".$TRANSIDMERCHANT."',  '".$totalamount."','Requested','$idreg','$jenis');";
	$qsql = mysql_query($sql1);
}

$CNAME=$nama." ".$gelarbelakang;
$CEMAIL=$email;
$CCITY=$kota;
$CZIPCODE=$kodepos;
$BIRTHDATE="";


$CWPHONE=$CHPHONE=$CCAPHONE=str_replace("-","",$telp);
$CMPHONE=str_replace("-","",$hp);
$CADDRESS=$alamat;
 
$act=$dokuFormAction;




?>
<script>


function SHA1 (msg) {
 
	function rotate_left(n,s) {
		var t4 = ( n<<s ) | (n>>>(32-s));
		return t4;
	};
 
	function lsb_hex(val) {
		var str="";
		var i;
		var vh;
		var vl;
 
		for( i=0; i<=6; i+=2 ) {
			vh = (val>>>(i*4+4))&0x0f;
			vl = (val>>>(i*4))&0x0f;
			str += vh.toString(16) + vl.toString(16);
		}
		return str;
	};
 
	function cvt_hex(val) {
		var str="";
		var i;
		var v;
 
		for( i=7; i>=0; i-- ) {
			v = (val>>>(i*4))&0x0f;
			str += v.toString(16);
		}
		return str;
	};
 
function Utf8Encode(argString) {
  // From: http://phpjs.org/functions
  // +   original by: Webtoolkit.info (http://www.webtoolkit.info/)
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: sowberry
  // +    tweaked by: Jack
  // +   bugfixed by: Onno Marsman
  // +   improved by: Yves Sucaet
  // +   bugfixed by: Onno Marsman
  // +   bugfixed by: Ulrich
  // +   bugfixed by: Rafal Kukawski
  // +   improved by: kirilloid
  // +   bugfixed by: kirilloid
  // *     example 1: utf8_encode('Kevin van Zonneveld');
  // *     returns 1: 'Kevin van Zonneveld'

  if (argString === null || typeof argString === "undefined") {
    return "";
  }

  var string = (argString + ''); // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
  var utftext = '',
    start, end, stringl = 0;

  start = end = 0;
  stringl = string.length;
  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n);
    var enc = null;

    if (c1 < 128) {
      end++;
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(
         (c1 >> 6)        | 192,
        ( c1        & 63) | 128
      );
    } else if (c1 & 0xF800 != 0xD800) {
      enc = String.fromCharCode(
         (c1 >> 12)       | 224,
        ((c1 >> 6)  & 63) | 128,
        ( c1        & 63) | 128
      );
    } else { // surrogate pairs
      if (c1 & 0xFC00 != 0xD800) { throw new RangeError("Unmatched trail surrogate at " + n); }
      var c2 = string.charCodeAt(++n);
      if (c2 & 0xFC00 != 0xDC00) { throw new RangeError("Unmatched lead surrogate at " + (n-1)); }
      c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000;
      enc = String.fromCharCode(
         (c1 >> 18)       | 240,
        ((c1 >> 12) & 63) | 128,
        ((c1 >> 6)  & 63) | 128,
        ( c1        & 63) | 128
      );
    }
    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end);
      }
      utftext += enc;
      start = end = n + 1;
    }
  }

  if (end > start) {
    utftext += string.slice(start, stringl);
  }

  return utftext;
}

 
	function Utf8Encodelama(string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";
 
		for (var n = 0; n < string.length; n++) {
 
			var c = string.charCodeAt(n);
 
			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}
 
		}
 
		return utftext;
	};
 
	var blockstart;
	var i, j;
	var W = new Array(80);
	var H0 = 0x67452301;
	var H1 = 0xEFCDAB89;
	var H2 = 0x98BADCFE;
	var H3 = 0x10325476;
	var H4 = 0xC3D2E1F0;
	var A, B, C, D, E;
	var temp;
 
	msg = Utf8Encode(msg);
 
	var msg_len = msg.length;
 
	var word_array = new Array();
	for( i=0; i<msg_len-3; i+=4 ) {
		j = msg.charCodeAt(i)<<24 | msg.charCodeAt(i+1)<<16 |
		msg.charCodeAt(i+2)<<8 | msg.charCodeAt(i+3);
		word_array.push( j );
	}
 
	switch( msg_len % 4 ) {
		case 0:
			i = 0x080000000;
		break;
		case 1:
			i = msg.charCodeAt(msg_len-1)<<24 | 0x0800000;
		break;
 
		case 2:
			i = msg.charCodeAt(msg_len-2)<<24 | msg.charCodeAt(msg_len-1)<<16 | 0x08000;
		break;
 
		case 3:
			i = msg.charCodeAt(msg_len-3)<<24 | msg.charCodeAt(msg_len-2)<<16 | msg.charCodeAt(msg_len-1)<<8	| 0x80;
		break;
	}
 
	word_array.push( i );
 
	while( (word_array.length % 16) != 14 ) word_array.push( 0 );
 
	word_array.push( msg_len>>>29 );
	word_array.push( (msg_len<<3)&0x0ffffffff );
 
 
	for ( blockstart=0; blockstart<word_array.length; blockstart+=16 ) {
 
		for( i=0; i<16; i++ ) W[i] = word_array[blockstart+i];
		for( i=16; i<=79; i++ ) W[i] = rotate_left(W[i-3] ^ W[i-8] ^ W[i-14] ^ W[i-16], 1);
 
		A = H0;
		B = H1;
		C = H2;
		D = H3;
		E = H4;
 
		for( i= 0; i<=19; i++ ) {
			temp = (rotate_left(A,5) + ((B&C) | (~B&D)) + E + W[i] + 0x5A827999) & 0x0ffffffff;
			E = D;
			D = C;
			C = rotate_left(B,30);
			B = A;
			A = temp;
		}
 
		for( i=20; i<=39; i++ ) {
			temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1) & 0x0ffffffff;
			E = D;
			D = C;
			C = rotate_left(B,30);
			B = A;
			A = temp;
		}
 
		for( i=40; i<=59; i++ ) {
			temp = (rotate_left(A,5) + ((B&C) | (B&D) | (C&D)) + E + W[i] + 0x8F1BBCDC) & 0x0ffffffff;
			E = D;
			D = C;
			C = rotate_left(B,30);
			B = A;
			A = temp;
		}
 
		for( i=60; i<=79; i++ ) {
			temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6) & 0x0ffffffff;
			E = D;
			D = C;
			C = rotate_left(B,30);
			B = A;
			A = temp;
		}
 
		H0 = (H0 + A) & 0x0ffffffff;
		H1 = (H1 + B) & 0x0ffffffff;
		H2 = (H2 + C) & 0x0ffffffff;
		H3 = (H3 + D) & 0x0ffffffff;
		H4 = (H4 + E) & 0x0ffffffff;
 
	}
 
	var temp = cvt_hex(H0) + cvt_hex(H1) + cvt_hex(H2) + cvt_hex(H3) + cvt_hex(H4);
 
	return temp.toLowerCase();
 
}
/*
 * Date Format 1.2.3
 * (c) 2007-2009 Steven Levithan <stevenlevithan.com>
 * MIT license
 *
 * Includes enhancements by Scott Trenda <scott.trenda.net>
 * and Kris Kowal <cixar.com/~kris.kowal/>
 *
 * Accepts a date, a mask, or a date and a mask.
 * Returns a formatted version of the given date.
 * The date defaults to the current date/time.
 * The mask defaults to dateFormat.masks.default.
 */

var dateFormat = function () {
	var	token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
		timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
		timezoneClip = /[^-+\dA-Z]/g,
		pad = function (val, len) {
			val = String(val);
			len = len || 2;
			while (val.length < len) val = "0" + val;
			return val;
		};

	// Regexes and supporting functions are cached through closure
	return function (date, mask, utc) {
		var dF = dateFormat;

		// You can't provide utc if you skip other args (use the "UTC:" mask prefix)
		if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
			mask = date;
			date = undefined;
		}

		// Passing date through Date applies Date.parse, if necessary
		date = date ? new Date(date) : new Date;
		if (isNaN(date)) throw SyntaxError("invalid date");

		mask = String(dF.masks[mask] || mask || dF.masks["default"]);

		// Allow setting the utc argument via the mask
		if (mask.slice(0, 4) == "UTC:") {
			mask = mask.slice(4);
			utc = true;
		}

		var	_ = utc ? "getUTC" : "get",
			d = date[_ + "Date"](),
			D = date[_ + "Day"](),
			m = date[_ + "Month"](),
			y = date[_ + "FullYear"](),
			H = date[_ + "Hours"](),
			M = date[_ + "Minutes"](),
			s = date[_ + "Seconds"](),
			L = date[_ + "Milliseconds"](),
			o = utc ? 0 : date.getTimezoneOffset(),
			flags = {
				d:    d,
				dd:   pad(d),
				ddd:  dF.i18n.dayNames[D],
				dddd: dF.i18n.dayNames[D + 7],
				m:    m + 1,
				mm:   pad(m + 1),
				mmm:  dF.i18n.monthNames[m],
				mmmm: dF.i18n.monthNames[m + 12],
				yy:   String(y).slice(2),
				yyyy: y,
				h:    H % 12 || 12,
				hh:   pad(H % 12 || 12),
				H:    H,
				HH:   pad(H),
				M:    M,
				MM:   pad(M),
				s:    s,
				ss:   pad(s),
				l:    pad(L, 3),
				L:    pad(L > 99 ? Math.round(L / 10) : L),
				t:    H < 12 ? "a"  : "p",
				tt:   H < 12 ? "am" : "pm",
				T:    H < 12 ? "A"  : "P",
				TT:   H < 12 ? "AM" : "PM",
				Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
				o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
				S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
			};

		return mask.replace(token, function ($0) {
			return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
		});
	};
}();

// Some common format strings
dateFormat.masks = {
	"default":      "ddd mmm dd yyyy HH:MM:ss",
	shortDate:      "m/d/yy",
	mediumDate:     "mmm d, yyyy",
	longDate:       "mmmm d, yyyy",
	fullDate:       "dddd, mmmm d, yyyy",
	shortTime:      "h:MM TT",
	mediumTime:     "h:MM:ss TT",
	longTime:       "h:MM:ss TT Z",
	isoDate:        "yyyy-mm-dd",
	isoTime:        "HH:MM:ss",
	isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
	isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
	dayNames: [
		"Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
		"Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
	],
	monthNames: [
		"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
		"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
	]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
	return dateFormat(this, mask, utc);
};


function randomString(STRlen) {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = STRlen;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	return randomstring;
}

function genInvoice() {	
	return randomString(12);
}

function genSessionID() {	
	return randomString(20);
}


function getRequestDateTime() {
	var now = new Date();
	return dateFormat(now, "yyyymmddHHMMss");	
}


function genSessionID() {	
	return randomString(20);
}

function genBookingCode() {	
	//document.MerchatPaymentPage.BOOKINGCODE.value = randomString(6);
}
 
function getWords(amount,mallid,key,transid) {
	var msg = amount + mallid + key + transid;
	return SHA1(msg);
}
 

</script>
 

<form id="mpg" name="mpg" action="<?=$act?>"  method="POST" style='display:none'>
 
WORDS <input type="text" name="WORDS" id='WORDS' value="<?=$WORD?>"> 
BASKET <input name="BASKET" type="text" id="BASKET" value="<?=$BASKET?>" size=120><br>
TRANSIDMERCHANT <input name="TRANSIDMERCHANT" type="text" id="TRANSIDMERCHANT" value='<?=$TRANSIDMERCHANT?>'><br>
AMOUNT <input name="AMOUNT" type="text" id="AMOUNT" value="<?=$AMOUNT?>"><br>   
PURCHASEAMOUNT:<input name="PURCHASEAMOUNT" type="text" id="PURCHASEAMOUNT" value="<?=$AMOUNT?>" size="12" /><br>
PURCHASECURRENCY<input type="text" name="PURCHASECURRENCY" id="PURCHASECURRENCY" value="360" size="3" maxlength="3" />
MALLID <input name="MALLID" type="text" id="MALLID" value="<?=$MALLID?>"><br>
CHAINMERCHANT<input type="text" name="CHAINMERCHANT" id="CHAINMERCHANT" value="NA" size="12" />
CURRENCY<input type="text" name="CURRENCY" id="CURRENCY" value="360" size="3" maxlength="3" />
REQUESTDATETIME<input type="text" name="REQUESTDATETIME" id="REQUESTDATETIME" size="14" maxlength="14" />(YYYYMMDDHHMMSS)
SESSIONID<input id="SESSIONID" name="SESSIONID" type="text" />
PAYMENTCHANNEL<input id="PAYMENTCHANNEL" name="PAYMENTCHANNEL" type="text" />
COUNTRY:<input name="COUNTRY" type="text" id="COUNTRY" value="<?=$negara?>"  size="50" maxlength="50" /><br>
STATE:<input name="STATE" type="text" id="STATE" value="<?=$kota?>" size="50" maxlength="50" /><br>
CITY<input name="CITY" type="text" id="CCITY" value="<?=$CCITY?>" size="100" /><br>
PROVINCE:<input name="PROVINCE" type="text" id="PROVINCE" value="<?=$kota?>" size="50" maxlength="50" /><br>
CNAME <input name="NAME" type="text" id="CNAME" value="<?=$CNAME?>" size="20" /><br>
CEMAIL<input name="EMAIL" type="text" id="CEMAIL" value="<?=$CEMAIL?>" size="20" />
CWPHONE<input name="WORKPHONE" type="text" id="CWPHONE" value="<?=$CWPHONE?>" size="20" /><br>
CHPHONE <input name="HOMEPHONE" type="text" id="CHPHONE" value="<?=$CHPHONE?>" size="20" /><br>
CMPHONE <input name="MOBILEPHONE" type="text" id="CMPHONE" value="<?=$CMPHONE?>" size="20" /><br>
CCAPHONE<input name="CCAPHONE" type="text" id="CCAPHONE" value="<?=$CCAPHONE?>" size="20" /><br>
CADDRESS<input name="ADDRESS" type="text" id="CADDRESS" value="<?=$CADDRESS?>" size="100" /><br>
CZIPCODE<input name="ZIPCODE" type="text" id="CZIPCODE" value="<?=$CZIPCODE?>" size="20" /><br>
BIRTHDATE<input name="BIRTHDATE" type="text" id="BIRTHDATE" value="<?=$BIRTHDATE?>" size="20" /><br>
            <input type="button" value="Generate WORDS" onClick="getWords();"> <br>
            <input type=submit>
</form>
<div id=ttest ></div>
<?php
if ($testDoku) {
	echo "Test Doku Basket:$transbasket <br>";
	}
else  
	echo "Redirecting to online payment... ";
?>
   <script language="javascript" type="text/javascript">
 
 
  	
	document.getElementById("REQUESTDATETIME").value=getRequestDateTime();
	document.getElementById("SESSIONID").value=	genSessionID();
	document.getElementById('WORDS').value=getWords('<?=$AMOUNT?>','<?=$MALLID?>','<?=$SHAREDKEY?>','<?=$TRANSIDMERCHANT?>');
	document.getElementById('mpg').submit();
	
	</script>
