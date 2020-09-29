function validateForm()
{
	// For Name
	var name=document.getElementById('donorName').value;
	if(name=='')
	{
		alert("Enter Your Name");
		return false;
	}
	
	// For City
	var city=document.getElementById('citySelect').value;
	if(city=='')
	{
		alert("You Must Select a City.");
		return false;
	}

	// For Phone Number

	var phone=document.getElementById('phoneInput').value;
	if(phone=='')
	{
		alert("Phone Number Not Entered");
		return false;
	}
	else if(phone.length !== 10)
	{
		alert("Phone Number Must be 10 Digits.");
		return false;
	}

	// For Blood Type
	var bloodType=document.getElementById('bloodTypeSelect').value;
	console.log(bloodType);
	if(bloodType=='')
	{
		alert("You Must Select a Blood Type");
		return false;
	}

	// Rh already selected, cannot result in form validation error

	// For address
	var add=document.getElementById('addressInput').value;
	if(add=='')
	{
		alert("Please Enter Your Address");
		return false;
	}

	// Code reaches here if all fields before it are validated
	return true;

}