<?php
include_once $tohost."content/koneksi.php" ;
$lang="id";
$gKdEvent="BC5";
$imglogo="content/img/logo.png";
$judulWebSingkat="BCCOG2025";
//$jlhHarga["workshop"]=1;//khusus workshop, jumlahharga=1
$jlhHarga["workshop"]=1;
//$jlhHarga["social"]=1;
$nfAnnouncement="content/img/announcement.pdf";
$allowUserConfirmPayment=true;
$allowDeletePaymentConfirmation=false;
$allowUserAddItem=false;
//abstract-------------------------------------------------------------------------------
$xtglPengumumanAbs="Mid March 2022";
$xtglDeadlineAbs="29 February 2022";
$tglBatasRegSympoAbs1="29 February 2022";//batas registrasi bagi yg abstraknya diterima
$tglBatasRegSympoAbs2="29 February 2022";//batas akhir abstrak dibatalkan jika tidak mendaftar
$pjAbstract="";
$webmasterWWW="http://apcgs2022.com";
$webmasterWWWLink="<a href='$webmasterWWW' target=_blank>$webmasterWWW</a>";
$tglSymposium="16-17 Nov 2021";;
$linkRegis="<a href='$folderHost' target=_blank>$folderHost</a>";

$useAbstract=1;
$alwaysUseContentOnly=false;
$sLrc="Bangladesh,Cambodia,Egypt,India,Laos,Mongolia,Myanmar,Nepal,Pakistan,Papua New Guinea,Philippines,Sri Lanka,Vietnam";
//$template=$pt."lib/mytemplate/eventgh/";
$template=$template_path=$pt."lib/mytemplate/tpregis2/";
$folderReg='registrasi'; 


$tppath2=$toroot."registrasi/" ;
//$template=$tohost."lib/aofog22/";
$templateName="";
$tglEvent="2021-08-19";
$defHalaman="sambutan1";
error_reporting(E_ALL);
$formatTgl="d/m/Y";
$api_key='th40@21';
$pathAdm="adm/"; //folder admin
$backup=1;//backupEmail
//$sColorTemplate= "#001901,#022A03,#008a00,#52b152,#83c783,#b4ddb4";//hijaumuda
//$sColorTemplate="#161A09,#384114,#596721,#7A8D2A,91A736,#B3C958,#D0DE98";//HIJAU LUMUT
//$sColorTemplate=""#003333,#007777,#009999,#00BBBB,#00EEEE,#CCFFFF";//HIJAU TELURR
//$sColorTemplate="#230126,#561E5B,#783B76,#975592,#A5649C,#B383B0";//ungu
$sColorTemplate="#4f4473,#605780,#726a8d,#847d9a,#9590a8,#a7a3b5,#b9b6c2,#cac9cf";//biru tua aofog
//$sColorTemplate="#148FB8,#28B8E8,#47C2EB,#85D7F1,#C1EBF9,#E0F5FC,#F0FAFD";//biru muda
//$sColorTemplate="#990000,#CC0000,#FF1111,#FF5555,#FFAAAA,#FFDDDD;"//MERAH
//$sColorTemplate= "#53210E,#732C0E,#97451A,#B9724B,#D59B7B,#D59B7B";//coklat
//$sColorTemplate= "#110900,#442200,#773C00,#994D00,#DD6F00,#FFAA55,#FFDDBB";//ORANGE
//$sColorTemplate= "#C60EA3,#E30AC7,#F30FD8,#F39FE9,#F5C5EF,#F6D7F2";//pink

$useInstitusi=1;//menggunakan institusi
$useUmur=2;//1:menggunakan umur, 2:tanpa umur
$umurManula=700;//jika umur melebihi, maka gratis
$usePassport=2;
$useTransportation=2;
$useResHotel=0;//tampil di reg, 2: tidak menggunakan, 3:contact panitia,4:accesskey
$useInfoBank=1;//1:tampil di reg, 2: tampil setelah reg
$useSponsor=1;
$usePaymentConfirmation=2;
$usePdfInvoice=1;
$showOptPrize=2;//tampilkan semua hrg(eary,reguler,on), 2: hanya yg sesuai, 3:tampil semua tapi g bisa klik
$autoChangeCaseNamaReg=false;//autchangecase nama di registrasi
$aJlhMaxItem=array(1,3,2,1,1);
$addSincerely="";
$useManualTransfer=true;
$useQRCode=true;
/*
$pMethodUmum=array(0,"","Physician (Local),Physician (Foreign),Spesialist/Trainee","Spesialis","ONLINE REGISTRATION");
$pMethodGL=array(5424,"GL-MFM","Spesialis (GL),Non Spesialis (GL - Dokter Umum/PPDS/Profesi Kesehatan Lain);Non Spesialis (GL)","Spesialis (GL)","PENDAFTARAN - GL");
$pMethodPanitia=array(5607,"FOC-CMT","Committee (Free)","Committee (Free)","PENDAFTARAN PANITIA");//focmfm
$pMethodFree=array(5357,"FOC-MFM","Spesialis (Free)","Spesialis (Free)","PENDAFTARAN FREE MFM");//focmfm
$pMethodFreeSpk=array(5152,"FOC-SPK","Spesialis (Invited Speaker)","Spesialis (Invited Speaker)","PENDAFTARAN SPEAKER");//focmfm
$sJenisProfesiAll="$pMethodUmum[2],$pMethodGL[2],$pMethodPanitia[2],$pMethodFree[2],$pMethodFreeSpk[2]";
*/
$useKodeUnikPembayaran=true;
$activateAutoDel=true;

$useDoku=false;
$dokuPaymentDueDateCC=60*24*1;//120;//minute	
$dokuPaymentDueDateVA=60*24*1;//minute : 3hari	



//$useKodeUnikPembayaran=false;
$showMnRereg=true;
$allowMnuRereg=true;
$showACKInPCL=true;
$useNegara=2;

$imdRegFree=100;//id registrasi free
$imdBiayaBank=101;//Bank Administration Fee
$imdKartuKredit=102;//Credit Card Fee;
$imdKodeUnik=103;//Unique Payment Verification Codes
$jlhMaxFreeRegistration=100;
$sendInvoice=true;
/*
$emailEvent="secretariat@apcgs2022.com";
$kontakWeb="Div. Onkologi Dept. Obstetri dan Ginekologi<br>FKUI-RSCM";
$alamatWeb="Jl. Diponegoro No.71, Jakarta 19430 Indonesia";

$aboutEvent='To earn knowledge and skills about proper surgical techniques and how to diagnose various gynecological cases to be applied in daily  practice.';
*/
//$folderReg='registration';
$showLK=false;
$useDiscount=true;
$autoSendPCLOnValidate=true;

