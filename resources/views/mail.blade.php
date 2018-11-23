<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	.button {
	    background-color: #4CAF50;
	    border: none;
	    color: white;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 10px;
	    margin: 4px 2px;
	    cursor: pointer;
	}
	.buttonBiasa {background-color: #4CAF50;} /* Green */
	.buttonEdaran {background-color: #008CBA;} /* Blue */
	.buttonMendesak {background-color: #f44336;} /* Red */ 
	.buttonPengumuman {background-color: #e7e7e7; color: black;} /* Gray */ 

	.buttonShow {font-size: 16px;}
	</style>
</head>
<body>
<center><h4>Sistem Disposisi Surat</h4></center>
<center><h2>Anda Mendapatkan Surat Baru</h2></center><br>
<br><br>
<table border="0" width="50%" align="center">
	<tr>
		<td>Asal Surat</td>
		<td>:</td>
		<td>{{ $surat->asal_surat }}</td>		
	</tr>
	<tr>
		<td>Sifat Surat</td>
		<td>:</td>
		<td>
		@php		
	        if($surat->sifat == 'Biasa'){
	            echo '<button class="button buttonBiasa">'.$surat->sifat.'</button> ';
	        } else if($surat->sifat == 'Edaran'){
	            echo '<button class="button buttonEdaran">'.$surat->sifat.'</button> ';
	        } else if($surat->sifat == 'Pengumuman'){
	            echo '<button class="button buttonPengumuman">'.$surat->sifat.'</button> ';
	        } else {
	           	echo '<button class="button buttonMendesak">'.$surat->sifat.'</button> ';
	        }
		@endphp
		</td>
	</tr>
</table>
<br>
<center><a href="{{ route('surat.show', [$surat->id]) }}" class="button buttonShow">Buka Surat</a></center>
<br><br>
</body>
</html>