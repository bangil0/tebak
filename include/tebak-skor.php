<<<<<<< HEAD
<div id="main_content">	<center style="background-color: #232c2f;font-size: 18px;line-height: 37px;">		<h3 style="color: #fff;">TEBAK SKOR</h3>	</center>	<p style="font-size: 17px;color: #a4dfff;text-align: center;padding: 0 0 13px 0px;">AYO !! DUKUNG KLUB FAVORITMU</p>	<table id="tebak_skor_match">		<thead>			<tr>				<th>PERTANDINGAN</th>				<th>WAKTU</th>				<th>LIGA</th>				<th>GROUP</th>				<th>JAWABAN</th>			</tr>		</thead>		<tbody><?php include_once $_SERVER['DOCUMENT_ROOT']."/football_match.php";include_once $_SERVER['DOCUMENT_ROOT']."/bet.php";$get_match = $football_match->get_match("", "30minutes", "", 1);foreach($get_match as $soonest_match){	echo "<tr id='".$soonest_match['match_id']."'>		<td>			<div>".$soonest_match['home_team_name']."</div>			<div>".$soonest_match['away_team_name']."</div>		</td>		<td name='match_time'>".$soonest_match['time']."</td>		<td>".$soonest_match['league_name']."</td>		<td name='match_group'>".$soonest_match['match_group']."</td>		<td name='save_tebak_skor'>			<select name='home_score'>";		for($hs=0; $hs<10; $hs++){			echo "<option value='".$hs."'>".$hs."</option>";		}		echo "</select>:".			"<select name='away_score'>";		for($as=0; $as<10; $as++){			echo "<option value='".$as."'>".$as."</option>";		}		echo "</select>			<input type='button' value='SUBMIT' class='tombol_submit' style='height: 23px; width: 58px; font-size: 13px;' onclick='tebak_skor(".$soonest_match['match_id'].")' />		</td>	</tr>";}?>		</tbody>	</table></div><div id="main_content" style="overflow: hidden;overflow-y: scroll;height: 600px;">	<table id="tebakan_skor_list" border="0" cellpadding="0" cellspacing="0">		<thead>			<tr>				<th>NAMA</th>				<th>HOME</th>				<th>JAWABAN</th>				<th>AWAY</th>				<th>&nbsp;</th>			</tr>		</thead>		<tbody>	<?php 	$tebakan_skor = $bet->get_tebakan_skor("", "", "", "", "1day");	foreach($tebakan_skor['data'] as $tekor){		$bet_time = new DateTime($tekor['time']);		echo "<tr>			<td>".$tekor['username']."</td>			<td>".$tekor['home_team_name']."</td>			<td>".$tekor['tebak_home']."&nbsp;:&nbsp;".$tekor['tebak_away']."</td>			<td>".$tekor['away_team_name']."</td>			<td name='tebakan_skor_time'>".date_format($bet_time, 'D M j, g:i:sa')."</td>		</tr>";	}	?>		</tbody>	</table></div><script>function tebak_skor(match_id){	if(getCookie("uid") == ""){		alert("Silahkan login dahulu.");		return false;	}	var data = {		page : "betting_football",		uid: getCookie("uid"),		match_id : match_id,		home_score : $("#tebak_skor_match tr#"+match_id+" [name='home_score']").val(),		away_score : $("#tebak_skor_match tr#"+match_id+" [name='away_score']").val(),		ajax: ""	};	$.post(window.location.origin+"/bet.php", data, function(res) {		alert(res);		location.reload();	});}</script><style>#tebak_skor_match {	width: 100%;	color: #ededed;	text-align: center;}#tebak_skor_match > thead > tr > th {	background-color: #ff4949;    color: #000;    padding: 5px;}#tebak_skor_match > tbody > tr > td {	font-size: 13px;}#tebak_skor_match > tbody > tr:nth-child(odd) > td {	background-color: #363636;    padding: 5px;}#tebak_skor_match > tbody > tr:nth-child(even) > td {	background-color: #4d4d4d;    padding: 5px;}[name='match_time'] {	width: 85px;}[name='match_group'] {	width: 60px;}[name='save_tebak_skor'] {	width: 150px;}[name='home_score'], [name='away_score'] {	border-radius: 4px;	background-color: #cacaca;	font-size: 16px;	font-weight: bold;}#tebakan_skor_list {	width: 100%;	color: #fff;}#tebakan_skor_list > thead > tr > th {	background-color: #0283ad;    color: #000;    padding: 5px;}#tebakan_skor_list > tbody {	font-size: 13px;}#tebakan_skor_list > tbody > tr:nth-child(odd) > td {	background-color: #363636;    padding: 5px;}#tebakan_skor_list > tbody > tr:nth-child(even) > td {	background-color: #4d4d4d;    padding: 5px;}#tebakan_skor_list > tbody > tr > td[name='tebakan_skor_time'] {	color: #838383;	text-align: right;}#tebakan_skor_list > tbody > tr > td:nth-child(n+2):not(:last-child) {	text-align: center;}</style>
=======
<div id="main_content">
	<center style="background-color: #232c2f;font-size: 18px;line-height: 37px;">
		<h3 style="color: #fff;">TEBAK SKOR</h3>
	</center>
	<p style="font-size: 17px;color: #a4dfff;text-align: center;padding: 0 0 13px 0px;">AYO !! DUKUNG KLUB FAVORITMU</p>
	<table id="tebak_skor_match">
		<thead>
			<tr>				
				<th>PERTANDINGAN</th>
				<th>WAKTU</th>
				<th>LIGA</th>
				<th>GROUP</th>
				<th>JAWABAN</th>
			</tr>
		</thead>
		<tbody>
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/football_match.php";
include_once $_SERVER['DOCUMENT_ROOT']."/bet.php";
$get_match = $football_match->get_match("", "30minutes", "", 1);
foreach($get_match as $soonest_match){
	echo "<tr id='".$soonest_match['match_id']."'>		
		<td>
			<div>".$soonest_match['home_team_name']."</div>
			<div>".$soonest_match['away_team_name']."</div>
		</td>		
		<td name='match_time'>".$soonest_match['time']."</td>
		<td>".$soonest_match['league_name']."</td>
		<td name='match_group'>".$soonest_match['match_group']."</td>
		<td name='save_tebak_skor'>
			<select name='home_score'>";
	for($hs=0; $hs<10; $hs++){
		echo "<option value='".$hs."'>".$hs."</option>";
	}
	echo "</select>:".
		"<select name='away_score'>";
	for($as=0; $as<10; $as++){
		echo "<option value='".$as."'>".$as."</option>";
	}
	echo "</select>
		<input type='button' value='SUBMIT' class='tombol_submit' style='height: 23px; width: 58px; font-size: 13px;' onclick='tebak_skor(".$soonest_match['match_id'].")' />
		</td>
		</tr>";
}
?>
		</tbody>
	</table>
