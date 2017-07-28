<?php
	session_start();
	$mail = $_SESSION["email"];
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
	{
		$linebreak = "\r\n";
	}
	else
	{
		$linebreak = "\n";
	}

	$message_txt = "Here is your configuration:".$linebreak.$linebreak;
	$message_txt = "Kitchen warmth:".$linebreak;
	$message_txt = "Roof:".$_SESSION["kitchen"]["warmth-roof"].$linebreak;
	$message_txt = "Floor:".$_SESSION["kitchen"]["warmth-floor"].$linebreak;
	$message_txt = "Wall:".$_SESSION["kitchen"]["warmth-wall"].$linebreak;
	$message_txt = "Junctions:".$_SESSION["kitchen"]["warmth-junctions"].$linebreak.$linebreak;
	$message_txt = "Kitchen light:".$_SESSION["kitchen"]["lux"].$linebreak.$linebreak;
	$message_txt = "Kitchen sound:".$linebreak;
	$message_txt = "Floor:".$_SESSION["kitchen"]["sound-floor"].$linebreak;
	$message_txt = "Wall:".$_SESSION["kitchen"]["sound-wall"].$linebreak.$linebreak;
	$message_txt = "Kitchen ventilation:".$linebreak.$linebreak;
	$message_txt = "Ventilation system:".$_SESSION["kitchen"]["ventilation-ventilation"].$linebreak;
	$message_txt = "Floor:".$_SESSION["kitchen"]["ventilation-floor"].$linebreak.$linebreak;
	$message_txt = "Bedroom warmth:".$linebreak;
	$message_txt = "Roof:".$_SESSION["bedroom"]["warmth-roof"].$linebreak;
	$message_txt = "Floor:".$_SESSION["bedroom"]["warmth-floor"].$linebreak;
	$message_txt = "Wall:".$_SESSION["bedroom"]["warmth-wall"].$linebreak;
	$message_txt = "Junctions:".$_SESSION["bedroom"]["warmth-junctions"].$linebreak.$linebreak;
	$message_txt = "Bedroom light:".$_SESSION["bedroom"]["lux"].$linebreak.$linebreak;
	$message_txt = "Bedroom sound:".$linebreak;
	$message_txt = "Floor:".$_SESSION["bedroom"]["sound-floor"].$linebreak;
	$message_txt = "Wall:".$_SESSION["bedroom"]["sound-wall"].$linebreak.$linebreak;
	$message_txt = "Bedroom ventilation:".$linebreak.$linebreak;
	$message_txt = "Ventilation system:".$_SESSION["bedroom"]["ventilation-ventilation"].$linebreak;
	$message_txt = "Floor:".$_SESSION["bedroom"]["ventilation-floor"].$linebreak.$linebreak;
	$message_txt = "Livingroom warmth:".$linebreak;
	$message_txt = "Roof:".$_SESSION["livingroom"]["warmth-roof"].$linebreak;
	$message_txt = "Floor:".$_SESSION["livingroom"]["warmth-floor"].$linebreak;
	$message_txt = "Wall:".$_SESSION["livingroom"]["warmth-wall"].$linebreak;
	$message_txt = "Junctions:".$_SESSION["livingroom"]["warmth-junctions"].$linebreak.$linebreak;
	$message_txt = "Livingroom light:".$_SESSION["livingroom"]["lux"].$linebreak.$linebreak;
	$message_txt = "Livingroom sound:".$linebreak;
	$message_txt = "Floor:".$_SESSION["livingroom"]["sound-floor"].$linebreak;
	$message_txt = "Wall:".$_SESSION["livingroom"]["sound-wall"].$linebreak.$linebreak;
	$message_txt = "Livingroom ventilation:".$linebreak.$linebreak;
	$message_txt = "Ventilation system:".$_SESSION["livingroom"]["ventilation-ventilation"].$linebreak;
	$message_txt = "Floor:".$_SESSION["livingroom"]["ventilation-floor"].$linebreak.$linebreak;


	$message_html = '<html>
						<head>
						</head>
						<body>
							<h1>KITCHEN</h1>
							<table>
								<tr>
									<th>WARMTH</th>
									<th>LIGHT</th>
									<th>SOUND</th>
									<th>VENTILATION</th>
								</tr>
								<tr>
									<td>'.$_SESSION["kitchen"]["warmth-roof"].'</td>
									<td>'.$_SESSION["kitchen"]["lux"].'</td>
									<td>'.$_SESSION["kitchen"]["sound-floor"].'</td>
									<td>'.$_SESSION["kitchen"]["ventilation-ventilation"].'</td>
								</tr>
								<tr>
									<td>'.$_SESSION["kitchen"]["warmth-floor"].'</td>
									<td></td>
									<td>'.$_SESSION["kitchen"]["sound-wall"].'</td>
									<td>'.$_SESSION["kitchen"]["ventilation-floor"].'</td>
								</tr>
								<tr>
									<td>'.$_SESSION["kitchen"]["warmth-wall"].'</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>'.$_SESSION["kitchen"]["warmth-junctions"].'</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
							<h1>BEDROOM</h1>
							<table>
								<tr>
									<th>WARMTH</th>
									<th>LIGHT</th>
									<th>SOUND</th>
									<th>VENTILATION</th>
								</tr>
								<tr>
									<td>'.$_SESSION["bedroom"]["warmth-roof"].'</td>
									<td>'.$_SESSION["bedroom"]["lux"].'</td>
									<td>'.$_SESSION["bedroom"]["sound-floor"].'</td>
									<td>'.$_SESSION["bedroom"]["ventilation-ventilation"].'</td>
								</tr>
								<tr>
									<td>'.$_SESSION["bedroom"]["warmth-floor"].'</td>
									<td></td>
									<td>'.$_SESSION["bedroom"]["sound-wall"].'</td>
									<td>'.$_SESSION["bedroom"]["ventilation-floor"].'</td>
								</tr>
								<tr>
									<td>'.$_SESSION["bedroom"]["warmth-wall"].'</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>'.$_SESSION["bedroom"]["warmth-junctions"].'</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
							<h1>LIVINGROOM</h1>
							<table>
								<colgroup>
									<col class="warmthColor"/>
									<col class="luxColor"/>
									<col class="soundColor"/>
									<col class="ventilationColor"/>
								</colgroup>
								<tr>
									<th>WARMTH</th>
									<th>LIGHT</th>
									<th>SOUND</th>
									<th>VENTILATION</th>
								</tr>
								<tr>
									<td>'.$_SESSION["livingroom"]["warmth-roof"].'</td>
									<td>'.$_SESSION["livingroom"]["lux"].'</td>
									<td>'.$_SESSION["livingroom"]["sound-floor"].'</td>
									<td>'.$_SESSION["livingroom"]["ventilation-ventilation"].'</td>
								</tr>
								<tr>
									<td>'.$_SESSION["livingroom"]["warmth-floor"].'</td>
									<td></td>
									<td>'.$_SESSION["livingroom"]["sound-wall"].'</td>
									<td>'.$_SESSION["livingroom"]["ventilation-floor"].'</td>
								</tr>
								<tr>
									<td>'.$_SESSION["livingroom"]["warmth-wall"].'</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>'.$_SESSION["kitchen"]["warmth-junctions"].'</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</body>
					</html>';

	//=====Attachment
	$file   = fopen("pdf/".$_SESSION["kitchen"]["warmth-roof"].".pdf", "r");
	$attachement = fread($file, filesize("pdf/".$_SESSION["kitchen"]["warmth-roof"].".pdf"));
	$attachement = chunk_split(base64_encode($attachement));
	fclose($file);
	 
	//=====Boundary
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	 
	//=====Subject
	$subject = "Comfort configuration";
	 
	//=====Header
	$header = "From: \"Saint-Gobain Multi-Comfort\"<multi-comfort@saint-gobain.com>".$linebreak;
	$header.= "Reply-to: \"".$_SESSION["email"]."\" <".$_SESSION["email"].">".$linebreak;
	$header.= "MIME-Version: 1.0".$linebreak;
	$header.= "Content-Type: multipart/mixed;".$linebreak." boundary=\"$boundary\"".$linebreak;
 
	//=====Email
	$message = $linebreak."--".$boundary.$linebreak;
	$message.= "Content-Type: multipart/alternative;".$linebreak." boundary=\"$boundary_alt\"".$linebreak;
	$message.= $linebreak."--".$boundary_alt.$linebreak;

	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$linebreak;
	$message.= "Content-Transfer-Encoding: 8bit".$linebreak;
	$message.= $linebreak.$message_txt.$linebreak;
	 
	$message.= $linebreak."--".$boundary_alt.$linebreak;

	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$linebreak;
	$message.= "Content-Transfer-Encoding: 8bit".$linebreak;
	$message.= $linebreak.$message_html.$linebreak;

	$message.= $linebreak."--".$boundary_alt."--".$linebreak; 
	 
	$message.= $linebreak."--".$boundary.$linebreak;
	 
	//=====Attachment
	$message.= "Content-Type: application/pdf; name=\"".$_SESSION["kitchen"]["warmth-roof"].".pdf\"".$linebreak;
	$message.= "Content-Transfer-Encoding: base64".$linebreak;
	$message.= "Content-Disposition: attachment; filename=\"".$_SESSION["kitchen"]["warmth-roof"].".pdf\"".$linebreak;
	$message.= $linebreak.$attachement.$linebreak.$linebreak;
	$message.= $linebreak."--".$boundary."--".$linebreak; 
	 
	//=====Send
	mail($mail,$subject,$message,$header);
?>
