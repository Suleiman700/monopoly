<?php
include "LMPHP.php";

/////////////////////////////
$langs = new LMPHP();

$langs -> language_add("en","English");
$langs -> language_add("ar","arabic");

$langs -> language_active("en");
//Style
$langs -> word_add("align","left");
$langs -> word_add("direction","ltr");
//Global
$langs -> word_add("ok","Ok");
//Login
$langs -> word_add("enter_ur_info","Enter your email address and password to access trading platform");
$langs -> word_add("sign_in","SIGN IN");
$langs -> word_add("email_address","E-Mail Address");
$langs -> word_add("password","Password");
$langs -> word_add("remember_me","Remember Me");
$langs -> word_add("forgot_ur_pass","Forgot Your Password?");
$langs -> word_add("login","Login");
$langs -> word_add("register","Register");
$langs -> word_add("wrong_email_or_password","Wrong email/password");
//Register
$langs -> word_add("first_name","First Name");
$langs -> word_add("last_name","Last Name");
$langs -> word_add("phone","Phone");
$langs -> word_add("account_type","Account Type");
$langs -> word_add("real_account","Real");
$langs -> word_add("demo_account","Demo");
$langs -> word_add("back_to_login","Back To Login");
$langs -> word_add("acc_created_success","Account created successfully");
$langs -> word_add("login_now","Login Now");
$langs -> word_add("email_is_used","This email is already in use");
//Topav
$langs -> word_add("topnav_real","Real");
$langs -> word_add("topnav_demo","Demo");
$langs -> word_add("topnav_home","Home");
$langs -> word_add("topnav_account","Account:");
$langs -> word_add("topnav_profile","Profile");
$langs -> word_add("topnav_transactions","Transactions");
$langs -> word_add("topnav_withdrawal","withdrawal");


$langs -> language_active("ar");
//Style
$langs -> word_add("align","right");
$langs -> word_add("direction","rtl");
//Global
$langs -> word_add("ok","حسنًا");
//Login
$langs -> word_add("enter_ur_info","أدخل عنوان بريدك الإلكتروني وكلمة المرور للوصول إلى منصة التداول");
$langs -> word_add("sign_in","تسجيل الدخول");
$langs -> word_add("email_address","البريد الإلكتروني");
$langs -> word_add("password","كلمة المرور");
$langs -> word_add("remember_me","تذكرني");
$langs -> word_add("forgot_ur_pass","هل نسيت كلمة مرورك؟");
$langs -> word_add("login","الدخول");
$langs -> word_add("register","تسجيل");
$langs -> word_add("wrong_email_or_password","بريد إلكتروني أو كلمة مرور خاطئة");
//Register
$langs -> word_add("first_name","الإسم الشخصي");
$langs -> word_add("last_name","الإسم الاخير");
$langs -> word_add("phone","الهاتف");
$langs -> word_add("account_type","نوع الحساب");
$langs -> word_add("real_account","حقيقي");
$langs -> word_add("demo_account","تجريبي");
$langs -> word_add("back_to_login","العودة لصفحة الدخول");
$langs -> word_add("acc_created_success","تم تسجيل حساب بنجاح");
$langs -> word_add("login_now","تسجيل الدخول الآن");
$langs -> word_add("email_is_used","هذا البريد الإلكتروني مستخدم بالفعل");
//Topav
$langs -> word_add("topnav_real","حقيقي");
$langs -> word_add("topnav_demo","تجريبي");
$langs -> word_add("topnav_home","الرئيسية");
$langs -> word_add("topnav_account","حساب:");
$langs -> word_add("topnav_profile","الملف الشخصي");
$langs -> word_add("topnav_transactions","المعاملات المالية");
$langs -> word_add("topnav_withdrawal","طلب سحب");









if((isset($_SESSION['lang_ar'])))
	$langs -> language_active("ar"); //Set active lang
else if(!isset($_SESSION["lang_ar"]) || $_SESSION["lang_ar"] != true)
	$langs -> language_active("en"); //Set active lang


/*print_r( $langs -> words );

echo $langs -> word_get("Bye");*/



//Language change (get parameter from url
/*if ($_GET['lang'] == 'ar')
{
	$_SESSION["lang"] = 'ar'; //Set session
	$langs -> language_active("ar"); //Set active lang
	$switchLang = 'en'; //Set var (setting url & get flag using this var)
}

else if ($_GET['lang'] == 'en')
{
	$_SESSION["lang"] = 'en'; //Set session
	$langs -> language_active("en"); //Set active lang
	$switchLang = 'ar'; //Set var (setting url & get flag using this var)
}*/
?>