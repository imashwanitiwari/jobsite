function mail_send(class_name,no) {
var name=$("."+class_name+" #txt_name"+no).val();
var email=$("."+class_name+" #txt_email"+no).val();
var pass=$("."+class_name+" #txt_password"+no).val();
if(name=="")
{
	$("."+class_name+" #txt_name"+no).addClass("errors");
}
else
{
	$("."+class_name+" #txt_name"+no).removeClass("errors");
}
if(!validEmail(email))
{
	$("."+class_name+" #txt_email"+no).addClass("errors");
}
else
{
	$("."+class_name+" #txt_email"+no).removeClass("errors");
}

if(pass=="")
{
	$("."+class_name+" #txt_password"+no).addClass("errors");
}
else
{
	$("."+class_name+" #txt_password"+no).removeClass("errors");
}

if(name!="" && validEmail(email) && pass!="")
{
	$("."+class_name+" #mail_msg"+no).load("mail.php?name="+name+"&pass="+pass+"&email="+email);
	$("."+class_name+" #txt_name"+no).val('');
	$("."+class_name+" #txt_email"+no).val('');
	$("."+class_name+" #txt_password"+no).val('');	

}	
return false;
}
function validEmail(e) {
    var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
    return String(e).search (filter) != -1;
}
