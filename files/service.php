<?php

function connectDB()
{
	return mysqli_connect("localhost", "root", "", "soap_master");
}

function getNutrisi()
{

	$result = mysqli_query(connectDB(), "SELECT * FROM nutrisi");
	
	$nutrisilist = [];

	$index = 0;

	while ($data = mysqli_fetch_array($result)) {

		$nutrisilist[$index] = array(

			"id" => $data['id'],

			"nama_makanan" => $data['nama_makanan'],

			"berat_gr" => $data['berat_gr'],

			"kalori" => $data['kalori'],

			"jenis" => $data['jenis']

		);

		$index++;
	}


	mysqli_close(connectDB());

	return $nutrisilist;
}


function insertNutrisi($id, $nama_makanan, $berat_gr, $kalori, $jenis)

{
	connectDB();

	$result = mysqli_query(connectDB(), "INSERT INTO nutrisi (id, nama_makanan, berat_gr, kalori, jenis) VALUES 
	('" . $id . "','" . $nama_makanan . "','" . $berat_gr . "','" . $kalori . "','" . $jenis . "')");

	return $result ? "Succeed" : "Failed";
}


function updateNutrisi($id, $nama_makanan, $berat_gr, $kalori, $jenis)

{
	connectDB();

	$result = mysqli_query(connectDB(), 
		"UPDATE nutrisi SET 
				nama_barang='" . $nama_makanan . "',berat_gr='" . $berat_gr . "',kalori='" . $kalori . "',jenis='" . $jenis . "' 
			WHERE id='" . $id . "'");

	return $result ? "Succeed" : "Failed";
}


function deleteNutrisi($id)

{

	$result = mysqli_query(connectDB(), "DELETE FROM nutrisi WHERE id = '" . $id . "'");

	return $result ? "Succeed" : "Failed";
}


require("lib/nusoap.php");

$server = new soap_server();

$server->configureWSDL("WebService Nutrisi", "urn:WebServ");



$server->wsdl->addcomplextype(

	"outputarray",

	"complextype",

	"struct",

	"all",

	"",

	array(

		"id" => array("name" => "id", "type" => "xsd:string"),

		"nama_makanan" => array("name" => "nama_makanan", "type" => "xsd:string"),

		"berat_gr" => array("name" => "berat_gr", "type" => "xsd:string"),

		"kalori" => array("name" => "kalori", "type" => "xsd:string"),

		"jenis" => array("name" => "jenis", "type" => "xsd:string")

	)

);


$server->wsdl->addcomplextype(

	"outarray",

	"complextype",

	"array",

	"",

	"SOAP-ENC:Array",

	array(),

	array(

		array(
			"ref" => "SOAP-ENC:arrayType",

			"wsdl:arrayType" => "tns:outputarray[]"
		)

	),

	"tns:outputarray"

);


$server->register(

	"getNutrisi",

	array(),

	array("return" => "tns:outarray"),

	"urn:WebServ",

	"urn:WebServ#getNutrisi",

	"rpc",

	"encoded",

	""

);


$server->register(

	"insertNutrisi",

	array(
		"id" => "xsd:string", "nama_makanan" => "xsd:string", "berat_gr" => "xsd:string",

		"kalori" => "xsd:string", "jenis" => "xsd:string"
	),

	array("return" => "tns:outarray"),

	"urn:WebServ",

	"urn:WebServ#insertNutrisi",

	"rpc",

	"encoded",

	""

);


$server->register(

	"updateNutrisi",

	array(
		"id" => "xsd:string", "nama_makanan" => "xsd:string", "berat_gr" => "xsd:string",

		"kalori" => "xsd:string", "jenis" => "xsd:string"
	),

	array("return" => "tns:outarray"),

	"urn:WebServ",

	"urn:WebServ#updateNutrisi",

	"rpc",

	"encoded",

	""

);


$server->register(

	"deleteNutrisi",

	array("id" => "xsd:string"),

	array("return" => "tns:outarray"),

	"urn:WebServ",

	"urn:WebServ#deleteNutrisi",

	"rpc",

	"encoded",

	""

);


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";


//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));