</div>
<div id="main_content" style="overflow: hidden;overflow-y: scroll;height: 600px;">
	<table id="tebakan_skor_list" border="0" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>NAMA</th>
				<th>HOME</th>
				<th>JAWABAN</th>
				<th>AWAY</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>	
<?php 
$tebakan_skor = $bet->get_tebakan_skor("", "", "", "", "1day");
foreach($tebakan_skor['data'] as $tekor){
	$bet_time = new DateTime($tekor['time']);
	echo "<tr>
		<td>".$tekor['username']."</td>
		<td>".$tekor['home_team_name']."</td>
		<td>".$tekor['tebak_home']."&nbsp;:&nbsp;".$tekor['tebak_away']."</td>
		<td>".$tekor['away_team_name']."</td>
		<td name='tebakan_skor_time'>".date_format($bet_time, 'D M j, g:i:sa')."</td>
	</tr>";
}
?>
		</tbody>
	</table>
</div>
<script>
function tebak_skor(match_id){
	if(getCookie("uid") == ""){
		alert("Silahkan login dahulu.");
		return false;
	}
	var data = {
		page : "betting_football",
		uid: getCookie("uid"),
		match_id : match_id,
		home_score : $("#tebak_skor_match tr#"+match_id+" [name='home_score']").val(),
		away_score : $("#tebak_skor_match tr#"+match_id+" [name='away_score']").val(),
		ajax: ""
	};
	$.post(window.location.origin+"/bet.php", data, function(res) {
		alert(res);
		location.reload();
	});
}
</script>
<style>
#tebak_skor_match {
	width: 100%;
	color: #ededed;
	text-align: center;
}
#tebak_skor_match > thead > tr > th {
	background-color: #ff4949;
	color: #000;
	padding: 5px;
}
#tebak_skor_match > tbody > tr > td {
	font-size: 13px;
}
#tebak_skor_match > tbody > tr:nth-child(odd) > td {
	background-color: #363636;
	padding: 5px;
}
#tebak_skor_match > tbody > tr:nth-child(even) > td {
	background-color: #4d4d4d;
	padding: 5px;
}
[name='match_time'] {
	width: 85px;
}
[name='match_group'] {
	width: 60px;
}
[name='save_tebak_skor'] {	
	width: 150px;
}
[name='home_score'], [name='away_score'] {
	border-radius: 4px;
	background-color: #cacaca;
	font-size: 16px;
	font-weight: bold;
}
#tebakan_skor_list {
	width: 100%;	
	color: #fff;
}
#tebakan_skor_list > thead > tr > th {	
	background-color: #0283ad;
	color: #000;
	padding: 5px;
}
#tebakan_skor_list > tbody {
	font-size: 13px;
}
#tebakan_skor_list > tbody > tr:nth-child(odd) > td {
	background-color: #363636;
    padding: 5px;
}
#tebakan_skor_list > tbody > tr:nth-child(even) > td {
	background-color: #4d4d4d;
	padding: 5px;
}
#tebakan_skor_list > tbody > tr > td[name='tebakan_skor_time'] {
	color: #838383;
	text-align: right;
}
#tebakan_skor_list > tbody > tr > td:nth-child(n+2):not(:last-child) {
	text-align: center;
}
</style>
>>>>>>> tebak-skor
